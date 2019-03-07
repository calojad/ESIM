<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Registrarce | {{config('app.name', 'Laravel')}}</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('/boostrap-3.3.7/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('/adminLTE-2.4.5/bower_components/font-awesome-5.3.1/css/all.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('/adminLTE-2.4.5/bower_components/Ionicons/css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('/adminLTE-2.4.5/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('/adminLTE-2.4.5/dist/css/skins/_all-skins.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('/plugins/iCheck/square/_all.css') !!}
    {!! Html::style('/adminLTE-2.4.5/bower_components/select2/dist/css/select2.min.css') !!}

    {!! Html::style('css/style.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div id="preloader" class='preloader'><div class='loaded'>&nbsp;</div></div>
<div class="register-box">
    <div class="register-logo register-page">
        <a href="{{ url('/') }}">{{config('app.name','Laravel')}}</a>
    </div>
    <div class="register-box-body" style="border-radius: 20px">
        <p class="login-box-msg">Registrarce</p>
        <form method="post" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required>
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input id="chbTerminos" type="checkbox" required> Acepto los <a href="#">terminos</a>
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button id="btnRegistre" type="submit" class="btn btn-primary btn-block btn-flat btnLoader">Registrar</button>
                </div>
            </div>
        </form>
        <a href="{{ url('/login') }}" class="text-center">Ya estoy registrado</a>
    </div>
</div>

<!-- jQuery 3.1.1 -->
{!! Html::script('plugins/jquery/jquery-3.3.1.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('boostrap-3.3.7/js/bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('adminLTE-2.4.3/dist/js/adminlte.min.js') !!}
<!-- iCheck -->
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    $(window).on('load',function() {
        $(".preloader").fadeOut("slow");
    });
    $(document).ready(function () {
        $('input[name=name]').focus();
    });
</script>
</body>
</html>