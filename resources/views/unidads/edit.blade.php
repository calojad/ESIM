@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Unidades</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Unidades</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Unidad</h3></div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($unidad, ['route' => ['unidads.update', $unidad->id], 'method' => 'patch']) !!}
                        @include('unidads.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection