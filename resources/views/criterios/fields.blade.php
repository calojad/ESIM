<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nivel Field (Criterio o Subcriterios) -->
    <div class="form-group col-sm-12">
        {!! Form::label('nivel', 'Nivel:') !!}
        {!! Form::number('nivel', null, ['class' => 'form-control',]) !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required' => true,'autofocus' => true]) !!}
    </div>

    <!-- Abreviado Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('abreviado', 'Abreviación:') !!}
        {!! Form::text('abreviado', null, ['class' => 'form-control','required' => true,'autofocus' => true]) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Criterio Padre Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('criterio_padre_id', 'Criterio Padre Id:') !!}
        {!! Form::number('criterio_padre_id', null, ['class' => 'form-control']) !!}
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
        <a href="{!! route('criterios.index') !!}" class="btn btn-default">Cancel</a>
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