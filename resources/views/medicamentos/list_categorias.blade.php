@forelse($medicamento->categorias as $cat)
    <span class="badge badge-info">{{$cat->nombre}}</span>
@empty
    Sin Categoría
@endforelse
