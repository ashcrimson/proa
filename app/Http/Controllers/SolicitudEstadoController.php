<?php

namespace App\Http\Controllers;

use App\DataTables\SolicitudEstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudEstadoRequest;
use App\Http\Requests\UpdateSolicitudEstadoRequest;
use App\Models\SolicitudEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SolicitudEstadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Solicitud Estados')->only(['show']);
        $this->middleware('permission:Crear Solicitud Estados')->only(['create','store']);
        $this->middleware('permission:Editar Solicitud Estados')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Solicitud Estados')->only(['destroy']);
    }

    /**
     * Display a listing of the SolicitudEstado.
     *
     * @param SolicitudEstadoDataTable $solicitudEstadoDataTable
     * @return Response
     */
    public function index(SolicitudEstadoDataTable $solicitudEstadoDataTable)
    {
        return $solicitudEstadoDataTable->render('solicitud_estados.index');
    }

    /**
     * Show the form for creating a new SolicitudEstado.
     *
     * @return Response
     */
    public function create()
    {
        return view('solicitud_estados.create');
    }

    /**
     * Store a newly created SolicitudEstado in storage.
     *
     * @param CreateSolicitudEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreateSolicitudEstadoRequest $request)
    {
        $input = $request->all();

        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::create($input);

        Flash::success('Solicitud Estado guardado exitosamente.');

        return redirect(route('solicitudEstados.index'));
    }

    /**
     * Display the specified SolicitudEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            Flash::error('Solicitud Estado no encontrado');

            return redirect(route('solicitudEstados.index'));
        }

        return view('solicitud_estados.show')->with('solicitudEstado', $solicitudEstado);
    }

    /**
     * Show the form for editing the specified SolicitudEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            Flash::error('Solicitud Estado no encontrado');

            return redirect(route('solicitudEstados.index'));
        }

        return view('solicitud_estados.edit')->with('solicitudEstado', $solicitudEstado);
    }

    /**
     * Update the specified SolicitudEstado in storage.
     *
     * @param  int              $id
     * @param UpdateSolicitudEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolicitudEstadoRequest $request)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            Flash::error('Solicitud Estado no encontrado');

            return redirect(route('solicitudEstados.index'));
        }

        $solicitudEstado->fill($request->all());
        $solicitudEstado->save();

        Flash::success('Solicitud Estado actualizado con éxito.');

        return redirect(route('solicitudEstados.index'));
    }

    /**
     * Remove the specified SolicitudEstado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SolicitudEstado $solicitudEstado */
        $solicitudEstado = SolicitudEstado::find($id);

        if (empty($solicitudEstado)) {
            Flash::error('Solicitud Estado no encontrado');

            return redirect(route('solicitudEstados.index'));
        }

        $solicitudEstado->delete();

        Flash::success('Solicitud Estado deleted successfully.');

        return redirect(route('solicitudEstados.index'));
    }
}
