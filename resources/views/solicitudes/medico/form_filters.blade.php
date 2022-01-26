
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


        <div class="form-group col-sm-3">
            {!! Form::label('del', 'Estado:') !!}
            <multiselect v-model="estado" :options="estados" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="estados" :value="estado ? estado.id : null">
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('servicio', 'Servicio:') !!}
            <multiselect v-model="servicio" :options="servicios"  placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="servicios" :value="servicio">
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
                estados : @json($estados ?? []),
                estado: null,

                servicios : @json($servicios ?? []),
                servicio: null,

                users : @json(\App\Models\User::role([\App\Models\Role::MEDICO,\App\Models\Role::INFECTOLOGO])->get() ?? []),
                user: null,


            },
            methods: {

            },
            computed:{

            }
        });
    </script>
@endpush
