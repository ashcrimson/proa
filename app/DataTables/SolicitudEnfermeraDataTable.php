<?php

namespace App\DataTables;

use App\Models\Solicitud;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SolicitudEnfermeraDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

       return $dataTable->addColumn('action', function(Solicitud $solicitud){

                 $id = $solicitud->id;

                 return view('solicitudes.datatables_actions',compact('solicitud','id'))->render();
             })
             ->editColumn('paciente.nombre_completo',function (Solicitud $solicitud){

                 return $solicitud->paciente->nombre_completo;

             })
           ->editColumn('farmaco',function (Solicitud $solicitud){
               return view('solicitudes.partials.datatable_columna_medicamtenso',compact('solicitud'));
           })
           ->setRowAttr([
               'style' => function(Solicitud $solicitud){
                   return 'background-color: '.$solicitud->getColor().';';
               }
           ])
           ->editColumn('fecha_solicita',function (Solicitud $solicitud){
               return $solicitud->fecha_solicita ? $solicitud->fecha_solicita->format('d/m/Y') : '';
           })
           ->editColumn('horas',function (Solicitud $solicitud){
               return $solicitud->fecha_solicita ? $solicitud->fecha_solicita->diffInHours(Carbon::now()) : '';
           })
           ->editColumn('fecha_despacha',function (Solicitud $solicitud){
               return $solicitud->fecha_despacha ? $solicitud->fecha_despacha->format('d/m/Y') : '';
           })
             ->rawColumns(['microorganismo','antimicrobiano','action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Solicitud $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Solicitud $model)
    {
        return $model->newQuery()->with(['paciente','estado','userCrea','medicamentos','microorganismos'])->orderBy('fecha_solicita','asc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
            ])
            ->parameters([
                'dom'     => '
                                    <"row mb-2"
                                        <"col-sm-12 col-md-6" B>
                                        <"col-sm-12 col-md-6" f>
                                    >
                                    rt
                                    <"row"
                                        <"col-sm-6 order-2 order-sm-1" ip>
                                        <"col-sm-6 order-1 order-sm-2 text-right" l>

                                    >',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                //'scrollX' => false,
                'responsive' => true,
                'stateSave' => true,
                'buttons' => [
                    //['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    //['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->data('id')->name('solicitudes.id'),
//            Column::make('horas')->searchable(false)->orderable(false),
            Column::make('medico')->name('userCrea.name')->data('user_crea.name'),

            Column::make('paciente.apellido_paterno')
                ->visible(false)->exportable(false),
            Column::make('paciente.apellido_materno')
                ->visible(false)->exportable(false),
            Column::make('paciente.primer_nombre')
                ->visible(false)->exportable(false),
            Column::make('paciente.segundo_nombre')
                ->visible(false)->exportable(false),

            Column::make('paciente')->name('paciente.nombre_completo')->data('paciente.nombre_completo')
                ->searchable(false)->orderable(false),

            Column::make('run')->name('paciente.run')->data('paciente.run')
                ->searchable(false)->orderable(false),

            Column::make('farmaco')->searchable(false)->orderable(false),
            Column::make('fecha_inicio_tratamiento'),
            Column::make('fecha_fin_tratamiento'),


            Column::make('estado')->name('estado.nombre')->data('estado.nombre'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'solicitudesdatatable_' . time();
    }
}
