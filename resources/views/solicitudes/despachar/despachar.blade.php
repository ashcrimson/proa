@extends('layouts.app')

@section('title_page',__('Despachar Solicitud'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Despachar Solicitud')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                @include('solicitudes.show_fields')

                <br>
                <div class="row">
                    @include('solicitudes.partials.botones')
                </div>
                <br>
            </div>
            <!-- /.card-body -->
        </div>

    </div>

@endsection
