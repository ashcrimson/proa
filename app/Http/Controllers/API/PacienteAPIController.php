<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacienteAPIRequest;
use App\Http\Requests\API\UpdatePacienteAPIRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PacienteController
 * @package App\Http\Controllers\API
 */

class PacienteAPIController extends AppBaseController
{
    /**
     * Display a listing of the Paciente.
     * GET|HEAD /pacientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Paciente::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $pacientes = $query->get();

        return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
    }

    /**
     * Store a newly created Paciente in storage.
     * POST /pacientes
     *
     * @param CreatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Paciente $paciente */
        $paciente = Paciente::create($input);

        return $this->sendResponse($paciente->toArray(), 'Paciente guardado exitosamente');
    }

    /**
     * Display the specified Paciente.
     * GET|HEAD /pacientes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente no encontrado');
        }

        return $this->sendResponse($paciente->toArray(), 'Paciente retrieved successfully');
    }

    /**
     * Update the specified Paciente in storage.
     * PUT/PATCH /pacientes/{id}
     *
     * @param int $id
     * @param UpdatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteAPIRequest $request)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente no encontrado');
        }

        $paciente->fill($request->all());
        $paciente->save();

        return $this->sendResponse($paciente->toArray(), 'Paciente actualizado con éxito');
    }

    /**
     * Remove the specified Paciente from storage.
     * DELETE /pacientes/{id}
     *
     * @param int $id
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
            return $this->sendError('Paciente no encontrado');
        }

        $paciente->delete();

        return $this->sendSuccess('Paciente deleted successfully');
    }
}
