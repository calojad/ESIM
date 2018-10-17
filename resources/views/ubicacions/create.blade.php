@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Ubicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Ubicaciones</li>
        <li>Nueva</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Ubicación</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ubicacions.store']) !!}
                        @include('ubicacions.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
