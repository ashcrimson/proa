


    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">
                    @include('pacientes.fields')
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>





    <div class="col-sm-12 mb-3">
        <div class="card card-outline card-info ">
            <div class="card-header">
                <h3 class="card-title">Datos Atención</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">

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


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


    <div class="form-group col-sm-12 col-lg-12">
        @include('solicitudes.panel_medicamentos')
    </div>
{{--    --}}
{{--    <div class="form-group col-sm-12 col-lg-12">--}}
{{--        @include('remas.panel_ventilaciones_mecanicas')--}}
{{--    </div>--}}

