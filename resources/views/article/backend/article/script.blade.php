<script src="{{ asset('backend/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('backend/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/css/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/css/toastr/toastr.min.css')}}" rel="stylesheet">
<script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $('.select2').select2();
    $('.select3').select2();
    $(function() {
        $("#editor1").wysihtml5({
            "image": false,
            "link": false,
            "font-styles": true,
        });
    });
</script>
<style>
    #editor1 {
        height: 200px;
    }
</style>
