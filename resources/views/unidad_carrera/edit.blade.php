@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Unidad Carrera</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Unidad Carrera</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Unidad</h3></div>
            <div class="box-body">
                <input id="unidadId" type="hidden" value="{{ $unidad->id }}">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{ $unidad->nombre }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Tipo de Unidad:</dt>
                            <dd>{{ $unidad->tipoUnidad->nombre }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Ubicación:</dt>
                            <dd>{{ $unidad->ubicacion->nombre }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Carreras</h3>
                <a class="btn btn-primary pull-right" href="" data-toggle="modal" data-target="#modalAgregarCarrera">Agregar</a>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblUnidadCarreras">
                        <thead>
                        <tr>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($u_carreras as $uc)
                        <tr>
                            <td>{{ $uc->carrera->nombre }}</td>
                            {!! Form::open(['route' => ['unidadcarrera.destroy', $uc->id], 'method' => 'delete']) !!}
                            <td>{!! Form::button('<i class="glyphicon glyphicon-erase"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')",'title'=>'Quitar Carrera']) !!}</td>
                            {!! Form::close() !!}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('unidad_carrera.modal_agregar')
@endsection