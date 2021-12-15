@extends('layouts.app')

@section('title_page',__('Solicitudes'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Solicitudes Enfermería</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            <div class="card card-outline card-success">
                <div class="card-header py-0 px-2">
                    <h3 class="card-title">filtros</h3>

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
                    @include('solicitudes.enfermeria.form_filters')
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

