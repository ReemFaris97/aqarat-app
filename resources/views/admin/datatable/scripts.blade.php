<!-- Datatables-->
<script src="{{asset('_admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('_admin/assets/pages/datatables.init.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
        $('#datatable-keytable').DataTable( { keys: true } );
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable( { ajax: "{{asset('_admin/assets/plugins/datatables/json/scroller-demo.json')}}", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
        var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
    } );
    TableManageButtons.init();

</script>
