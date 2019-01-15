{{--MUESTRA LA ESTRUCTURA DEL MODELO
** CRITERIOS
** SUBCRITERIOS
--}}
@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Estructura</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Modelo</li>
        <li>Estructura</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Modelo</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{$modelo->nombre}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Abreviación:</dt>
                            <dd>{{$modelo->abreviado}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Descripción:</dt>
                            <dd>{{$modelo->descripcion}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btnLoader" href="{!! route('modelos.index') !!}">Regresar</a>
            </div>
        </div>
        <h3 class="box-title">Criterios y Subcriterios</h3>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Modelo: {{$modelo->descripcion}}</h3>
                <a class="btn btn-primary pull-right" href="">Guardar</a>
            </div>
            <div class="box-body">
                <div id="divEstructura" class="col-md-12" style="background-color: #cccccc;height: 70vh;margin-top: 10px;">
                    <div class="col-md-12" style="margin-top: 10px">
                        @foreach($estruCriterios as $criterio1)
                            <div class="box box-info collapsed-box">
                                <div class="box-header with-border">
                                    <a class="text-navy" href="" data-widget="collapse"><h3 class="box-title">{{ $criterio1->criterio->abreviado }} - {{ $criterio1->criterio->nombre }}</h3></a>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body" style="display: none;">
                                    <div class="col-md-12" style="margin-top: 10px">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-default" style="margin: 10px 0px" title="Agregar un Subcriterio" data-toggle="modal" data-target="#modalAgregarSubcriterio"><i class="fa fa-plus-circle text-info"></i> Agregar Subcriterio</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-default" style="margin: 10px 0px" title="Agregar un Indicador" data-toggle="modal" data-target="#modalAgregarIndicador"><i class="fa fa-plus-circle text-warning"></i> Agregar Indicador</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-block btn-default" style="margin: 10px 0px" title="Agregar un Criterio" data-toggle="modal" data-target="#modalAgregarCriterio"><i class="fa fa-plus-circle fa-2x"></i></button>
                </div>
            </div>
            <div class="box-footer">

            </div>
        </div>
    </div>
    @include('estructura.modal_criterios')
    @include('estructura.modal_subcriterio')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#divEstructura').slimScroll({
                height: 'auto',
                width: '100%'
            });
        });
    </script>
@endsection