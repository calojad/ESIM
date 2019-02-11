<div class="col-md-5 col-sm-4 col-md-offset-4 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required'=>true]) !!}
    </div>

    <!-- Modelo Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('modelo_id', 'Modelo:') !!}
        {!! Form::select('modelo_id',$modelos, null, ['class' => 'form-control select2','required'=>true]) !!}
    </div>

    <!-- Periodo Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('periodo_id', 'Periodo:') !!}
        {!! Form::select('periodo_id', $periodos,null, ['class' => 'form-control select2','required'=>true]) !!}
    </div>

    <!-- Tipo Evaluacion Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('tipo_evaluacion_id', 'Tipo Evaluacion:') !!}
        {!! Form::select('tipo_evaluacion_id', $tipoEvaluacion,null, ['class' => 'form-control select2','required'=>true]) !!}
    </div>

    <div class="form-group col-sm-12">
        <div class="col-md-6">
            {!! Form::label('Carrera:') !!}
            {!! Form::radio('radOrg',1,true,['class' => 'form-control radOrganizacion', 'id' => 'radSelCarreras']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('Departamento:') !!}
            {!! Form::radio('radOrg',2,null,['class' => 'form-control radOrganizacion', 'id' => 'radSelDepartamentos']) !!}
        </div>
    </div>

    <!-- Carrera Id Field -->
    <div id="divSelCarreras" class="form-group col-sm-12">
        {!! Form::label('carrera_id', 'Carrera:') !!}
        {!! Form::select('carrera_id',$carreras, null, ['class' => 'form-control select2','required'=>true]) !!}
    </div>

    <!-- Departamento Id Field -->
    <div id="divSelDepartamentos" class="form-group col-sm-12">
        {!! Form::label('departamento_id', 'Depart:') !!}
        {!! Form::select('departamento_id',$departamentos, null, ['class' => 'form-control select2','required'=>true]) !!}
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-12 col-md-12 icheck">
        <label class="col-sm-12 col-md-12 col-lg-12">Estado:</label>
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

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btnLoader']) !!}
        <a href="{!! route('matrizs.index') !!}" class="btn btn-default btnLoader">Cancel</a>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function () {
        var valor = $('.radOrganizacion:checked').val();
       console.log(valor);
        if (valor === '1') {
            console.log(valor);
            $('#divSelCarreras').show();
            $('#divSelDepartamentos').hide();
        } else if (valor === '2') {
            console.log(valor);
            $('#divSelCarreras').hide();
            $('#divSelDepartamentos').show();
        }
    });
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
        $('.radOrganizacion').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
        $('#radSelCarreras').on('ifChecked', function (e) {
            $('#divSelCarreras').show();
            $('#divSelDepartamentos').hide();
        });
        $('#radSelDepartamentos').on('ifChecked', function (e) {
            $('#divSelDepartamentos').show();
            $('#divSelCarreras').hide();
        });
    });
</script>