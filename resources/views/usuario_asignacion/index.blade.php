@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Usuarios Evaluadores</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Usuarios Evaluadores</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-header"><h3 class="box-title">Evaluadores</h3></div>
            <div class="box-body">
                <div class="col-md-12 table-responsive">
                    @include('usuario_asignacion.table')
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection