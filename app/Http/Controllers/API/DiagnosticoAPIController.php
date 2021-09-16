<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiagnosticoAPIRequest;
use App\Http\Requests\API\UpdateDiagnosticoAPIRequest;
use App\Models\Diagnostico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DiagnosticoController
 * @package App\Http\Controllers\API
 */

class DiagnosticoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Diagnostico.
     * GET|HEAD /diagnosticos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Diagnostico::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $diagnosticos = $query->get();

        return $this->sendResponse($diagnosticos->toArray(), 'Diagnosticos retrieved successfully');
    }

    /**
     * Store a newly created Diagnostico in storage.
     * POST /diagnosticos
     *
     * @param CreateDiagnosticoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiagnosticoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::create($input);

        return $this->sendResponse($diagnostico->toArray(), 'Diagnostico guardado exitosamente');
    }

    /**
     * Display the specified Diagnostico.
     * GET|HEAD /diagnosticos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            return $this->sendError('Diagnostico no encontrado');
        }

        return $this->sendResponse($diagnostico->toArray(), 'Diagnostico retrieved successfully');
    }

    /**
     * Update the specified Diagnostico in storage.
     * PUT/PATCH /diagnosticos/{id}
     *
     * @param int $id
     * @param UpdateDiagnosticoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiagnosticoAPIRequest $request)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            return $this->sendError('Diagnostico no encontrado');
        }

        $diagnostico->fill($request->all());
        $diagnostico->save();

        return $this->sendResponse($diagnostico->toArray(), 'Diagnostico actualizado con éxito');
    }

    /**
     * Remove the specified Diagnostico from storage.
     * DELETE /diagnosticos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            return $this->sendError('Diagnostico no encontrado');
        }

        $diagnostico->delete();

        return $this->sendSuccess('Diagnostico deleted successfully');
    }
}
