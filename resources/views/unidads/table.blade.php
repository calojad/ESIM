<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="unidads-table">
    <thead>
        <tr>
            <th>Tipo Unidad</th>
            <th>Ubicacion</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($unidads as $unidad)
        <tr>
            <td>{!! $unidad->tipoUnidad->nombre !!}</td>
            <td>{!! $unidad->ubicacion->nombre !!}</td>
            <td>{!! $unidad->nombre !!}</td>
            <td><label class="label {!! $unidad->estado==1?'label-success':'label-danger' !!}">{!! $unidad->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['unidads.destroy', $unidad->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('unidads.show', [$unidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('unidads.edit', [$unidad->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    <a class="btn btn-primary btn-xs" href="{!! route('unidadcarrera.show', [$unidad->id]) !!}" title="Agergar Carrera"><i class="fa fa-graduation-cap"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>