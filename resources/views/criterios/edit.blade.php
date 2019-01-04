@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Criterio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($criterio, ['route' => ['criterios.update', $criterio->id], 'method' => 'patch']) !!}

                        @include('criterios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection