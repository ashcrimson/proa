@extends('layouts.app')

@section('title_page',__('Edit Solicitud'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>{{ $solicitud->esTemporal() ? "Nueva" : "Editar"  }} Solicitud</h1>
                </div>
                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('solicitudes.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('List')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">


            @include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">

                   {!! Form::model($solicitud, ['route' => ['solicitudes.update', $solicitud->id], 'method' => 'patch','id' => 'form-solicitud']) !!}
                        <div class="form-row">


                            @include('solicitudes.fields')

                            <div class="col-4 text-left pl-4 text-lg">
                                Estado:
                                <span class="badge badge-info">
                                    {{$solicitud->estado->nombre}}
                                </span>
                            </div>

                            <!-- Submit Field -->
                                <div class="form-group col-sm-4 text-right ">

                                    <a href="{!! route('solicitudes.index') !!}" class="btn btn-outline-secondary mr-3">
                                        Cancelar
                                    </a>
                                    &nbsp;
                                    <button type="submit" class="btn btn-outline-success mr-3">
                                        <i class="fa fa-save"></i> Guardar
                                    </button>

                                </div>

                            @if($solicitud->puedeRegresar())


                                <div class="form-group col-sm-4 text-right ">

                                    <div class="input-group mb-3">
{{--                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">--}}
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary mr-3" name="regresar" value="1">
                                                <i class="fa fa-paper-plane"></i> Guardar Y Corregir
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else

                                <div class="form-group col-sm-4 text-right ">

                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-primary mr-3" id="btnEnviar" name="enviar" value="1">
                                            <i class="fa fa-paper-plane"></i> Guardar Y Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(function () {
        $("#password").keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $("#btnEnviar").focus().click();
                return;
            }
        });
    })
</script>
@endpush



