<style>
    .form-control{
        height: calc(2.5rem + 2px);
    }
</style>

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
        <div class="row">

            <div class="col-12 p-3">

                <div class="form-row">


                    <div class="form-group col-sm-8">
                        <select-medicamento
                            :items="medicamentos"
                            label="Medicamento"
                            v-model="medicamento" >

                        </select-medicamento>
                    </div>

                    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                    <div class="form-group col-sm-2">
                        <label for="vol">Dosis</label>
                        <input class="form-control" type="number" v-model="editedItem.dosis_valor">
                    </div>


                    <div class="form-group col-sm-2">
                        <label for="vol">Dosis Unidad:</label>
                        <multiselect v-model="editedItem.dosis_unidad" :options="dosis_unidades"  placeholder="Seleccione uno...">
                        </multiselect>
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="vol">Frecuencia Cada:</label>
                        <multiselect v-model="editedItem.frecuencia_valor" :options="[4, 6, 8, 12, 24, 48, 72]" placeholder="Seleccione uno...">
                        </multiselect>
                    </div>

                    <div class="form-group col-sm-2" >
                        <label for="vol"  style="visibility: hidden;">Frecuencia Unidad:</label>

                        <!-- <multiselect v-model="editedItem.frecuencia_unidad" :options="['horas']"  placeholder="Seleccione uno...">
                        </multiselect> -->
                        <p style="position: relative; top:10px;">horas</p>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="peep">Cantidad de días:</label>
{{--                        <input class="form-control" type="number" v-model="editedItem.periodo">--}}
                        <multiselect v-model="editedItem.periodo" :options="diasPeriodo" placeholder="Seleccione uno..."></multiselect>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="peep">&nbsp;</label>
                        <div>
                            <button type="button" class="btn btn-success" @click.prevent="save()">
                                <i class="fa fa-save" v-show="!loading"></i>
                                <i class="fa fa-sync fa-spin" v-show="loading"></i>
                                <span v-text="textButtonSubmint"></span>
                            </button>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="table-responsive mb-0">
            <table class="table table-bordered table-sm table-striped mb-0">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Antibiotico</th>
                    <th>dosis</th>
                    <th>frecuencia</th>
                    <th>Cantidad de días</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="solicitud_medicamentos.length == 0">
                    <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in solicitud_medicamentos">
                <td v-text="det.medicamento.codigo"></td>
                    <td v-text="det.medicamento.nombre"></td>
                    <td v-text="det.dosis_valor+'/'+det.dosis_unidad"></td>
                    <td v-text="det.frecuencia_valor+'/horas'"></td>
                    <td v-text="det.periodo"></td>
                    <td  class="text-nowrap">
                        <button type="button" @click="editItem(det)" class="btn btn-sm btn-outline-info" v-tooltip="'Editar'"  >
                            <i class="fa fa-edit"></i>
                        </button>

                        <button type="button" @click="deleteItem(det)"  class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



</div>





@push('scripts')
<script>


    var vmPanelMedicamentos = new Vue({
        el: '#panel_medicamentos',
        name: '#panel_medicamentos',
        created: function() {
            this.getItems();
        },
        mounted() {
        },
        data: {

            medicamentos: @json(\App\Models\Medicamento::all() ?? []),
            solicitud_medicamentos: [],
            medicamento: null,
            editedItem: {
                id : 0,
                solicitud_id: @json($solicitud->id),
            },
            defaultItem: {
                id : 0,
                solicitud_id: @json($solicitud->id),

            },
            itemElimina: {

            },

            loading: false,

            solicitud_id: @json($solicitud->id),

            dosis_unidades : ['ug','mg','g','ml'],

        },
        methods: {

            async getItems() {
                const res = await  axios.get(route('api.solicitud_medicamentos.index',{solicitud_id: this.solicitud_id}));

                console.log('res getItems:',res)
                this.solicitud_medicamentos = res.data.data;
            },


            getId(item){
                if(item)
                    return item.id;

                return null
            },
            editItem (item) {
                this.medicamento = Object.assign({}, item.medicamento);
                this.editedItem = Object.assign({}, item);

            },
            close () {
                this.loading = false;
                setTimeout(() => {
                    this.medicamento = null;
                    this.editedItem = Object.assign({}, this.defaultItem);
                }, 300)
            },
            async save () {

                this.loading = true;



                try {

                    this.editedItem.medicamento_id = this.getId(this.medicamento)
                    const data = this.editedItem;

                    console.log(data);

                    if(this.editedItem.id === 0){

                        var res = await axios.post(route('api.solicitud_medicamentos.store'),data);

                    }else {

                        var res = await axios.patch(route('api.solicitud_medicamentos.update',this.editedItem.id),data);

                    }

                    logI(res.data);

                    iziTs(res.data.message);
                    this.getItems();

                    this.close();

                }catch (e) {
                    notifyErrorApi(e);
                    this.loading = false;
                }

            },
            async deleteItem(item) {

                let confirm = await Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, elimínalo\n!'
                });

                if (confirm.isConfirmed){
                    try{
                        let res = await  axios.delete(route('api.solicitud_medicamentos.destroy',item.id))
                        logI(res.data);

                        iziTs(res.data.message);
                        this.getItems();


                    }catch (e){
                        notifyErrorApi(e);
                        this.itemElimina = {};
                    }

                }

                console.log("Confirmacion",confirm);
            }
        },
        computed: {

            hayAntibioticos(){
                return this.solicitud_medicamentos.length > 0;
            },
            modalFormTitle () {
                return this.editedItem.id === 0 ? 'Nuevo Detalle' : 'Editar Detalle'
            },
            textButtonSubmint () {
                if (this.loading){
                    return this.editedItem.id === 0 ? 'Agregando...' : 'Actualizando...'

                }else {
                    return this.editedItem.id === 0 ? 'Agregar' : 'Actualizar'

                }
            },
            diasPeriodo(){
                if (this.editedItem.frecuencia_valor==48){
                    return [2,4,6,8,10,12,14,16,18,20,22]
                }


                if (this.editedItem.frecuencia_valor==72){
                    return [3,6,9,12,15,18,21,24]
                }

                return [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
            }
        },
    });


</script>
@endpush
