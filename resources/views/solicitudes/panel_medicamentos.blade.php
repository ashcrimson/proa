<div class="card card-outline card-success" id="panel_medicamentos">
    <div class="card-header">
        <h3 class="card-title">Antibiótico Solicitado</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" @click="!dialog" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

    <div class="row">

        <div class="col-12 p-3">
            <form action="" method="post" role="form" id="form-modal-models">

                <div class="form-row">

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
                            <button
                                type="button" id="btnSubmitFormModels"
                                data-loading-text="Guardando..."
                                class="btn btn-success"
                                autocomplete="off"
                                @click.prevent="save()"
                            >
                                <i class="fa fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>

    <div class="table-responsive mb-0">
        <table class="table table-bordered table-sm table-striped mb-0">
            <thead>
            <tr>
                <th>dosis</th>
                <th>frecuencia</th>
                <th>periodo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-if="medicamentos.length == 0">
                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in medicamentos">
                    <td v-text="det.dosis"></td>
                    <td v-text="det.frecuencia"></td>
                    <td v-text="det.periodo"></td>
                    <td  class="text-nowrap">
                        <button type="button" @click="editItem(item)" class="btn btn-sm btn-outline-info" v-tooltip="'Editar'"  >
                            <i class="fa fa-edit"></i>
                        </button>

                        <button type="button" @click="deleteItem(item)"  class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >
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

            medicamentos: [],
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
                this.medicamentos = res.data.data;
            },
            getId(item){
                if(item)
                    return item.id;

                return null
            },
            editItem (item) {
                this.editedItem = Object.assign({}, item);

            },
            close () {
                this.loading = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                }, 300)
            },
            async save () {

                this.loading = true;



                try {

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
                return this.editedItem.id === 0 ? 'Guardar' : 'Actualizar'
            }
        },
    });


</script>
@endpush
