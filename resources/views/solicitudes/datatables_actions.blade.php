<!--            validar sí en el estado que esta puede despachar
------------------------------------------------------------------------>
@if($solicitud->puedeDespachar())
    @can('Despachar Solicitudes')
        <a href="{{ route('solicitudes.show', $solicitud->id) }}" data-toggle="tooltip" title="Despachar" class='btn btn-success btn-sm'>
            <i class="fa fa-boxes"></i>
        </a>
    @endcan
@endif

<!--            validar sí en el estado que esta puede aprobar
------------------------------------------------------------------------>
@if($solicitud->puedeAprobar())
    @can('Aprobar Solicitudes')
        <a href="{{ route('solicitudes.show', $solicitud->id) }}" data-toggle="tooltip" title="Aprobar" class='btn btn-success btn-sm'>
            <i class="fa fa-check"></i>
        </a>
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

