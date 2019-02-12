@extends('layouts.app')
@section('content-header')
    <h1>{{config('app.name','EVAL')}}
        <small>Carreras</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Carreras</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Carrera</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::model($carrera, ['route' => ['carreras.update', $carrera->id], 'method' => 'patch']) !!}
                    @include('carreras.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection