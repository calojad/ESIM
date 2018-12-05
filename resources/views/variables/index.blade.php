<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px" >
                <a class="btn btn-primary pull-right btnLoader" href="{!! route('variables.create') !!}">Add New</a>
            </div>
            <div class="col-md-12 table-responsive">
                @include('variables.table')
            </div>
        </div>
    </div>
    <div class="text-center">
    
    </div>
</div>