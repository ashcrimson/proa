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
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
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
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
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

            </div>
            <a href="{{ route('solicitudes.index') }}" class="btn btn-default" style="margin-left: 10px;">
                {{__('Back')}}
            </a>
        </div>
    </div>

    

   



    
@endsection
