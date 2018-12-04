<table class="table table-responsive" id="formulaVariables-table">
    <thead>
        <tr>
            <th>Formula Id</th>
        <th>Variable Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formulaVariables as $formulaVariable)
        <tr>
            <td>{!! $formulaVariable->formula_id !!}</td>
            <td>{!! $formulaVariable->variable_id !!}</td>
            <td>
                {!! Form::open(['route' => ['formulaVariables.destroy', $formulaVariable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('formulaVariables.show', [$formulaVariable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('formulaVariables.edit', [$formulaVariable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>