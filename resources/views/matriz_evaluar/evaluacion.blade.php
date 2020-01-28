@extends('layouts.app')
@section('css')
    <style>
        .nav-tabs > li.active > a {
            color: #444 !important;
        }
        .nav-tabs-custom  > .nav-tabs > li > a {
            color: white;
            font-weight: bold;
        }
        .nav-tabs-custom  > .nav-tabs > li > a:hover {
            color: black;
            /*border-color: transparent;
            background: transparent;*/
        }
        /*.nav-tabs > li > a {
            margin-right: 0px;
            line-height: 1.42857143;
            border: 1px solid
            transparent;
            border-radius: 0px;
        }
        .nav-tabs > li {
            float: none;
            margin-bottom: -1px;
        }*/
    </style>
@endsection
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Evaluación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Matriz Evaluar</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">{{$matriz->nombre}}</h3>
            </div>
            <div class="box-body bg-gray">
                {{--CONTENIDO DEL BOX--}}
                <div class="col-md-12">

                    <div class="nav-tabs-custom">
                        {{--PESTAÑAS DE CRITERIOS--}}
                            <ul class="nav nav-tabs">
                                @foreach($criterios as $criterio)
                                    <li class="bg-primary {{$tabActiva == $criterio->criterio_id ? 'active':''}}">
                                        <a href="#tab_{{$criterio->criterio_id}}" data-toggle="tab"
                                           aria-expanded="true">{{$criterio->estrucEvide->estructuraIndicadore->estructuraCriterio->criterio->nombre}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        {{--CONTENIDO DE LAS PESTAÑAS--}}
                        <div class="tab-content">
                            @foreach($criterios as $criterio)
                                <div class="tab-pane {{$tabActiva == $criterio->criterio_id ? 'active':''}}"
                                     id="tab_{{$criterio->criterio_id}}">
                                    <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable tblElementosEvaluar" >
                                        <thead>
                                        <tr>
                                            <th width="175">Indicador</th>
                                            <th width="100">Evidencia</th>
                                            <th width="1000">Elemento</th>
                                            <th width="100">Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($elementos as $elemento)
                                            @if ($elemento->criterio_id == $criterio->criterio_id)
                                                <tr>
                                                    <td>{{$elemento->estrucEvide->estructuraIndicadore->indicador->nombre}}</td>
                                                    <td>{{$elemento->estrucEvide->evidencia->nombre}}</td>
                                                    <td>{{$elemento->elemento->nombre}}</td>
                                                    <td><button class="btn btn-primary" type="button">Evaluar</button></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('.tblElementosEvaluar').DataTable({
                pagingType: "full_numbers",
                paging: false,
                pageLength: 50,
                searching: true,
                ordering: true,
                order: [[1, 'asc']],
                responsive: true,
                columnDefs: [
                    {type: 'num-html', targets: 1}
                ]
            });
        });
    </script>
@endsection