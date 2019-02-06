<div class="modal fade" id="modalAgregarEvidencia" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Evidencia</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/addevidencias/', 'method' => 'post']) !!}
                <input type="hidden" name="estrucIndicador" value="{{$indicador->estructuraIndicadores[0]->id}}">
                <input type="hidden" name="indicador_id" value="{{$indicador->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblEvidenciasAdd">
                            <thead>
                            <tr>
                                <th>Evidencia</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($evidencias as $evide)
                                @if(!in_array($evide->id,$ee_array))
                                    <tr>
                                        <td>{{ $evide->nombre }}</td>
                                        <td>
                                            <div class="icheck" align="center">
                                                {!! Form::checkbox('evidenciaSel[]',$evide->id,null,['class' => 'chkAgregarEvi inputIcheck']) !!}
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
                    todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasEvi','class' => 'inputIcheck']) !!}</label>
                <button id="btnAgregarSeleccion" type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>