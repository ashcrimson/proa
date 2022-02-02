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


                        </div>

                        <div class="form-row" id="botonesGuardarSolicitud">

                            <div class="col-4 text-left pl-4 text-lg">
                                Estado:
                                <span class="badge badge-info">
                                        {{$solicitud->estado->nombre}}
                                    </span>

                                @can('Cerrar Solicitud')
                                    @if($solicitud->puedeCerrar())
                                    <a href="{!! route('solicitudes.cerrar',$solicitud->id) !!}" class="btn btn-outline-danger ml-3">
                                        <i class="fa fa-ban"></i> Cerrar Solicitud
                                    </a>
                                    @endif
                                @endcan
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group col-sm-4 text-right ">

                                <a href="{!! route('solicitudes.index') !!}" class="btn btn-outline-secondary mr-3">
                                    Cancelar
                                </a>
                                &nbsp;
                                @if($solicitud->estado_id!=\App\Models\SolicitudEstado::PARA_REGRESAR)
                                    <!-- <button type="submit" class="btn btn-outline-success mr-3"
                                            :disabled="desabilitar_botones_guardar">
                                        <i class="fa fa-save"></i> Guardar
                                    </button> -->
                                @endif

                            </div>

                            @if($solicitud->puedeRegresar())

                                <div class="form-group col-sm-4 text-right ">

                                    <div class="input-group mb-3">
                                        {{--                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">--}}
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary mr-3" name="regresar" value="1"
                                                    :disabled="desabilitar_botones_guardar">
                                                <i class="fa fa-paper-plane"></i> Guardar Y Corregir
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else

                                <div class="form-group col-sm-4 text-right ">

                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese PIN"
                                               :disabled="desabilitar_botones_guardar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary mr-3" id="btnEnviar" name="enviar" value="1"
                                                    :disabled="desabilitar_botones_guardar">
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

    let vmBotonesGuardarSolicitud = new Vue({
        el: '#botonesGuardarSolicitud',
        name: 'botonesGuardarSolicitud',
        mounted() {
            console.log('Instancia vue montada');
        },
        created() {
            console.log('Instancia vue creada');
        },
        data: {
            desabilitar_botones_guardar: false
        },
        methods: {
            getDatos(){
                console.log('Metodo Get Datos');
            }
        }
    });

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



