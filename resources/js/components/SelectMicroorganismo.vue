<template>
    <div>
        <label v-text="label+':'"></label>
        <a href="#" v-if="item" @click.prevent="editItem(item)">
            editar
        </a>

        <multiselect v-model="item" :options="items" label="nombre" placeholder="Seleccione uno...">
            <template  slot="noResult">
                <a class="btn btn-sm btn-block btn-success" href="#" @click.prevent="newItem()">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            </template >
        </multiselect>


        <input type="hidden" :name="name" :value="getId(item)">


            <div class="modal fade" :id="id" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelTitleId">
                                <span v-text="formTitle"></span>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="save">
                            <div class="modal-body">
                                <div class="form-row">

                                    <div class="form-group col-sm-12">
                                        <label >Nombre <span  class="text-danger">*</span></label>
                                        <input type="text" class="form-control" v-model="editedItem.nombre" >
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    <span v-text="loading ? 'GUARDANDO...' : 'GUARDAR'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>

    export default {

        name: 'select-microorganismo',
        created() {
            this.item = this.value;
        },
        props:{
            value: {
                default: null,
                required: true
            },
            items:{
                type: Array,
                required: true,
            },

            name: {
              type: String,
              default: 'microorganismo_id'
            },
            label:{
                type: String,
                required: true,
            },
            id:{
                type: String,
                default: 'modalSelectMicroorganismo'
            }
        },

        data: () => ({
            loading: false,

            item: null,
            editedItem: {
                id : 0,
            },
            defaultItem: {
                id : 0,
                nombre: '',
            },
        }),
        methods: {
            getId(item){
                if(item)
                    return item.id;

                return null
            },
            newItem () {
                $("#"+this.id).modal('show');
                this.editedItem = Object.assign({}, this.defaultItem);
            },
            editItem (item) {
                $("#"+this.id).modal('show');
                this.editedItem = Object.assign({}, item);

            },
            close () {
                $("#"+this.id).modal('hide');
                this.loading = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                }, 300)
            },

            async save () {

                this.loading = true;


                try {

                    const data = this.editedItem;

                    if(this.editedItem.id === 0){

                        var res = await axios.post(route('api.microorganismos.store'),data);

                    }else {

                        var res = await axios.patch(route('api.microorganismos.update',this.editedItem.id),data);

                    }

                    logI(res.data);

                    const item  = res.data.data;

                    this.actualizaSelect(item);

                    iziTs(res.data.message);

                    this.close();

                }catch (e) {
                    notifyErrorApi(e);
                    this.loading = false;
                }

            },
            actualizaSelect(item){
                if (this.editedItem.id==0){
                    this.items.push(item);
                }else {

                    var index = this.items.findIndex(o => o.id == item.id);
                    //remplaza item actualizado
                    this.items.splice(index, 1,item);

                }

                //Cambia el item seleccionado
                this.item = item;
            }
        },
        computed: {
            formTitle () {
                return this.editedItem.id === 0 ? 'Nuevo '+ this.label : 'Editar '+ this.label
            }
        },
        watch: {
            item (val) {
                this.$emit('input', val);
            },
            value(val){
                this.item = val;
            }
        }

    }
</script>



