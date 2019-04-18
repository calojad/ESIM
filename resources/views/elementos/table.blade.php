<table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="elementos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Importancia</th>
            <th>Duplicar</th>
            <th>Estado</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($elementos as $elemento)
        <tr>
            <td data-order="{{explode($elemento->nombre,'.')[0]}}">{!! str_limit($elemento->nombre,90) !!}</td>
            <td style="text-align: center"><span style="font-size: 14pt;" class="fa {!! $elemento->importancia==1?'fa-check-square':'fa-minus' !!}"></span></td>
            <td style="text-align: center"><span style="font-size: 14pt;" class="fa {!! $elemento->duplicar>0?'fa-check-square':'fa-minus' !!}"></span></td>
            <td><label class="label {!! $elemento->estado==1?'label-success':'label-danger' !!}">{!! $elemento->estado==1?'Activo':'Inactivo' !!}</label></td>
            <td>
                {!! Form::open(['route' => ['elementos.destroy', $elemento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('elementos.show', [$elemento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('elementos.edit', [$elemento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>