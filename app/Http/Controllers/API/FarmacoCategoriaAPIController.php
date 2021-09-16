<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFarmacoCategoriaAPIRequest;
use App\Http\Requests\API\UpdateFarmacoCategoriaAPIRequest;
use App\Models\FarmacoCategoria;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FarmacoCategoriaController
 * @package App\Http\Controllers\API
 */

class FarmacoCategoriaAPIController extends AppBaseController
{
    /**
     * Display a listing of the FarmacoCategoria.
     * GET|HEAD /farmacoCategorias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = FarmacoCategoria::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $farmacoCategorias = $query->get();

        return $this->sendResponse($farmacoCategorias->toArray(), 'Farmaco Categorias retrieved successfully');
    }

    /**
     * Store a newly created FarmacoCategoria in storage.
     * POST /farmacoCategorias
     *
     * @param CreateFarmacoCategoriaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFarmacoCategoriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::create($input);

        return $this->sendResponse($farmacoCategoria->toArray(), 'Farmaco Categoria guardado exitosamente');
    }

    /**
     * Display the specified FarmacoCategoria.
     * GET|HEAD /farmacoCategorias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            return $this->sendError('Farmaco Categoria no encontrado');
        }

        return $this->sendResponse($farmacoCategoria->toArray(), 'Farmaco Categoria retrieved successfully');
    }

    /**
     * Update the specified FarmacoCategoria in storage.
     * PUT/PATCH /farmacoCategorias/{id}
     *
     * @param int $id
     * @param UpdateFarmacoCategoriaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFarmacoCategoriaAPIRequest $request)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            return $this->sendError('Farmaco Categoria no encontrado');
        }

        $farmacoCategoria->fill($request->all());
        $farmacoCategoria->save();

        return $this->sendResponse($farmacoCategoria->toArray(), 'FarmacoCategoria actualizado con éxito');
    }

    /**
     * Remove the specified FarmacoCategoria from storage.
     * DELETE /farmacoCategorias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            return $this->sendError('Farmaco Categoria no encontrado');
        }

        $farmacoCategoria->delete();

        return $this->sendSuccess('Farmaco Categoria deleted successfully');
    }
}
