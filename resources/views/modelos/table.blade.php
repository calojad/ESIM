<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="modelos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Abreviado</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modelos as $modelo)
        <tr>
            <td>{!! $modelo->nombre !!}</td>
            <td>{!! $modelo->abreviado !!}</td>
            <td>{!! $modelo->descripcion !!}</td>
            <td><label class="label {!! $modelo->estado==1?'label-success':'label-danger' !!}">{!! $modelo->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['modelos.destroy', $modelo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelos.edit', [$modelo->id]) !!}" class='btn btn-default btn-xs btnLoader'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    <a href="{!! route('modelos.show', [$modelo->id]) !!}" class='btn btn-primary btn-xs btnLoader'><i class="fas fa-sitemap"></i>Estructura</a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>