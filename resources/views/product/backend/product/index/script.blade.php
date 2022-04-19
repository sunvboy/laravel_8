

<link href="{{asset('backend/css/toastr/toastr.min.css')}}" rel="stylesheet">
<script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
<script>
   
    //tìm kiếm theo kí tự
    function selectMultipe(object, select = "title") {
        let condition = object.attr('data-condition');
        let title = object.attr('data-title');
        let module = object.attr('data-module');
        let key = object.attr('data-key');
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
                        key: key,
                        select: select,
                        condition: condition,
                    };
                },
                processResults: function(data) {
                    // console.log(data);
                    return {
                        results: $.map(data, function(obj, i) {
                            // console.log(obj);
                            return obj
                        })
                    }

                },
                cache: true,
            }
        });
    }

    $('.selectMultipe').each(function(key1, index) {
        let _this = $(this);
        let select = _this.attr('data-select');
        select = (typeof select == 'undefined') ? 'title' : select;

        let key = _this.attr('data-key');
        key = (typeof key == 'undefined') ? 'id' : key;

        let module = _this.attr('data-module');
        let json = _this.attr('data-json');
        value = (typeof json != "undefined") ? window.atob(json) : '';
        if (value != '') {
            $.ajax({
                type: 'POST',
                url: BASE_URL_AJAX + 'get-select2',
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
                            console.log(option);
                            _this.append(option).trigger('change');
                        }
                    }
                }
            });
        }
        selectMultipe($(this), select);
    });
    //end
    $(document).on('select2:select', 'select[name="catalogueid"]', function(e) {
        let _this = $(this);
        let catalogueid = _this.val();

        $.post(BASE_URL_AJAX + "product/get-attrid", {
                catalogueid: catalogueid,
                "_token": $('meta[name="csrf-token"]').attr("content"),
            },
            function(data) {
                let json = JSON.parse(data);
                let html = '';
                let attribute_catalogue1 = json.attribute_catalogue;
                if (attribute_catalogue1 == '') {
                    html = '<li> Danh mục không có thuộc tính</li>';
                } else {
                    html = attribute_catalogue1;
                }
                $('.list_attr_catalogue').html('').html(html);
            });
    });
    $(document).on('click', '.attr', function() {
        if ($(this).find('input[name="attr[]"]:checked').length) {
            $(this).find('input[name="attr[]"]').prop('checked', false);
            $(this).find('.label-checkboxitem').removeClass('checked');
        } else {
            $(this).find('input[name="attr[]"]').prop('checked', true);
            $(this).find('.label-checkboxitem').addClass('checked');
        }

        let attr = '';
        $('#choose_attr').find('.form-control').html('');
        $('input[name="attr[]"]:checked').each(function(key, index) {
            let id = $(this).val();
            let text = $(this).parent('div').text();
            let attr_id = $(this).parents('li').attr('data-keyword');
            attr = attr + attr_id + ';' + id + ';';
            $('#choose_attr').find('.form-control').append('<label class="btn btn-sm btn-success">' + text + '<span class="del" data-id="' + id + '">&nbsp;x</span></label>');
        });
        if (attr == '') {
            $('#choose_attr').find('.form-control').html('<span>Chọn thuộc tính</span>');
        }
        $('#choose_attr > input').val(attr).change();
    })
    $(document).on('click', '#choose_attr .del', function() {
        let _this = $(this);
        let id = _this.attr('data-id');
        let attr = '';
        $('input[name="attr[]"]:checked').each(function(key, index) {
            let id_check = $(this).val();
            if (id == id_check) {
                $(this).prop('checked', false);
                $(this).parent('div').find('label').removeClass('checked');
                _this.parents('label').remove();
            } else {
                let text = $(this).parent('div').text();
                let attr_id = $(this).parents('li').attr('data-keyword');
                attr = attr + attr_id + ';' + id_check + ';';
            }
        });
        $('#choose_attr > input').val(attr).change();
    })
    $(document).on('click', '#choose_attr', function() {
        if ($('input[name="attr[]"]:checked').length == 0) {
            $('#choose_attr').find('.form-control').html('<span>Chọn thuộc tính</span>');
        }
        $('#choose_attr').find('.list_attr_catalogue').show();
    })
    //xử lý khoảng giá
    $(document).on('click', '#filter_price div:eq(0)', function () {
        console.log(1);
        let _this = $(this);
        $('#filter_price').find('div:eq(1)').show();
    })
    $(document).mouseup(function (e) {
        let start_price = $('#filter_price').find('input[name="start_price"]').val();
        let end_price = $('#filter_price').find('input[name="end_price"]').val();
        if (start_price == 0 && end_price == 0) {
            let container = $("#filter_price div:eq(1)");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        }
        start_price = replace(start_price);
        end_price = replace(end_price);
        if (parseFloat(start_price) < parseFloat(end_price)) {
            let container = $("#filter_price div:eq(1)");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        }
    });
    $(document).on('change', 'input[name="start_price"], input[name="end_price"]', function () {
        let _this = $(this);
        let start_price = _this.parent('div').find('input[name="start_price"]').val();
        let end_price = _this.parent('div').find('input[name="end_price"]').val();
        start_price = replace(start_price);
        end_price = replace(end_price);
        if (end_price != 0) {
            if (parseFloat(start_price) >= parseFloat(end_price)) {
                toastr.warning('Giá bắt đầu không thể nhỏ hơn giá kết thúc', '');
            } else {
                _this.parents('#filter_price').find('div:eq(0)').html('Giá từ <b>' + addCommas(start_price) + '</b> đ đến <b>' + addCommas(end_price) + '</b> đ');
                _this.find('div:eq(1)').slideToggle();
            }
        }

    })
    // tìm kiếm nâng cao
    $(document).on('click', '.full-search', function (e) {
        e.preventDefault();
        $('.filter-more').toggleClass('hidden');
        if ($('.filter-more').hasClass('filter-more-open')) {
            $('.full-search').html('Bỏ tìm kiếm nâng cao ');
        } else {
            $('.full-search').html('Tìm kiếm nâng cao');
            $('.filter-more').find('input').trigger('change');
            $('.filter-more').find('select').trigger('change');
        }
    })
    //filter search

    var time;
    $(document).on('keyup change', '.filter', function () {
        let page = $('.pagination .active a').text();
        time = setTimeout(function () {
            get_list_object(page);
        }, 500);
        return false;
    });
    $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            get_list_object(page);
    });
    function get_list_object(page = 1) {

    let keyword = $('.keyword').val();
    let catalogueid = $('.catalogueid').val();
    let brand = $('select[name="brands[]"]').val();
    let tag = $('select[name="tags[]"]').val();
    let start_price = $('input[name="start_price"]').val();
    let end_price = $('input[name="end_price"]').val();
    let attr = $('input[name="attr"]').val();
    let param = {
        'page': page,
        'keyword': keyword,
        'catalogueid': catalogueid,
        'brand': brand,
        'tag': tag,
        'start_price': start_price,
        'end_price': end_price,
        'attr': attr,
    }
    let ajaxUrl = BASE_URL_AJAX+'product/list-product';
    $.get(ajaxUrl, {
            keyword: param.keyword,
            page: param.page,
            catalogueid: param.catalogueid,
            brand: param.brand,
            tag: param.tag,
            attr: param.attr,
            start_price: param.start_price,
            end_price: param.end_price,
            "_token": $('meta[name="csrf-token"]').attr("content")
        },
        function (data) {
            $('#example2_wrapper').html(data);
        });
    }

</script>
