<table class="table table-striped table-bordered table-sm table-hover">
    <thead>
        <tr>
            <td>MEDICAMENTO</td>
            <td>susceptibilidad</td>
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
