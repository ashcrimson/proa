@extends('layouts.app')

@section('title_page',__('Solicitudes'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Solicitudes')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card-body" >
            @include('solicitudes.show_fields')

        </div>

    </div>



    <div class="card-body">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Cultivos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach($solicitud->cultivos as $cult)
                    <tr>

                        <td>{{$cult->nombre}}</td><br>

                    </tr>
                    @endforeach

                </div>
                <!-- /.card-body -->

            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Diagnosticos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach($solicitud->diagnosticos as $diag)
                    <tr>

                        <td>{{$diag->nombre}}</td><br>

                    </tr>
                    @endforeach

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                    @foreach($solicitud->medicamentos as $detalle)
                    <tr>

                        <td>{{$detalle->medicamento->nombre}}</td><br>

                    </tr>
                    @endforeach

                </div>

            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Medicamentos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->

                <!-- /.card-body -->



                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm ">
                            <thead>
                            <tr>
                                <th>Nombre Medicamento</th>
                                <th>Dosis</th>
                                <th>Frecuencia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($solicitud->medicamentos as $detalle)
                                <tr>
                                    <td>{{$detalle->medicamento->nombre}}</td>
                                    <td>{{$detalle->dosis}}</td>
                                    <td>{{$detalle->frecuencia}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <a href="{{ route('solicitudes.index') }}" class="btn btn-default" style="margin-left: 10px;">
                {{__('Back')}}
            </a>
        </div>
    </div>








@endsection
