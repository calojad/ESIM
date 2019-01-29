<div class="modal fade" id="modalAgregarIndicador" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Indicadores</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/addindicadores/', 'method' => 'post']) !!}
                <input type="hidden" name="criterioPadreId">
                <input type="hidden" name="modelo_id" value="{{$modelo->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable"
                               id="tblIndicadoresAdd">
                            <thead>
                            <tr>
                                <th>Indicador</th>
                                <th>Tipo</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($indicadores as $indicador)
                                @if(!in_array($indicador->id,$ei_array))
                                    <tr>
                                        <td>{{ $indicador->nombre }}</td>
                                        <td>{{ $indicador->tipoIndicador->nombre }}</td>
                                        <td>
                                            <div class="icheck" align="center">
                                                {!! Form::checkbox('indicadorSel[]',$indicador->id,null,['class' => 'chkAgregarInd inputIcheck']) !!}
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
                <label class="text-muted">Seleccionar
                    todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasInd','class' => 'inputIcheck']) !!}</label>
                <button id="btnAgregarSeleccion" type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>