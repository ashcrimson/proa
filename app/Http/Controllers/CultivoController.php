<?php

namespace App\Http\Controllers;

use App\DataTables\CultivoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCultivoRequest;
use App\Http\Requests\UpdateCultivoRequest;
use App\Models\Cultivo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CultivoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Cultivos')->only(['show']);
        $this->middleware('permission:Crear Cultivos')->only(['create','store']);
        $this->middleware('permission:Editar Cultivos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Cultivos')->only(['destroy']);
    }

    /**
     * Display a listing of the Cultivo.
     *
     * @param CultivoDataTable $cultivoDataTable
     * @return Response
     */
    public function index(CultivoDataTable $cultivoDataTable)
    {
        return $cultivoDataTable->render('cultivos.index');
    }

    /**
     * Show the form for creating a new Cultivo.
     *
     * @return Response
     */
    public function create()
    {
        return view('cultivos.create');
    }

    /**
     * Store a newly created Cultivo in storage.
     *
     * @param CreateCultivoRequest $request
     *
     * @return Response
     */
    public function store(CreateCultivoRequest $request)
    {
        $input = $request->all();

        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::create($input);

        Flash::success('Cultivo guardado exitosamente.');

        return redirect(route('cultivos.index'));
    }

    /**
     * Display the specified Cultivo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            Flash::error('Cultivo no encontrado');

            return redirect(route('cultivos.index'));
        }

        return view('cultivos.show')->with('cultivo', $cultivo);
    }

    /**
     * Show the form for editing the specified Cultivo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            Flash::error('Cultivo no encontrado');

            return redirect(route('cultivos.index'));
        }

        return view('cultivos.edit')->with('cultivo', $cultivo);
    }

    /**
     * Update the specified Cultivo in storage.
     *
     * @param  int              $id
     * @param UpdateCultivoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCultivoRequest $request)
    {
        /** @var Cultivo $cultivo */
        $cultivo = Cultivo::find($id);

        if (empty($cultivo)) {
            Flash::error('Cultivo no encontrado');

            return redirect(route('cultivos.index'));
        }

        $cultivo->fill($request->all());
        $cultivo->save();

        Flash::success('Cultivo actualizado con éxito.');

        return redirect(route('cultivos.index'));
    }

    /**
     * Remove the specified Cultivo from storage.
     *
     * @param  int $id
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
            Flash::error('Cultivo no encontrado');

            return redirect(route('cultivos.index'));
        }

        $cultivo->delete();

        Flash::success('Cultivo deleted successfully.');

        return redirect(route('cultivos.index'));
    }
}
