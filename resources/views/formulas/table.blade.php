<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="formulas-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Abreviatura</th>
            <th>Formula</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formulas as $formula)
        <tr>
            <td>{!! $formula->nombre !!}</td>
            <td>{!! $formula->abreviatura !!}</td>
            <td>`{!! $formula->formula !!}`</td>
            <td><label class="label {!! $formula->estado==1?'label-success':'label-danger' !!}">{!! $formula->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['formulas.destroy', $formula->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('formulas.edit', [$formula->id]) !!}" class='btn btn-default btn-xs btnLoader' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')", 'title' => 'Eliminar']) !!}
                    <a href="{{ route('formulaVariables.edit', $formula->id) }}" class='btn btn-success btn-xs' title="Variables"><i class="fa fa-superscript"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>