<div class="col-md-12">
    <div class="col-md-6">
        <!-- Nombre Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','required'=>true]) !!}
        </div>
        <!-- Rol Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('rol', 'Rol:') !!}
            {!! Form::text('rol', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Descripcion Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('descripcion', 'Descripcion:') !!}
            {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => 2]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <!-- Telefono Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('telefono', 'Telefono:') !!}
            {!! Form::text('telefono', null, ['class' => 'form-control','required'=>true]) !!}
        </div>
        <!-- Gmail Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('gmail', 'Gmail:') !!}
            {!! Form::email('gmail', null, ['class' => 'form-control','required'=>true]) !!}
        </div>
        <!-- Email Institu Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('email_institu', 'Email Institu:') !!}
            {!! Form::text('email_institu', null, ['class' => 'form-control','required'=>true]) !!}
        </div>
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck" style="left: 20%">
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
    <div class="form-group col-md-12">
        <a href="{!! route('responsables.index') !!}" class="btn btn-default btnLoader">Cancel</a>
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
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