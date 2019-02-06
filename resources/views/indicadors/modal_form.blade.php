<div class="modal fade" id="modalFormIndicador" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-success" style="border-radius: 8px 8px 0 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Indicador</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/new-indicador', 'method' => 'post','class' => 'form-horizontal']) !!}
                <input type="hidden" value="1" name="estado">
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
                                <span id="contador" class="pull-right">255</span>
                                <script>
                                    $('#txareaDescrip').on('keyup',function() {
                                        var count = $('#contador');
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