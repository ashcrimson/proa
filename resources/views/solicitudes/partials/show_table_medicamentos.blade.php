<table class="table table-bordered table-sm  mb-0">
    <thead>
        <tr>
            <td>Antimicrobiano</td>
            <td>Dosis</td>
            <td>Frecuencia</td>
            <td>Periodo</td>
        </tr>
    </thead>
    <tbody>
    @forelse($detalles as $det)
        <tr>
            <td>{{$det->medicamento->nombre}}</td>
            <td>{{$det->dosis_valor}}/{{$det->dosis_unidad}}</td>
            <td>{{$det->frecuencia_valor}}/{{$det->frecuencia_unidad}}</td>
            <td>{{$det->periodo}}</td>
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="20">Ningun registro agregado</td>
        </tr>
    @endforelse
    </tbody>
</table>
