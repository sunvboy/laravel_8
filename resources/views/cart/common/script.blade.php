<script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
<link href="{{asset('backend/css/toastr/toastr.min.css')}}" rel="stylesheet">
<script>
    $(function() {
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $(document).on('click', '.card-inc', function() {
            var quantity = parseInt($(this).parent().find('.card-quantity').val());
            quantity += 1;
            $(this).parent().find('.card-quantity').val(quantity);
            $(this).parent().parent().find('.addtocart').attr('data-quantity', quantity);
        });
        $(document).on('click', '.card-dec', function() {
            var quantity = parseInt($(this).parent().find('.card-quantity').val());
            if (quantity <= 1) {
                quantity = 1;
            } else {
                quantity -= 1;
            }
            $(this).parent().find('.card-quantity').val(quantity);
            $(this).parent().parent().find('.addtocart').attr('data-quantity', quantity);
        });

        //chọn thuộc tính version
        $(document).on('click', '.swatch-option', function() {
            let _this = $(this).parent();
            let __this = $(this).parent().parent().parent();
            //xóa selected có trong thẻ li của ul chứa li click 
            _this.find('.swatch-option').removeClass('selected')
            //tìm đến li click thêm class selected
            _this.find(this).addClass('selected');
            //remove class selected ở ul cha
            _this.parent().find('ul').removeClass('selected');
            _this.addClass('done');
            let count_version = __this.find('.addtocart').attr('data-count-version');
            let check = __this.find('.swatch-option.selected').length;
            let attr = '';
            __this.find('.swatch-option.selected').each(function(key, index) {
                let id = $(this).attr('data-id');
                attr = attr + ';' + id;
            });

            if (count_version == check) {
                $.get('<?php echo route('cart.getversion') ?>', {
                        attr: attr,
                        id: __this.find('.addtocart').attr('data-id'),
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    function(data) {
                        var json = JSON.parse(data);
                        __this.find('.card-price').html(numberWithCommas(json.price_version) + ' VNĐ');
                        //thực hiện add attr giỏ hàng
                        __this.find('.addtocart').attr('data-price', json.price_version);
                        __this.find('.addtocart').attr('data-title-version', json.title_version);
                        __this.find('.addtocart').attr('data-id-version', json.id_sort);
                    });
                return false;

            }
        });
        //submit thêm vào giỏ hàng
        $(document).on('click', '.addtocart', function() {
            let _this = $(this).parent().parent();
            let id = $(this).attr('data-id');
            let count_version = $(this).attr('data-count-version');
            let count_version_check = _this.find('ul li.selected').length;
            _this.find('.list-version').removeClass('selected');
            if (count_version_check == count_version) {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo route('cart.addtocart') ?>",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        id_version: $(this).attr('data-id-version'),
                        quantity: $(this).attr('data-quantity'),
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let json = JSON.parse(data);
                        if (json.error == '') {
                            _this.find('ul').removeClass('done');
                            _this.find('ul li.selected').removeClass('selected');
                            toastr.success(json.message, 'Thông báo!')

                        } else {
                            toastr.error(json.error, 'Error!')
                        }

                    }
                });
            } else {
                _this.find('.list-version').not('.done').addClass('selected');
            }
        });
        //tăng giỏ hàng item => view giỏ hàng
        $(document).on('click', '.plus', function() {
            var quantity = parseInt($(this).parent().find('.card-quantity').val());
            quantity += 1;
            $(this).parent().find('.card-quantity').val(quantity);
            $(this).parent().parent().find('.addtocart').attr('data-quantity', quantity);
            let rowid = $(this).parent().parent().parent().attr('data-rowid');
            ajax_cart_update(rowid, quantity, 'update');

        });
        //giảm giỏ hàng item => view giỏ hàng
        $(document).on('click', '.minus', function() {
            var quantity = parseInt($(this).parent().find('.card-quantity').val());
            if (quantity <= 1) {
                quantity = 1;
            } else {
                quantity -= 1;
            }
            $(this).parent().find('.card-quantity').val(quantity);
            $(this).parent().parent().find('.addtocart').attr('data-quantity', quantity);
            let rowid = $(this).parent().parent().parent().attr('data-rowid');
            ajax_cart_update(rowid, quantity, 'update');

        });
        //update cart
        function ajax_cart_update(rowid, quantity, type) {
            $.ajax({
                type: 'GET',
                url: "<?php echo route('cart.updatecart') ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    rowid: rowid,
                    quantity: quantity,
                    type: type
                },
                success: function(data) {
                    let json = JSON.parse(data);
                    if (json.error == '') {
                        toastr.success(json.message, 'Thông báo!')
                        $('#main-cart').html(json.html);
                        if (json.total > 0 && json.total_items > 0) {
                            $('#total_cart_old').html(numberWithCommas(json.total) + ' VNĐ');
                            $('#total_cart_final').html(numberWithCommas(json.total_coupon) + ' VNĐ');
                            //thực hiện add coupon nếu có
                            $('.cart-discount').html(json.coupon_html);

                        }
                    } else {
                        toastr.error(json.error, 'Error!')
                    }
                }
            });
        }
        //change input số lượng
        $(document).on('change', '.card-quantity', function() {
            var quantity = parseInt($(this).parent().find('.card-quantity').val());
            let rowid = $(this).parent().parent().parent().attr('data-rowid');
            setTimeout(ajax_cart_update(rowid, quantity, 'update'), 800);
        });
        //xóa giỏ hàng
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
            let rowid = $(this).parent().parent().attr('data-rowid');
            ajax_cart_update(rowid, 0, 'delete');
        });
        //add coupon
        $(document).on('click', '#apply_coupon', function(e) {
            e.preventDefault();
            let name = $('#coupon_code').val();
            $.ajax({
                type: 'GET',
                url: "<?php echo route('cart.addcounpon') ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name
                },
                success: function(data) {
                    let json = JSON.parse(data);
                    if (json.error == '') {
                        $('.message-container').removeClass('alert alert-danger').addClass('alert alert-success');

                        $('.cart-discount').html(json.html);
                        $('#total_cart_final').html(json.total);

                        $('.message-container').html('').html(json.message);

                    } else {
                        $('.message-container').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.message-container').html('').html(json.error);
                        $('.message-container').trigger("reset");
                    }
                }
            });
        });
        //xóa coupon 
        $(document).on('click', '.remove-coupon', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: "<?php echo route('cart.deletecoupon') ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: $(this).attr('data-id'),
                },
                success: function(data) {
                    let json = JSON.parse(data);
                    if (json.error == '') {
                        $('.message-container').removeClass('alert alert-danger').addClass('alert alert-success');

                        $('.cart-discount').html(json.html);
                        $('#total_cart_final').html(json.total);

                        $('.message-container').html('').html(json.message);

                    } else {
                        $('.message-container').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.message-container').html('').html(json.error);
                        $('.message-container').trigger("reset");
                    }
                }
            });
        });
        //selected payment
        $(document).on('click', '.payment-item input[name="payment"]', function() {
            $('.small').hide();
            $(this).parent().parent().find('.small').show();
        });
        var payment = '<?php echo old('payment') ?>';
        var payment_type_zalopay = '<?php echo old('payment_type_zalopay') ?>';
        var payment_type_momo = '<?php echo old('payment_type_momo') ?>';
        if (payment != '') {
            $('#' + payment).prop('checked', true);
            $('#' + payment + ":checked").parent().parent().find('.small').show();
        }
        if (payment_type_zalopay != '') {
            $('#' + payment_type_zalopay).prop('checked', true);
        }
        if (payment_type_momo != '') {
            $('#' + payment_type_momo).prop('checked', true);
        }
    });
</script>
<!--tỉnh thanh quận huyện -->
@include('components.script.getLocation')