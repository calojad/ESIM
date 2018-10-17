<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Email Reset- {{config('app.name','Laravel')}}</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('/boostrap-3.3.7/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('/adminLTE-2.4.3/bower_components/font-awesome/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('/adminLTE-2.4.3/bower_components/Ionicons/css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('/adminLTE-2.4.3/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('/adminLTE-2.4.3/dist/css/skins/_all-skins.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('/plugins/iCheck/square/_all.css') !!}
    {!! Html::style('/adminLTE-2.4.3/bower_components/select2/dist/css/select2.min.css') !!}

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

    <!-- /.login-logo -->
    <div class="login-box-body" style="border-radius: 20px">
        <p class="login-box-msg">Email para restaurar su password.</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-btn fa-envelope"></i> Enviar Link
                    </button>
                </div>
            </div>

        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
{!! Html::script('plugins/jquery/jquery-3.3.1.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('boostrap-3.3.7/js/bootstrap.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('adminLTE-2.4.3/dist/js/adminlte.min.js') !!}
<!-- iCheck -->
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
<script>
    $(window).on('load',function() {
        $(".preloader").fadeOut("slow");;
    });
</script>
</body>
</html>
