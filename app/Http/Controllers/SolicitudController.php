<?php

namespace App\Http\Controllers;

use App\DataTables\SolicitudDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SolicitudController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver solicitudes')->only(['show']);
        $this->middleware('permission:Crear solicitudes')->only(['create','store']);
        $this->middleware('permission:Editar solicitudes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar solicitudes')->only(['destroy']);
    }

    /**
     * Display a listing of the Solicitud.
     *
     * @param SolicitudDataTable $solicitudDataTable
     * @return Response
     */
    public function index(SolicitudDataTable $solicitudDataTable)
    {
        return $solicitudDataTable->render('solicitudes.index');
    }

    /**
     * Show the form for creating a new Solicitud.
     *
     * @return Response
     */
    public function create()
    {
        $solicitud = $this->getSolicitudTemporal();

        return redirect(route('solicitudes.edit',$solicitud->id));

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

        return redirect(route('solicitudes.index'));
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

            return redirect(route('solicitudes.index'));
        }

        return view('solicitudes.show')->with('solicitud', $solicitud);
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

            return redirect(route('solicitudes.index'));
        }

        return view('solicitudes.edit')->with('solicitud', $solicitud);
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

            return redirect(route('solicitudes.index'));
        }

        $solicitud->fill($request->all());
        $solicitud->save();

        Flash::success('Solicitud actualizado con éxito.');

        return redirect(route('solicitudes.index'));
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

            return redirect(route('solicitudes.index'));
        }

        $solicitud->delete();

        Flash::success('Solicitud deleted successfully.');

        return redirect(route('solicitudes.index'));
    }

    public function getSolicitudTemporal()
    {
        $sol = Solicitud::where('user_crea',auth()->user()->id)->where('estado_id',SolicitudEstado::TEMPORAL)->first();

        if (!$sol){
            $sol = Solicitud::create([
                'user_crea' => auth()->user()->id,
                'estado_id' => SolicitudEstado::TEMPORAL,
            ]);
        }

        return $sol;
    }
}
