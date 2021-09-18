<?php

namespace App\Http\Controllers;

use App\DataTables\SolicitudDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\Paciente;
use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use Carbon\Carbon;
use Exception;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class SolicitudController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver solicitudes')->only(['show']);
        $this->middleware('permission:Crear solicitudes')->only(['create','store']);
        $this->middleware('permission:Editar solicitudes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar solicitudes')->only(['destroy']);
    }

    /**
     * Display a listing of the Solicitud.
     *
     * @param SolicitudDataTable $solicitudDataTable
     * @return Response
     */
    public function index(SolicitudDataTable $solicitudDataTable)
    {
        return $solicitudDataTable->render('solicitudes.index');
    }

    /**
     * Show the form for creating a new Solicitud.
     *
     * @return Response
     */
    public function create()
    {
        $solicitud = $this->getSolicitudTemporal();

        return redirect(route('solicitudes.edit',$solicitud->id));

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

        $solicitud = $this->addAttributos($solicitud);

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

        try {
            DB::beginTransaction();

            /**
             * @var  Paciente $paciente
             */
            $paciente = $this->creaOactualizaPaciente($request);

            $request->merge([
                'paciente_id' => $paciente->id,
                'estado_id' => SolicitudEstado::INGRESADA,
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

        if (!$sol){
            $sol = Solicitud::create([
                'user_crea' => auth()->user()->id,
                'estado_id' => SolicitudEstado::TEMPORAL,
            ]);
        }

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
        $solicitud->setAttribute("fecha_nac" ,Carbon::parse($solicitud->paciente->fecha_nac)->format('Y-m-d'));
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
}
