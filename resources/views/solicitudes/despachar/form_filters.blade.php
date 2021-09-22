
<form id="formFiltersDatatables">

    <div class="form-row">




        <div class="form-group col-sm-2">
            {!! Form::label('del', 'Desde:') !!}
            {!! Form::date('del', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('al', 'Hasta:') !!}
            {!! Form::date('al', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-8">
            {!! Form::label('del', 'Medico:') !!}
            <multiselect v-model="user" :options="users" label="name" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="users" :value="user ? user.id : null">
        </div>

        <div class="form-group col-sm-2">
            <label for="">&nbsp;</label>
            <div>
                <button type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-sync"></i> Aplicar Filtros
                </button>
            </div>
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <a  href="{{route('solicitudes.index')}}" type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-times"></i> Limpiar Filtros
                </a>
            </div>
        </div>
    </div>
</form>


@push('scripts')

    <script >

        $(function () {
            $('#formFiltersDatatables').submit(function(e){

                e.preventDefault();
                table = window.LaravelDataTables["dataTableBuilder"];

                table.draw();
            });
        })

        new Vue({
            el: '#formFiltersDatatables',
            name: 'fromFiltersSolicitudes',
            created() {

            },
            data: {
                users : @json(\App\Models\User::role(\App\Models\Role::MEDICO)->get() ?? []),
                user: null,


            },
            methods: {

            },
            computed:{

            }
        });
    </script>
@endpush
