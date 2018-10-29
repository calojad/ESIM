@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Valoracion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($valoracion, ['route' => ['valoracions.update', $valoracion->id], 'method' => 'patch']) !!}

                        @include('valoracions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection