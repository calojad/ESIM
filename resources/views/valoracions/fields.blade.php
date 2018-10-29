<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Grupo Valor Id Field -->
    {!! Form::hidden('grupo_valor_id', $id) !!}

    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Abreviatura Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('abreviatura', 'Abreviatura:') !!}
        {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Valor Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::number('valor', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Rango Inicio Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rango_inicio', 'Rango Inicio:') !!}
        {!! Form::number('rango_inicio', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Rango Fin Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rango_fin', 'Rango Fin:') !!}
        {!! Form::number('rango_fin', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Color Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('color', 'Color:') !!}
        {!! Form::text('color', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Estado:</label>
        <div class="col-sm-12 col-md-5 col-lg-4">
            <label class="text-success">
                {!! Form::radio('estado',1,true,['id'=>'radActivo']) !!} Activo
            </label>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-4">
            <label class="text-danger">
                {!! Form::radio('estado',0,null,['id'=>'radInactivo']) !!} Inactivo
            </label>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('grupoValors.show',$id) !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(function () {
        $('#radActivo').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-green',
            increaseArea: '20%'
        });
        $('#radInactivo').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-red',
            increaseArea: '20%'
        });
    });
</script>