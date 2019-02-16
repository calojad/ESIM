<div class="modal fade" id="modalFormCriterio" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-primary" style="border-radius: 8px 8px 0 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Criterio</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/new-criterio', 'method' => 'post','class' => 'form-horizontal']) !!}
                <input type="hidden" value="1" name="estado">
                <input type="hidden" value="{{$modelo->id}}" name="modelo_id">
                <div class="row" style="margin-left: 20px">
                    <div class="col-md-12">
                        <div class="form-group aling-left">
                            <label class="col-md-2" for="inpNombre">Nombre:</label>
                            <div class="col-md-8">
                                <input id="inpNombre" class="form-control" type="text" name="nombre" required>
                            </div>
                        </div>
                        <div class="form-group aling-left">
                            <label class="col-md-2" for="inpAbreviado">Abreviación:</label>
                            <div class="col-md-8">
                                <input id="inpAbreviado" class="form-control" type="text" name="abreviado" required>
                            </div>
                        </div>
                        <div class="form-group aling-left">
                            <label class="col-md-2" for="txareaDescrip">Descripción:</label>
                            <div class="col-md-8">
                                <textarea id="txareaDescrip" class="form-control" rows="2" maxlength="255" name="descripcion" required></textarea>
                                <span id="contadorCriterio" class="pull-right">255</span>
                                <script>
                                    $('#txareaDescrip').on('keyup',function() {
                                        var count = $('#contadorCriterio');
                                        var chars = $(this).val().length;
                                        var diff = 255 - chars;
                                        count.html(diff);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-primary btnLoader">Crear</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>