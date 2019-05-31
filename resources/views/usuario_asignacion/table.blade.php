<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="asignacion-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Username</th>
        <th>Rol</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($evaluadores as $user)
        <tr>
            <td>{!! $user->name!!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->rol==1?'Administrador':'Evaluador' !!}</td>
            <td>
                <a class="btn btn-success btnLoader btn-sm" href="{!! route('usuarioasignacion.show',$user->id) !!}" title="Asignar Carreras"><i class="fa fa-user-tag"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>