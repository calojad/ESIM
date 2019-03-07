<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="tipoMatrizs-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoMatrizs as $tipoMatriz)
        <tr>
            <td>{!! $tipoMatriz->nombre !!}</td>
            <td><label class="label {!! $tipoMatriz->estado==1?'label-success':'label-danger' !!}">{!! $tipoMatriz->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['tipoMatrizs.destroy', $tipoMatriz->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('tipoMatrizs.show', [$tipoMatriz->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('tipoMatrizs.edit', [$tipoMatriz->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>