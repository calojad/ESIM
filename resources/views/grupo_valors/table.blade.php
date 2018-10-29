<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="grupoValors-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($grupoValors as $grupoValor)
        <tr>
            <td>{!! $grupoValor->nombre !!}</td>
            <td>{!! $grupoValor->tipoIndicador->nombre !!}</td><
            <td><label class="label {!! $grupoValor->estado==1?'label-success':'label-danger' !!}">{!! $grupoValor->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['grupoValors.destroy', $grupoValor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grupoValors.edit', [$grupoValor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    <a href="{!! route('grupoValors.show', [$grupoValor->id]) !!}" class='btn btn-primary btn-xs' title="Ver Valores"><i class="glyphicon glyphicon-tasks"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>