<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="variables-table">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($variables as $variables)
        <tr>
            <td>{!! $variables->variable !!}</td>
            <td>{!! $variables->descripcion !!}</td>
            <td><label class="label {!! $variables->estado==1?'label-success':'label-danger' !!}">{!! $variables->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['variables.destroy', $variables->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('variables.show', [$variables->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('variables.edit', [$variables->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>