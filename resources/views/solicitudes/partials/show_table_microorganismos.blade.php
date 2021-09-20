<table class="table table-bordered table-sm mb-0">
    <thead>
        <tr>
            <td>Microorganismo</td>
            <td>Susceptibilidad</td>
        </tr>
    </thead>
    <tbody>
    @foreach($detalles as $det)
        <tr>
            <td>{{$det->microorganismo->nombre}}</td>
            <td>{{$det->susceptibilidad}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
