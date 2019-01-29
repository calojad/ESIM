{{--MUESTRA LA ESTRUCTURA DEL MODELO
** CRITERIOS
** SUBCRITERIOS
--}}
@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Estructura</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Modelo</li>
        <li>Estructura</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Modelo</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{$modelo->nombre}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Abreviación:</dt>
                            <dd>{{$modelo->abreviado}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Descripción:</dt>
                            <dd>{{$modelo->descripcion}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btnLoader" href="{!! route('modelos.index') !!}">Regresar</a>
            </div>
        </div>

        <h3 class="box-title">Criterios y Subcriterios</h3>

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Modelo: {{$modelo->descripcion}}</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <div class="col-md-6">
                            <a id="btnShowBoxTools" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                            <a id="btnCancelBoxTools" class="btn btn-default" style="display: none"><i class="fa fa-times-circle"></i> Cancelar</a>
                            <a id="btnAgregarCriterio1" class="btn btn-success" data-toggle="modal"
                               data-target="#modalAgregarCriterio" style="display: none"><i class="fa fa-plus" title="Agregar Elemento"></i> Agregar Criterio</a>
                        </div>
                        <div class="col-md-6" align="right">
                            <a class="btn btn-default" href=""><i class="fa fa-plus"></i> Nuevo Criterio</a>
                            <a class="btn btn-default" href=""><i class="fa fa-plus-circle"></i> Nuevo Indicador</a>
                        </div>
                    </div>
                </div>
                <div id="divEstructura" class="col-md-12" style="background-color: #cccccc;height: 70vh;">
                    <div class="col-md-12" style="margin-top: 10px">
                        <div class="easy-tree">
                            {!! $treev !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay"><i class="fa fa-sync-alt fa-spin"></i></div>
        </div>
    </div>
    @include('estructura.modal_criterios')
    @include('estructura.modal_subcriterios')
    @include('estructura.modal_indicadores')
    <script type="text/javascript">
        $(document).ready(function () {
            //Inicializar TreeView
            $('.easy-tree').EasyTree();
            //Click para contraer nodos
            $('li.parent_li > span > span').click();
            //Inicializar slimscroll
            $('#divEstructura').slimScroll({
                height: 'auto',
                width: '100%'
            });
            //Ocultar BOXTOOLS
            $('.boxTools').hide();
            //Ocultar overlay de los box
            $('.overlay').hide();
            //Boton de agregar elemento
            $('.btnAddElement').on('click', function () {
                //Inputs para agregar un subcriterio
                $('input[name=criterioPadreId]').val($(this).data('id'));
                $('input[name=nivelHijo]').val($(this).data('nivel') + 1);
                //Inputs para agregar un indicador
            });
            //Boton de eliminar elemento
            $('.btnDeleteElement').on('click', function () {
                var id = $(this).data('id');
                $.confirm({
                    title: '¿Esta Seguro?',
                    content: 'Se eliminara todos los elementos contenidos en esté elemento.',
                    type: 'red',
                    icon: 'glyphicon glyphicon-remove',
                    buttons: {
                        eliminar: function () {
                            var url = '{{URL::to('estructura/destroy/')}}' + '/' + id;
                            $('.preloader').fadeIn("fast");
                            $.get(url, function () {
                                location.reload()
                            });
                        },
                        cancel: function () {
                        },
                    }
                });
            });
        });
        //Mostrar BoxTools
        $('#btnShowBoxTools').on('click', function () {
            $(this).hide();
            $('.boxTools').show();
            $('#btnAgregarCriterio1').show();
            $('#btnCancelBoxTools').show();
        });
        //Ocultar BoxTools
        $('#btnCancelBoxTools').on('click', function () {
            $(this).hide();
            $('.boxTools').hide();
            $('#btnAgregarCriterio1').hide();
            $('#btnShowBoxTools').show();
        });
        /*
        *******FUNCIONES*******
        */
        //Inicializacion DataTable
        $(function () {
            $('#tblCriteriosAdd, #tblSubcriteriosAdd, #tblIndicadoresAdd').DataTable({
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
        // Funcion iCheck
        $(function () {
            $('.inputIcheck').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-green',
                increaseArea: '20%'
            });
            //Seleccionar todos los criterios
            $('#chkTodasC').on('ifChanged', function (e) {
                if ($(this).prop('checked'))
                    $('.chkAgregarC').iCheck('check');
                else if ($('.chkAgregarC:checked').length === $('.chkAgregarC').length)
                    $('.chkAgregarC').iCheck('uncheck');
            });
            $('.chkAgregarC').on('ifUnchecked', function () {
                var chkTodo = $('#chkTodasC');
                if (chkTodo.prop('checked'))
                    chkTodo.iCheck('uncheck');
            });
            //Seleccionar todos los subcriterios
            $('#chkTodasSc').on('ifChanged', function (e) {
                if ($(this).prop('checked'))
                    $('.chkAgregarSc').iCheck('check');
                else if ($('.chkAgregarSc:checked').length === $('.chkAgregarSc').length)
                    $('.chkAgregarSc').iCheck('uncheck');
            });
            $('.chkAgregarSc').on('ifUnchecked', function () {
                var chkTodo = $('#chkTodasSc');
                if (chkTodo.prop('checked'))
                    chkTodo.iCheck('uncheck');
            });
            //Seleccionar todos los subcriterios
            $('#chkTodasInd').on('ifChanged', function (e) {
                if ($(this).prop('checked'))
                    $('.chkAgregarInd').iCheck('check');
                else if ($('.chkAgregarInd:checked').length === $('.chkAgregarInd').length)
                    $('.chkAgregarInd').iCheck('uncheck');
            });
            $('.chkAgregarInd').on('ifUnchecked', function () {
                var chkTodo = $('#chkTodasInd');
                if (chkTodo.prop('checked'))
                    chkTodo.iCheck('uncheck');
            });
        });
    </script>
@endsection