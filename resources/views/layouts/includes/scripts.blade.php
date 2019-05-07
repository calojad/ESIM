<!-- jQuery 3.1.1 -->
{!! Html::script('plugins/jquery/jquery-3.3.1.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('boostrap-3.3.7/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
<!-- Select2 -->
{!! Html::script('adminLTE-2.4.5/bower_components/select2/dist/js/select2.min.js') !!}
<!-- DataTables -->
{!! Html::script('adminLTE-2.4.5/bower_components/datatables/js/jquery.dataTables.js') !!}
{!! Html::script('adminLTE-2.4.5/bower_components/datatables/js/dataTables.bootstrap.js') !!}
{!! Html::script('adminLTE-2.4.5/bower_components/datatables/js/num-html.js') !!}
<!-- jQuery-Alerts -->
{!! Html::script('plugins/jquery_alerts/jquery-confirm.min.js') !!}
<!-- SlimScroll -->
{!! Html::script('adminLTE-2.4.5/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('adminLTE-2.4.5/bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('adminLTE-2.4.5/dist/js/adminlte.min.js') !!}
<!-- TreeView -->
{!! Html::script('plugins/easy-tree/easyTree.js') !!}
<script type="text/javascript">
    $(function () {
        $('.table').DataTable({
            pagingType: "full_numbers",
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            autoWidth: true,
            retrieve: true,
            responsive: true,
        });
    });
    $(".UpperCase,input[name=nombre]").on("keypress blur", function () {
        $input=$(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        },50);
    })
</script>