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

                   {!! Form::model($solicitud, ['route' => ['solicitudes.update', $solicitud->id], 'method' => 'patch','class' => 'wait-on-submit']) !!}
                        <div class="form-row">

                            @include('solicitudes.fields')

                            <!-- Submit Field -->
                            <div class="form-group col-sm-10 text-right pt-4">

                                <a href="{!! route('solicitudes.index') !!}" class="btn btn-outline-secondary mr-3">
                                    Cancelar
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-outline-success mr-3">
                                    <i class="fa fa-save"></i> Guardar
                                </button>

                                <button type="submit" class="btn btn-outline-primary mr-3" name="enviar" value="1">
                                    <i class="fa fa-send-o"></i> Guardar Y Enviar
                                </button>


                            </div>


                            <div class="form-group col-sm-2">
                                {!! Form::label('contrasena', 'Contraseña:') !!}
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
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
        $("#ojt").select2({
            placeholder: 'Seleccione uno...',
            language: "es",
            maximumSelectionLength: 1,
            allowClear: true
        });
    })
</script>
@endpush

