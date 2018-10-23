<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Tipo Periodo Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('tipo_periodo_id', 'Tipo Periodo:') !!}
        {!! Form::select('tipo_periodo_id', $tipoPeriodos, $periodo!=null?$periodo->tipo_periodo_id:1,['class' => 'form-control', 'required' => true]) !!}
    </div>

    <!-- Fecha Inicio Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
        {!! Form::date('fecha_inicio', $periodo!=null?$periodo->fecha_inicio:'', ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Fecha Fin Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
        {!! Form::date('fecha_fin', $periodo!=null?$periodo->fecha_fin:'', ['class' => 'form-control','required' => true]) !!}
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
        <a href="{!! route('periodos.index') !!}" class="btn btn-default btnLoader">Cancel</a>
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