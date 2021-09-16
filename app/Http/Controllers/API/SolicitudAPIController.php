<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSolicitudAPIRequest;
use App\Http\Requests\API\UpdateSolicitudAPIRequest;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SolicitudController
 * @package App\Http\Controllers\API
 */

class SolicitudAPIController extends AppBaseController
{
    /**
     * Display a listing of the Solicitud.
     * GET|HEAD /solicituds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Solicitud::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $solicituds = $query->get();

        return $this->sendResponse($solicituds->toArray(), 'Solicituds retrieved successfully');
    }

    /**
     * Store a newly created Solicitud in storage.
     * POST /solicituds
     *
     * @param CreateSolicitudAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudAPIRequest $request)
    {
        $input = $request->all();

        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::create($input);

        return $this->sendResponse($solicitud->toArray(), 'Solicitud guardado exitosamente');
    }

    /**
     * Display the specified Solicitud.
     * GET|HEAD /solicituds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            return $this->sendError('Solicitud no encontrado');
        }

        return $this->sendResponse($solicitud->toArray(), 'Solicitud retrieved successfully');
    }

    /**
     * Update the specified Solicitud in storage.
     * PUT/PATCH /solicituds/{id}
     *
     * @param int $id
     * @param UpdateSolicitudAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudAPIRequest $request)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            return $this->sendError('Solicitud no encontrado');
        }

        $solicitud->fill($request->all());
        $solicitud->save();

        return $this->sendResponse($solicitud->toArray(), 'Solicitud actualizado con éxito');
    }

    /**
     * Remove the specified Solicitud from storage.
     * DELETE /solicituds/{id}
     *
     * @param int $id
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
            return $this->sendError('Solicitud no encontrado');
        }

        $solicitud->delete();

        return $this->sendSuccess('Solicitud deleted successfully');
    }
}
