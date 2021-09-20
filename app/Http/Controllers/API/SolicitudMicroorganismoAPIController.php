<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSolicitudMicroorganismoAPIRequest;
use App\Http\Requests\API\UpdateSolicitudMicroorganismoAPIRequest;
use App\Models\SolicitudMicroorganismo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SolicitudMicroorganismoController
 * @package App\Http\Controllers\API
 */

class SolicitudMicroorganismoAPIController extends AppBaseController
{
    /**
     * Display a listing of the SolicitudMicroorganismo.
     * GET|HEAD /solicitudMicroorganismos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SolicitudMicroorganismo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $solicitudMicroorganismos = $query->get();

        return $this->sendResponse($solicitudMicroorganismos->toArray(), 'Solicitud Microorganismos retrieved successfully');
    }

    /**
     * Store a newly created SolicitudMicroorganismo in storage.
     * POST /solicitudMicroorganismos
     *
     * @param CreateSolicitudMicroorganismoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudMicroorganismoAPIRequest $request)
    {
        $input = $request->all();

        /** @var SolicitudMicroorganismo $solicitudMicroorganismo */
        $solicitudMicroorganismo = SolicitudMicroorganismo::create($input);

        return $this->sendResponse($solicitudMicroorganismo->toArray(), 'Solicitud Microorganismo guardado exitosamente');
    }

    /**
     * Display the specified SolicitudMicroorganismo.
     * GET|HEAD /solicitudMicroorganismos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SolicitudMicroorganismo $solicitudMicroorganismo */
        $solicitudMicroorganismo = SolicitudMicroorganismo::find($id);

        if (empty($solicitudMicroorganismo)) {
            return $this->sendError('Solicitud Microorganismo no encontrado');
        }

        return $this->sendResponse($solicitudMicroorganismo->toArray(), 'Solicitud Microorganismo retrieved successfully');
    }

    /**
     * Update the specified SolicitudMicroorganismo in storage.
     * PUT/PATCH /solicitudMicroorganismos/{id}
     *
     * @param int $id
     * @param UpdateSolicitudMicroorganismoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudMicroorganismoAPIRequest $request)
    {
        /** @var SolicitudMicroorganismo $solicitudMicroorganismo */
        $solicitudMicroorganismo = SolicitudMicroorganismo::find($id);

        if (empty($solicitudMicroorganismo)) {
            return $this->sendError('Solicitud Microorganismo no encontrado');
        }

        $solicitudMicroorganismo->fill($request->all());
        $solicitudMicroorganismo->save();

        return $this->sendResponse($solicitudMicroorganismo->toArray(), 'SolicitudMicroorganismo actualizado con éxito');
    }

    /**
     * Remove the specified SolicitudMicroorganismo from storage.
     * DELETE /solicitudMicroorganismos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SolicitudMicroorganismo $solicitudMicroorganismo */
        $solicitudMicroorganismo = SolicitudMicroorganismo::find($id);

        if (empty($solicitudMicroorganismo)) {
            return $this->sendError('Solicitud Microorganismo no encontrado');
        }

        $solicitudMicroorganismo->delete();

        return $this->sendSuccess('Solicitud Microorganismo deleted successfully');
    }
}
