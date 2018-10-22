@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Unidades Carreras</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Unidades Carreras</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="col-md-12">
            @foreach ($unidades as $unidad)
            <div class="col-md-4">
                <div class="small-box {{ $classSede[$unidad->tipo_unidad_id] }}" style="overflow: auto;">
                    <div class="inner">
                        <h3>{{ $unidad->nombre }}</h3>
                        <p>{{ $unidad->num_carreras }} Carreras</p>
                    </div>
                    <div class="icon">
                        <i class="fa {{ $iconSede[$unidad->tipo_unidad_id] }}"></i>
                    </div>
                    <a href="{!! route('unidadcarrera.edit',$unidad->id) !!}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
