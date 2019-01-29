<div class="modal fade" id="modalAgregarSubcriterio" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Subcriterios</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/addsubcriterios/', 'method' => 'post']) !!}
                <input type="hidden" value="{{$modelo->id}}" name="modelo_id">
                <input type="hidden" name="criterioPadreId">
                <input type="hidden" name="nivelHijo">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblSubcriteriosAdd">
                            <thead>
                            <tr>
                                <th>Abrebiación</th>
                                <th>Criterio</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($criterios as $criterio)
                                @if(!in_array($criterio->id,$ec_array))
                                    <tr>
                                        <td>{{ $criterio->abreviado }}</td>
                                        <td>{{ $criterio->nombre }}</td>
                                        <td>
                                            <div class="icheck" align="center">
                                                {!! Form::checkbox('criteriosSel[]',$criterio->id,null,['class' => 'chkAgregarSc inputIcheck']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <label class="text-muted">Seleccionar todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasSc','class' => 'inputIcheck']) !!}</label>
                <button id="btnAgregarSeleccion" type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>