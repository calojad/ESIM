<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nivel Field (Criterio o Subcriterios) -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Nivel:</label>
        <div class="col-sm-12 col-md-5 col-lg-4">
            <label>
                {!! Form::radio('nivel',1,true,['class' => 'radNivel','id'=>'radCriterios']) !!} Criterio
            </label>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-4">
            <label>
                {!! Form::radio('nivel',2,null,['class' => 'radNivel','id'=>'radSubcriterios']) !!} Subcriterio
            </label>
        </div>
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
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows'=>'2']) !!}
    </div>

    <!-- Criterio Padre Id Field -->
    <div id="divCriterioPadre" class="form-group col-sm-12" style="display: none;">
        {!! Form::label('criterio_padre_id', 'Criterio Padre:') !!}
        {{--{!! Form::number('criterio_padre_id', null, ['class' => 'form-control']) !!}--}}
        {!! Form::select('criterio_padre_id', $criterios,null, ['class' => 'form-control']) !!}
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
        <a href="{!! route('criterios.index') !!}" class="btn btn-default btnLoader">Cancel</a>
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
        $('.radNivel').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%'
        });
    });
    $(document).ready(function () {
        $('#radSubcriterios').on('ifChecked', function(event){
            $('#divCriterioPadre').show();
        });
        $('#radCriterios').on('ifChecked', function(event){
            $('#divCriterioPadre').hide();
        });
    })
</script>