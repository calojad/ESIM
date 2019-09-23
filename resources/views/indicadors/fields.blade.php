<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
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
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Estado:</label>
        <div class="col-md-12" align="center">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <label class="text-success">
                    {!! Form::radio('estado',1,true,['id'=>'radActivo']) !!} Activo
                </label>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-4">
                <label class="text-danger">
                    {!! Form::radio('estado',0,null,['id'=>'radInactivo']) !!} Inactivo
                </label>
            </div>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12" align="center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
        <a href="{!! route('indicadors.index') !!}" class="btn btn-default btnLoader">Cancel</a>
    </div>
</div>
<script type="text/javascript">
 /*   $(document).ready(function () {
        verTipoIndicador($('#divFormula'), $('#divGrupoValor'), $('#selTipoIndicador option:selected').text())
    });*/
    //Select tipo indicador
    // $('#selTipoIndicador').on('change', function () {
    //     var obj = $('#selTipoIndicador option:selected').text();
    //     var divG = $('#divGrupoValor');
    //     var divF = $('#divFormula');
    //     verTipoIndicador(divF, divG, obj);
    // });
    //Inicializacion de los radio buttons
    $(function () {
        $('#radActivo').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-green',
            increaseArea: '20%'
        });
        $('#radInactivo').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-red',
            increaseArea: '20%'
        });
    });

    // Verificar el tipo de indicador y mostrar la respectiva entrada
    /*function verTipoIndicador(divF, divG, obj) {
        if (obj === 'Cuantitativos') {
            divF.show();
            divG.hide();
            $('#divGruopTipoIndi').removeClass('has-error');
        } else if (obj === 'Cualitativos') {
            divF.hide();
            divG.show();
            $('#divGruopTipoIndi').removeClass('has-error');
        } else {
            divF.hide();
            divG.hide();
        }
    }*/
</script>