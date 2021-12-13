<div class="card " id="panel_disfuncion">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">Disfunción</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="form-row">

            <!-- Disfuncion Renal Field -->
            <div class="form-group col-sm-2">

                <label for="">Disfuncion Renal:</label>
                <div class="text-lg">

                    <toggle-button :sync="true"
                                   :labels="{checked: 'Sí', unchecked: 'No'}"
                                   v-model="disfuncion_renal"
                                   :width="75"
                                   :height="35"
                                   :font-size="16"
                                   :disabled="readonly"
                    ></toggle-button>

                    <input type="hidden" name="disfuncion_renal" :value="disfuncion_renal ? 1 : 0">
                </div>

            </div>


            <!-- Disfuncion Hepatica Field -->
            <div class="form-group col-sm-2">
                <label for="">Disfuncion Hepatica:</label>
                <div class="text-lg">

                    <toggle-button :sync="true"
                                   :labels="{checked: 'Sí', unchecked: 'No'}"
                                   v-model="disfuncion_hepatica"
                                   :width="75"
                                   :height="35"
                                   :font-size="16"
                                   name="disfuncion_hepatica"
                                   :disabled="readonly"
                    ></toggle-button>

                    <input type="hidden" name="disfuncion_hepatica" :value="disfuncion_hepatica ? 1 : 0">
                </div>
            </div>


            <!-- Creatinina Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('creatinina', 'Creatinina:') !!}
                <input type="number" step="any" class="form-control" name="creatinina" v-model="creatinina" :required="disfuncion_hepatica" :readonly="readonly">
            </div>

            <!-- Peso Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('peso', 'Peso:') !!}
                <input type="number" step="any" class="form-control" name="peso" v-model="peso" :required="disfuncion_hepatica" :readonly="readonly">
            </div>

            <div class="form-group col-sm-2">
                {!! Form::label('peso', 'VFG:') !!}
                <input type="text" class="form-control" readonly :value="vfg">
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>




@push('scripts')
    <script>



        var vmItem = new Vue({
            el: '#panel_disfuncion',
            name: '#panel_disfuncion',
            created: function() {
            },
            mounted() {
            },
            data: {

                disfuncion_renal: @json($solicitud->disfuncion_renal ?? false),
                disfuncion_hepatica: @json($solicitud->disfuncion_hepatica ?? false),
                creatinina : @json($solicitud->creatinina ?? null),
                peso : @json($solicitud->peso ?? null),

                readonly: @json($readonly ?? false)

            },
            methods: {

            },
            computed: {
                vfg () {
                    let edad = parseFloat(vmPacienteFields.edad);
                    let peso = parseFloat(this.peso);
                    let creatinina = parseFloat(this.creatinina);


                    let sexo = vmPacienteFields.sexo===true ? 'M' : 'F';

                    let total = 0;

                    if(edad > 0 && peso > 0 && creatinina > 0){
                        total = (140 - edad) * (peso/72) * creatinina;
                    }

                    if (sexo==="F"){
                        console.log('mujer')
                        total = total * 0.85;
                    }

                    return  total;

                }
            },
        });


    </script>
@endpush
