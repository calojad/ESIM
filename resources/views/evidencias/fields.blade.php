<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class'=>'form-control','required'=>true]) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['style'=>'width:100%','rows'=>3]) !!}
    </div>

    <!-- Importancia Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Importante:
            {!! Form::checkbox('importancia',1,true,['id'=>'chkImport']) !!}
        </label>
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Estado:</label>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <label class="text-success">
                {!! Form::radio('estado',1,true,['id'=>'radActivo']) !!} Activo
            </label>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <label class="text-danger">
                {!! Form::radio('estado',0,null,['id'=>'radInactivo']) !!} Inactivo
            </label>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
        <a href="{!! route('evidencias.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#radActivo,#chkImport').iCheck({
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