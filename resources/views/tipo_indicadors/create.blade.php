@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Tipo Indicador</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Tipo Indicador</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Tipo Indicador</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tipoIndicadors.store']) !!}
                        @include('tipo_indicadors.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
