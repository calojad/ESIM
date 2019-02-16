<div class="col-md-5 col-sm-4 col-md-offset-3 col-sm-offset-0">
    <!-- Grupo Valor Id Field -->
    {!! Form::hidden('grupo_valor_id', $grupoValor->id) !!}

    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control UpperCase']) !!}
    </div>

    <!-- Abreviatura Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('abreviatura', 'Abreviatura:') !!}
        {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Valor Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::number('valor', null, ['class' => 'form-control','step'=>'any']) !!}
    </div>

    <!-- Rango Inicio Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rango_inicio', 'Rango Inicio:') !!}
        {!! Form::number('rango_inicio', null, ['class' => 'form-control','step'=>'any']) !!}
    </div>

    <!-- Rango Fin Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rango_fin', 'Rango Fin:') !!}
        {!! Form::number('rango_fin', null, ['class' => 'form-control','step'=>'any']) !!}
    </div>

    <!-- Color Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('color', 'Color:') !!}
        <select id="selColores" class="form-control {{ $valoracion!==null?$valoracion->color:'' }}" name="color" required>
            <option value="0">-- Seleccione --</option>
            @foreach ($colorsClass as $colorId => $color)
                <option class="{{ $colorId }}" value="{{ $colorId }}" {{ ($valoracion!==null)?(($valoracion->color==$colorId)?'selected':''):'' }}>{{ $color }}</option>
            @endforeach
        </select>
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
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
        <a href="{!! route('grupoValors.show',$grupoValor->id) !!}" class="btn btn-default btnLoader">Cancel</a>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        var selector = $('#selColores');
        selector.addClass($("#selColores option:selected").val()+' form-control');
    });
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
    $('#selColores').on('change',function(event) {
        $(this).removeClass();
        $(this).addClass($("#selColores option:selected").val()+' form-control');
    });
</script>