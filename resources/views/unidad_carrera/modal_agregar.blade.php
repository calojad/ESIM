<div class="modal fade in flash-modal" id="modalAgregarCarrera" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Agregar Carrera</h4>
            </div>
            {!! Form::model($unidad, ['route' => ['unidadcarrera.update', $unidad->id], 'method' => 'patch']) !!}
            <div class="modal-body">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable">
                        <thead>
                            <tr>
                                <th>Carrera</th>
                                <th>Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->nombre }}</td>
                                <td>
                                    <div class="icheck" align="center">
                                        {!! Form::checkbox('carreras[]',$carrera->id,in_array($carrera->id,$uc_array)==true?true:false,['class' => 'chkAgregarC inputIcheck']) !!}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer icheck">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <label class="text-muted">Seleccionar todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasC','class' => 'inputIcheck']) !!}</label>
                <button id="btnAgregarSeleccion" type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    // Boton para quitar de la tabla una carrera
    $(document).on('click', '.btnQuitarCarrera', function () {
        var t = $('#tblUnidadCarreras').DataTable();
        var fila = $(this).parents('tr');
        t.row(fila).remove();
        t.draw();
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
                $('.chkAgregarC').iCheck('check');
            else if($('.chkAgregarC:checked').length == $('.chkAgregarC').length)
                $('.chkAgregarC').iCheck('uncheck');
        });

        $('.chkAgregarC').on('ifUnchecked',function(){
            if( $('#chkTodasC').prop('checked'))
                $('#chkTodasC').iCheck('uncheck');
        });
    });
    $(document).ready(function(){

    });
</script>