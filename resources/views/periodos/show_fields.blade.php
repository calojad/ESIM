<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $periodo->id !!}</p>
</div>

<!-- Tipo Periodo Id Field -->
<div class="form-group">
    {!! Form::label('tipo_periodo_id', 'Tipo Periodo Id:') !!}
    <p>{!! $periodo->tipo_periodo_id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $periodo->nombre !!}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    <p>{!! $periodo->fecha_inicio !!}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    <p>{!! $periodo->fecha_fin !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $periodo->estado !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $periodo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $periodo->updated_at !!}</p>
</div>

