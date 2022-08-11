<div class="col-md-12" id="paciente-fields">
    <!-- Run Field -->
    {!! Form::label('run', 'Run:') !!}
    {!! $paciente->run !!}<br>


    <!-- Dv Run Field -->
    {!! Form::label('dv_run', 'Dv Run:') !!}
    {!! $paciente->dv_run !!}<br>


    <!-- Apellido Paterno Field -->
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    {!! $paciente->apellido_paterno !!}<br>


    <!-- Apellido Materno Field -->
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    {!! $paciente->apellido_materno !!}<br>


    <!-- Primer Nombre Field -->
    {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
    {!! $paciente->primer_nombre !!}<br>


    <!-- Segundo Nombre Field -->
    {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
    {!! $paciente->segundo_nombre !!}<br>


    <!-- Fecha Nac Field -->
    {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
    {!! $paciente->fecha_nac !!}<br>


    <!-- Sexo Field -->
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! $paciente->sexo !!}<br>

</div>

@push('scripts')
    <script>


        const vmPacienteFields = new Vue({
            el: '#paciente-fields',
            name: 'paciente-fields',
            created() {
                @isset(request()->rut)
                    this.getDatosPaciente();
                @endisset
                    this.calcularEdad(this.fecha_nac);
            },
            data: {
                loading : false,
                fecha_nac : @json($solicitud->fecha_nac ?? old('fecha_nac') ?? null),
                sexo : @json(boolval($solicitud->sexo ?? old('sexo') ?? false)),
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


                        logI('respuesta',res);

                        if (!paciente){
                            alertWarning('Rut No Encontrado');
                        }else{
                            $("#dv_run").val(paciente.dv_run);
                            $("#apellido_paterno").val(paciente.apellido_paterno);
                            $("#apellido_materno").val(paciente.apellido_materno);
                            $("#primer_nombre").val(paciente.primer_nombre);
                            $("#segundo_nombre").val(paciente.segundo_nombre);

                            if(typeof paciente["hosp"] === 'undefined'){

                                if (typeof paciente.ultima_solicitud === 'undefined'){
                                    alertWarning('Paciente no hospitalizado');
                                    vmBotonesGuardarSolicitud.desabilitar_botones_guardar= true;
                                }else {

                                    $("#codserv").val(paciente.ultima_solicitud.codserv);
                                    $("#descserv").val(paciente.ultima_solicitud.descserv);
                                    $("#nropiso").val(paciente.ultima_solicitud.nropiso);
                                    $("#nropieza").val(paciente.ultima_solicitud.nropieza);
                                    $("#nrocama").val(paciente.ultima_solicitud.nrocama);

                                }


                            }else {


                                $("#codserv").val(paciente["hosp"].codserv);
                                $("#descserv").val(paciente["hosp"].descserv);
                                $("#nropiso").val(paciente["hosp"].nropiso);
                                $("#nropieza").val(paciente["hosp"].nropieza);
                                $("#nrocama").val(paciente["hosp"].nrocama);

                                var descserv = paciente["hosp"].descserv || null;

                                vmBotonesGuardarSolicitud.desabilitar_botones_guardar= false;

                                if (!descserv){
                                    alertWarning('Paciente no hospitalizado');
                                    vmBotonesGuardarSolicitud.desabilitar_botones_guardar= true;
                                }else {

                                }
                            }

                            this.fecha_nac = paciente.fecha_nac;

                            if (paciente.sexo=='M'){
                                this.sexo= true;
                            }else {
                                this.sexo= false;
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
