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
                <input type="text" class="form-control" name="creatinina" v-model="creatinina" :readonly="readonly">
            </div>

            <!-- Peso Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('peso', 'Peso:') !!}
                <input type="text" class="form-control" name="peso" v-model="peso" :readonly="readonly">
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
                creatinina : @json($solicitud->creatinina ?? 0),
                peso : @json($solicitud->peso ?? 0),

                readonly: @json($readonly ?? false)

            },
            methods: {

            },
            computed: {
                vfg () {
                    let edad = parseFloat(this.edad);
                    let peso = parseFloat(this.peso);
                    let creatinina = parseFloat(this.creatinina);

                    if(edad > 0 && peso > 0 && creatinina > 0){
                        return (140 - edad) * (peso/72) * creatinina;
                    }

                    return  0;

                },
                edad(){

                    let edad = $("#fecha_nac").val();

                    return 50;

                }
            },
        });


    </script>
@endpush
