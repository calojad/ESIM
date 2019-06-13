@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Evaluación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Matriz Evaluar</li>

    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Matrices</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="box-tools">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li><a href="javascript:void(0);">4</a></li>
                            <li><a href="javascript:void(0);">5</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection