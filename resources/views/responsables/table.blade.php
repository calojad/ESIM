<table class="table table-responsive" id="responsables-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Telefono</th>
        <th>Gmail</th>
        <th>Email Institu</th>
        <th>Rol</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($responsables as $responsable)
        <tr>
            <td>{!! $responsable->nombre !!}</td>
            <td>{!! $responsable->telefono !!}</td>
            <td>{!! $responsable->gmail !!}</td>
            <td>{!! $responsable->email_institu !!}</td>
            <td>{!! $responsable->rol !!}</td>
            <td>{!! $responsable->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['responsables.destroy', $responsable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('responsables.show', [$responsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('responsables.edit', [$responsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>