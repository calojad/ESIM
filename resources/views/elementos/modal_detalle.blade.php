<div class="modal fade" id="modalVerDetallesElementoValoracion" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-blue-active" style="border-radius: 8px 8px 0 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Valoración</h4>
            </div>
            <div class="modal-body">
{{--                @if($indicador->tipo_indicador_id == 1)--}}
                    <div id="divTipoGrupoValorSelect" class="form-group col-sm-12">
                        {!! Form::label('formula_id', 'Grupo de Valoraciones:') !!}
                        {!! Form::select('formula_id',[0,1],null, ['class' => 'form-control UpperCase','required'=>true]) !!}
                    </div>
{{--                @else--}}
                    <div id="divTipoFormulaSelect" class="form-group col-sm-12">
                        {!! Form::label('formula_id', 'Formula:') !!}
                        {!! Form::select('formula_id',[0,1],null, ['class' => 'form-control UpperCase','required'=>true]) !!}
                    </div>
{{--                @endif--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btnLoader">Guardar</button>
            </div>
        </div>
    </div>
</div>