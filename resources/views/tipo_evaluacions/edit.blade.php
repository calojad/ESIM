@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Tipo Evaluación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Tipo Evaluación</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Tipo Evaluación</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::model($tipoEvaluacion, ['route' => ['tipoEvaluacions.update', $tipoEvaluacion->id], 'method' => 'patch']) !!}
                    @include('tipo_evaluacions.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection