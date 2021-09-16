@extends('layouts.app')

@section('title_page',__('Ingreso pacientes'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingreso pacientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-success"
                                href="{!! route('remas.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('Nuevo Ingreso')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">


            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title py-1">Filtrar por fecha de ingreso</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('remas.form_filters')
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-primary">
                <div class="card-body">
                    @include('remas.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

