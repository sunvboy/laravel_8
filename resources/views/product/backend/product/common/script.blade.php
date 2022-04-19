<link href="{{asset('backend/css/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/css/toastr/toastr.min.css')}}" rel="stylesheet">
<script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $('.select2').select2();
    $('.select3').select2();

    function selectMultipe(object, select = "title") {
        let condition = object.attr('data-condition');
        let title = object.attr('data-title');
        let module = object.attr('data-module');
        let key = object.attr('data-key');
        object.select2({
            minimumInputLength: 0,
            placeholder: title,
            ajax: {
                url: BASE_URL_AJAX + 'select2',
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
        let parse = JSON.parse(value);
        if (parse != 'undefined' && parse.length) {
            for (let i = 0; i < parse.length; i++) {
                var option = new Option(parse[i].text,parse[i].id, true, true);
                _this.append(option).trigger('change');
            }
        }
        // if (value != '') {
        //     $.ajax({
        //         type: 'POST',
        //         url: BASE_URL_AJAX + 'select2',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: {
        //             value: value,
        //             module: module,
        //             select: select,
        //             key: key
        //         },
        //         success: function(data) {
        //             let json = JSON.parse(data);
        //             console.log('d');

        //             if (json.items != 'undefined' && json.items.length) {
        //                 for (let i = 0; i < json.items.length; i++) {
        //                     var option = new Option(json.items[i].text, json.items[i].id, true, true);
        //                     console.log(option);
        //                     _this.append(option).trigger('change');
        //                 }
        //             }
        //         }
        //     });

        // }
        selectMultipe($(this), select);
    });
</script>
<script type="text/javascript">
    //======================xử lí khối thêm phiên bản======================
    $(document).on('click', '.block-version .show-version', function(e) {
        e.preventDefault();
        let _this = $(this);
        _this.parent('div').find('.hide-version').show();
        _this.hide();
        _this.parents('.block-version').find('.ibox-content').show();
    });
    $(document).on('click', '.block-version .hide-version', function(e) {
        e.preventDefault();
        let _this = $(this);
        _this.parents('.block-version').find('.show-version').show();
        _this.parents('.block-version').find('.hide-version').hide();
        _this.parents('.block-version').find('.ibox-content').hide();
    });
    var attribute_catalogue = [];
    $(document).on('click', '.add-attribute', function() {
        let _this = $(this);
        let attr = _this.attr('data-attribute');
        $('.block-attribute').find('table tbody').append(render_attribute(attr, attribute_catalogue));
        check_attribute();
        $('.select3').each(function(key, index) {
            $(this).select2();
        });
        $countAttr = $('.block-attribute table tbody').find('tr').length;
        $countattribute_catalogue = $('.block-version').attr('data-countattribute_catalogue');
        if (parseFloat($countAttr) >= parseFloat($countattribute_catalogue)) {
            $('.add-attribute').hide()
        } else {
            $('.add-attribute').show()
        }
    });

    $(document).on('select2:select', '.block-attribute select', function(e) {
        get_vesion();
    });
    $(document).on('select2:unselect', '.block-attribute select', function(e) {
        get_vesion();
    });
    $(document).on('click', '.block-attribute .delete-attribute', function() {
        let _this = $(this);
        _this.parents('tr').remove();
        let val = _this.parents('tr').find('select[name="attribute_catalogue[]"] option:checked').val();
        $('.block-attribute select[name="attribute_catalogue[]"]').find("option[value=" + val + "]").prop('disabled', false);
        $('.block-attribute select[name="attribute_catalogue[]"]').select2("destroy").select2();
        get_vesion();
        check_attribute();
        let pos = attribute_catalogue.indexOf(val);
        attribute_catalogue.splice(pos, 1);

        $countAttr = $('.block-attribute table tbody').find('tr').length;
        $countattribute_catalogue = $('.block-version').attr('data-countattribute_catalogue');
        if (parseFloat($countAttr) >= parseFloat($countattribute_catalogue)) {
            $('.add-attribute').hide()
        } else {
            $('.add-attribute').show()
        }

    });
    $(document).on('select2:select', '.block-attribute tbody tr select ', function() {
        console.log(1);
        let _this = $(this);
        let catalogueid = _this.parents('tr').find('select[name="attribute_catalogue[]"]').val();
        if (catalogueid == 2) {
            let text = _this.text();
            attribute = [];
            attributeid = [];
            let index = _this.parents('tr').find('td:first').attr('data-index');

            _this.parents('tr').find('select[name="attribute[' + index + '][]"] option:selected').each(function() {
                attribute.push($(this).text());
                attributeid.push($(this).val());
            });
            // $('.block-color').show();
            // $('.block-color .row').html('').html(html_block_color(attributeid, attribute));
        }
    });

    $(document).on('change', 'select[name="attribute_catalogue[]"]', function() {
        let _this = $(this);
        check_attribute(_this);
        let catalogueid = _this.val();

        if (catalogueid != 0) {
            let index = _this.parents('tr').find('td:first').attr('data-index');
            _this.parents('tr').find('td:eq(2)').html(render_select2(catalogueid, index));
        } else {
            _this.parents('tr').find('td:eq(2)').html('<input type="text" class="form-control" disabled="disabled">');
        }
        $('.selectMultipe').each(function(key, index) {
            console.log('ddd');
            selectMultipe($(this));
        });
    });
    //click "Sản phảm biến thể"
    $(document).on('click', 'input[name="checkbox[]"]', function() {
        let val = $(this).parents('td').find('input[name="checkbox_val[]"]').val();
        if (val == 1) {
            $(this).parents('td').find('input[name="checkbox_val[]"]').val(0);
        } else {
            $(this).parents('td').find('input[name="checkbox_val[]"]').val(1);
        }
    });

    $(document).on('change', '.block-attribute input[name="checkbox[]"]', function() {
        let check = $('input[name="checkbox[]"]:checked').length;
        if (check > 4) {
            toastr.warning('Chọn nhiều nhất 2 thuộc tính để tạo phiên bản', '');
            $(this).prop('checked', false);
            $(this).parents('td').html('<input type="checkbox" name="checkbox[]" value="" class="checkbox-item"><div for="" class="label-checkboxitem"></div>');
        }
        get_vesion()
    });

    //Hết hàng
    $(document).on('click', 'input[name="checkbox_version[]"]', function() {
        let val = $(this).parents('td').find('input[name="status_version[]"]').val();
        console.log(val);
        if (val == 1) {
            $(this).parents('td').find('input[name="status_version[]"]').val(0);
        } else {
            $(this).parents('td').find('input[name="status_version[]"]').val(1);
        }
    });

    function render_select2(condition = '', index = '') {
        html = '<select name="attribute[' + index + '][]" data-condition="' + condition + '" data-json="" class="form-control selectMultipe" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.." data-module="attributes"  style="width: 100%;">';
        html = html + '</select>';
        return html;
    }

    function check_attribute(_this = '') {
        attribute_catalogue = new Array();
        $('.block-attribute select[name="attribute_catalogue[]"]').each(function() {
            let val = $(this).find('option:selected').val();
            if (val != 0) {
                attribute_catalogue.push(val);
            }
        });
        // xóa hết disable đi
        $('.block-attribute select[name="attribute_catalogue[]"]').find("option").removeAttr("disabled");
        for (let i = 0; i < attribute_catalogue.length; i++) {
            // thêm disable ở những cái nào trong mảng
            $('.block-attribute select[name="attribute_catalogue[]"]').find("option[value=" + attribute_catalogue[i] + "]").prop('disabled', !$('#one').prop('disabled'));
            $('.block-attribute select[name="attribute_catalogue[]"]').select2();
        }
        // // nếu cái option nào được chọn thì xóa disable cua nó đi
        $('.block-attribute select[name="attribute_catalogue[]"]').find("option:selected").removeAttr("disabled");

    }

    function render_attribute(attr, attribute_catalogue) {
        let index = $('.block-attribute tbody tr').length;
        attr = JSON.parse(window.atob(attr));
        let key = Object.keys(attr);
        let value = Object.values(attr);
        let html = '<tr>';
        html = html + '<td data-index="' + index + '" style="width: 10%">';
        html = html + '<input type="checkbox" name="checkbox[]" value="1" class="checkbox-item">';
        html = html + '<input type="text" name="checkbox_val[]" value="0" class="hidden">';
        html = html + '<div for="" class="label-checkboxitem"></div>';
        html = html + '</td>';
        html = html + '<td style="width: 30%">';
        html = html + '<select name="attribute_catalogue[]" class="form-control select3" style="width:100%" >';
        let pos = '';
        for (let i = 0; i < key.length; i++) {
            pos = attribute_catalogue.indexOf(key[i]);
            if (pos == -1) {
                html = html + '<option value="' + key[i] + '">' + value[i] + '</option>';
            } else {
                html = html + '<option disabled="disabled" value="' + key[i] + '">' + value[i] + '</option>';
            }
        }
        html = html + '</select>';
        html = html + '</td>';
        html = html + '<td style="width: 50%">';
        html = html + '<input type="text" class="form-control" disabled="disabled">';
        html = html + '</td>';
        html = html + '<td style="width: 10%">';
        html = html + '<a type="button" class="btn btn-danger delete-attribute"  data-id="" ><i class="fa fa-trash-o"></i></a>';
        html = html + '</td>';
        html = html + '</tr>';
        return html;
    }

    function get_vesion() {
        let price = $('input[name="price"]').val();
        let price_sale = $('input[name="price_sale"]').val();

        let code_main = $('input[name="code"]').val();
        let attribute = new Array();
        let attributeid = new Array();
        $('.block-attribute table tbody tr').each(function(key, value) {
            if ($(this).find('select[name="attribute_catalogue[]"]').length) {
                if ($(this).find('input[name="checkbox[]"]:checked').length) {

                    let index = $(this).find('td:first').attr('data-index');
                    if ($(this).find('select[name="attribute[' + index + '][]"] option:selected').length) {
                        attribute[key] = new Array();
                        attributeid[key] = new Array();
                    }
                    $(this).find('select[name="attribute[' + index + '][]"] option:selected').each(function() {
                        attribute[key].push($(this).text());
                        attributeid[key].push($(this).val());
                    });
                }
            }
        });
        let attribute1 = [];
        let attributeid1 = [];
        attribute.forEach(function(item, index, array) {
            if (typeof item != "undefined") {
                attribute1.push(item);
                attributeid1.push(attributeid[index]);
            }
        });
        //console.log('đây là mảng danh mục thuộc tính',attribute);
        //console.log(attributeid1);

        $('.block-version #table_version tbody').html('');
        $('.block-attribute').siblings('table').hide();
        let index = 1;
        for (var i in attribute1[0]) {
            if (typeof attribute1[1] != "undefined") {
                for (var j in attribute1[1]) {
                    if (typeof attribute1[2] != "undefined") {
                        for (var k in attribute1[2]) {

                            if (typeof attribute1[3] != "undefined") {
                                for (var l in attribute1[3]) {
                                    let id_attr = attributeid1[0][i] + ':' + attributeid1[1][j] + ':' + attributeid1[2][k] + ':' + attributeid1[3][l];
                                    let title = attribute1[0][i] + '/' + attribute1[1][j] + '/' + attribute1[2][k] + '/' + attribute1[3][l];
                                    code = code_main + '-' + index;
                                    index = index + 1;
                                    $('.block-version #table_version tbody').append(render_version(title, price, code, id_attr));
                                    $('.block-version .ibox-content #table_version').show();
                                }
                            } else {
                                let id_attr = attributeid1[0][i] + ':' + attributeid1[1][j] + ':' + attributeid1[2][k];
                                let title = attribute1[0][i] + '/' + attribute1[1][j] + '/' + attribute1[2][k];
                                code = code_main + '-' + index;
                                index = index + 1;
                                $('.block-version #table_version tbody').append(render_version(title, price, code, id_attr));
                                $('.block-version .ibox-content #table_version').show();
                            }
                        }

                    } else {
                        let id_attr = attributeid1[0][i] + ':' + attributeid1[1][j];
                        let title = attribute1[0][i] + '/' + attribute1[1][j];
                        code = code_main + '-' + index;
                        index = index + 1;
                        $('.block-version #table_version tbody').append(render_version(title, price, code, id_attr));
                        $('.block-version .ibox-content #table_version').show();
                    }
                }
            } else {
                let id_attr = attributeid1[0][i];
                let title = attribute1[0][i];
                code = code_main + '-' + index;
                index = index + 1;
                $('.block-version #table_version tbody').append(render_version(title, price, code, id_attr));
                $('.block-version .ibox-content #table_version').show();
            }
        }
    }

    function render_version(title = '', price = '', code = '', id_attr = '') {
        let html = '<tr>';
        html = html + '<td style="width: 35%;">';
        html = html + '<input type="text" name="id_version[]" value="' + id_attr + '" class="hidden">';
        html = html + '<input type="text" name="title_version[]" readonly value="' + title + '" class="form-control"  autocomplete="off" ></td>';
        html = html + '<td style="width: 25%;"><input type="text" name="price_version[]" value="' + addCommas(price) + '" class="form-control int"  autocomplete="off" ></td>';
        html = html + '<td style="width: 30%;"><input type="text" name="code_version[]" value="' + code + '" class="form-control"  autocomplete="off" ></td>';
        html = html + '<td style="width: 20%;"><input type="checkbox" name="checkbox_version[]" value="1" class="checkbox-item"><input type="text" name="status_version[]" value="0" class="hidden"><div for="" class="label-checkboxitem"></div></td>';
        html = html + '</tr>';
        return html;
    }
</script>