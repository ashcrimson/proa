<?php

namespace App\Http\Controllers;

use App\DataTables\MicroorganismoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMicroorganismoRequest;
use App\Http\Requests\UpdateMicroorganismoRequest;
use App\Models\Microorganismo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MicroorganismoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Microorganismos')->only(['show']);
        $this->middleware('permission:Crear Microorganismos')->only(['create','store']);
        $this->middleware('permission:Editar Microorganismos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Microorganismos')->only(['destroy']);
    }

    /**
     * Display a listing of the Microorganismo.
     *
     * @param MicroorganismoDataTable $microorganismoDataTable
     * @return Response
     */
    public function index(MicroorganismoDataTable $microorganismoDataTable)
    {
        return $microorganismoDataTable->render('microorganismos.index');
    }

    /**
     * Show the form for creating a new Microorganismo.
     *
     * @return Response
     */
    public function create()
    {
        return view('microorganismos.create');
    }

    /**
     * Store a newly created Microorganismo in storage.
     *
     * @param CreateMicroorganismoRequest $request
     *
     * @return Response
     */
    public function store(CreateMicroorganismoRequest $request)
    {
        $input = $request->all();

        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::create($input);

        Flash::success('Microorganismo guardado exitosamente.');

        return redirect(route('microorganismos.index'));
    }

    /**
     * Display the specified Microorganismo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            Flash::error('Microorganismo no encontrado');

            return redirect(route('microorganismos.index'));
        }

        return view('microorganismos.show')->with('microorganismo', $microorganismo);
    }

    /**
     * Show the form for editing the specified Microorganismo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            Flash::error('Microorganismo no encontrado');

            return redirect(route('microorganismos.index'));
        }

        return view('microorganismos.edit')->with('microorganismo', $microorganismo);
    }

    /**
     * Update the specified Microorganismo in storage.
     *
     * @param  int              $id
     * @param UpdateMicroorganismoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMicroorganismoRequest $request)
    {
        /** @var Microorganismo $microorganismo */
        $microorganismo = Microorganismo::find($id);

        if (empty($microorganismo)) {
            Flash::error('Microorganismo no encontrado');

            return redirect(route('microorganismos.index'));
        }

        $microorganismo->fill($request->all());
        $microorganismo->save();

        Flash::success('Microorganismo actualizado con éxito.');

        return redirect(route('microorganismos.index'));
    }

    /**
     * Remove the specified Microorganismo from storage.
     *
     * @param  int $id
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
            Flash::error('Microorganismo no encontrado');

            return redirect(route('microorganismos.index'));
        }

        $microorganismo->delete();

        Flash::success('Microorganismo deleted successfully.');

        return redirect(route('microorganismos.index'));
    }
}
