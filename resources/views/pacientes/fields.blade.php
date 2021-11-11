<div class="form-row" id="paciente-fields">
    <!-- Run Field -->
    <div class="form-group col-sm-4">

        {!! Form::label('run', 'Run:') !!}

        <div class="input-group ">

            {!! Form::text('run', null, ['id' => 'run','class' => 'form-control','maxlength' => 9]) !!}
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" @click="getDatosPaciente()">
                                    <span v-show="!loading">
                                        <i class="fa fa-search"></i>
                                    </span>
                    <span v-show="loading">
                                        <i class="fa fa-sync fa-spin"></i>
                                    </span>
                    Consultar
                </button>
            </div>
        </div>


    </div>

    <!-- Dv Run Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('dv_run', 'Dv Run:') !!}
        {!! Form::text('dv_run', null, ['id' => 'dv_run','class' => 'form-control','maxlength' => 1]) !!}
    </div>

    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

    <!-- Primer Nombre Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
        {!! Form::text('primer_nombre', null, ['id' => 'primer_nombre','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Segundo Nombre Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
        {!! Form::text('segundo_nombre', null, ['id' => 'segundo_nombre','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Apellido Paterno Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
        {!! Form::text('apellido_paterno', null, ['id' => 'apellido_paterno','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Apellido Materno Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
        {!! Form::text('apellido_materno', null, ['id' => 'apellido_materno','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Fecha Nac Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
        {!! Form::date('fecha_nac', null, ['v-model' => 'fecha_nac','id' => 'fecha_nac','class' => 'form-control','id'=>'fecha_nac']) !!}
    </div>


    <div class="form-group col-sm-3">
        <label for="">Edad</label>
        <input type="text" class="form-control" readonly v-model="edad" value="0">
    </div>


    <div class="form-group col-sm-2">
        <label for="">Sexo:</label>
        <div class="text-lg">

            <toggle-button :sync="true"
                           :labels="{checked: 'M', unchecked: 'F'}"
                           v-model="sexo"
                           :width="75"
                           :height="35"
                           :font-size="16"
            ></toggle-button>

            <input type="hidden" name="sexo" :value="sexo ? 1 : 0">
        </div>
    </div>



    <!-- telefono Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['id' => 'telefono','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Direccion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('direccion', 'Dirección:') !!}
        {!! Form::text('direccion', null, ['id' => 'direccion','class' => 'form-control','maxlength' => 255]) !!}
    </div>


    <!-- familiar_responsable Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('familiar_responsable', 'Familiar Responsable:') !!}
        {!! Form::text('familiar_responsable', null, ['id' => 'familiar_responsable','class' => 'form-control','maxlength' => 255]) !!}
    </div>


</div>



@push('scripts')
<script>


    const vmPacienteFields = new Vue({
        el: '#paciente-fields',
        name: 'paciente-fields',
        created() {
            this.calcularEdad(this.fecha_nac);
        },
        data: {
            loading : false,
            fecha_nac : @json($rema->fecha_nac ?? old('fecha_nac') ?? null),
            sexo : @json($rema->sexo ?? old('sexo') ?? null),
            edad : 0,

        },
        methods: {
            async getDatosPaciente(){

                logI('FN: getDatosPaciente');

                this.loading = true;

                let run = $("#run").val();

                let url = "{{route('get.datos.paciente')}}"+"?run="+run;

                try{
                    let res = await axios.get(url);
                    let paciente = res.data.data;

                    //si existe la isntancia de vue vmPreparacionFields
                    if (typeof vmPreparacionFields  !== 'undefined') {
                        vmPreparacionFields.setDatosPreparacion(paciente.ultima_preparacion)
                    }

                    logI('respuesta',res);

                    if (!paciente){
                        alertWarning('Rut No Encontrado');
                    }else{
                        $("#dv_run").val(paciente.dv_run);
                        $("#apellido_paterno").val(paciente.apellido_paterno);
                        $("#apellido_materno").val(paciente.apellido_materno);
                        $("#primer_nombre").val(paciente.primer_nombre);
                        $("#segundo_nombre").val(paciente.segundo_nombre);
                        this.fecha_nac = paciente.fecha_nac;

                        if (paciente.sexo=='M'){
                            this.sexo= true;
                        }else {
                            this.sexo= true;
                        }

                        $("#telefono").val(paciente.telefono);
                        $("#direccion").val(paciente.direccion);
                        $("#familiar_responsable").val(paciente.familiar_responsable);
                    }


                    this.loading = false;

                }catch (e) {
                    logW(e);
                    alertWarning('Rut No Encontrado');
                    this.loading = false;
                }
            },
            calcularEdad(fecha){
                if (fecha){
                    var years = moment().diff(fecha, 'years',false);
                    this.edad = years;
                }
            }
        },
        watch:{
            fecha_nac (fecha){
                if (fecha){
                    this.calcularEdad(fecha)
                }
            }
        }

    });
</script>
@endpush
