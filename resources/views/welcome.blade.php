<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','Laravel')}} | {{  explode('/', strtoupper(Route::current()->uri()))[0]}}</title>
        <link rel="icon" href="{{asset('images/Logo/indice.png')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{Html::style('boostrap-3.3.7/css/bootstrap.min.css')}}
        <style>
            html, body {
                background: url("{{asset('images/boxed-bg.jpg')}}");
                background-size: contain;
                background-color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: white;
            }
            .link-title > a {
                font-size: 84px;
                font-weight: bold;
                color: black;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a {
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div id="preloader" class='preloader'><div class='loaded'>&nbsp;</div></div>
        @include('flash::message')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-default btnLoader" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-primary btnLoader" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-default btnLoader" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="">
                    <img src="{{asset('images/Logo/LogoUCACUE.png')}}" alt="Logo UCACUE" width="70%" height="70%">
                </div>
                <div class="title link-title">
                    <a href="{{URL::to('/home')}}">{{ config('app.name','Laravel') }}</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            //Al dar click en un boton Loader mostrar el overlay
            $('.btnLoader').on('click',function () {
                alert('HOLA');
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
        </script>
    </body>
</html>
