<?php

namespace App\Http\Controllers;

use App\DataTables\MedicamentoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMedicamentoRequest;
use App\Http\Requests\UpdateMedicamentoRequest;
use App\Models\Medicamento;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MedicamentoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Medicamentos')->only(['show']);
        $this->middleware('permission:Crear Medicamentos')->only(['create','store']);
        $this->middleware('permission:Editar Medicamentos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Medicamentos')->only(['destroy']);
    }

    /**
     * Display a listing of the Medicamento.
     *
     * @param MedicamentoDataTable $medicamentoDataTable
     * @return Response
     */
    public function index(MedicamentoDataTable $medicamentoDataTable)
    {
        return $medicamentoDataTable->render('medicamentos.index');
    }

    /**
     * Show the form for creating a new Medicamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created Medicamento in storage.
     *
     * @param CreateMedicamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicamentoRequest $request)
    {
        $input = $request->all();

        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::create($input);

        Flash::success('Medicamento guardado exitosamente.');

        return redirect(route('medicamentos.index'));
    }

    /**
     * Display the specified Medicamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            Flash::error('Medicamento no encontrado');

            return redirect(route('medicamentos.index'));
        }

        return view('medicamentos.show')->with('medicamento', $medicamento);
    }

    /**
     * Show the form for editing the specified Medicamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            Flash::error('Medicamento no encontrado');

            return redirect(route('medicamentos.index'));
        }

        return view('medicamentos.edit')->with('medicamento', $medicamento);
    }

    /**
     * Update the specified Medicamento in storage.
     *
     * @param  int              $id
     * @param UpdateMedicamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicamentoRequest $request)
    {
        /** @var Medicamento $medicamento */
        $medicamento = Medicamento::find($id);

        if (empty($medicamento)) {
            Flash::error('Medicamento no encontrado');

            return redirect(route('medicamentos.index'));
        }

        $medicamento->fill($request->all());
        $medicamento->save();

        Flash::success('Medicamento actualizado con éxito.');

        return redirect(route('medicamentos.index'));
    }

    /**
     * Remove the specified Medicamento from storage.
     *
     * @param  int $id
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
            Flash::error('Medicamento no encontrado');

            return redirect(route('medicamentos.index'));
        }

        $medicamento->delete();

        Flash::success('Medicamento deleted successfully.');

        return redirect(route('medicamentos.index'));
    }
}
