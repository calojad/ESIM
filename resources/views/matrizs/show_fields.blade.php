<div class="col-md-4">
    <!-- Nombre Field -->
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre:') !!}
        <p>{!! $matriz->nombre !!}</p>
    </div>
</div>
<div class="col-md-4">
    <!-- Modelo Id Field -->
    <div class="form-group">
        {!! Form::label('modelo_id', 'Modelo:') !!}
        <p>{!! $matriz->modelo->nombre !!}</p>
    </div>
</div>
<div class="col-md-4">
    <!-- Tipo Matriz Id Field -->
    <div class="form-group">
        {!! Form::label('tipo_matriz_id', 'Tipo Matriz:') !!}
        <p>{!! $matriz->tipoMatriz->nombre !!}</p>
    </div>
</div>