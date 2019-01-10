<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="evidencias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Importancia</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($evidencias as $evidencia)
        <tr>
            <td>{!! $evidencia->nombre !!}</td>
            <td>{!! $evidencia->descripcion !!}</td>
            <td>{!! $evidencia->importancia !!}</td>
            <td><label class="label {!! $evidencia->estado==1?'label-success':'label-danger' !!}">{!! $evidencia->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['evidencias.destroy', $evidencia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('evidencias.show', [$evidencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('evidencias.edit', [$evidencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>