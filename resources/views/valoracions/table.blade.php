<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="valoracions-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Abreviatura</th>
            <th>Valor</th>
            <th>Rango</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($valoracions as $valoracion)
        <tr>
            <td>{!! $valoracion->nombre !!}</td>
            <td><span class="{!! $valoracion->color !!} color-palette" style="padding: 10px">{!! $valoracion->abreviatura !!}</span></td>
            <td>{!! $valoracion->valor !!}</td>
            <td>{!! $valoracion->rango_inicio !!} - {!! $valoracion->rango_fin !!}</td>
            <td><label class="label {!! $valoracion->estado==1?'label-success':'label-danger' !!}">{!! $valoracion->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['valoracions.destroy', $valoracion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('valoracions.show', [$valoracion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('valoracions.edit', [$valoracion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript" charset="utf-8">
    $(function () {
        $('#valoracions-table').DataTable({
            pagingType: "full_numbers",
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            order: [[ 2, "desc" ]],
            autoWidth: true,
            retrieve: true,
            responsive: true
        });
    });
</script>