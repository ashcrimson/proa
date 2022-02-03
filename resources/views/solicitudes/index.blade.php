@extends('layouts.app')

@section('title_page',__('Solicitudes'))

@section('content')

<style>
    .table-sm td, .table-sm th {
    padding: 0;
    font-size: 0.8rem;
    }
    table.dataTable thead>tr>td.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc {
        padding: 0;
        }
    .table td, .table th {
    border-top: 1px solid #dee2e6;
    padding: 0rem !important;
    font-size: 0.8rem;
    }
    .btn-group-sm>.btn, .btn-sm {
    border-radius: 0.2rem;
    font-size: .60rem;
}

</style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Solicitudes</h1>
                </div>
                @can('Crear Solicitudes')
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-success"
                               href="{!! route('solicitudes.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">Nueva</span>
                            </a>
                        </li>
                    </ol>
                </div>
                @endcan
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            <div class="card card-outline card-success">
                <div class="card-header py-0 px-2">
                    <h3 class="card-title">Filtros</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('solicitudes.form_filters')
                </div>
                <!-- /.card-body -->
            </div>


            <div class="clearfix"></div>
            <div class="card card-primary">
                <div class="card-body">
                    @include('solicitudes.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

