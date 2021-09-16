<?php

namespace App\Http\Controllers;

use App\DataTables\PacienteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PacienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Pacientes')->only(['show']);
        $this->middleware('permission:Crear Pacientes')->only(['create','store']);
        $this->middleware('permission:Editar Pacientes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Pacientes')->only(['destroy']);
    }

    /**
     * Display a listing of the Paciente.
     *
     * @param PacienteDataTable $pacienteDataTable
     * @return Response
     */
    public function index(PacienteDataTable $pacienteDataTable)
    {
        return $pacienteDataTable->render('pacientes.index');
    }

    /**
     * Show the form for creating a new Paciente.
     *
     * @return Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created Paciente in storage.
     *
     * @param CreatePacienteRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteRequest $request)
    {
        $input = $request->all();

        /** @var Paciente $paciente */
        $paciente = Paciente::create($input);

        Flash::success('Paciente guardado exitosamente.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Display the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente no encontrado');

            return redirect(route('pacientes.index'));
        }

        return view('pacientes.show')->with('paciente', $paciente);
    }

    /**
     * Show the form for editing the specified Paciente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente no encontrado');

            return redirect(route('pacientes.index'));
        }

        return view('pacientes.edit')->with('paciente', $paciente);
    }

    /**
     * Update the specified Paciente in storage.
     *
     * @param  int              $id
     * @param UpdatePacienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteRequest $request)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente no encontrado');

            return redirect(route('pacientes.index'));
        }

        $paciente->fill($request->all());
        $paciente->save();

        Flash::success('Paciente actualizado con éxito.');

        return redirect(route('pacientes.index'));
    }

    /**
     * Remove the specified Paciente from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Paciente $paciente */
        $paciente = Paciente::find($id);

        if (empty($paciente)) {
            Flash::error('Paciente no encontrado');

            return redirect(route('pacientes.index'));
        }

        $paciente->delete();

        Flash::success('Paciente deleted successfully.');

        return redirect(route('pacientes.index'));
    }
}
