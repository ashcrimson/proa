<?php

namespace App\Http\Controllers;

use App\DataTables\FarmacoCategoriaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFarmacoCategoriaRequest;
use App\Http\Requests\UpdateFarmacoCategoriaRequest;
use App\Models\FarmacoCategoria;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FarmacoCategoriaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Farmaco Categorias')->only(['show']);
        $this->middleware('permission:Crear Farmaco Categorias')->only(['create','store']);
        $this->middleware('permission:Editar Farmaco Categorias')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Farmaco Categorias')->only(['destroy']);
    }

    /**
     * Display a listing of the FarmacoCategoria.
     *
     * @param FarmacoCategoriaDataTable $farmacoCategoriaDataTable
     * @return Response
     */
    public function index(FarmacoCategoriaDataTable $farmacoCategoriaDataTable)
    {
        return $farmacoCategoriaDataTable->render('farmaco_categorias.index');
    }

    /**
     * Show the form for creating a new FarmacoCategoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('farmaco_categorias.create');
    }

    /**
     * Store a newly created FarmacoCategoria in storage.
     *
     * @param CreateFarmacoCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateFarmacoCategoriaRequest $request)
    {
        $input = $request->all();

        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::create($input);

        Flash::success('Farmaco Categoria guardado exitosamente.');

        return redirect(route('farmacoCategorias.index'));
    }

    /**
     * Display the specified FarmacoCategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            Flash::error('Farmaco Categoria no encontrado');

            return redirect(route('farmacoCategorias.index'));
        }

        return view('farmaco_categorias.show')->with('farmacoCategoria', $farmacoCategoria);
    }

    /**
     * Show the form for editing the specified FarmacoCategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            Flash::error('Farmaco Categoria no encontrado');

            return redirect(route('farmacoCategorias.index'));
        }

        return view('farmaco_categorias.edit')->with('farmacoCategoria', $farmacoCategoria);
    }

    /**
     * Update the specified FarmacoCategoria in storage.
     *
     * @param  int              $id
     * @param UpdateFarmacoCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFarmacoCategoriaRequest $request)
    {
        /** @var FarmacoCategoria $farmacoCategoria */
        $farmacoCategoria = FarmacoCategoria::find($id);

        if (empty($farmacoCategoria)) {
            Flash::error('Farmaco Categoria no encontrado');

            return redirect(route('farmacoCategorias.index'));
        }

        $farmacoCategoria->fill($request->all());
        $farmacoCategoria->save();

        Flash::success('Farmaco Categoria actualizado con éxito.');

        return redirect(route('farmacoCategorias.index'));
    }

    /**
     * Remove the specified FarmacoCategoria from storage.
     *
     * @param  int $id
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
            Flash::error('Farmaco Categoria no encontrado');

            return redirect(route('farmacoCategorias.index'));
        }

        $farmacoCategoria->delete();

        Flash::success('Farmaco Categoria deleted successfully.');

        return redirect(route('farmacoCategorias.index'));
    }
}
