<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/estilo_receta.css')}}">

</head>
<body>
    
    </div>
   
    <div class="izquierda">
        <p><b>ARMADA DE CHILE</b><br>
            HOSPITAL NAVAL "ALMIRANTE NEF" FARMARCIA
        </p>
    </div>
    <div class="derecha">
        <p>ID: {{$solicitud->id}}</p>
    </div>
    <div class="centro">
        <h3>RECETA PACIENTE HOSPITALIZADO</h3>
    </div>
    <div >
       
            <h3 class="card-title">Datos Paciente</h3>
            <p><b>COD. SERVICIO ORIGEN: </b></p> 
            <p><b>R.U.N PACIENTE: </b>{{$solicitud->paciente->rut_completo}}</p>
            <p><b>NOMBRE PACIENTE: </b>{{$solicitud->paciente->nombre_completo}}</p>
            
    </div>
    <div >
        <table>
            
            <tr>
                <td>PISO:</td>
                <td>SALA:</td>
                <td>CAMA:</td>
            </tr>
        </table>
    </div>
    <div  style="margin-top: 20px;">
        <h3>FÁRMACOS</h3>
        @include('solicitudes.partials.show_table_medicamentos',['detalles' => $solicitud->medicamentos])
        
    </div>
    <div class="izquierda-tres">
        <p><b>FIRMA MÉDICO</b><br>
            
        </p>
    </div>
    <div class="derecha-tres">
        <p><b>CÓDIGO MÉDICO: </b></p>
       
    </div>

    <div class="derecha-cuatro">
        <p>Fecha Solicitud: {{$solicitud->fecha_solicita}}</p>
       
    </div>
    <div class="centro-dos" >
        <table style="width: 85%; border: none; text-align: center; margin-top: 20%;">
            <td style="border: none">HORA DE RECEPCIÓN EN SALA</td>
            <td style="border: none">RECIBO CONFORME</td>
            <td style="border: none">N.P.I/R.U.N</td>
        </table>
    </div>




</body>
</html>
