@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Grupos de Valor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Grupo Valor</li>
        <li>Valores</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Grupo Valor</h3></div>
            <div class="box-body">
                <div class="row">
                    @include('grupo_valors.show_fields')
                </div>
            </div>
            <div class="box-footer">
                <a href="{!! route('grupoValors.index') !!}" class="btn btn-default">Regresar</a>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Valoraciones</h3>
                <a class="btn btn-primary pull-right" href="{!! route('valoracions.valoracioncrear',$grupoValor->id) !!}">Agregar</a>
            </div>
            <div class="box-body">
                <div class="col-md-12 table-responsive">
                    @include('valoracions.table')
                </div>
            </div>
        </div>
    </div>
@endsection
