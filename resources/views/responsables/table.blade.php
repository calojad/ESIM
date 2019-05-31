<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="responsables-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($responsables as $responsable)
        <tr>
            <td>{!! $responsable->nombre !!}</td>
            <td>{!! $responsable->telefono !!}</td>
            <td>{!! $responsable->email_institu !!}</td>
            <td><label class="label {!! $responsable->estado==1?'label-success':'label-danger' !!}">{!! $responsable->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['responsables.destroy', $responsable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('responsables.show', [$responsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('responsables.edit', [$responsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit btnLoader"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>