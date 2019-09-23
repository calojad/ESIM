<!DOCTYPE html>
<html>
    <head>
        @include('layouts.includes.heads')
        @yield('css')
    </head>
    <body class="hold-transition skin-red sidebar-collapse sidebar-mini">
        <div id="preloader" class='preloader'><div class='loaded'>&nbsp;</div></div>
        <div class="wrapper">
            <!-- Main Header -->
            @include('layouts.includes.main_header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content-header')
                </section>
                <!-- Main content -->
                <section class="content container-fluid">
                    @yield('content')
                </section>
            </div>
            
            <!-- Main Footer -->
            <footer id="status" class="main-footer footer-gray footer-fixed-bottom">
                <div class="col-md-3 sombra-interna">
                    <a style="cursor: pointer"><i class="fa fa-circle" style="color: #00a65a"></i> Online</a>
                    <span> - {{Auth::user()->username}}</span>
                    <span class="pull-right"> {{Date('d/M/Y')}}</span>
                </div>
                <div class="col-md-4 pull-right sombra-interna" align="center">
                    <span>© ESIM -
                        Powered by:
                        <a href="http://evaluacion.ucacue.edu.ec/" target="_blank">Eval</a> |
                        <a href="http://www.cal-webdes.com" target="_blank">Cal-Webdes</a>
                    </span>
                </div>
            </footer>
        </div>
        <!-- REQUIRED JS SCRIPTS -->
        @include('layouts.includes.scripts')
        <script type="text/javascript">
            //Muestra el overlay
            $(window).on('load',function() {
                $(".preloader").fadeOut("slow");
            });
            //Al dar click en un boton Loader mostrar el overlay
            $('.btnLoader').on('click',function () {
                var sum=0;
                $("form input:required").each(function() {
                    if ($(this).val() === '') {
                        sum = sum + 1;
                    }
                });
                $("form select:required").each(function() {
                    if ($(this).val() === '') {
                        sum = sum + 1;
                    }
                });
                $("form textarea:required").each(function() {
                    if ($(this).val() === '') {
                        sum = sum + 1;
                    }
                });
                if(sum === 0)
                    $(".preloader").fadeIn("slow");
            });
            //Las alertar desaparecen solas
            $('div.alert').not('.alert-important').delay(3000).fadeOut(1000);
            //Inicializar select2
            $('.select2').select2({
                language: {
                    noResults: function() {return "No hay resultado";},
                    searching: function() {return "Buscando...";}
                },
                placeholder:"Seleccionar",
            });
        </script>
        @yield('scripts')
    </body>
</html>