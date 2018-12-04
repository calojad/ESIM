@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Formula Variable
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formulaVariable, ['route' => ['formulaVariables.update', $formulaVariable->id], 'method' => 'patch']) !!}

                        @include('formula_variables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection