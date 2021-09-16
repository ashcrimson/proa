<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Indicaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indicaciones', 'Indicaciones:') !!}
    {!! Form::text('indicaciones', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Contraindicaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contraindicaciones', 'Contraindicaciones:') !!}
    {!! Form::text('contraindicaciones', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Advertencias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('advertencias', 'Advertencias:') !!}
    {!! Form::text('advertencias', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Dosis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! Form::text('dosis', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Via Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('via_admin', 'Via Admin:') !!}
    {!! Form::number('via_admin', null, ['class' => 'form-control']) !!}
</div>

<!-- Laboratorio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratorio_id', 'Laboratorio Id:') !!}
    {!! Form::number('laboratorio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Forma Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma_id', 'Forma Id:') !!}
    {!! Form::number('forma_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Receta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receta', 'Receta:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('receta', 0) !!}
        {!! Form::checkbox('receta', '1', null) !!}
    </label>
</div>


<!-- Cantidad Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_total', 'Cantidad Total:') !!}
    {!! Form::number('cantidad_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Formula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_formula', 'Cantidad Formula:') !!}
    {!! Form::number('cantidad_formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Generico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generico', 'Generico:') !!}
    {!! Form::text('generico', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>
