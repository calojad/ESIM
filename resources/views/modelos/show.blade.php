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
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
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
                <div id="divEstructura" class="col-md-12" style="background-color: #cccccc;height: 70vh;">
                    <div class="col-md-12" style="margin-top: 10px">
                        <div id="default-tree"></div>
                    </div>
                </div>
            </div>
            <div class="overlay"><i class="fa fa-sync-alt fa-spin"></i></div>
        </div>
    </div>
    @include('estructura.modal_criterios')
    @include('estructura.modal_subcriterio')
    @include('estructura.modal_indicador')
    <script type="text/javascript">
        var myTree;
        $(document).ready(function () {
            $('#divEstructura').slimScroll({
                height: 'auto',
                width: '100%'
            });
            $('#default-tree').treeview({
                data: myTree
            });
            $('.overlay').hide();
        });
    </script>
@endsection