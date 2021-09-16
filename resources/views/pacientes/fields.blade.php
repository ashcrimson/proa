<!-- Run Field -->
<div class="form-group col-sm-6">
    {!! Form::label('run', 'Run:') !!}
    {!! Form::text('run', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dv Run Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dv_run', 'Dv Run:') !!}
    {!! Form::text('dv_run', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellido Paterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellido Materno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Primer Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
    {!! Form::text('primer_nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Segundo Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
    {!! Form::text('segundo_nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Fecha Nac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
    {!! Form::date('fecha_nac', null, ['class' => 'form-control','id'=>'fecha_nac']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_nac').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::text('sexo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sigla Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sigla_grado', 'Sigla Grado:') !!}
    {!! Form::text('sigla_grado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Unid Rep Dot Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unid_rep_dot', 'Unid Rep Dot:') !!}
    {!! Form::text('unid_rep_dot', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cond Alta Dot Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cond_alta_dot', 'Cond Alta Dot:') !!}
    {!! Form::number('cond_alta_dot', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Familiar Responsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('familiar_responsable', 'Familiar Responsable:') !!}
    {!! Form::text('familiar_responsable', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telefono2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono2', 'Telefono2:') !!}
    {!! Form::text('telefono2', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
