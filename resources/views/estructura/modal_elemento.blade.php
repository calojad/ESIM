<div class="modal fade" id="modalAgregarElemento" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-aqua-active">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Agregar Elemento</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/addelemento/', 'method' => 'post']) !!}
                <input type="hidden" name="estrucEvidencia" value="{{$evidencia->estructuraEvidencias[0]->id}}">
                <input type="hidden" name="evidencia_id" value="{{$evidencia->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tblElementoAdd">
                            <thead>
                            <tr>
                                <th>Elemento</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($elementos as $elem)
                                @if(!in_array($elem->id,$eel_array))
                                    <tr>
                                        <td>{{ $elem->nombre }}</td>
                                        <td>
                                            <div class="icheck" align="center">
                                                {!! Form::checkbox('elementoSel[]',$elem->id,null,['class' => 'chkAgregarEvi inputIcheck']) !!}
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
                    todo {!! Form::checkbox('todoCa',null,null,['id' => 'chkTodasElem','class' => 'inputIcheck']) !!}</label>
                <button type="submit" class="btn btn-primary btnLoader">Agregar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>