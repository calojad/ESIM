@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Formulas Variables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Formulas Variables</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Formula</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{ $formula->nombre }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Formula:</dt>
                            <dd style="font-size: 22pt">{!! $formula->formula !!}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Abrebiatura:</dt>
                            <dd>{{ $formula->abreviatura }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary pull-right" type="submit">Guardar</button>
            </div>
        </div>

        <div class="box box-warning box-solid">
            <div class="box-header"><h3 class="box-title">Variables</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <a class="btn btn-success pull-right" href="">Agegar</a>
                </div>
                <hr>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
