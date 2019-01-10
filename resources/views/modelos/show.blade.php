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
                <input id="unidadId" type="hidden" value="">
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
                <a class="btn btn-primary pull-right" href="">Agregar</a>
            </div>
        </div>
        <h3 class="box-title">Criterios y Subcriterios</h3>
        @if(count($estruCriterios) != 0)
            {{--@foreach ($userPeriodos as $periodo)
                <div class="box box-warning collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Periodo: {{ $periodo->periodo->nombre }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="col-md-12">
                            <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable">
                                <thead>
                                <tr>
                                    <th>Carrera</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userAsignaciones as $ua)
                                    @if($ua->periodo_id == $periodo->periodo_id)
                                        <tr>
                                            <td>{{ $ua->carrera->nombre }}</td>
                                            {!! Form::open(['route' => ['usuarioasignacion.destroy', $ua->id], 'method' => 'delete']) !!}
                                            <td>{!! Form::button('<i class="glyphicon glyphicon-erase"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')",'title'=>'Quitar Carrera']) !!}</td>
                                            {!! Form::close() !!}
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach--}}
        @else
            <div class="box">
                <div class="box box-header" align="center">
                    <h3 class="text-muted">No hay datos</h3>
                </div>
            </div>
        @endif
    </div>
@endsection
