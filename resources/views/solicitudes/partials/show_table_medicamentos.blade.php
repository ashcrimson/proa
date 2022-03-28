<table class="table table-bordered table-sm  mb-0">
    <thead>
        <tr>
            <td>Antimicrobiano</td>
            <td>Dosis</td>
            <td>Frecuencia cada</td>
            <td>Periodo</td>
        </tr>
    </thead>
    <tbody>
    @forelse($detalles as $det)
        <tr>
            <td>{{$det->medicamento->nombre}}</td>
            <td>{{$det->dosis_valor}}/{{$det->dosis_unidad}}</td>
            <td>{{$det->frecuencia_valor}} horas</td>
            <td>{{$det->periodo}}</td>
        </tr>


    @empty
        <tr class="text-center">
            <td colspan="20">Ningun registro agregado</td>
        </tr>
    @endforelse
    </tbody>
</table>

@foreach($detalles as $det)
    <h2>{{$det->medicamento->nombre}}</h2>
    <table class="table table-bordered table-sm  mb-0">
        <thead>
        <tr>
            <td width="60px;">Día TTO</td>
            <td width="20px;">Fecha</td>
            <td width="20px;">Dosis</td>
            <td >Observaciones</td>
            <td>Firma</td>
        </tr>
        </thead>
        <tbody>
        @for($i=0 ; $i<$det->periodo ; $i++)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$solicitud->fecha_inicio_tratamiento->addDays($i)->format('d/m/Y')}}</td>
                <td>{{24/$det->frecuencia_valor}}</td>
                <td height="60px;"></td>
                <td></td>
            </tr>
        @endfor
        <!-- <tr>
            <td>Total</td>
            <td></td>
            <td>{{$det->total_dosis }}</td>
            <td></td>
            <td></td>
        </tr> -->
        </tbody>
    </table>
@endforeach
