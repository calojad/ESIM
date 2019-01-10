<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required' => true,'autofocus' => true]) !!}
    </div>

    <!-- Abreviado Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('abreviado', 'Abreviación:') !!}
        {!! Form::text('abreviado', null, ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','required' => true,'rows'=>3,'maxlength'=>255,'id'=>'txaDescrip']) !!}
        <span class="text-muted pull-right" id="contador"></span>
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
        <a href="{!! route('modelos.index') !!}" class="btn btn-default btnLoader">Cancel</a>
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
    //Contar numero de caracteres del textarea
    function contTextarea(txarea,count){
        var chars = txarea.val().length;
        var diff = 255 - chars;
        count.html(diff+'/255');
    }
</script>