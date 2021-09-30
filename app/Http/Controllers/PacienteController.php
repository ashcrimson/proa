<?php

namespace App\Http\Controllers;

use App\DataTables\PacienteDataTable;
use App\DataTables\Scopes\ScopePacienteDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests;
use App\Http\Requests\CreatePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\Preparacion;
use App\Models\Solicitud;
use Carbon\Carbon;
use Exception;
use Flash;
use Illuminate\Http\Request;
use nusoap_client;
use Response;

class PacienteController extends AppBaseController
{
    /**
     * Display a listing of the Paciente.
     *
     * @param PacienteDataTable $pacienteDataTable
     * @return Response
     */
    public function index(PacienteDataTable $pacienteDataTable,Request $request)
    {

        $scope = new ScopePacienteDataTable();
        $scope->del = $request->del ?? null;
        $scope->al = $request->al ?? null;

        $pacienteDataTable->addScope($scope);

        return $pacienteDataTable->render('pacientes.index');
    }

    /**
     * Show the form for creating a new Paciente.
     *
     * @return Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created Paciente in storage.
     *
     * @param CreatePacienteRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteRequest $request)
    {
        $request->merge([
            'sexo' => $request->sexo ? 'M' : 'F',
        ]);

        /** @var Paciente $paciente */
        $paciente = Paciente::create($request->all());

        Flash::success('Paciente saved successfully.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Display the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente not found');

            return redirect(route('pacientes.index'));
        }

        return view('pacientes.show')->with('paciente', $paciente);
    }

    /**
     * Show the form for editing the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente not found');

            return redirect(route('pacientes.index'));
        }

        $paciente->fecha_nac = Carbon::parse($paciente->fecha_nac)->format('Y-m-d');

        return view('pacientes.edit')->with('paciente', $paciente);
    }

    /**
     * Update the specified Paciente in storage.
     *
     * @param  int              $id
     * @param UpdatePacienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteRequest $request)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente not found');

            return redirect(route('pacientes.index'));
        }

        $request->merge([
            'sexo' => $request->sexo ? 'M' : 'F',
        ]);

        $paciente->fill($request->all());
        $paciente->save();

        Flash::success('Paciente updated successfully.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Remove the specified Paciente from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente not found');

            return redirect(route('pacientes.index'));
        }

        $paciente->delete();

        Flash::success('Paciente deleted successfully.');

        return redirect(route('pacientes.index'));
    }


    public function getPacientePorApi(Request $request)
    {

        /**
         * @var Paciente $paciente
         */
        $paciente = Paciente::with('solicitudes')->where('run',$request->run)->first();


        if ($paciente){

            /**
             * @var Solicitud $ultimaSolicitud
             */
            $ultimaSolicitud = $paciente->solicitudes->last();

            $ultimaSolicitud->load([
                'estado',
                'userCrea',
                'userActualiza',
                'cultivos',
                'diagnosticos',
                'medicamentos',
                'microorganismos',
            ]);



            $paciente->setAttribute('ultima_preparacion',$ultimaSolicitud);
            $paciente->setAttribute('sexo',$paciente->sexo ? 'M' : 'F');
            return  $this->sendResponse($paciente,"Paciente");
        }
        else{

//            dd('consulta api');

            try {



                $params = array('run' => $request->run);
                $client = new nusoap_client('http://172.25.16.18/bus/webservice/ws.php?wsdl');
                $client->response_timeout = 5;
                $response = $client->call('buscarDetallePersona', $params);

                return $this->sendResponse($response,"Paciente");

            } catch (Exception $exception) {

                return $this->sendError($exception->getMessage());
            }
        }


    }

}
