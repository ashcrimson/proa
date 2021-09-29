


<div class="col-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos Paciente</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                @include('pacientes.show_fields',['paciente' => $solicitud->paciente])
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-12">
    <div class="card card-outline card-success">
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
                                    <input class="custom-control-input" type="radio" id="inicio" name="tratamiento" value="inicio" disabled
                                        {{($solicitud->inicio ?? 0) ? 'checked' : ''}}>
                                    <label for="inicio" class="custom-control-label">Inicio</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="hidden" name="continuacion" value="0">
                                    <input class="custom-control-input" type="radio" id="continuacion" name="tratamiento" value="continuacion" disabled
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
                                    <input class="custom-control-input" type="radio" id="terapia_empirica" name="terapia" value="terapia_empirica" disabled
                                        {{($solicitud->terapia_empirica ?? 0) ? 'checked' : ''}}>
                                    <label for="terapia_empirica" class="custom-control-label">Terapia Empirica</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="hidden" name="terapia_especifica" value="0">
                                    <input class="custom-control-input" type="radio" id="terapia_especifica" name="terapia" value="terapia_especifica" disabled
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
                                        {{($solicitud->infeccion_extrahospitalaria ?? 0) ? 'checked' : ''}} disabled>
                                    <label for="infeccion_extrahospitalaria" class="custom-control-label">Infección Extrahospitalaria</label>

                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="hidden" name="infeccion_intrahospitalaria" value="0">
                                    <input class="custom-control-input" type="radio" id="infeccion_intrahospitalaria" name="fuente_infeccion" value="infeccion_intrahospitalaria"
                                        {{($solicitud->infeccion_intrahospitalaria ?? 0) ? 'checked' : ''}} disabled>
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
                                            {{validaCheched($solicitud->cultivos ?? null,$cultivo->id)}} disabled>
                                        <label for="cultivoCheck{{$cultivo->id}}" class="custom-control-label">
                                            {{$cultivo->nombre}}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="mt-2">

                                    {!! Form::text('otro_cultivo', $solicitud->otro_cultivo, ['id' => 'otro_cultivo','class' => 'form-control','readonly']) !!}
                                </div>
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
                                            {{validaCheched($solicitud->diagnosticos ?? null,$diag->id)}} disabled>
                                        <label for="diagnosticoCheck{{$diag->id}}" class="custom-control-label">
                                            {{$diag->nombre}}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="mt-2">

                                    {!! Form::text('otro_diagnostico', $solicitud->otro_diagnostico, ['id' => 'otro_diagnostico','class' => 'form-control','readonly']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="form-group col-sm-12 col-lg-12">
                    <div class="card " id="">
                        <div class="card-header py-0 px-1">
                            <h3 class="card-title">Agente Aislado</h3>

                            <div class="card-tools">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body p-0">

                            @include('solicitudes.partials.show_table_microorganismos',['detalles' => $solicitud->microorganismos])
                        </div>

                    </div>

                </div>

                <div class="form-group col-12">
                    @include('solicitudes.panel_disfuncion',['readonly' => true])
                </div>

                <div class="form-group col-sm-12 col-lg-12">
                    <div class="card " id="panel_medicamentos">

                        <div class="card-header py-0 px-1">
                            <h3 class="card-title">Antibiótico Solicitado</h3>

                            <div class="card-tools">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>


                        <div class="card-body p-0">
                            @include('solicitudes.partials.show_table_medicamentos',['detalles' => $solicitud->medicamentos])
                        </div>



                    </div>

                </div>

                <!-- Observaciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('observaciones', 'Observaciones:') !!}
                    <p>{{$solicitud->observaciones}}</p>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
</div>





@push('scripts')
    <script>
        $(function () {

            function validaOtroCultivo(){
                let checked = $("#cultivoCheck{{\App\Models\Cultivo::OTRO}}").is(":checked");
                console.log('cambio check otro cultivo',checked);

                if (checked){
                    $("#otro_cultivo").show()
                }else {
                    $("#otro_cultivo").hide()
                }
            }
            validaOtroCultivo();



            function validaOtroDiagnostico(){
                let checked = $("#diagnosticoCheck{{\App\Models\Diagnostico::OTRO}}").is(":checked");
                console.log('cambio check otro diagnostico',checked);

                if (checked){
                    $("#otro_diagnostico").show()
                }else {
                    $("#otro_diagnostico").hide()
                }
            }

            validaOtroDiagnostico();


        })
    </script>
@endpush
