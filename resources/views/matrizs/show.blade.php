@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Matriz</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Matriz</li>
        <li>{{$matriz->nombre}}</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">MATRIZ</h3></div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 col-lg-offset-1">
                        @include('matrizs.show_fields')
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{!! route('matrizs.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable">
                            <thead>
                                <tr>
                                    <th>Criterio</th>
                                    <th>Indicador</th>
                                    <th>Evidencia</th>
                                    <th>Elemento</th>
                                    <th>Valoración</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
