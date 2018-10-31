@section('scripts')
|   {!! Html::script('/adminLTE-2.4.5/bower_components/ckeditor/ckeditor.js') !!}
|   {!! Html::script('/adminLTE-2.4.5/bower_components/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js') !!}
@endsection
<div class="col-md-5 col-sm-4 col-md-offset-3 col-sm-offset-0">
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

    <!-- Formula Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('formula', 'Formula:') !!}
        {!! Form::textarea('formula', null, ['class' => 'form-control textarea','id' => 'formula']) !!}
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
        <a href="{!! URL::to('cuantitativos/F') !!}" class="btn btn-default">Cancel</a>
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
        CKEDITOR.replace( 'formula' );
    });
</script>