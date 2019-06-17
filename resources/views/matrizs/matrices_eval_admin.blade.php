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
                                    @if ($matriz->tipo_matriz_id == 1)
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
@endsection