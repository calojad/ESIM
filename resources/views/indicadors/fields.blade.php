<!-- Tipo Indicador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_indicador_id', 'Tipo Indicador Id:') !!}
    {!! Form::number('tipo_indicador_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grupo Valor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo_valor_id', 'Grupo Valor Id:') !!}
    {!! Form::number('grupo_valor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Formula Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formula_id', 'Formula Id:') !!}
    {!! Form::number('formula_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estandar Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('estandar', 'Estandar:') !!}
    {!! Form::textarea('estandar', null, ['class' => 'form-control']) !!}
</div>

<!-- Vigencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vigencia', 'Vigencia:') !!}
    {!! Form::text('vigencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Marco Normativo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('marco_normativo', 'Marco Normativo:') !!}
    {!! Form::textarea('marco_normativo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fuente Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('fuente_info', 'Fuente Info:') !!}
    {!! Form::textarea('fuente_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::number('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('indicadors.index') !!}" class="btn btn-default">Cancel</a>
</div>
