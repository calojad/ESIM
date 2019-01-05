<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Abreviado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abreviado', 'Abreviado:') !!}
    {!! Form::text('abreviado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel', 'Nivel:') !!}
    {!! Form::number('nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Criterio Padre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criterio_padre_id', 'Criterio Padre Id:') !!}
    {!! Form::number('criterio_padre_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::number('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('criterios.index') !!}" class="btn btn-default">Cancel</a>
</div>
