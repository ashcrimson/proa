<!--            validar sí en el estado que esta puede despachar
------------------------------------------------------------------------>
@if($solicitud->puedeDespachar())
    @can('Despachar Solicitudes')
        <a href="{{ route('solicitudes.show', $id) }}" data-toggle="tooltip" title="Despachar" class='btn btn-outline-info btn-sm'>
            <i class="fa fa-tasks"></i>
        </a>
    @endcan
@endif

<!--            validar sí en el estado que esta puede aprobar
------------------------------------------------------------------------>
@if($solicitud->puedeAprobar())
    @can('Aprobar Solicitudes')
        <a href="{{ route('solicitudes.show', $id) }}" data-toggle="tooltip" title="Aprobar" class='btn btn-outline-success btn-sm'>
            <i class="fa fa-check"></i>
        </a>
    @endcan
@endif

@can('Ver Solicitudes')
    <a href="{{ route('solicitudes.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
@endcan

<!--            validar sí en el estado que esta puede editar
------------------------------------------------------------------------>
@if($solicitud->puedeEditar())
    <!--            validar que tenga el permiso de editar
    ------------------------------------------------------------------------>
    @can('Editar Solicitudes')
        <a href="{{ route('solicitudes.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
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
        <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
            <i class="fa fa-trash-alt"></i>
        </a>


        <form action="{{ route('solicitudes.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
            @method('DELETE')
            @csrf
        </form>
    @endcan
@endif

