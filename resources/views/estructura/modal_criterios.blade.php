<div class="modal fade" id="modalAgregarCriterio" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Criterios</h4>
            </div>
            {!! Form::open(['url' => '/estructura/addcriterios/', 'method' => 'post']) !!}
            <input type="hidden" value="{{$modelo->id}}" name="modelo_id">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblCriteriosAdd">
                            <thead>
                            <tr>
                                <th>Abrebiación</th>
                                <th>Criterio</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($criterios as $criterio)
                                <tr>
                                    <td>{{ $criterio->abreviado }}</td>
                                    <td>{{ $criterio->nombre }}</td>
                                    <td>
                                        <div class="icheck" align="center">
                                            {!! Form::checkbox('criteriosSel[]',$criterio->id,in_array($criterio->id,$ec_array),['class' => 'chkAgregarC inputIcheck']) !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <label class="text-muted">Seleccionar todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasC','class' => 'inputIcheck']) !!}</label>
                <button id="btnAgregarSeleccion" type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    /*
    *******FUNCIONES*******
     */
    //Inicializacion DataTable
    $(function () {
        $('#tblCriteriosAdd').DataTable({
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

        $('#chkTodasC').on('ifChanged', function(e){
            if($(this).prop('checked'))
                $('.chkAgregarC').iCheck('check');
            else if($('.chkAgregarC:checked').length === $('.chkAgregarC').length)
                $('.chkAgregarC').iCheck('uncheck');
        });

        $('.chkAgregarC').on('ifUnchecked',function(){
            var chkTodo = $('#chkTodasC');
            if( chkTodo.prop('checked'))
                chkTodo.iCheck('uncheck');
        });
    });
</script>