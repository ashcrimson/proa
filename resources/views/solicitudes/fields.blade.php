


    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Paciente</h3>

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
                <h3 class="card-title">Datos Registro</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">

                    <!-- Treatamiento -->
                    <div class="form-group col-4">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Tratamiento</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <!-- radio -->
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="inicio" value="0">
                                      <input class="custom-control-input" type="radio" id="inicio" name="tratamiento" value="inicio"
                                          {{($solicitud->inicio ?? 0) ? 'checked' : ''}}>
                                      <label for="inicio" class="custom-control-label">Inicio</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="continuacion" value="0">
                                      <input class="custom-control-input" type="radio" id="continuacion" name="tratamiento" value="continuacion"
                                          {{($solicitud->continuacion ?? 0) ? 'checked' : ''}}>
                                      <label for="continuacion" class="custom-control-label">Continuacion</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Terapia</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="terapia_empirica" value="0">
                                        <input class="custom-control-input" type="radio" id="terapia_empirica" name="terapia" value="terapia_empirica"
                                            {{($solicitud->terapia_empirica ?? 0) ? 'checked' : ''}}>
                                        <label for="terapia_empirica" class="custom-control-label">Terapia Empirica</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="terapia_especifica" value="0">
                                        <input class="custom-control-input" type="radio" id="terapia_especifica" name="terapia" value="terapia_especifica"
                                            {{($solicitud->terapia_especifica ?? 0) ? 'checked' : ''}}>
                                        <label for="terapia_especifica" class="custom-control-label">Terapia Especifica</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Fuente de infección</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="infeccion_extrahospitalaria" value="0">
                                        <input class="custom-control-input" type="radio" id="infeccion_extrahospitalaria" name="fuente_infeccion" value="infeccion_extrahospitalaria"
                                            {{($solicitud->infeccion_extrahospitalaria ?? 0) ? 'checked' : ''}}>
                                        <label for="infeccion_extrahospitalaria" class="custom-control-label">Infección Extrahospitalaria</label>

                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="infeccion_intrahospitalaria" value="0">
                                        <input class="custom-control-input" type="radio" id="infeccion_intrahospitalaria" name="fuente_infeccion" value="infeccion_intrahospitalaria"
                                            {{($solicitud->infeccion_intrahospitalaria ?? 0) ? 'checked' : ''}}>
                                        <label for="infeccion_intrahospitalaria" class="custom-control-label">Infeccion Intrahospitalaria</label>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Cultivos tomados</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                    <!-- checkbox -->
                                <div class="form-group mb-0">
                                    @foreach(\App\Models\Cultivo::all() as $cultivo)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" id="cultivoCheck{{$cultivo->id}}" type="checkbox" name="cultivos[]" value="{{$cultivo->id}}"
                                                {{validaCheched($solicitud->cultivos ?? null,$cultivo->id)}}>
                                            <label for="cultivoCheck{{$cultivo->id}}" class="custom-control-label">
                                                {{$cultivo->nombre}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Diagnostico o sitio de la infección</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    @foreach(\App\Models\Diagnostico::all() as $diag)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" id="diagnosticoCheck{{$diag->id}}" type="checkbox" name="diagnosticos[]" value="{{$diag->id}}"
                                                   {{validaCheched($solicitud->diagnosticos ?? null,$diag->id)}}>
                                            <label for="diagnosticoCheck{{$diag->id}}" class="custom-control-label">
                                                {{$diag->nombre}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-lg-12">
                        @include('solicitudes.panel_microorganismos')
                    </div>

                    <div class="form-group col-12">
                        <div class="card ">
                            <div class="card-header py-0 px-1">
                                <h3 class="card-title">Disfunción</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="form-row">

                                    <!-- Disfuncion Renal Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('disfuncion_renal', 'Disfuncion Renal:') !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('disfuncion_renal', 0) !!}
                                            {!! Form::checkbox('disfuncion_renal', '1', null) !!}
                                        </label>
                                    </div>


                                    <!-- Disfuncion Hepatica Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('disfuncion_hepatica', 'Disfuncion Hepatica:') !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('disfuncion_hepatica', 0) !!}
                                            {!! Form::checkbox('disfuncion_hepatica', '1', null) !!}
                                        </label>
                                    </div>


                                    <!-- Creatinina Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('creatinina', 'Creatinina:') !!}
                                        {!! Form::number('creatinina', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Peso Field -->
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('peso', 'Peso:') !!}
                                        {!! Form::number('peso', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-lg-12">
                        @include('solicitudes.panel_medicamentos')
                    </div>






                    <!-- Observaciones Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('observaciones', 'Observaciones:') !!}
                        {!! Form::textarea('observaciones', null, ['class' => 'form-control','rows' => 3]) !!}
                    </div>


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>



{{--    --}}
{{--    <div class="form-group col-sm-12 col-lg-12">--}}
{{--        @include('remas.panel_ventilaciones_mecanicas')--}}
{{--    </div>--}}

