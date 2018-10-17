<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="ubicacions-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ubicacions as $ubicacion)
        <tr>
            <td>{!! $ubicacion->nombre !!}</td>
            <td><label class="label {!! $ubicacion->estado==1?'label-success':'label-danger' !!}">{!! $ubicacion->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['ubicacions.destroy', $ubicacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('ubicacions.show', [$ubicacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('ubicacions.edit', [$ubicacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>