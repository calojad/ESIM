@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Asignar Carrera</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Evaluador</li>
        <li>Asignar</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">{{ $user->name }}</h3></div>
            <div class="box-body">
                <input id="unidadId" type="hidden" value="{{ $user->id }}">
                <div class="col-md-12">
                    
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btnLoader" href="{{ route('usuarioasignacion.show',$user->id) }}">Regresar</a>
            </div>
        </div>
    </div>
@endsection