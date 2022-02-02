<?php

namespace App\DataTables;

use App\Models\Solicitud;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SolicitudDataTable extends DataTable
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
             ->editColumn('paciente.rut_completo',function (Solicitud $solicitud){

                 return $solicitud->paciente->rut_completo ?? '';

             })
           ->editColumn('antimicrobiano',function (Solicitud $solicitud){
               return view('solicitudes.partials.datatable_columna_medicamtenso',compact('solicitud'));
           })
           ->editColumn('microorganismo',function (Solicitud $solicitud){
               return view('solicitudes.partials.datatable_columna_microorganismos',compact('solicitud'));
           })
           ->setRowAttr([
               'style' => function(Solicitud $solicitud){
                   return 'background-color: '.$solicitud->getColor().';';
               }
           ])
           ->editColumn('fecha_solicita',function (Solicitud $solicitud){
               return $solicitud->fecha_solicita ? $solicitud->fecha_solicita->format('d/m/Y') : '';
           })

           ->editColumn('created_at',function (Solicitud $solicitud){
               return $solicitud->created_at ? $solicitud->created_at->format('d/m/Y') : '';
           })


           ->editColumn('fecha_fin_tratamiento',function (Solicitud $solicitud){
               return $solicitud->fecha_fin_tratamiento ? $solicitud->fecha_fin_tratamiento->format('d/m/Y') : '';
           })
           ->editColumn('paciente.nombre_completo',function (Solicitud $solicitud){

               //en esta vista van los modals para que no tenga problemas de renderizado
               return view('solicitudes.columna_paciente',compact('solicitud'));
           })
             ->rawColumns(['microorganismo','antimicrobiano','paciente','action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Solicitud $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Solicitud $model)
    {
        return $model->newQuery()
            ->with(['paciente','estado','userCrea','medicamentos','microorganismos'])
            ->join('solicitud_estados','solicitud_estados.id','=','solicitudes.estado_id')
            ->select('solicitudes.*','solicitud_estados.orden')
            ->orderBy('orden','asc')
            ->orderBy('fecha_solicita','asc');
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
                'scrollX' => true,
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


            Column::make('servicio')->name('descserv')->data('descserv'),

            Column::make('run')->name('paciente.rut_completo')->data('paciente.rut_completo')
                ->searchable(false)->orderable(false),


            Column::make('rut')->name('paciente.run')->data('paciente.run')
                ->visible(false),

            Column::make('antimicrobiano')->searchable(false)->orderable(false),
            Column::make('microorganismo')->searchable(false)->orderable(false),
            Column::make('fecha_ingreso')->data('created_at')->name('created_at')->visible(false),
            Column::make('fecha_solicitud')->data('fecha_solicita')->name('fecha_solicita'),

            Column::make('fecha_fin_tratamiento')->data('fecha_fin_tratamiento')->name('fecha_fin_tratamiento'),
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
