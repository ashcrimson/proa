<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSolicitudEstadoAPIRequest;
use App\Http\Requests\API\UpdateSolicitudEstadoAPIRequest;
use App\Models\SolicitudEstado;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SolicitudEstadoController
 * @package App\Http\Controllers\API
 */

class SolicitudEstadoAPIController extends AppBaseController
{
    /**
     * Display a listing of the SolicitudEstado.
     * GET|HEAD /solicitudEstados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SolicitudEstado::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $solicitudEstados = $query->get();

        return $this->sendResponse($solicitudEstados->toArray(), 'Solicitud Estados retrieved successfully');
    }

    /**
     * Store a newly created SolicitudEstado in storage.
     * POST /solicitudEstados
     *
     * @param CreateSolicitudEstadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudEstadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::create($input);

        return $this->sendResponse($solicitudEstado->toArray(), 'Solicitud Estado guardado exitosamente');
    }

    /**
     * Display the specified SolicitudEstado.
     * GET|HEAD /solicitudEstados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            return $this->sendError('Solicitud Estado no encontrado');
        }

        return $this->sendResponse($solicitudEstado->toArray(), 'Solicitud Estado retrieved successfully');
    }

    /**
     * Update the specified SolicitudEstado in storage.
     * PUT/PATCH /solicitudEstados/{id}
     *
     * @param int $id
     * @param UpdateSolicitudEstadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudEstadoAPIRequest $request)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            return $this->sendError('Solicitud Estado no encontrado');
        }

        $solicitudEstado->fill($request->all());
        $solicitudEstado->save();

        return $this->sendResponse($solicitudEstado->toArray(), 'SolicitudEstado actualizado con éxito');
    }

    /**
     * Remove the specified SolicitudEstado from storage.
     * DELETE /solicitudEstados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            return $this->sendError('Solicitud Estado no encontrado');
        }

        $solicitudEstado->delete();

        return $this->sendSuccess('Solicitud Estado deleted successfully');
    }
}
