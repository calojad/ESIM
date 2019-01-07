@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Modelos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Modelos</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Modelo</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'modelos.store']) !!}
                        @include('modelos.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
