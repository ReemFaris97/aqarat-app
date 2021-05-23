<!-- Multi Select Plugin Js -->


<!-- Jquery Core Js -->
{!!Html::script('_admin/plugins/jquery/jquery.min.js')!!}
<!-- Bootstrap Core Js -->
{!!Html::script('_admin/plugins/bootstrap/js/bootstrap.min.js')!!}
<!-- Select Plugin Js -->
{!!Html::script('_admin/plugins/bootstrap-select/js/bootstrap-select.min.js')!!}
<!-- Slimscroll Plugin Js -->
{!!Html::script('_admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}
<!-- Waves Effect Plugin Js -->
{!!Html::script('_admin/plugins/node-waves/waves.min.js')!!}
<!-- Custom Js -->
{!!Html::script('_admin/js/admin.js')!!}
{!!Html::script('_admin/cus/sweetalert.min.js')!!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- crud Operations -->
{!!Html::script('_admin/crud/crud.js')!!}
<!-- end -->
<script type="text/javascript">
    var lis = $('.check_active');

    lis.each(function (index) {
        if ($(this).attr('href') === "{!!url('/')!!}" + window.location.pathname) {
            $(this).parent().addClass('active');
            $(this).parent().parent().parent().addClass('active');

        }
        // console.log($(this).attr('href'));
    });
</script>
<script type="text/javascript">
    $(window).load(function () {
        if ($(window).width() < 481) {
            $('.dt-buttons').hide();
        }
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>
<script>

    window.onload = function () {
        $(".loader").fadeOut(500);
    };

</script>

@if(Session::has('success'))
    <script>
        new Noty({
            type: 'info',
            layout: 'topRight',
            text: '{!! Session::get('success') !!}'
        }).show();
    </script>
@elseif(Session::has('error'))
    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: '{!! Session::get('error') !!}'
        }).show();
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


{{--{!! Html::script('admin/plugins/ckeditor/ckeditor.js') !!}--}}

<script>

    $(document).ready(function () {

        $('.editor').summernote({
            // placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

</script>

<!-- Validation js (Parsleyjs) -->
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //TableManageButtons.init();
        $(document).ready(function () {
            $('form').parsley();
        });
        // This piece of code for toaster notification....

    });

</script>



