<style>
    .fa-2x {
        font-size: 1.2em;
        margin-top: 10px;
    }
</style>
<!--            validar sí en el estado que esta puede despachar
------------------------------------------------------------------------>
@if($solicitud->puedeDespachar())
    @can('Despachar Solicitudes')

    <span data-toggle="tooltip" title="Despachar">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDespachar{{$solicitud->id}}" >
            <i class="fa fa-boxes"></i>
        </button>
    </span>
        <!-- <a href="{{ route('solicitudes.despachar', $solicitud->id) }}" data-toggle="tooltip" title="Despachar" class='btn btn-success btn-sm'>
            <i class="fa fa-boxes"></i>
        </a> -->
        <div class="modal fade" id="modalDespachar{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
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


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endif

@can('Cerrar Solicitud')

        <a href="{!! route('solicitudes.cerrar',$solicitud->id) !!}" data-toggle="tooltip" title="Cerrar Solicitud" class="btn btn-outline-danger btn-sm">
            <i class="fa fa-ban"></i> 
        </a>
@endcan

<!--            validar sí en el estado que esta puede aprobar
------------------------------------------------------------------------>
@if($solicitud->puedeAprobar())
    @can('Aprobar Solicitudes')
        <a href="{{ route('solicitudes.aprobar', $solicitud->id) }}" data-toggle="tooltip" title="Aprobar" class='btn btn-success btn-sm'>
            <i class="fa fa-check"></i>
        </a>
    @endcan
@endif

@if($solicitud->puedeAprobar())
        @can('Rechazar Solicitudes')
            <form action="{{ route('solicitudes.rechazar.store', $solicitud->id) }}"  method="post" style="display: inline">
                @csrf

                <button type="submit"  class='btn btn-danger btn-sm' data-toggle="tooltip" title="Rechazar">
                    <i class="fa fa-ban"></i>
                </button>&nbsp;
            </form>
        @endcan
    @endif

@can('Ver Solicitudes')
    <a href="{{ route('solicitudes.show', $solicitud->id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
@endcan

<!--            validar sí en el estado que esta puede editar
------------------------------------------------------------------------>
@if($solicitud->puedeEditar())
    <!--            validar que tenga el permiso de editar
    ------------------------------------------------------------------------>
    @can('Editar Solicitudes')
        <a href="{{ route('solicitudes.edit', $solicitud->id) }}" data-toggle="tooltip" title="Editar" class='btn btn-info btn-sm'>
            <i class="fa fa-edit"></i>
        </a>
    @endcan
@endif

<!--            validar sí en el estado que esta puede eliminar
------------------------------------------------------------------------>
@if($solicitud->puedeEliminar())
    <!--            validar que tenga el permiso de eliminar
    ------------------------------------------------------------------------>
    @can('Eliminar Solicitudes')
        <a href="#" onclick="deleteItemDt(this)" data-id="{{$solicitud->id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-danger btn-sm'>
            <i class="fa fa-trash-alt"></i>
        </a>


        <form action="{{ route('solicitudes.destroy', $solicitud->id)}}" method="POST" id="delete-form{{$solicitud->id}}">
            @method('DELETE')
            @csrf
        </form>
    @endcan
@endif

<!--            validar sí en el estado que esta puede clonar
------------------------------------------------------------------------>
@if($solicitud->puedeClonar())
    <!--            validar que tenga el permiso de clonar
    ------------------------------------------------------------------------>
    @can('Editar Solicitud Rechazada')

        <!-- Button trigger modal -->
        <span data-toggle="tooltip" title="Editar para regresar">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modelId">
            <i class="fa fa-edit"></i>
        </button>
        </span>



    @endcan
@endif

@hasanyrole('Médico|Infectólogo')
    <a href="{!! route('solicitudes.imprime.receta',$solicitud->id) !!}" class="btn btn-info btn-sm" target="_blank" >
        <i class="fa fa-print "></i>
    </a>
@endhasanyrole

