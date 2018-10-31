<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
	<!-- Descripcion Field -->
	<div class="form-group col-sm-12 col-lg-12">
	    {!! Form::label('descripcion', 'Descripcion:') !!}
	    {!! Form::textarea('descripcion', null, ['class' => 'form-control','required' => true, 'rows' => 1]) !!}
	</div>

	<!-- Variable Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('variable', 'Variable:') !!}
	    {!! Form::text('variable', null, ['class' => 'form-control','required' => true,]) !!}
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
	    <a href="{!! URL::to('cuantitativos/V') !!}" class="btn btn-default btnLoader">Cancel</a>
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