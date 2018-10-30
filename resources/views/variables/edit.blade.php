@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Variables
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($variables, ['route' => ['variables.update', $variables->id], 'method' => 'patch']) !!}

                        @include('variables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection