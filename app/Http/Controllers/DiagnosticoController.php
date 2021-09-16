<?php

namespace App\Http\Controllers;

use App\DataTables\DiagnosticoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDiagnosticoRequest;
use App\Http\Requests\UpdateDiagnosticoRequest;
use App\Models\Diagnostico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DiagnosticoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Diagnosticos')->only(['show']);
        $this->middleware('permission:Crear Diagnosticos')->only(['create','store']);
        $this->middleware('permission:Editar Diagnosticos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Diagnosticos')->only(['destroy']);
    }

    /**
     * Display a listing of the Diagnostico.
     *
     * @param DiagnosticoDataTable $diagnosticoDataTable
     * @return Response
     */
    public function index(DiagnosticoDataTable $diagnosticoDataTable)
    {
        return $diagnosticoDataTable->render('diagnosticos.index');
    }

    /**
     * Show the form for creating a new Diagnostico.
     *
     * @return Response
     */
    public function create()
    {
        return view('diagnosticos.create');
    }

    /**
     * Store a newly created Diagnostico in storage.
     *
     * @param CreateDiagnosticoRequest $request
     *
     * @return Response
     */
    public function store(CreateDiagnosticoRequest $request)
    {
        $input = $request->all();

        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::create($input);

        Flash::success('Diagnostico guardado exitosamente.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Display the specified Diagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.show')->with('diagnostico', $diagnostico);
    }

    /**
     * Show the form for editing the specified Diagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.edit')->with('diagnostico', $diagnostico);
    }

    /**
     * Update the specified Diagnostico in storage.
     *
     * @param  int              $id
     * @param UpdateDiagnosticoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiagnosticoRequest $request)
    {
        /** @var Diagnostico $diagnostico */
        $diagnostico = Diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        $diagnostico->fill($request->all());
        $diagnostico->save();

        Flash::success('Diagnostico actualizado con éxito.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Remove the specified Diagnostico from storage.
     *
     * @param  int $id
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
            Flash::error('Diagnostico no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        $diagnostico->delete();

        Flash::success('Diagnostico deleted successfully.');

        return redirect(route('diagnosticos.index'));
    }
}
