<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Correlativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correlativo', 'Correlativo:') !!}
    {!! Form::number('correlativo', null, ['class' => 'form-control']) !!}
</div>

<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    {!! Form::number('paciente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inicio', 'Inicio:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('inicio', 0) !!}
        {!! Form::checkbox('inicio', '1', null) !!}
    </label>
</div>


<!-- Continuacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('continuacion', 'Continuacion:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('continuacion', 0) !!}
        {!! Form::checkbox('continuacion', '1', null) !!}
    </label>
</div>


<!-- Terapia Empirica Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('terapia_empirica', 'Terapia Empirica:') !!}
    {!! Form::textarea('terapia_empirica', null, ['class' => 'form-control']) !!}
</div>

<!-- Terapia Especifica Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('terapia_especifica', 'Terapia Especifica:') !!}
    {!! Form::textarea('terapia_especifica', null, ['class' => 'form-control']) !!}
</div>

<!-- Fuente Infeccion Extrahospitalaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fuente_infeccion_extrahospitalaria', 'Fuente Infeccion Extrahospitalaria:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('fuente_infeccion_extrahospitalaria', 0) !!}
        {!! Form::checkbox('fuente_infeccion_extrahospitalaria', '1', null) !!}
    </label>
</div>


<!-- Fuente Infeccion Intrahospitalaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fuente_infeccion_intrahospitalaria', 'Fuente Infeccion Intrahospitalaria:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('fuente_infeccion_intrahospitalaria', 0) !!}
        {!! Form::checkbox('fuente_infeccion_intrahospitalaria', '1', null) !!}
    </label>
</div>


<!-- Disfuncion Renal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disfuncion_renal', 'Disfuncion Renal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('disfuncion_renal', 0) !!}
        {!! Form::checkbox('disfuncion_renal', '1', null) !!}
    </label>
</div>


<!-- Disfuncion Hepatica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disfuncion_hepatica', 'Disfuncion Hepatica:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('disfuncion_hepatica', 0) !!}
        {!! Form::checkbox('disfuncion_hepatica', '1', null) !!}
    </label>
</div>


<!-- Creatinina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creatinina', 'Creatinina:') !!}
    {!! Form::number('creatinina', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::number('peso', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- User Crea Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_crea', 'User Crea:') !!}
    {!! Form::number('user_crea', null, ['class' => 'form-control']) !!}
</div>

<!-- User Actualiza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_actualiza', 'User Actualiza:') !!}
    {!! Form::number('user_actualiza', null, ['class' => 'form-control']) !!}
</div>
