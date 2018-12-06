@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Formulas Variables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Formulas Variables</li>
        <li>Nuevo</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary box-solid">
            <div class="box-header"><h3 class="box-title">Formula</h3></div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Nombre:</dt>
                            <dd>{{ $formula->nombre }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Formula:</dt>
                            <dd style="font-size: 22pt">{!! $formula->formula !!}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="col-md-12">
                            <dt>Abrebiatura:</dt>
                            <dd>{{ $formula->abreviatura }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-warning box-solid">
            <div class="box-header"><h3 class="box-title">Seleccione las variables correspondientes a la Formula.</h3></div>
            <div class="box-body">
                {{ Form::open(['route' => 'formulaVariables.store']) }}
                <input type="hidden" name="formula_id" value="{{ $formula->id }}">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
                <hr>
                <div class="container" style="border: 1px solid #E1E1E1; padding: 25px; border-radius: 8px">
                    <table class="table table-responsive table-striped table-bordered table-hover table-checkable datatable" id="formulaVariables-table">
                        <thead>
                            <tr>
                                <th>Variable</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($variables as $v)
                            <tr>
                                <td>{!! $v->variable !!}</td>
                                <td>
                                    {{ Form::checkbox('chkSelVariable[]', $v->id, null, ['class' => 'inputIcheck']) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function () {
        $('.inputIcheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
        $('#formulaVariables-table').DataTable({
            paging: false,
            lengthChange: true,
            searching: true,
            ordering: true,
            autoWidth: true,
            retrieve: true,
            responsive: true,
            scrollY: '30vh'
        });
    });
</script>
@endsection