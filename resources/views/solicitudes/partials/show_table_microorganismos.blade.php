<table class="table table-bordered table-sm mb-0">
    <thead>
        <tr>
            <td>Microorganismo</td>
            <td>Susceptibilidad</td>
        </tr>
    </thead>
    <tbody>
    @forelse($detalles as $det)
        <tr>
            <td>{{$det->microorganismo->nombre}}</td>
            <td>{{$det->susceptibilidad}}</td>
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="20">Ningun registro agregado</td>
        </tr>
    @endforelse
    </tbody>
</table>
