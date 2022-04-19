<link href="{{asset('backend/css/colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<script src="{{asset('backend/js/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
		
<script>
    if($('.colorpicker-element').length){
		console.log(1);
		$('.demo1').colorpicker();
		var divStyle = $('#demo_apidemo')[0].style;
		$('.demo1').colorpicker({
		    color: divStyle.backgroundColor
		}).on('changeColor', function(ev) {
		    divStyle.backgroundColor = ev.color.toHex();
		});
		$('.clockpicker').clockpicker();
	}
</script>