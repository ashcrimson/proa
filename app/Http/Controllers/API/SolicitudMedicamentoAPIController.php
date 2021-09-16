<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSolicitudMedicamentoAPIRequest;
use App\Http\Requests\API\UpdateSolicitudMedicamentoAPIRequest;
use App\Models\SolicitudMedicamento;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SolicitudMedicamentoController
 * @package App\Http\Controllers\API
 */

class SolicitudMedicamentoAPIController extends AppBaseController
{
    /**
     * Display a listing of the SolicitudMedicamento.
     * GET|HEAD /solicitudMedicamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SolicitudMedicamento::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $solicitudMedicamentos = $query->get();

        return $this->sendResponse($solicitudMedicamentos->toArray(), 'Solicitud Medicamentos retrieved successfully');
    }

    /**
     * Store a newly created SolicitudMedicamento in storage.
     * POST /solicitudMedicamentos
     *
     * @param CreateSolicitudMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudMedicamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var SolicitudMedicamento $solicitudMedicamento */
        $solicitudMedicamento = SolicitudMedicamento::create($input);

        return $this->sendResponse($solicitudMedicamento->toArray(), 'Solicitud Medicamento guardado exitosamente');
    }

    /**
     * Display the specified SolicitudMedicamento.
     * GET|HEAD /solicitudMedicamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SolicitudMedicamento $solicitudMedicamento */
        $solicitudMedicamento = SolicitudMedicamento::find($id);

        if (empty($solicitudMedicamento)) {
            return $this->sendError('Solicitud Medicamento no encontrado');
        }

        return $this->sendResponse($solicitudMedicamento->toArray(), 'Solicitud Medicamento retrieved successfully');
    }

    /**
     * Update the specified SolicitudMedicamento in storage.
     * PUT/PATCH /solicitudMedicamentos/{id}
     *
     * @param int $id
     * @param UpdateSolicitudMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudMedicamentoAPIRequest $request)
    {
        /** @var SolicitudMedicamento $solicitudMedicamento */
        $solicitudMedicamento = SolicitudMedicamento::find($id);

        if (empty($solicitudMedicamento)) {
            return $this->sendError('Solicitud Medicamento no encontrado');
        }

        $solicitudMedicamento->fill($request->all());
        $solicitudMedicamento->save();

        return $this->sendResponse($solicitudMedicamento->toArray(), 'SolicitudMedicamento actualizado con éxito');
    }

    /**
     * Remove the specified SolicitudMedicamento from storage.
     * DELETE /solicitudMedicamentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SolicitudMedicamento $solicitudMedicamento */
        $solicitudMedicamento = SolicitudMedicamento::find($id);

        if (empty($solicitudMedicamento)) {
            return $this->sendError('Solicitud Medicamento no encontrado');
        }

        $solicitudMedicamento->delete();

        return $this->sendSuccess('Solicitud Medicamento deleted successfully');
    }
}
