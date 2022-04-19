<!-- bootstrap 3.0.2 -->
<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="{{ asset('backend/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
@yield('css-dashboard')
<link href="{{ asset('backend/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<link href="{{ asset('backend/css/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<link href="{{asset('backend/css/select2/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>
<script>
    function sweet_error_alert(title, message) {
        swal({
            title: title,
            text: message
        });
    }
</script>
<script src="{{ asset('plugin/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
