<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $evidencia->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $evidencia->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $evidencia->descripcion !!}</p>
</div>

<!-- Importancia Field -->
<div class="form-group">
    {!! Form::label('importancia', 'Importancia:') !!}
    <p>{!! $evidencia->importancia !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $evidencia->estado !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $evidencia->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $evidencia->updated_at !!}</p>
</div>

