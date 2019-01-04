<table class="table table-responsive" id="criterios-table">
    <thead>
        <tr>
            <th>Modelo Id</th>
        <th>Nombre</th>
        <th>Abreviado</th>
        <th>Nivel</th>
        <th>Descripcion</th>
        <th>Criterio Padre Id</th>
        <th>Estado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($criterios as $criterio)
        <tr>
            <td>{!! $criterio->modelo_id !!}</td>
            <td>{!! $criterio->nombre !!}</td>
            <td>{!! $criterio->abreviado !!}</td>
            <td>{!! $criterio->nivel !!}</td>
            <td>{!! $criterio->descripcion !!}</td>
            <td>{!! $criterio->criterio_padre_id !!}</td>
            <td>{!! $criterio->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['criterios.destroy', $criterio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('criterios.show', [$criterio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('criterios.edit', [$criterio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>