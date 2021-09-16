<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMedicamentoAPIRequest;
use App\Http\Requests\API\UpdateMedicamentoAPIRequest;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MedicamentoController
 * @package App\Http\Controllers\API
 */

class MedicamentoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Medicamento.
     * GET|HEAD /medicamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Medicamento::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $medicamentos = $query->get();

        return $this->sendResponse($medicamentos->toArray(), 'Medicamentos retrieved successfully');
    }

    /**
     * Store a newly created Medicamento in storage.
     * POST /medicamentos
     *
     * @param CreateMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::create($input);

        return $this->sendResponse($medicamento->toArray(), 'Medicamento guardado exitosamente');
    }

    /**
     * Display the specified Medicamento.
     * GET|HEAD /medicamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            return $this->sendError('Medicamento no encontrado');
        }

        return $this->sendResponse($medicamento->toArray(), 'Medicamento retrieved successfully');
    }

    /**
     * Update the specified Medicamento in storage.
     * PUT/PATCH /medicamentos/{id}
     *
     * @param int $id
     * @param UpdateMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicamentoAPIRequest $request)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            return $this->sendError('Medicamento no encontrado');
        }

        $medicamento->fill($request->all());
        $medicamento->save();

        return $this->sendResponse($medicamento->toArray(), 'Medicamento actualizado con éxito');
    }

    /**
     * Remove the specified Medicamento from storage.
     * DELETE /medicamentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            return $this->sendError('Medicamento no encontrado');
        }

        $medicamento->delete();

        return $this->sendSuccess('Medicamento deleted successfully');
    }
}
