<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="matrizs-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Periodo</th>
            <th>Carrera</th>
            <th>Departamento</th>
            <th>Tipo Evaluacion</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($matrizs as $matriz)
        <tr>
            <td>{!! $matriz->nombre !!}</td>
            <td>{!! $matriz->modelo->nombre !!}</td>
            <td>{!! $matriz->periodo->nombre !!}</td>
            <td>{!! $matriz->carrera->nombre !!}</td>
            <td>{!! $matriz->departamento->nombre !!}</td>
            <td>{!! $matriz->tipoEvaluacion->nombre !!}</td>
            <td><label class="label {!! $matriz->estado==1?'label-success':'label-danger' !!}">{!! $matriz->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['matrizs.destroy', $matriz->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
{{--                    <a href="{!! route('matrizs.show', [$matriz->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('matrizs.edit', [$matriz->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>