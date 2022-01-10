{{$solicitud->id}}


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

