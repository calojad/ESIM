<table class="table table-responsive" id="variables-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Variable</th>
        <th>Estado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($variables as $variables)
        <tr>
            <td>{!! $variables->descripcion !!}</td>
            <td>{!! $variables->variable !!}</td>
            <td>{!! $variables->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['variables.destroy', $variables->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('variables.show', [$variables->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('variables.edit', [$variables->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>