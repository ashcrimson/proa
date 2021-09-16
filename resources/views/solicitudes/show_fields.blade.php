


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
                @include('pacientes.show_fields',['paciente' => $rema->paciente])
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class=" col-sm-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos de REMA</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <!-- Hora De Llamada Field -->
            {!! Form::label('hora_de_llamada', 'Hora De Llamada:') !!}
            {!! $rema->hora_de_llamada !!}<br>


            <!-- Hora De Salida Field -->
            {!! Form::label('hora_de_salida', 'Hora De Salida:') !!}
            {!! $rema->hora_de_salida !!}<br>


            <!-- Hora De Llegada Field -->
            {!! Form::label('hora_de_llegada', 'Hora De Llegada:') !!}
            {!! $rema->hora_de_llegada !!}<br>


            <!-- User Id Field -->
            {!! Form::label('user_id', 'Responsable:') !!}
            {!! $rema->user->name !!}<br>


            <!-- estado Field -->
            {!! Form::label('estado', 'Estado:') !!}
            {!! $rema->estado->nombre !!}<br>

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

            <!-- Informe Medico Field -->
            {!! Form::label('informe_medico', 'Informe Medico:') !!}
            {!! $rema->informe_medico !!}<br>

            <!-- Clasificacion Triaje Field -->
            {!! Form::label('clasificacion_triaje', 'Clasificacion Triaje:') !!}
            {!! $rema->clasificacion_triaje !!}<br>


            <!-- Motivo Consulta Field -->
            {!! Form::label('motivo_consulta', 'Motivo Consulta:') !!}
            {!! $rema->motivo_consulta !!}<br>


            <!-- Evaluacion Primaria A Field -->
            {!! Form::label('evaluacion_primaria_a', 'Evaluacion Primaria A:') !!}
            {!! $rema->evaluacion_primaria_a !!}<br>


            <!-- Evaluacion Primaria B Field -->
            {!! Form::label('evaluacion_primaria_b', 'Evaluacion Primaria B:') !!}
            {!! $rema->evaluacion_primaria_b !!}<br>


            <!-- Evaluacion Primaria C Field -->
            {!! Form::label('evaluacion_primaria_c', 'Evaluacion Primaria C:') !!}
            {!! $rema->evaluacion_primaria_c !!}<br>


            <!-- Evaluacion Primaria D Field -->
            {!! Form::label('evaluacion_primaria_d', 'Evaluacion Primaria D:') !!}
            {!! $rema->evaluacion_primaria_d !!}<br>


            <!-- Evaluacion Primaria E Field -->
            {!! Form::label('evaluacion_primaria_e', 'Evaluacion Primaria E:') !!}
            {!! $rema->evaluacion_primaria_e !!}<br>


            <!-- Evaluacion Secundaria S Field -->
            {!! Form::label('evaluacion_secundaria_s', 'Evaluacion Secundaria S:') !!}
            {!! $rema->evaluacion_secundaria_s !!}<br>


            <!-- Evaluacion Secundaria A Field -->
            {!! Form::label('evaluacion_secundaria_a', 'Evaluacion Secundaria A:') !!}
            {!! $rema->evaluacion_secundaria_a !!}<br>


            <!-- Evaluacion Secundaria M Field -->
            {!! Form::label('evaluacion_secundaria_m', 'Evaluacion Secundaria M:') !!}
            {!! $rema->evaluacion_secundaria_m !!}<br>


            <!-- Evaluacion Secundaria P Field -->
            {!! Form::label('evaluacion_secundaria_p', 'Evaluacion Secundaria P:') !!}
            {!! $rema->evaluacion_secundaria_p !!}<br>


            <!-- Evaluacion Secundaria L Field -->
            {!! Form::label('evaluacion_secundaria_l', 'Evaluacion Secundaria L:') !!}
            {!! $rema->evaluacion_secundaria_l !!}<br>


            <!-- Evaluacion Secundaria E Field -->
            {!! Form::label('evaluacion_secundaria_e', 'Evaluacion Secundaria E:') !!}
            {!! $rema->evaluacion_secundaria_e !!}<br>


            <!-- Atencion Enfermeria Field -->
            {!! Form::label('atencion_enfermeria', 'Atencion Enfermeria:') !!}
            {!! $rema->atencion_enfermeria !!}<br>


            <!-- Antecedentes Morbidos Field -->
            <!-- {!! Form::label('antecedentes_morbidos', 'Antecedentes Morbidos:') !!}
            {!! $rema->antecedentes_morbidos !!}<br> -->


            <!-- Alergias Field -->
            <!-- {!! Form::label('alergias', 'Alergias:') !!}
            {!! $rema->alergias !!}<br> -->


            <!-- Medicamentos Habituales Field -->
           <!--  {!! Form::label('medicamentos_habituales', 'Medicamentos Habituales:') !!}
            {!! $rema->medicamentos_habituales !!}<br> -->


            <!-- Via Aerea Field -->
            {!! Form::label('via_aerea', 'Via Aerea:') !!}
            {!! $rema->via_aerea !!}<br>


            <!-- Aspiracion Secreciones Field -->
            {!! Form::label('aspiracion_secreciones', 'Aspiracion Secreciones:') !!}
            {!! $rema->aspiracion_secreciones !!}<br>


            <!-- Oxigenoterapia Fio2 Field -->
            {!! Form::label('oxigenoterapia_fio2', 'Oxigenoterapia Fio2:') !!}
            {!! $rema->oxigenoterapia_fio2 !!}<br>


            <!-- Asistencia Ventilatoria Field -->
            {!! Form::label('asistencia_ventilatoria', 'Asistencia Ventilatoria:') !!}
            {!! $rema->asistencia_ventilatoria !!}<br>


            <!-- Acceso Vascular Numero Field -->
            {!! Form::label('acceso_vascular_numero', 'Acceso Vascular Numero:') !!}
            {!! $rema->acceso_vascular_numero !!}<br>


            <!-- Acceso Vascular Ubicacion Field -->
            {!! Form::label('acceso_vascular_ubicacion', 'Acceso Vascular Ubicacion:') !!}
            {!! $rema->acceso_vascular_ubicacion !!}<br>


            <!-- Administracion Parenteral Field -->
            {!! Form::label('administracion_parenteral', 'Administracion Parenteral:') !!}
            {!! $rema->administracion_parenteral !!}<br>


            <!-- Sondeo Gastrico Numero Field -->
            {!! Form::label('sondeo_gastrico_numero', 'Sondeo Gastrico Numero:') !!}
            {!! $rema->sondeo_gastrico_numero !!}<br>


            <!-- Sondeo Gastrico Debito Field -->
            {!! Form::label('sondeo_gastrico_debito', 'Sondeo Gastrico Debito:') !!}
            {!! $rema->sondeo_gastrico_debito !!}<br>


            <!-- Monitoreo Ekg Field -->
            {!! Form::label('monitoreo_ekg', 'Monitoreo Ekg:') !!}
            {!! $rema->monitoreo_ekg !!}<br>


            <!-- Desfibrilacion Field -->
            {!! Form::label('desfibrilacion', 'Desfibrilacion:') !!}
            {!! $rema->desfibrilacion !!}<br>


            <!-- Cardioversion Farm Field -->
            {!! Form::label('cardioversion_farm', 'Cardioversion Farm:') !!}
            {!! $rema->cardioversion_farm !!}<br>


            <!-- Marcapaso Field -->
            {!! Form::label('marcapaso', 'Marcapaso:') !!}
            {!! $rema->marcapaso !!}<br>


            <!-- Frecuencia Cardiaca Field -->
            {!! Form::label('frecuencia_cardiaca', 'Frecuencia Cardiaca:') !!}
            {!! $rema->frecuencia_cardiaca !!}<br>


            <!-- Inmovilizacion Field -->
            {!! Form::label('inmovilizacion', 'Inmovilizacion:') !!}
            {!! $rema->inmovilizacion !!}<br>


            <!-- Extricacion Field -->
            {!! Form::label('extricacion', 'Extricacion:') !!}
            {!! $rema->extricacion !!}<br>


            <!-- Rcr Field -->
            {!! Form::label('rcr', 'Rcr:') !!}
            {!! $rema->rcr !!}<br>


            <!-- Sondeo Vesical Field -->
            {!! Form::label('sondeo_vesical', 'Sondeo Vesical:') !!}
            {!! $rema->sondeo_vesical !!}<br>


            <!-- Otros Field -->
            {!! Form::label('otros', 'Otros:') !!}
            {!! $rema->otros !!}<br>


            <!-- Ventilacion Hora Recepcion Field -->
            {!! Form::label('ventilacion_hora_recepcion', 'Ventilacion Hora Recepcion:') !!}
            {!! $rema->ventilacion_hora_recepcion !!}<br>


            <!-- Fallecimiento Hora Field -->
            {!! Form::label('fallecimiento_hora', 'Fallecimiento Hora:') !!}
            {!! $rema->fallecimiento_hora !!}<br>



        </div>
        <!-- /.card-body -->
    </div>
</div>

