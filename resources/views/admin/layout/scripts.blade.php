<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('_admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('_admin/assets/js/bootstrap-rtl.min.js')}}"></script>
<script src="{{asset('_admin/assets/js/detect.js')}}"></script>
<script src="{{asset('_admin/assets/js/fastclick.js')}}"></script>
<script src="{{asset('_admin/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('_admin/assets/js/waves.js')}}"></script>
<script src="{{asset('_admin/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('_admin/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('_admin/assets/js/jquery.scrollTo.min.js')}}"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="{{asset('_admin/assets/plugins/jquery-knob/excanvas.js')}}"></script>
<![endif]-->
<script src="{{asset('_admin/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('_admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/raphael/raphael-min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('_admin/assets/pages/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('_admin/assets/js/jquery.core.js')}}"></script>
<script src="{{asset('_admin/assets/js/jquery.app.js')}}"></script>

@jquery
@toastr_js
@toastr_render


<!-- Toastr Script -->
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

</script>
