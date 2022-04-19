<style>
    .select2-container--default .select2-search--inline .select2-search__field,
    .select2-container {
        width: 100% !important;
    }
</style>
<link href="{{asset('backend/css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" />
<script src="{{asset('backend/js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#reservation').daterangepicker({
            format: 'MM/DD/YYYY'
        });
    });
    //san pham
    if ($('#product_ids').length) {
        select2_($('#product_ids'));
    }
    if (typeof product_ids != 'undefined') {
        pre_select2('product_ids','products', product_ids)
    }
    //Loại trừ sản phẩm
    if ($('#exclude_product_ids').length) {
       
        select2_($('#exclude_product_ids'));
    }
    if (typeof exclude_product_ids != 'undefined') {
        pre_select2('exclude_product_ids','products', exclude_product_ids)
    }
    //danh muc san pham
    if ($('#product_categories').length) {
        select2_($('#product_categories'));
    }
    if (typeof product_categories != 'undefined') {
        pre_select2('product_categories','category_products', product_categories)
    }
    //Loại trừ danh muc san pham
    if ($('#exclude_product_categories').length) {
        select2_($('#exclude_product_categories'));
    }
    if (typeof exclude_product_categories != 'undefined') {
        pre_select2('exclude_product_categories','category_products', exclude_product_categories)
    }
    function pre_select2(id,module, value, select = 'title', condition = '', key = 'id') {
        module = module.replace('"', '');
        module = module.replace('"', '');
        var studentSelect = $('#' + id);
        $.ajax({
            type: 'POST',
            url: BASE_URL_AJAX + "pre-select2",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                value: value,
                module: module,
                select: select,
                key: key
            },
            success: function(data) {
                let json = JSON.parse(data);
                if (json.items != 'undefined' && json.items.length) {
                    for (let i = 0; i < json.items.length; i++) {
                        var option = new Option(json.items[i].text, json.items[i].id, true, true);
                        studentSelect.append(option).trigger('change');
                    }
                }
            }
        });
    }
    function select2_(object, select = "title", condition = '') {
        let title = object.attr('data-title');
        let module = object.attr('data-module');
     
        object.select2({
            
            minimumInputLength: 2,
            placeholder: title,
            ajax: {
                url: BASE_URL_AJAX + 'get-select2',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                deley: 250,
                data: function(params) {
                    return {
                        locationVal: params.term,
                        module: module,
                        select: select,
                        condition: condition,
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(obj, i) {
                            return obj
                        })
                    }

                },
                cache: true,
            }
        });
    }
    //tạo mã tự động
    $(document).on('click','.render_code', function(){
		let _this = $(this);
		_this.parents('.form-group').find('input[name="name"]').val(readerCode());
	});
    function readerCode(length = 8) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for (var i = 0; i < length; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
    //check % đơen hàng
    $(document).on('keyup', '#valueCoupon', function () {
        let type = $(this).parent().parent().find('select[name=type] option:selected').val();
        let value = $(this).val();
        if(type == 'fixed_cart_percent' || type == 'fixed_percent'){
            if(value > 100){
                $(this).val(100);
            }
            return false;
        }
    });
    $(document).on('change', 'select[name=typecoupon]', function () {
        let type = $(this).val();
        let data =  $('#valueCoupon').val();
        if(type == 'fixed_cart_percent' || type == 'fixed_percent'){
            if(data > 100){
                $('#valueCoupon').val(100);
            }
            return false;
        }
    });
</script>