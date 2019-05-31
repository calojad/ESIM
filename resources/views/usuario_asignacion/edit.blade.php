@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Asignar Departamento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fas fa-home"></i> Home</a></li>
        <li>Evaluador</li>
        <li>Asignar Departamento</li>
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

        <div id="divBoxDepartamentos" class="box box-warning content" style="display: none;">
            <div class="box-header">
                <h3 class="box-title">Departamentos</h3>
            </div>
            <div class="box-body" style="border: 1px solid #999999;">
                <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblDepartamentosAsig">
                    <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Carga los departamentos correspondientes --}}
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <button id="btnGuardarChecks" type="button" class="btn btn-app bg-blue pull-right btnLoader"><i class="fa fa-save"></i>Guardar</button>
            </div>
            <!-- Loading (remove the following to stop the loading)-->
            <div id="overlayDivDeparts" class="overlay">
                <i class="fa fa-sync-alt fa-spin"></i>
            </div>
        </div>

    </div>
    <script type="text/javascript" charset="utf-8" async defer>
        $(function () {
            $('#tblDepartamentosAsig').DataTable({
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
            // Cargar los departamentos asignadas
            marcarDepartsAsignadas(periodo,usuario);
            // Verificar si el selec tiene un periodo seleccionado
            if(periodo !== '0'){
                $('#divBoxDepartamentos').show();
            }else{
                $('#divBoxDepartamentos').hide();
            }
            // Quitar el overlay del box
            $("#overlayDivDeparts").fadeOut(1000);
        });
        // Al Seleccionar el Periodo
        $('#selPeriodos').on('change', function(){
            var box = $("#overlayDivDeparts");
            box.fadeIn();
            var userId = $('#usuarioId').val();
            var selPeriodo = $(this).val();

            marcarDepartsAsignadas(selPeriodo,userId);

            if(selPeriodo !== '0'){
                $('#divBoxDepartamentos').show();
            }else{
                $('#divBoxDepartamentos').hide();
            }
            box.fadeOut();
        });
        // Boton Guardar departamentos la tabla
        $('#btnGuardarChecks').on('click', function(){
            var usuario = $('#usuarioId').val();
            var periodo = $('#selPeriodos').val();
            var table = $('#tblDepartamentosAsig').DataTable();
            var data = table.$('input, select').serialize();
            data = data.split('&');
            var departamentos = [];
            $.each(data,function(i,d){
                departamentos.push(d.split('=')[1]);
            });
            var url = "{{ route('usuarioasignacion.update',0) }}";
            var datos = {usuario:usuario, periodo:periodo, departamentos:departamentos, _token:"{{csrf_token()}}"};
            $.post(url, datos, function(json){
                window.location.href = json.url;
            },'json');
        });
        /*
        *******FUNCIONES*******
         */
        // Funcion Cargar tabla de departamentos segun periodo
        function marcarDepartsAsignadas(periodoId,usuarioId){
            var url = "{{ URL::to('usuarioasignacion/obtdepartperiodo') }}"+"/"+periodoId+"/"+usuarioId;
            var t = $('#tblDepartamentosAsig').DataTable();
            var aux;
            $.get(url, function(json){
                t.clear().draw();
                json.departamentos.forEach(function(d){
                    aux = jQuery.inArray(d.id,json.deAsig) !== -1 ? 'checked' : '';
                    t.row.add([
                        d.nombre,
                        '<div class="icheck" align="center"><input class="inputIcheck" type="checkbox" value="'+d.id+'" name="departamentos[]" '+aux+'></div>'
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