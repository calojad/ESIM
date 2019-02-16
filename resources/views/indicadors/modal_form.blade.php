<div class="modal fade" id="modalFormIndicador" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px">
            <div class="modal-header bg-green" style="border-radius: 8px 8px 0 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Indicador</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/estructura/new-indicador', 'method' => 'post','class' => 'form-horizontal']) !!}
                <input type="hidden" value="1" name="estado">
                <input type="hidden" value="{{$modelo->id}}" name="modelo_id">
                <div class="row" style="margin-left: 20px">
                    <div class="col-md-12">
                        <!-- Tipo Indicador Id Field -->
                        <div id="divGruopTipoIndi" class="form-group col-sm-12 {{$errors->has('tipo_indicador_id')?'has-error':''}}">
                            {!! Form::label('tipo_indicador_id', 'Tipo Indicador:') !!}
                            {!! Form::select('tipo_indicador_id', $tiposIndicador, null,['class' => 'form-control','required'=>true,'id'=>'selTipoIndicador']) !!}
                        </div>
                        <!-- Nombre Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('nombre', 'Nombre:') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control UpperCase','required'=>true]) !!}
                        </div>

                        <!-- Descripcion Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('descripcion', 'Descripcion:') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control','required'=>true,'rows'=>3,'id'=>'txaDescrip']) !!}
                            <span class="text-muted pull-right" id="contadorIndicador">0</span>
                        </div>

                        <!-- Grupo Valor Id Field -->
                        <div id="divGrupoValor" class="form-group col-md-12">
                            {!! Form::label('grupo_valor_id', 'Grupo Valor:') !!}
                            {!! Form::select('grupo_valor_id', $gruposValor,null, ['class' => 'form-control select2']) !!}
                        </div>

                        <!-- Formula Id Field -->
                        <div id="divFormula" class="form-group col-md-12">
                            {!! Form::label('formula_id', 'Formula:') !!}
                            {!! Form::select('formula_id', $formulas, null, ['class' => 'form-control select2']) !!}
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
<script>
    //TextArea contar caracteres
    $('#txaDescrip').on('keyup',function() {
        contTextarea($(this),$('#contadorIndicador'));
    });
    //Select tipo indicador
    $('#selTipoIndicador').on('change',function () {
        var obj = $('#selTipoIndicador option:selected').text();
        var divG = $('#divGrupoValor');
        var divF = $('#divFormula');
        verTipoIndicador(divF,divG,obj);
    });
    //Contar numero de caracteres del textarea
    function contTextarea(txarea,count){
        var chars = txarea.val().length;
        var diff = chars;
        count.html(diff);
    }
    // Verificar el tipo de indicador y mostrar la respectiva entrada
    function verTipoIndicador(divF,divG,obj) {
        if(obj === 'Cuantitativos'){
            divF.show();
            divG.hide();
            $('#divGruopTipoIndi').removeClass('has-error');
        }else if(obj === 'Cualitativos'){
            divF.hide();
            divG.show();
            $('#divGruopTipoIndi').removeClass('has-error');
        }else{
            divF.hide();
            divG.hide();
        }
    }
</script>