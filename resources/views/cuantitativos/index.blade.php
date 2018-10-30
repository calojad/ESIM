@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Variables y Formulas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Variables y Formulas</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        {{--  <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>--}}
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Variables</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Formulas</a></li>
                </ul>
                <div class="tab-content">
                    <!-- TAB DE VARIABLES -->
                    <div class="tab-pane active" id="tab_1">
                        @include('variables.index')
                    </div>
                    <!-- TAB DE FORMULAS -->
                    <div class="tab-pane" id="tab_2">
                        @include('formulas.index')
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection