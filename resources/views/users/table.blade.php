<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="users-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Username</th>
        <th>Rol</th>
        <th>Email</th>
        <th>Estado</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name!!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->rol==1?'Administrador':'Evaluador' !!}</td>
            <td>{!! $user->email !!}</td>
            <td><label class="label {!! $user->estado==1?'label-success':'label-danger' !!}">{!! $user->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('unidads.show', [$unidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>