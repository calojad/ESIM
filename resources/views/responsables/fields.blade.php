<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required'=>true]) !!}
    </div>

    <!-- Telefono Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control','required'=>true]) !!}
    </div>

    <!-- Gmail Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('gmail', 'Gmail:') !!}
        {!! Form::email('gmail', null, ['class' => 'form-control','required'=>true]) !!}
    </div>

    <!-- Email Institu Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('email_institu', 'Email Institu:') !!}
        {!! Form::text('email_institu', null, ['class' => 'form-control','required'=>true]) !!}
    </div>

    <!-- Rol Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rol', 'Rol:') !!}
        {!! Form::text('rol', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('responsables.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>