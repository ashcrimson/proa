

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


            var minutos = 10 * 60 * 1000;


            setInterval(function (){

                console.log('ejecuta actulizacion automatica')
                axios.get('{{route('solicitudes.depura.actualiza')}}')
                    .then(function (res){
                        console.log('actualizadas', res);
                    })
                    .catch(function (error){
                        console.log('error', error);

                    })
            },minutos)

        })
    </script>
@endpush
