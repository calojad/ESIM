@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Tipo Unidad</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Tipo Unidad</li>
        <li>Editar</li>
    </ol>
@endsection
@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Tipo Unidad</h3></div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoUnidad, ['route' => ['tipoUnidads.update', $tipoUnidad->id], 'method' => 'patch']) !!}
                        @include('tipo_unidads.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection