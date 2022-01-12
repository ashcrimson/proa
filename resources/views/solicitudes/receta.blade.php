<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/estilo_receta.css')}}">

</head>
<body>
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
	<div class="centro-dos">
		<span class="izquierda-dos">
            COD. SERVICIO ORIGEN <input type="text"></span><span>
            R.U.N PACIENTE: {{$solicitud->paciente->rut_completo}}
            <hr style="width:10%;position: relative; left: 30%; bottom:50%;">
        </span>
	</div>
	<div class="centro">
		<table>
			<tr>
				<th>PATERNO</th>
				<th>MATERNO</th>
				<th>NOMBRE</th>
			</tr>
			<tr>
				<td>{{$solicitud->paciente->apellido_paterno}}</td>
				<td>{{$solicitud->paciente->apellido_materno}}</td>
				<td>{{$solicitud->paciente->primer_nombre}} {{$solicitud->paciente->segundo_nombre}} </td>
			</tr>
			<tr>
				<td>PISO:</td>
				<td>SALA:</td>
				<td>CAMA:</td>
			</tr>
		</table>
	</div>
	<div class="centro" style="margin-top: 20px;">
		<table>
			<tr>
				<th>CÓDIGO</th>
				<th>CANTIDAD</th>
				<th>FORMA FARMACÉUTICA</th>
				<th>FÁRMACO</th>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
			<tr>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
				<td><span style="visibility: hidden;">PISO</span></td>
			</tr>
		</table>
	</div>
	<div class="izquierda-tres">
		<p><b>FIRMA MÉDICO</b><br>
			 <hr style="width:20%;position: relative; left: 30%; bottom:60%;">
		</p>
	</div>
	<div class="derecha-tres">
		<p>CÓDIGO MÉDICO: </p>
		<table class="table-dos">
			<tr>
				<td style="padding: 1%"><span style="visibility: hidden;">P</span></td>
				<td style="padding: 1%"><span style="visibility: hidden;">P</span></td>
				<td style="padding: 1%"><span style="visibility: hidden;">P</span></td>
			</tr>

		</table>
	</div>

	<div class="derecha-cuatro">
		<p>Fecha: </p>
		<table class="table-dos">
			<tr>
				<td style="padding: 1%"><span >Día</span></td>
				<td style="padding: 1%"><span >Mes</span></td>
				<td style="padding: 1%"><span >Año</span></td>
			</tr>

		</table>
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
