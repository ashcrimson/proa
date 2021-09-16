@extends('layouts.app')

@section('title_page',__('Paciente'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Paciente')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        @include('pacientes.show_fields')


                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Drogas</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm ">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre Droga</th>
                                            <th>Ver</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($paciente->preparaciones as $prep)
                                            <tr>
                                                <td>{{$prep->id}}</td>
                                                <td>
                                                    <a href="{{ route('preparacions.show', $prep->id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm' style="font-size: .895rem;">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-default">
                        {{__('Back')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
