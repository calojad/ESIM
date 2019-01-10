<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows'=>3,'maxlength'=>255,'id'=>'txaDescrip']) !!}
        <span class="text-muted pull-right" id="contador"></span>
    </div>

    <!-- Importancia Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Importancia:</label>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <label class="text-success">
                {!! Form::radio('importancia',1,null,['id'=>'radImport']) !!} Importante
            </label>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <label class="text-danger">
                {!! Form::radio('importancia',0,true,['id'=>'radNoImport']) !!} No Importante
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
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('evidencias.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        contTextarea($('#txaDescrip'),$('#contador'));
    });
    //TextArea contar caracteres
    $('#txaDescrip').on('keyup',function() {
        contTextarea($(this),$('#contador'));
    });
    $(function () {
        $('#radActivo,#radImport').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-green',
            increaseArea: '20%'
        });
        $('#radInactivo,#radNoImport').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-red',
            increaseArea: '20%'
        });
    });
    //Contar numero de caracteres del textarea
    function contTextarea(txarea,count){
        var chars = txarea.val().length;
        var diff = 255 - chars;
        count.html(diff+'/255');
    }
</script>