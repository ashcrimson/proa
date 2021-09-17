@can('Ver solicitudes')
    <a href="{{ route('solicitudes.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
@endcan

@can('Editar solicitudes')
    <a href="{{ route('solicitudes.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('Eliminar solicitudes')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="{{ route('solicitudes.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
        @method('DELETE')
        @csrf
    </form>
@endcan
