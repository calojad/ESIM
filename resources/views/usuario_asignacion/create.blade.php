@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Asignar Carrera</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Evaluador</li>
        <li>Asignar</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        {{-- {!! Form::open(['route' => 'usuarioasignacion.store']) !!} --}}
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">{{ $user->name }}</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <input id="usuarioId" type="hidden" name="usuario" value="{{ $user->id }}">
                    <div class="form-group col-md-6 col-md-offset-3">
                        <label class="col-md-3 control-label" for="selPeriodos" style="text-align: right;">Periodos:</label>
                        <div class="col-md-6">
                            {!! Form::select('periodo',$periodos,null,['class' => 'form-control', 'required' => true,'id' => 'selPeriodos']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a class="btn btn-default btnLoader" href="{{ route('usuarioasignacion.show',$user->id) }}">Regresar</a>
            </div>
        </div>
        <div id="divBoxCarreras" class="box box-warning content" style="display: none;">
            <div class="box-header">
                <h3 class="box-title">Carreras</h3>
            </div>
            <div class="box-body with-border">
                <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblCarrerasAsig">
                    <thead>
                    <tr>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($carreras as $carrera)
                    <tr>
                        <td>{{ $carrera->nombre }}</td>
                        <td align="center">
                            {!! Form::checkbox('carreras[]',$carrera->id,null,['class' => 'chkAgregarC inputIcheck','id' => $numRow]) !!}
                        </td>
                    </tr>
                    @php $numRow++; @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <button id="btnGuardarChecks" type="button" class="btn btn-app bg-blue pull-right btnLoader"><i class="fa fa-save"></i>Guardar</button>
            </div>
            <!-- Loading (remove the following to stop the loading)-->
            <div id="overlayDivCarreras" class="overlay">
                <i class="fa fa-sync-alt fa-spin"></i>
            </div>
        </div>
        {{-- {!! Form::close() !!} --}}
    </div>
    <script type="text/javascript" charset="utf-8" async defer>
        // Cuando se carge la Página
        $(document).ready(function(){
            // Verificar si el selec tiene un periodo seleccionado
            if($('#selPeriodos').val() != 0){
                $('#divBoxCarreras').show();
            }else{
                $('#divBoxCarreras').hide();
            }
            // Quitar el overlay del box
            $("#overlayDivCarreras").fadeOut();
        });
        // Al Seleccionar el Periodo
        $('#selPeriodos').on('change', function(){
            $("#overlayDivCarreras").fadeIn();
            var selPeriodo = $(this).val();
            if(selPeriodo != 0){
                $('#divBoxCarreras').show();
            }else{
                $('#divBoxCarreras').hide();
            }
            $("#overlayDivCarreras").fadeOut();
        });
        // Boton Guardar carreras la tabla
        $('#btnGuardarChecks').on('click', function(){
            var usuario = $('#usuarioId').val();
            var periodo = $('#selPeriodos').val();
            var table = $('#tblCarrerasAsig').DataTable();
            var data = table.$('input, select').serialize();
            data = data.split('&');
            var carreras = [];
            $.each(data,function(i,d){
                carreras.push(d.split('=')[1]);
            });
            var url = "{{ route('usuarioasignacion.store') }}";
            var datos = {usuario:usuario, periodo:periodo, carreras:carreras, _token:"{{csrf_token()}}"};
            $.post(url, datos, function(json){
                window.location.href = json.url;
            },'json');
        });
/*
*******FUNCIONES*******
 */
        // Funcion iCheck
        $(function () {
            $('.inputIcheck').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-green',
                increaseArea: '20%'
            });

            $('#chkTodasC').on('ifChanged', function(e){
                if($(this).prop('checked'))
                    $('.chkAsignarC').iCheck('check');
                else if($('.chkAsignarC:checked').length === $('.chkAsignarC').length)
                    $('.chkAsignarC').iCheck('uncheck');
            });

            $('.chkAsignarC').on('ifUnchecked',function(){
                if( $('#chkTodasC').prop('checked'))
                    $('#chkTodasC').iCheck('uncheck');
            });
        });
        // Funcion para marcar las carreras asignadas
        function marcarCarrerasAsignadas($periodoId,$usuarioId){
            var chksCarreras = $('.chkAgregarC');
            var csp = [];
            var url = "{{ URL::to('usuarioasignacion/obtcarreraceriodo') }}"+"/"+$periodoId+"/"+$usuarioId;
            $.get(url, function(json){
                csp = json;
            },'json');
            
            chksCarreras.each(function(c){
                
            });
        }
    </script>
@endsection