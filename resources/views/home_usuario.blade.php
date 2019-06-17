@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Home</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Matrices</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <ul class="products-list product-list-in-box">
                        @foreach($matrices as $matriz)
                        <li class="item">

                            <div class="product-img">
                                <a href="{{URL::to('/evaluar/matriz').'/'.$matriz->id}}"><img src="{{asset('images/Iconos/tablematriz.png')}}" alt="Matriz"></a>
                            </div>

                            <div class="product-info">
                                <a href="{{URL::to('/evaluar/matriz').'/'.$matriz->id}}" class="product-title">{{$matriz->nombre}}
                                    <span class="label label-warning pull-right">0</span></a>

                                <span class="product-description">
                                    @if ($matriz->carrera['nombre'] != null)
                                        {{$matriz->carrera->nombre}}<br>
                                    @else
                                        {{$matriz->tipoMatriz->nombre}}<br>
                                    @endif
                                    {{$matriz->periodo->tipoPeriodo->nombre .' - '. $matriz->periodo->nombre}}<br>
                                </span>

                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="box-footer">

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Asignaciones</h3>
            </div>
            <div class="box-body">
                <h4>Carreras</h4>
                @if(count($asignacionesCarreras) > 0)
                    <ol>
                        @foreach($asignacionesCarreras as $asign)
                            <li>{{$asign->carrera->nombre}}</li>
                        @endforeach
                    </ol>
                @else
                    <div class="col-md-12 bg-gray-light" align="center">
                        <span class="text-muted">No hay datos</span>
                    </div>
                @endif
                <br><hr>
                <h4>Departamentos</h4>
                @if(count($asignacionesDeparts) > 0)
                    <ol>
                        @foreach($asignacionesDeparts as $asign)
                            <li>{{$asign->departamento->nombre}}</li>
                        @endforeach
                    </ol>
                @else
                    <div class="col-md-12 bg-gray-light" align="center">
                        <span class="text-muted">No hay datos</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection