@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Evidencia</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Modelo</li>
        <li>Estructura</li>
        <li>Criterio</li>
        <li>Indicador</li>
        <li>Evidencia</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-11">
                    <dl class="dl-horizontal">
                        <dt>Evidencia</dt>
                        <dd style="margin-bottom: 15px"><label class="label label-primary font-100p">{{$evidencia->nombre}}</label></dd>
                        <dt>Descripción</dt>
                        <dd>{{$evidencia->descripcion}}</dd>
                    </dl>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="padding: 0 20px 0 20px">
                    <div class="col-md-12" style="margin-bottom: 10px;background-color: #DD4B39;padding: 7px;border-radius: 8px;min-height: 45px">
                        <div class="col-md-6">
                            <span class="pull-left font-16pt text-withe">Elementos</span>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary pull-right" style="margin-right: 10px" data-toggle="modal" data-target="#modalAgregarElemento" type="button">Agregar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Elemento</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estrucElementos as $estEle)
                            <tr>
                                <td>{{$estEle->elemento->secuencia}}</td>
                                <td>{{$estEle->elemento->nombre}}</td>
                                <td>
                                    <button type="button" title="Quitar Evidencia" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i></button>
                                    <a href="{{route('evidencias.show',$estEle->elemento->id)}}" title="Elementos" class="btn btn-xs btn-primary"><i class="far fa-caret-square-down" style="margin: 0"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <a href="{!! route('indicadors.show',1) !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
    @include('estructura.modal_elemento')
    <script>
        $(function () {
            $('#tblElementoAdd').DataTable({
                paging: false,
                lengthChange: true,
                searching: true,
                ordering: true,
                autoWidth: true,
                retrieve: true,
                responsive: true,
                scrollY: '50vh'
            });
        });
        $(function () {
            $('.inputIcheck').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-green',
                increaseArea: '20%'
            });
            //Seleccionar todos los elementos
            $('#chkTodasElem').on('ifChanged', function (e) {
                if ($(this).prop('checked'))
                    $('.chkAgregarEvi').iCheck('check');
                else if ($('.chkAgregarEvi:checked').length === $('.chkAgregarEvi').length)
                    $('.chkAgregarEvi').iCheck('uncheck');
            });
            $('.chkAgregarEvi').on('ifUnchecked', function () {
                var chkTodo = $('#chkTodasElem');
                if (chkTodo.prop('checked'))
                    chkTodo.iCheck('uncheck');
            });
        });
    </script>
@endsection
