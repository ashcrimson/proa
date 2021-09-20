<div class="card " id="panel_medicamentos">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">Antibiótico Solicitado</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" @click="!dialog" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

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

                <div class="form-group col-sm-3">
                    <label for="vol">Dosis:</label>
                    <input class="form-control" type="text" v-model="editedItem.dosis">
                </div>

                <div class="form-group col-sm-3">
                    <label for="vol">Frecuencia:</label>
                    <input class="form-control" type="text" v-model="editedItem.frecuencia">
                </div>


                <div class="form-group col-sm-3">
                    <label for="peep">Periodo:</label>
                    <input class="form-control" type="text" v-model="editedItem.periodo">
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
                <th>Antibiotico</th>
                <th>dosis</th>
                <th>frecuencia</th>
                <th>periodo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-if="solicitud_medicamentos.length == 0">
                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in solicitud_medicamentos">
                    <td v-text="det.medicamento.nombre"></td>
                    <td v-text="det.dosis"></td>
                    <td v-text="det.frecuencia"></td>
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




@push('scripts')
<script>


    var vmItem = new Vue({
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
            modalFormTitle () {
                return this.editedItem.id === 0 ? 'Nuevo Detalle' : 'Editar Detalle'
            },
            textButtonSubmint () {
                if (this.loading){
                    return this.editedItem.id === 0 ? 'Agregando...' : 'Actualizando...'

                }else {
                    return this.editedItem.id === 0 ? 'Agregar' : 'Actualizar'

                }
            }
        },
    });


</script>
@endpush