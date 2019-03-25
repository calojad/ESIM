<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Login - {{config('app.name','Laravel')}}</title>
    <link rel="icon" href="{{asset('images/Logo/indice.png')}}">

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

    {!! Html::style('css/style.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div id="preloader" class='preloader'><div class='loaded'>&nbsp;</div></div>
<div class="login-box">
    <div class="login-logo login-page">
        <a href="{{ url('/') }}">{{config('app.name','Laravel')}}</a>
    </div>
    <div class="login-box-body"  style="border-radius: 20px">
        <p class="login-box-msg">Iniciar Sesión</p>
        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button id="btnLogin" type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                </div>
            </div>
        </form>
        <a href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a><br>
        {{--<a href="{{ url('/register') }}" class="text-center">Registrarce</a>--}}
    </div>
</div>

<!-- jQuery 3.1.1 -->
{!! Html::script('plugins/jquery/jquery-3.3.1.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('boostrap-3.3.7/js/bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('adminLTE-2.4.5/dist/js/adminlte.min.js') !!}
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
    $('#btnLogin').on('click',function () {
        $(".preloader").fadeIn("slow");
    });
    $(document).ready(function () {
        $('input[name=username]').focus();
    });
</script>
</body>
</html>