<div class="modal fade" id="modalAsigValoracion" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-blue-active" style="border-radius: 8px 8px 0 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Valoración</h4>
            </div>
            <div class="modal-body">
                <div class="form-group col-sm-12">
                    {!! Form::label('formula_id', 'Tipo de Valoración:') !!}
                    {!! Form::text('formula_id', null, ['class' => 'form-control UpperCase','required'=>true]) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btnLoader">Guardar</button>
            </div>
        </div>
    </div>
</div>