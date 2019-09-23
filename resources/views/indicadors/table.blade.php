<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="indicadors-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo Indicador</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($indicadors as $indicador)
        <tr>
            <td>{!! $indicador->nombre !!}</td>
            <td>{!! $indicador->tipoIndicador->nombre !!}</td>
            <td><label class="label {!! $indicador->estado==1?'label-success':'label-danger' !!}">{!! $indicador->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['indicadors.destroy', $indicador->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('indicadors.show', [$indicador->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('indicadors.edit', [$indicador->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>