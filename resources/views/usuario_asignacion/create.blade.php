@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Asignar Carrera</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Evaluador</li>
        <li>Asignar Carrera</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">{{ $user->name }}</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <input id="usuarioId" type="hidden" name="usuario" value="{{ $user->id }}">
                    <div class="form-group col-md-6 col-md-offset-3">
                        <label class="col-md-3 control-label" for="selPeriodos" style="text-align: right;">Periodos:</label>
                        <div class="col-md-6">
                            {!! Form::select('periodo',$periodos,null,['class' => 'form-control', 'required' => true, 'id' => 'selPeriodos']) !!}
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
            <div class="box-body" style="border: 1px solid #999999;">
                <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblCarrerasAsig">
                    <thead>
                    <tr>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Carga las carreras correspondientes --}}
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

    </div>
    <script type="text/javascript" charset="utf-8" async defer>
        $(function () {
            $('#tblCarrerasAsig').DataTable({
                paging: false,
                lengthChange: true,
                searching: true,
                ordering: true,
                autoWidth: true,
                retrieve: true,
                responsive: true,
                scrollY: '70vh'
            });
        });
        // Cuando se carge la Página
        $(document).ready(function(){
            var usuario = $('#usuarioId').val();
            var periodo = $('#selPeriodos').val();
            // Cargar las carreras asignadas
            marcarCarrerasAsignadas(periodo,usuario);
            // Verificar si el selec tiene un periodo seleccionado
            if(periodo !== '0'){
                $('#divBoxCarreras').show();
            }else{
                $('#divBoxCarreras').hide();
            }
            // Quitar el overlay del box
            $("#overlayDivCarreras").fadeOut(1000);
        });
        // Al Seleccionar el Periodo
        $('#selPeriodos').on('change', function(){
            var box = $("#overlayDivCarreras");
            box.fadeIn();
            var userId = $('#usuarioId').val();
            var selPeriodo = $(this).val();

            marcarCarrerasAsignadas(selPeriodo,userId);

            if(selPeriodo !== '0'){
                $('#divBoxCarreras').show();
            }else{
                $('#divBoxCarreras').hide();
            }
            box.fadeOut();
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
        // Funcion Cargar tabla de carreras segun periodo
        function marcarCarrerasAsignadas(periodoId,usuarioId){
            var url = "{{ URL::to('usuarioasignacion/obtcarreraperiodo') }}"+"/"+periodoId+"/"+usuarioId;
            var t = $('#tblCarrerasAsig').DataTable();
            var aux;
            $.get(url, function(json){
                t.clear().draw();
                json.carreras.forEach(function(c){
                    aux = jQuery.inArray(c.id,json.caAsig) !== -1 ? 'checked' : '';
                    t.row.add([
                        c.nombre,
                        '<div class="icheck" align="center"><input class="inputIcheck" type="checkbox" value="'+c.id+'" name="carreras[]" '+aux+'></div>'
                    ]).draw(false);
                });
                $('.inputIcheck').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%'
                });
            },'json');
        }
    </script>
@endsection