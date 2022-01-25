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
        <p>ARMADA DE CHILE<br>
            HOSPITAL NAVAL "ALMIRANTE NEF" FARMACIA
        </p>
    </div>
    <div class="derecha">
        <p>N°: {{$solicitud->id}}</p>
        <p>Fecha Solicitud: {{$solicitud->fecha_solicita}}</p>
    </div>
    <div class="centro">
        <h3>RECETA PACIENTE HOSPITALIZADO</h3>
    </div>
    <div >
       
            <h3 class="card-title">Datos Paciente</h3>
            <p><b>COD. SERVICIO ORIGEN: </b>{{$solicitud->codserv}}</p> 
            <p><b>R.U.N PACIENTE: </b>{{$solicitud->paciente->rut_completo}}</p>
            <p><b>NOMBRE PACIENTE: </b>{{$solicitud->paciente->nombre_completo}}</p>
            
    </div>
    <div >
        <table>
            
            <tr>
                <td><b>PISO:</b>{{$solicitud->nropiso}}</td>
                <td><b>SALA:</b>{{$solicitud->nropieza}}</td>
                <td><b>CAMA:</b>{{$solicitud->nrocama}}</td>
            </tr>
        </table>
    </div>
    <div  style="margin-top: 20px;">
        <h3 class="card-title">Fármacos</h3>
        @include('solicitudes.partials.show_table_medicamentos',['detalles' => $solicitud->medicamentos])
        
    </div>
    <div class="izquierda-tres">
        <hr>
        <p><b>FIRMA MÉDICO</b><br>
            
        </p>
    </div>
    <div class="derecha-tres"> 
        
       
    </div>

    <div class="derecha-cuatro">
       <hr>
       <p><b>CÓDIGO MÉDICO: </b></p>
    </div>
    <div class="centro-dos" >
        <table style="width: 85%; border: none; text-align: center; margin-top: 30%;">
            <tr>
                <td style="border: none"><hr></td>
                <td style="border: none"><hr></td>
                <td style="border: none"><hr></td>
            </tr>
            <tr>
                <td style="border: none; text-align: center;">HORA DE RECEPCIÓN EN SALA</td>
                <td style="border: none; text-align: center;">RECIBO CONFORME</td>
                <td style="border: none; text-align: center;">N.P.I/R.U.N</td>
            </tr>
        </table>
    </div>




</body>
</html>
