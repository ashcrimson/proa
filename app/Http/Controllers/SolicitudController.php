<?php

namespace App\Http\Controllers;

use App\DataTables\SolicitudDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\Solicitud;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SolicitudController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Solicituds')->only(['show']);
        $this->middleware('permission:Crear Solicituds')->only(['create','store']);
        $this->middleware('permission:Editar Solicituds')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Solicituds')->only(['destroy']);
    }

    /**
     * Display a listing of the Solicitud.
     *
     * @param SolicitudDataTable $solicitudDataTable
     * @return Response
     */
    public function index(SolicitudDataTable $solicitudDataTable)
    {
        return $solicitudDataTable->render('solicituds.index');
    }

    /**
     * Show the form for creating a new Solicitud.
     *
     * @return Response
     */
    public function create()
    {
        return view('solicituds.create');
    }

    /**
     * Store a newly created Solicitud in storage.
     *
     * @param CreateSolicitudRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudRequest $request)
    {
        $input = $request->all();

        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::create($input);

        Flash::success('Solicitud guardado exitosamente.');

        return redirect(route('solicituds.index'));
    }

    /**
     * Display the specified Solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrado');

            return redirect(route('solicituds.index'));
        }

        return view('solicituds.show')->with('solicitud', $solicitud);
    }

    /**
     * Show the form for editing the specified Solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrado');

            return redirect(route('solicituds.index'));
        }

        return view('solicituds.edit')->with('solicitud', $solicitud);
    }

    /**
     * Update the specified Solicitud in storage.
     *
     * @param  int              $id
     * @param UpdateSolicitudRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudRequest $request)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrado');

            return redirect(route('solicituds.index'));
        }

        $solicitud->fill($request->all());
        $solicitud->save();

        Flash::success('Solicitud actualizado con éxito.');

        return redirect(route('solicituds.index'));
    }

    /**
     * Remove the specified Solicitud from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Solicitud $solicitud */
        $solicitud = Solicitud::find($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrado');

            return redirect(route('solicituds.index'));
        }

        $solicitud->delete();

        Flash::success('Solicitud deleted successfully.');

        return redirect(route('solicituds.index'));
    }
}
