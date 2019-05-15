<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">

    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::textarea('nombre', null, ['style'=>'width:100%','required'=>true,'rows'=>2]) !!}
    </div>

    <div class="col-md-12">
        <!-- Importancia Field -->
        <div class="form-group col-sm-6 col-md-6 icheck">
            <label class="col-sm-12 col-md-12 col-lg-12">Importante:
                {!! Form::checkbox('importancia',1,true,['id'=>'chkImport']) !!}
            </label>
        </div>

        <!-- Duplicar Field -->
        <div class="form-group col-sm-6 col-md-6 icheck">
            <label class="col-sm-12 col-md-12 col-lg-12">Duplicar:
                {!! Form::checkbox('duplicar',1,null,['id'=>'chkDuplica']) !!}
            </label>
        </div>
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
        <a href="{!! route('elementos.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#radActivo,#chkImport,#chkDuplica').iCheck({
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