@extends('layouts.app')
@section('content-header')
    <h1>{{config('app.name','EVAL')}}
        <small>Departamentos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Departamentos</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Departamento</h3></div>
            <div class="box-body">
                <div class="row">
                    {!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'method' => 'patch']) !!}
                    @include('departamentos.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection