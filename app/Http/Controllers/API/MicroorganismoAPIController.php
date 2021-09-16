<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMicroorganismoAPIRequest;
use App\Http\Requests\API\UpdateMicroorganismoAPIRequest;
use App\Models\Microorganismo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MicroorganismoController
 * @package App\Http\Controllers\API
 */

class MicroorganismoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Microorganismo.
     * GET|HEAD /microorganismos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Microorganismo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $microorganismos = $query->get();

        return $this->sendResponse($microorganismos->toArray(), 'Microorganismos retrieved successfully');
    }

    /**
     * Store a newly created Microorganismo in storage.
     * POST /microorganismos
     *
     * @param CreateMicroorganismoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMicroorganismoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::create($input);

        return $this->sendResponse($microorganismo->toArray(), 'Microorganismo guardado exitosamente');
    }

    /**
     * Display the specified Microorganismo.
     * GET|HEAD /microorganismos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            return $this->sendError('Microorganismo no encontrado');
        }

        return $this->sendResponse($microorganismo->toArray(), 'Microorganismo retrieved successfully');
    }

    /**
     * Update the specified Microorganismo in storage.
     * PUT/PATCH /microorganismos/{id}
     *
     * @param int $id
     * @param UpdateMicroorganismoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMicroorganismoAPIRequest $request)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            return $this->sendError('Microorganismo no encontrado');
        }

        $microorganismo->fill($request->all());
        $microorganismo->save();

        return $this->sendResponse($microorganismo->toArray(), 'Microorganismo actualizado con éxito');
    }

    /**
     * Remove the specified Microorganismo from storage.
     * DELETE /microorganismos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            return $this->sendError('Microorganismo no encontrado');
        }

        $microorganismo->delete();

        return $this->sendSuccess('Microorganismo deleted successfully');
    }
}
