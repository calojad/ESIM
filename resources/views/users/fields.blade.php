<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Username Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('username', 'Nombre de Usuario:') !!}
        {!! Form::text('username', null, ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control','required' => true]) !!}
    </div>

    <!-- Rol Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('rol', 'Rol:') !!}
        {!! Form::select('rol', [1=>'Administrador',2=>'Usuario'], $user!=null?$user->rol:1,['class' => 'form-control', 'required' => true]) !!}
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Estado:</label>
        <div class="col-md-12 col-md-offset-2">
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
    </div>
    @if($a == 'E')
    <div class="col-md-12">
        <hr>
        <h4>Cambiar Contraseña</h4>  
    </div>
    @endif
    <!-- Password Field -->
    <div class="form-group col-sm-12 {{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control','required' => $a=='C'?true:false]) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- Confirm Password Field -->
    <div class="form-group col-sm-12 {{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', 'Confirmar:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control','required' => $a=='C'?true:false]) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default btnLoader">Cancel</a>
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