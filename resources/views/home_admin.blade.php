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
            <h3 class="box-title">Blank Box</h3>
        </div>
        <div class="box-body">
            The great content goes here
        </div>
        <div class="box-footer">

        </div>
    </div>
@endsection