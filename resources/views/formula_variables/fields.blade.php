<!-- Formula Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formula_id', 'Formula Id:') !!}
    {!! Form::number('formula_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Variable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('variable_id', 'Variable Id:') !!}
    {!! Form::number('variable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formulaVariables.index') !!}" class="btn btn-default">Cancel</a>
</div>
