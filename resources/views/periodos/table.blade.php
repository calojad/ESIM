<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="periodos-table">
    <thead>
        <tr>
            <th>Tipo Periodo</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($periodos as $periodo)
        <tr>
            <td>{!! $periodo->tipoPeriodo->nombre !!}</td>
            <td>{!! $periodo->nombre !!}</td>
            <td>{!! DateTime::createFromFormat('Y-m-d H:i:s', $periodo->fecha_inicio)->format('d-M-Y') !!}</td>
            <td>{!! DateTime::createFromFormat('Y-m-d H:i:s', $periodo->fecha_fin)->format('d-M-Y') !!}</td>
            <td><label class="label {!! $periodo->estado==1?'label-success':'label-danger' !!}">{!! $periodo->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['periodos.destroy', $periodo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('periodos.show', [$periodo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('periodos.edit', [$periodo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>