<div class="card card-outline card-success" id="panel_signos">
    <div class="card-header">
        <h3 class="card-title">Signos Vitales</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" @click="!dialog" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

    <div class="row p-4">
        <div class="col-sm-12">

            <button type="button" class="btn btn-success btn-sm" @click="dialog=!dialog">
                <i class="fa fa-plus"></i> Agregar Registro
            </button>
        </div>
    </div>

    <div class="table-responsive mb-0">
        <table class="table table-bordered table-sm table-striped mb-0">
            <thead>
            <tr>
                <th>Hora</th>
                <th>Temp Axilar</th>
                <th>Temp Rectal</th>
                <th>PAS</th>
                <th>PAD</th>
                <th>Pulso</th>
                <th>SatO2</th>
                <th>F. Resp.</th>
                <th>HGT</th>
                <th>DOLOR (EVA)</th>
            </tr>
            </thead>
            <tbody>
                <tr v-if="signos.length == 0">
                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in signos">
                    <td v-text="det.hora_format"></td>
                    <td v-text="det.temperatura_axilar"></td>
                    <td v-text="det.temperatura_rectal"></td>
                    <td v-text="det.presion_arterial_ps"></td>
                    <td v-text="det.presion_arterial_pd"></td>
                    <td v-text="det.pulso"></td>
                    <td v-text="det.saturacion_oxigeno"></td>
                    <td v-text="det.frecuencia_respiratoria"></td>
                    <td v-text="det.hgt"></td>
                    <td v-text="det.eva"></td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal form create models -->
    <div class="modal fade" id="modalFormSignosVitales">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" role="form" id="form-modal-models">

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Nuevo Registro
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">

                            <!-- Hora Field -->
                            <div class="form-group col-sm-6">
                                <label for="hora">Hora:</label>
                                <input class="form-control" type="time" v-model="editedItem.hora">
                            </div>


                            <!-- Pulso Field -->
                            <div class="form-group col-sm-6">
                                <label for="pulso">Pulso:</label>
                                <input class="form-control" type="number" v-model="editedItem.pulso">
                            </div>

                            <!-- Presion Arterial Ps Field -->
                            <div class="form-group col-sm-6">
                                <label for="presion_arterial_ps">Ps:</label>
                                <input class="form-control" type="number" v-model="editedItem.presion_arterial_ps">
                            </div>

                            <!-- Presion Arterial Pd Field -->
                            <div class="form-group col-sm-6">
                                <label for="presion_arterial_pd">Pd:</label>
                                <input class="form-control" type="number" v-model="editedItem.presion_arterial_pd">
                            </div>



                            <!-- Frecuencia Respiratoria Field -->
                            <div class="form-group col-sm-6">
                                <label for="frecuencia_respiratoria">Respiratoria:</label>
                                <input class="form-control" type="text" v-model="editedItem.frecuencia_respiratoria">
                            </div>

                            <!-- Temperatura Axilar Field -->
                            <div class="form-group col-sm-6">
                                <label for="temperatura_axilar">Axilar:</label>
                                <input class="form-control" type="number" step="any" v-model="editedItem.temperatura_axilar">
                            </div>

                            <!-- Temperatura Rectal Field -->
                            <div class="form-group col-sm-6">
                                <label for="temperatura_rectal">Rectal:</label>
                                <input class="form-control" type="number" step="any" v-model="editedItem.temperatura_rectal">
                            </div>

                            <!-- Saturacion Oxigeno Field -->
                            <div class="form-group col-sm-6">
                                <label for="saturacion_oxigeno">Oxigeno:</label>
                                <input class="form-control" type="text" v-model="editedItem.saturacion_oxigeno">
                            </div>

                            <!-- Hgt Field -->
                            <div class="form-group col-sm-6">
                                <label for="hgt">Hgt:</label>
                                <input class="form-control" type="text" v-model="editedItem.hgt">
                            </div>

                            <!-- Eva Field -->
                            <div class="form-group col-sm-6">
                                <label for="eva">Eva:</label>
                                <input class="form-control" type="text" v-model="editedItem.eva">
                            </div>

                            <!-- Gsc Field -->
                            <div class="form-group col-sm-6">
                                <label for="gsc">Gsc:</label>
                                <input class="form-control" type="text" v-model="editedItem.gsc">
                            </div>

                            <!-- Ekg Field -->
                            <div class="form-group col-sm-6">
                                <label for="ekg">EKG:</label>
                                <input class="form-control" type="text" v-model="editedItem.ekg">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="btnSubmitFormModels"
                                data-loading-text="Guardando..."
                                class="btn btn-primary"
                                autocomplete="off"
                                @click.prevent="save()"
                        >
                            Guardar
                        </button>
                    </div>

                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /. Modal form create models -->
</div>




@push('scripts')
<script>



    var vmSignoVital = new Vue({
        el: '#panel_signos',
        name: "panel_signos",
            created () {
                this.getDatos();
            },
            data: {
                dialog: false,
                loading: false,
                signos: [],
                editedItem: {
                    rema_id: @json($rema->id ?? 0),
                    id : 0,
                },
                defaultItem: {
                    rema_id: @json($rema->id ?? 0),
                    id : 0,
                    nombre: '',
                    direccion: '',
                    telefono: '',
                    email: '',
                },
            },

            methods: {
                async getDatos () {

                    try{

                        var url = "{{route('api.rema_signo_vitals.index')}}?rema_id="+this.editedItem.rema_id;

                        console.log(url);

                        const res = await axios.get(url);

                        this.signos = res.data.data;

                    }catch (error) {

                        console.log(error)
                    }


                },

                editItem (item) {

                    this.editedItem = Object.assign({}, item);
                    this.dialog = true

                },

                async deleteItem (item) {

                    this.editedItem = Object.assign({}, item);

                    const res = confirm('Esta seguro de registro ?');

                    //si da click en aceptar
                    if (res){
                        try {

                            const res = await axios.delete(this.urlDestroy);

                            this.getDatos();


                            alertSucces('Listo!',res.message);


                        }catch (e) {
                            console.log(e.response)
                        }
                    }

                    this.close();

                },

                close () {
                    this.dialog = false;
                    this.loading = false;
                    $("#modalFormSignosVitales").modal('hide');
                    setTimeout(() => {
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },

                async save () {

                    this.loading = true;

                    try {

                        const data = this.editedItem;

                        if(this.editedItem.id === 0){

                            var res = await axios.post(this.urlStore,data);

                        }else {

                            var res = await axios.patch(this.urlUpdate,data);

                        }

                        alertSucces('Listo!',res.message);

                        this.getDatos();
                        this.close();

                    }catch (e) {
                        console.log(e.response);

                        var errors = e.response.data.errors;

                        if(typeof errors !== 'undefined'){

                            alertWarning(errors2List(errors));
                        }

                        this.loading = false;
                    }

                }
            },
            computed: {
                formTitle () {
                    return this.editedItem.id === 0 ? 'Nuevo Registro' : 'Editar Registro'
                },
                editando(){
                    return this.editedItem.id !== 0;
                },
                urlStore(){
                    return  '{{route('api.rema_signo_vitals.store')}}';
                },
                urlUpdate(){
                    var url = '{{route('api.rema_signo_vitals.update',0)}}';

                    return url.replace('/0','/'+this.editedItem.id);
                },
                urlDestroy(){
                    var url = '{{route('api.rema_signo_vitals.destroy',0)}}';

                    return url.replace('/0','/'+this.editedItem.id);

                },
            },

            watch: {
                dialog (val) {
                    if (val===true){
                        $("#modalFormSignosVitales").modal('show');
                    }else {
                        this.close()
                    }
                },
            },



        });
</script>
@endpush
