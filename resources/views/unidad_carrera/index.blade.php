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
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-12">
                    <a class="btn btn-primary pull-right" href="{!! route('unidads.create') !!}">Add New</a>
                </div>
                <div class="col-md-12 table-responsive">
                    @include('unidads.table')
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
