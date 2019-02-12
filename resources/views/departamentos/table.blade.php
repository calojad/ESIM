<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="departamentos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Responsable</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{!! $departamento->nombre !!}</td>
            <td>{!! $departamento->responsable->nombre !!}</td>
            <td><label class="label {!! $departamento->estado==1?'label-success':'label-danger' !!}">{!! $departamento->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['departamentos.destroy', $departamento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('departamentos.show', [$departamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('departamentos.edit', [$departamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>