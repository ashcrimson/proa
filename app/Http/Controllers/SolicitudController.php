<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\ScopeSolicitudDataTable;
use App\DataTables\SolicitudDataTable;
use App\DataTables\SolicitudEnfermeraDataTable;
use App\DataTables\SolicitudMedicoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\Paciente;
use App\Models\Role;
use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use App\Models\SolicitudMedicamento;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use nusoap_client;
use Response;

class SolicitudController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Solicitudes')->only(['show']);
        $this->middleware('permission:Crear Solicitudes')->only(['create','store']);
        $this->middleware('permission:Editar Solicitudes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Solicitudes')->only(['destroy']);
    }

    /**
     * Display a listing of the Solicitud.
     *
     * @param SolicitudDataTable $solicitudDataTable
     * @return Response
     */
    public function index(SolicitudDataTable $solicitudDataTable)
    {
        /**
         * @var User $user
         */
        $user = auth()->user();

        $scope = new ScopeSolicitudDataTable();

        $scope->users = request()->users ?? null;

         $estadosPuedeVer = [];


        if($user->hasRole(Role::DEVELOPER)){

            $estadosPuedeVer = [
                SolicitudEstado::INGRESADA,
                SolicitudEstado::SOLICITADA,
                SolicitudEstado::APROBADA,
                SolicitudEstado::DESPACHADA,
                SolicitudEstado::RECHAZADA,
                SolicitudEstado::ANULADA,
                SolicitudEstado::VENCIDA,
                SolicitudEstado::PARA_REGRESAR,
            ];

        }

        if($user->hasRole(Role::MEDICO)){

            $estadosPuedeVer = [
                SolicitudEstado::INGRESADA,
                SolicitudEstado::SOLICITADA,
                SolicitudEstado::APROBADA,
                SolicitudEstado::DESPACHADA,
                SolicitudEstado::RECHAZADA,
                SolicitudEstado::ANULADA,
                SolicitudEstado::PARA_REGRESAR,
                SolicitudEstado::VENCIDA,
            ];
        }

        if ($user->hasRole(Role::INFECTOLOGO)){
            $estadosPuedeVer = [
                SolicitudEstado::SOLICITADA,
                SolicitudEstado::APROBADA,
                SolicitudEstado::DESPACHADA,
                SolicitudEstado::RECHAZADA,
                SolicitudEstado::ANULADA,
                SolicitudEstado::PARA_REGRESAR,
            ];
        }

        if ($user->hasRole(Role::QF_CLINICO)){

            $estadosPuedeVer = [

                SolicitudEstado::SOLICITADA,
                SolicitudEstado::APROBADA,
                SolicitudEstado::DESPACHADA,
                SolicitudEstado::RECHAZADA,
                SolicitudEstado::ANULADA,
                SolicitudEstado::PARA_REGRESAR,
                SolicitudEstado::VENCIDA,
            ];
        }

        if ($user->hasRole(Role::TECNICO)){
            $estadosPuedeVer = [
                SolicitudEstado::INGRESADA,
                SolicitudEstado::SOLICITADA,
                SolicitudEstado::APROBADA,
                SolicitudEstado::DESPACHADA,
                SolicitudEstado::RECHAZADA,
                SolicitudEstado::ANULADA,
                SolicitudEstado::PARA_REGRESAR,
            ];
        }

        if ($user->hasRole(Role::ENFERMERA)){
            return redirect(route('enfermeria.solicitudes'));
        }


        $scope->estados = request()->estados ?? $estadosPuedeVer;

        $solicitudDataTable->addScope($scope);

        $estados = SolicitudEstado::whereIn('id',$estadosPuedeVer)->get();

        $servicios = Solicitud::select('descserv')->groupBy('descserv')->pluck('descserv')->toArray();


        return $solicitudDataTable->render('solicitudes.index',compact('estados','servicios'));
    }

    public function solicitudesEnfermera(SolicitudEnfermeraDataTable $dataTable)
    {

        $scope = new ScopeSolicitudDataTable();

        $scope->users = request()->users ?? null;

        $estadosPuedeVer = [
            SolicitudEstado::INGRESADA,
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::APROBADA,
            SolicitudEstado::DESPACHADA,
            SolicitudEstado::RECHAZADA,
            SolicitudEstado::ANULADA,
            SolicitudEstado::VENCIDA,
            SolicitudEstado::PARA_REGRESAR,
        ];


        $scope->estados = request()->estados ?? $estadosPuedeVer;

        $dataTable->addScope($scope);

        $estados = SolicitudEstado::whereIn('id',$estadosPuedeVer)->get();
        
        $servicios = Solicitud::select('descserv')->groupBy('descserv')->pluck('descserv')->toArray();

        return $dataTable->render('solicitudes.enfermeria.index',compact('estados','servicios'));
    }

    public function solicitudesMedico(SolicitudMedicoDataTable $dataTable)
    {

        $scope = new ScopeSolicitudDataTable();


        $estadosPuedeVer = [
            SolicitudEstado::INGRESADA,
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::APROBADA,
            SolicitudEstado::DESPACHADA,
            SolicitudEstado::RECHAZADA,
            SolicitudEstado::ANULADA,
            SolicitudEstado::VENCIDA,
        ];


        $scope->estados = request()->estados ?? $estadosPuedeVer;

        $dataTable->addScope($scope);

        $estados = SolicitudEstado::whereIn('id',$estadosPuedeVer)->get();

        return $dataTable->render('solicitudes.medico.index',compact('estados'));
    }


    /**
     * Show the form for creating a new Solicitud.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        /**
         * @var Solicitud $solicitud
         */
        $solicitud = $this->getSolicitudTemporal();

        if ($request->rut){
            return redirect(route('solicitudes.edit',$solicitud->id).'?rut='.$request->rut);

        }else{
            return redirect(route('solicitudes.edit',$solicitud->id));

        }




    }

    /**
     * Store a newly created Solicitud in storage.
     *
     * @param CreateSolicitudRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudRequest $request)
    {

        try {
            DB::beginTransaction();

            /**
             * @var  Paciente $paciente
             */
            $paciente = $this->creaOactualizaPaciente($request);

            $request->merge([
                'user crea' => auth()->user()->id,
                'paciente_id' => $paciente->id,
                'estado_id' => SolicitudEstado::INGRESADA,
                'fecha_inicio_tratamiento' => 'fecha_solicita'
            ]);

            /** @var Solicitud $solicitud */

            $solicitud = Solicitud::create($request->all());

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();


        flash()->success('Solicitud guardado exitosamente.');

        return redirect(route('solicitudes.index'));
    }

    /**
     * Display the specified Solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            flash()->error('Solicitud no encontrado');

            return redirect(route('solicitudes.index'));
        }

        return view('solicitudes.show')->with('solicitud', $solicitud);
    }

    /**
     * Show the form for editing the specified Solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);


        if (!$solicitud->esTemporal()){
            $solicitud = $this->addAttributos($solicitud);
        }

        if (empty($solicitud)) {
            flash()->error('Solicitud no encontrado');

            return redirect(route('solicitudes.index'));
        }

        return view('solicitudes.edit')->with('solicitud', $solicitud);
    }

    /**
     * Update the specified Solicitud in storage.
     *
     * @param  int              $id
     * @param UpdateSolicitudRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudRequest $request)
    {


        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);


        if (empty($solicitud)) {
            flash()->error('Solicitud no encontrado');

            return redirect(route('solicitudes.index'));
        }

        $estado = SolicitudEstado::INGRESADA;


        if ($request->enviar){
            $estado = SolicitudEstado::SOLICITADA;
            $request->validate([
                'password' => 'required'
            ]);

            $params = array('email' => auth()->user()->email, "pin" => $request->password);
            $client = new nusoap_client('http://172.25.16.18/bus/webservice/ws.php?wsdl');
            $client->response_timeout = 1800;
            $chekPass = $client->call('ValidaPin', $params);

            // $chekPass = Hash::check($request->password,auth()->user()->getAuthPassword());


            if (!$chekPass){
                return back()->withInput()->withErrors(['password' => "El pin es incorrecto"]);
            }

            if (auth()->user()->hasRole(Role::INFECTOLOGO)){
                $estado = SolicitudEstado::APROBADA;
            }

            $periodo = $solicitud->medicamentos->max('periodo');

            $request->merge([
                'fecha_solicita' => Carbon::now(),
                'fecha_inicio_tratamiento' => Carbon::now()->addDay(),
                'fecha_fin_tratamiento' => Carbon::now()->addDays($periodo)
            ]);

        }

        if ($request->regresar){

            if ($solicitud->estado_id==SolicitudEstado::PARA_REGRESAR){
                $estado = SolicitudEstado::APROBADA;
            }

        }

        try {
            DB::beginTransaction();

            /**
             * @var  Paciente $paciente
             */
            $paciente = $this->creaOactualizaPaciente($request);


            $request->merge([
                'paciente_id' => $paciente->id,
                'estado_id' => $estado,
                'inicio' => $request->tratamiento=='inicio' ? 1 : 0,
                'continuacion' => $request->tratamiento=='continuacion' ? 1 : 0,
                'terapia_empirica' => $request->terapia=='terapia_empirica' ? 1 : 0,
                'terapia_especifica' => $request->terapia=='terapia_especifica' ? 1 : 0,
                'infeccion_extrahospitalaria' => $request->fuente_infeccion=='infeccion_extrahospitalaria' ? 1 : 0,
                'infeccion_intrahospitalaria' => $request->fuente_infeccion=='infeccion_intrahospitalaria' ? 1 : 0,
            ]);

            $solicitud->fill($request->all());
            $solicitud->save();

            $solicitud->diagnosticos()->sync($request->diagnosticos ?? []);
            $solicitud->cultivos()->sync($request->cultivos ?? []);



        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();



        flash()->success('Solicitud actualizado con éxito.');

        return redirect(route('solicitudes.index'));
    }

    /**
     * Remove the specified Solicitud from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            flash()->error('Solicitud no encontrado');

            return redirect(route('solicitudes.index'));
        }

        $solicitud->delete();

        flash()->success('Solicitud deleted successfully.');

        return redirect(route('solicitudes.index'));
    }

    public function creaOactualizaPaciente(UpdateSolicitudRequest $request)
    {
        $paciente = Paciente::updateOrCreate([
            'run' => $request->run,
            'dv_run' => $request->dv_run,

        ],[
            'run' => $request->run,
            'fecha_nac' => $request->fecha_nac,
            'dv_run' => $request->dv_run,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,

            'sexo' => $request->sexo ? 'M' : 'F',

            'direccion' => $request->direccion,
            'familiar_responsable' => $request->familiar_responsable,
            'telefono' => $request->telefono,
            'telefono2' => $request->telefono2,
            'prevision_id' => $request->prevision_id,
            'clave' => $request->clave,
            'movil_envia' => $request->movil_envia,

        ]);



        return $paciente;
    }


    public function getSolicitudTemporal()
    {
        $sol = Solicitud::where('user_crea',auth()->user()->id)->where('estado_id',SolicitudEstado::TEMPORAL)->first();

        if ($sol){
            $sol->delete();
        }

        $sol = Solicitud::create([
            'user_crea' => auth()->user()->id,
            'estado_id' => SolicitudEstado::TEMPORAL,
        ]);


        return $sol;
    }

    public function addAttributos(Solicitud $solicitud)
    {

        $solicitud->setAttribute("run" ,$solicitud->paciente->run);
        $solicitud->setAttribute("dv_run" ,$solicitud->paciente->dv_run);
        $solicitud->setAttribute("apellido_paterno" ,$solicitud->paciente->apellido_paterno);
        $solicitud->setAttribute("apellido_materno" ,$solicitud->paciente->apellido_materno);
        $solicitud->setAttribute("primer_nombre" ,$solicitud->paciente->primer_nombre);
        $solicitud->setAttribute("segundo_nombre" ,$solicitud->paciente->segundo_nombre);
        $solicitud->setAttribute("fecha_nac" ,fechaEn($solicitud->paciente->fecha_nac));
        $solicitud->setAttribute("sexo" ,$solicitud->paciente->sexo == 'M' ? 1 : 0);

        $solicitud->setAttribute("direccion" ,$solicitud->paciente->direccion);
        $solicitud->setAttribute("familiar_responsable" ,$solicitud->paciente->familiar_responsable);
        $solicitud->setAttribute("telefono" ,$solicitud->paciente->telefono);
        $solicitud->setAttribute("telefono2" ,$solicitud->paciente->telefono2);
        $solicitud->setAttribute("prevision_id" ,$solicitud->paciente->prevision_id);
        $solicitud->setAttribute("clave" ,$solicitud->paciente->clave);
        $solicitud->setAttribute("movil_envia" ,$solicitud->paciente->movil_envia);


        return $solicitud;
    }

    public function listUser(SolicitudDataTable $dataTable)
    {
        $estadosDefecto = [
            SolicitudEstado::INGRESADA,
            SolicitudEstado::SOLICITADA,
            SolicitudEstado::APROBADA,
            SolicitudEstado::DESPACHADA,
            SolicitudEstado::RECHAZADA,
            SolicitudEstado::ANULADA,
        ];

        $scope = new ScopeSolicitudDataTable();
        $scope->users = auth()->user()->id;
        $scope->estados = request()->estados ?? $estadosDefecto;

        $dataTable->addScope($scope);

        return $dataTable->render('solicitudes.user.index');
    }

    public function aprobar(Solicitud $solicitud)
    {
        return view('solicitudes.aprobar.aprobar',compact('solicitud'));
    }



    public function rechazarStore(Solicitud $solicitud)
    {

        $solicitud->estado_id= SolicitudEstado::RECHAZADA;
        $solicitud->user_actualiza = auth()->user()->id;
        $solicitud->save();

        flash('Solicitud rechazada!')->success();

        return redirect(route('solicitudes.index'));
    }

    public function aprobarStore(Solicitud $solicitud)
    {

        $solicitud->estado_id= SolicitudEstado::APROBADA;
        $solicitud->user_actualiza = auth()->user()->id;
        $solicitud->user_autoriza = auth()->user()->id;
        $solicitud->fecha_autoriza = Carbon::now();
        $solicitud->save();

        flash('Solicitud aprobada!')->success();

        return redirect(route('solicitudes.index'));
    }

    public function despachar(Solicitud $solicitud)
    {
        return view('solicitudes.despachar.despachar',compact('solicitud'));
    }

    public function despacharStore(Solicitud $solicitud,Request $request)
    {


        $despachos = $request->despachos ?? null;

        if ($despachos){

            /**
             * @var SolicitudMedicamento $det
             */
            foreach ($solicitud->medicamentos as $index => $det) {
                $det->despachos += $despachos[$det->id] ?? 0;
                $det->save();
            }
        }

        if ($solicitud->medicamentosDespachados()){
           $solicitud->estado_id= SolicitudEstado::DESPACHADA;
           $solicitud->user_actualiza = auth()->user()->id;
           $solicitud->user_despacha = auth()->user()->id;
           $solicitud->fecha_despacha = Carbon::now();
           $solicitud->save();
       }



        flash('Despacho realizado!')->success();



        return redirect(route('solicitudes.index'));
    }

    public function clonar(Solicitud $solicitud)
    {
        try {
            DB::beginTransaction();

            $nueva = $solicitud->clonar();

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        flash("Solicitud clonada para regresar!")->success();

        return redirect(route('solicitudes.edit',$nueva->id));
    }

    public function imprimeReceta(Solicitud $solicitud)
    {

        /**
         * @var PDF $pdf
         */
        $pdf = App::make('dompdf.wrapper');

        $vita = view('solicitudes.receta',compact('solicitud'))->render();


        return $pdf->loadHTML($vita)
            ->setPaper('letter','portrait')
            ->stream("dompdf_out.pdf");


    }

    public function cerrar(Solicitud $solicitud)
    {
        $solicitud->estado_id= SolicitudEstado::DESPACHADA;
        $solicitud->user_actualiza = auth()->user()->id;
        $solicitud->user_despacha = auth()->user()->id;
        $solicitud->fecha_despacha = Carbon::now();
        $solicitud->save();

        flash('Solicitud cerrada')->success();

        return redirect(route('solicitudes.index'));
    }

    public function depuraAtualiza()
    {

        $actualizadas = 0;
        $solicitudes = Solicitud::with('paciente')->get();

        /**
         * @var Solicitud $solicitud
         */
        foreach ($solicitudes as $index => $solicitud) {

            $depurada = $solicitud->depurar();

//
            //si no se debe borrar por días pasados
            if (!$depurada){

                if($solicitud->paciente){

                    $params = array('run' => $solicitud->paciente->run);
                    $client = new nusoap_client('http://172.25.16.18/bus/webservice/ws.php?wsdl');
                    $client->response_timeout = 1800;
                    $response = $client->call('buscarDetallePersonaPROA', $params);

                    $response = json_decode($response, true);

                    $solicitud->descserv = $response["hosp"]['descserv'] ?? 'No Hospitalizado';
                    $solicitud->save();
                    $actualizadas++;
                }
            }

        }

        return response()->json($actualizadas);
    }
}
