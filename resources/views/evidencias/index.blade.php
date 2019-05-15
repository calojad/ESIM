@extends('layouts.app')
@section('content-header')
    <h1>
        {{config('app.name','EVAL')}}
        <small>Evidencias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fas fa-home"></i> Home</a></li>
        <li>Evidencias</li>
    </ol>
@endsection
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px">
                    <a class="btn btn-primary pull-right" href="{!! route('evidencias.create') !!}">Add New</a>
                </div>
                <div class="col-md-12 table-responsive">
                    @include('evidencias.table')
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#evidencias-table').DataTable({
                pagingType: "full_numbers",
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                autoWidth: true,
                retrieve: true,
                responsive: true,
                columnDefs: [
                    { type: 'num-html', targets: 0 }
                ]
            });
        });
    </script>
@endsection

