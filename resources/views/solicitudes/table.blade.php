

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered']) !!}

@push('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        $(function () {
            var dt = window.LaravelDataTables["dataTableBuilder"];

            //Cuando dibuja la tabla
            dt.on( 'draw.dt', function () {
                $(this).addClass('table-sm table-bordered ');
                $('[data-toggle="tooltip"]').tooltip();
            });

            {{--async function depuraActualiza(){--}}

            {{--    console.log('ejecuta actulizacion automatica')--}}

            {{--    let res = await axios.get('{{route('solicitudes.depura.actualiza')}}')--}}

            {{--    console.log('actualizadas', res);--}}
            {{--}--}}

            {{--depuraActualiza();--}}

            {{--var minutos = 1 * 60 * 1000;--}}


            {{--setInterval(depuraActualiza,minutos)--}}

        })
    </script>
@endpush
