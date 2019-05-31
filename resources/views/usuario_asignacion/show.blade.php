@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Asignaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Evaluador</li>
        <li>Asignar</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Usuario Evaluador</h3></div>
            <div class="box-body">
                <input id="unidadId" type="hidden" value="{{ $user->id }}">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{ $user->name }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Username:</dt>
                            <dd>{{ $user->username }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Tipo Usuario:</dt>
                            <dd>{{ $user->rol==1?'Administrador':'Evaluador' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btnLoader" href="{!! route('usuarioasignacion.index') !!}">Regresar</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="box-title col-md-7">Carreras Asignadas</h3>
                <a class="btn btn-primary pull-right" href="{!! route('usuarioasignacion.asignarcarrera', $user->id) !!}">Agregar</a>
            </div>
            <div class="col-md-12">
                @if(count($userAsignacionesCarreras) != 0)
                    @foreach ($userPeriodosCarrera as $periodo)
                        <div class="box box-warning collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Periodo: {{ $periodo->periodo->nombre }}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i></button>
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
                                        @foreach ($userAsignacionesCarreras as $ua)
                                            @if($ua->periodo_id == $periodo->periodo_id)
                                                <tr>
                                                    <td>{{ $ua->carrera->nombre }}</td>
                                                    {!! Form::open(['route' => ['usuarioasignacion.destroy', $ua->id], 'method' => 'delete']) !!}
                                                    <td class="text-center">{!! Form::button('<i class="glyphicon glyphicon-erase"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')",'title'=>'Quitar Carrera']) !!}</td>
                                                    {!! Form::close() !!}
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="box">
                        <div class="box box-header" align="center">
                            <h3 class="text-muted">No hay datos</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="box-title col-md-7">Dependencias Asignadas</h3>
                <a class="btn btn-primary pull-right" href="{!! route('usuarioasignacion.asignardeparta', $user->id) !!}">Agregar</a>
            </div>
            <div class="col-md-12">
                @if(count($userAsignacionesDepartam) != 0)
                    @foreach ($userPeriodosDeparts as $periodo)
                        <div class="box box-warning collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Periodo: {{ $periodo->periodo->nombre }}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i></button>
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
                                        @foreach ($userAsignacionesDepartam as $ua)
                                            @if($ua->periodo_id == $periodo->periodo_id)
                                                <tr>
                                                    <td>{{ $ua->departamento->nombre }}</td>
                                                    {!! Form::open(['route' => ['usuarioasignacion.destroy', $ua->id], 'method' => 'delete']) !!}
                                                    <td class="text-center">{!! Form::button('<i class="glyphicon glyphicon-erase"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')",'title'=>'Quitar Departamento']) !!}</td>
                                                    {!! Form::close() !!}
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="box">
                        <div class="box box-header" align="center">
                            <h3 class="text-muted">No hay datos</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection