<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px" >
                <a class="btn btn-primary pull-right" href="{!! route('formulas.create') !!}">Add New</a>
            </div>
            <div class="col-md-12 table-responsive">
                @include('formulas.table')
            </div>
        </div>
    </div>
    <div class="text-center">
    
    </div>
</div>