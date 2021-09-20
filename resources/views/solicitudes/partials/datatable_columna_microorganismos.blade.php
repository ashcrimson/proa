<!-- Button trigger modal -->
<a href="#"  data-toggle="modal" data-target="#modalMicroorganismos{{$solicitud->id}}">
    Microorganismo
</a>

<!-- Modal -->
<div class="modal fade" id="modalMicroorganismos{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">
                    Microorganismo
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @include('solicitudes.partials.show_table_microorganismos',['detalles' => $solicitud->microorganismos])

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
