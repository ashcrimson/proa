<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCultivoAPIRequest;
use App\Http\Requests\API\UpdateCultivoAPIRequest;
use App\Models\Cultivo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CultivoController
 * @package App\Http\Controllers\API
 */

class CultivoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Cultivo.
     * GET|HEAD /cultivos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Cultivo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $cultivos = $query->get();

        return $this->sendResponse($cultivos->toArray(), 'Cultivos retrieved successfully');
    }

    /**
     * Store a newly created Cultivo in storage.
     * POST /cultivos
     *
     * @param CreateCultivoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCultivoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::create($input);

        return $this->sendResponse($cultivo->toArray(), 'Cultivo guardado exitosamente');
    }

    /**
     * Display the specified Cultivo.
     * GET|HEAD /cultivos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            return $this->sendError('Cultivo no encontrado');
        }

        return $this->sendResponse($cultivo->toArray(), 'Cultivo retrieved successfully');
    }

    /**
     * Update the specified Cultivo in storage.
     * PUT/PATCH /cultivos/{id}
     *
     * @param int $id
     * @param UpdateCultivoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCultivoAPIRequest $request)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            return $this->sendError('Cultivo no encontrado');
        }

        $cultivo->fill($request->all());
        $cultivo->save();

        return $this->sendResponse($cultivo->toArray(), 'Cultivo actualizado con éxito');
    }

    /**
     * Remove the specified Cultivo from storage.
     * DELETE /cultivos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            return $this->sendError('Cultivo no encontrado');
        }

        $cultivo->delete();

        return $this->sendSuccess('Cultivo deleted successfully');
    }
}
