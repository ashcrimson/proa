

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

        })
    </script>
@endpush
