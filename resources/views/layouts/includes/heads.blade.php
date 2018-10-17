<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<title>{{config('app.name','Laravel')}} | {{ Request::path()=='/'?'Home':Request::path() }}</title>
<link rel="icon" href="{{asset('images/Logo/índice.png')}}">
<!-- Bootstrap 3.3.7 -->
{!! Html::style('/boostrap-3.3.7/css/bootstrap.min.css') !!}
<!-- Font Awesome -->
{!! Html::style('/adminLTE-2.4.5/bower_components/font-awesome-5.3.1/css/all.min.css') !!}
<!-- Theme style -->
{!! Html::style('/adminLTE-2.4.5/dist/css/AdminLTE.min.css') !!}
{!! Html::style('/adminLTE-2.4.5/dist/css/skins/_all-skins.min.css') !!}
<!-- iCheck -->
{!! Html::style('/plugins/iCheck/square/_all.css') !!}
<!-- Select2 -->
{!! Html::style('/adminLTE-2.4.5/bower_components/select2/dist/css/select2.min.css') !!}
<!-- DataTables -->
{!! Html::style('/adminLTE-2.4.5/bower_components/datatables/css/dataTables.bootstrap.min.css') !!}
<!-- jQuery-Alerts -->
{!! Html::style('plugins/jquery_alerts/jquery-confirm.min.css') !!}
<!-- Estilos -->
{!! Html::style('css/style.css') !!}
<!-- jQuery 3.1.1 -->
{!! Html::script('plugins/jquery/jquery-3.3.1.min.js') !!}