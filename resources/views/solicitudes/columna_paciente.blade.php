{{$solicitud->paciente->nombre_completo ?? ''}}


<!--            validar sí en el estado que esta puede clonar
------------------------------------------------------------------------>
@if($solicitud->puedeClonar())
    <!--            validar que tenga el permiso de clonar
    ------------------------------------------------------------------------>
    @can('Editar Solicitud Rechazada')

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">
                            Confirmar
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('solicitudes.clonar', $solicitud->id)}}" method="POST" id="delete-form{{$solicitud->id}}">
                        @csrf

                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>
                                    Este proceso creará una nueva solicitud con los mismos datos para poder regresar.
                                </p>
                                <p>
                                    Desea continuar?
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Sí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endcan
@endif

<!--            validar sí en el estado que esta puede despachar
------------------------------------------------------------------------>
@if($solicitud->puedeDespachar())
    @can('Despachar Solicitudes')

        <div class="modal fade" id="modalDespachar{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">
                            Despachar
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('solicitudes.despachar.store', $solicitud->id) }}" class="mr-3" method="post" style="display: inline">
                        @csrf

                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>
                                    Elija cuántas dosis quiere despachar.
                                    {{$solicitud->medicamentosDespachados()}}
                                </p>
                                <table class="table table-bordered table-sm  mb-0">
                                    <thead>
                                    <tr>
                                        <td>Antimicrobiano</td>
                                        <td>Dosis</td>
                                        <td>Frecuencia</td>
                                        <td>Periodo</td>
                                        <td>Despachos</td>
                                        <td>Despachar</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($solicitud->medicamentos as $det)
                                        <tr>
                                            <td>{{$det->medicamento->nombre}}</td>
                                            <td>{{$det->dosis_valor}}/{{$det->dosis_unidad}}</td>
                                            <td>{{$det->frecuencia_valor}}/hora</td>
                                            <td>{{$det->periodo}}</td>
                                            <td>{{$det->despachos}}</td>
                                            <td>
                                                <select name="despachos[{{$det->id}}]" id="">
                                                    @for($i=0;$i<=$det->pendientes_despachar;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="20">Ningun registro agregado</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="modal-footer">



                            <button type="submit" class="btn btn-primary">Confirmar</button>

                            @can('Cerrar Solicitud')

                                <a href="{!! route('solicitudes.cerrar',$solicitud->id) !!}" class="btn btn-outline-danger ml-3">
                                    <i class="fa fa-ban"></i> Cerrar Solicitud
                                </a>
                            @endcan

                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endcan
@endif

