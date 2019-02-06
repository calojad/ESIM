@section('css')
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=AM_CHTML-full"></script>
@stop
<div class="col-md-5 col-sm-4 col-md-offset-3 col-sm-offset-0">
    <!-- Nombre Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>

    <!-- Abreviatura Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('abreviatura', 'Abreviatura:') !!}
        {!! Form::text('abreviatura', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>

    <!-- Formula Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('formula', 'Formula:') !!}
        {!! Form::text('formula', null, ['class' => 'form-control textarea','id' => 'txaFormula', 'required' => 'required','rows' => 2]) !!}
    </div>

    <div class="col-sm-12" align="center" style="margin: 10px 0">
        <p class="col" id="lblFormula">
            `{{$formulas!=null?$formulas->formula:''}}`
        </p>
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
        <a href="{!! URL::to('cuantitativos/F') !!}" class="btn btn-default">Cancel</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
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
    window.MathJax = {
        "fast-preview": {
            disabled: true
        },
        AuthorInit: function() {
            MathJax.Hub.Register.StartupHook('End', function() {
                MathJax.Hub.processSectionDelay = 0;
                var demoSource = document.getElementById('txaFormula');
                var demoRendering = document.getElementById('lblFormula');
                var math = MathJax.Hub.getAllJax('demoRendering')[0];
                demoSource.addEventListener('input', function() {
                    MathJax.Hub.Queue(['Text', math, demoSource.value])
                })
            })
        }
    }
</script>