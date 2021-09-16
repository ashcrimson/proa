@extends('layouts.app')

@section('title_page',__('Rema'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Rema')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card-body" >
            @include('remas.show_fields')
            <a href="{{ route('remas.index') }}" class="btn btn-default" style="margin-left: 10px;">
            {{__('Back')}}
            </a>
        </div>

    </div>
@endsection
