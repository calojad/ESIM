<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="criterios-table">
    <thead>
        <tr>
            <th>Abrevición</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($criterios as $criterio)
        <tr>
            <td>{!! $criterio->abreviado !!}</td>
            <td>{!! $criterio->nombre !!}</td>
            <td>{!! $criterio->descripcion !!}</td>
            <td><label class="label {!! $criterio->estado==1?'label-success':'label-danger' !!}">{!! $criterio->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['criterios.destroy', $criterio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('criterios.show', [$criterio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('criterios.edit', [$criterio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>