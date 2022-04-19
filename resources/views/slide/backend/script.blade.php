<script>
    function slide_render(src = '') {
        let html = '<div class="col-md-3">';
        html = html + '<div class="ibox">';
        html = html + '<div class="ibox-content product-box">';
        html = html + '<div class="product-imitation">';
        html = html + '<span class="image img-scaledown"><img src="' + src + '" alt="" /></span>';
        html = html + '<input type="text" name="slide[image][]" value="' + src + '" class="image-src" style="display:none;" />';
        html = html + '</div>';
        html = html + '<div class="product-desc">';
        html = html + '<input type="text" name="slide[title][]" value="" class="form-control image-title" style="margin-bottom:10px;" placeholder="Chú thích ảnh" autocomplete="off">';
        html = html + '<input type="text" name="slide[link][]" value="" class="form-control image-link" style="margin-bottom:10px;" placeholder="Đường dẫn" autocomplete="off">';
        html = html + '<textarea name="description" class="form-control image_description" style="margin-bottom:10px;" placeholder="Ghi chú"></textarea>';
        html = html + '<div class="uk-flex uk-flex-middle uk-flex-space-between">';
        html = html + '<span class="small-text" style="width:100px;">Vị trí</span>';
        html = html + '<input type="text" name="slide[order][]" value="0" class="form-control image-order" style="margin-bottom:10px;" placeholder="" autocomplete="off">';
        html = html + '</div>';
        html = html + '<div class="m-t text-righ">';
        html = html + '<a href="#" class="btn btn-xs btn-outline btn-danger delete-slide">Xóa <i class="fa fa-ban"></i> </a>';
        html = html + '</div>';
        html = html + '</div>';
        html = html + '</div>'
        html = html + '</div>';
        html = html + '</div>';
        return html;
    }

    function openKCFinderSlide(button) {
        window.KCFinder = {
            callBackMultiple: function(files) {
                window.KCFinder = null;
                for (var i = 0; i < files.length; i++) {
                    $('.upload-list').show();
                    $('.upload-list .row').prepend(slide_render(files[i]));
                    $('.click-to-upload ').hide();
                }
            }
        };
        window.open('<?php echo url('') ?>/plugin/kcfinder-3.12/browse.php?type=images&dir=images/public', 'kcfinder_image',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
            'resizable=1, scrollbars=0, width=1080, height=800'
        );
    }
    $(document).ready(function() {
        $('.alert').hide();
        $('.bg-loader').hide();
        $('.upload-list').hide();
        let addGroupSlide = $('#myModal');
        $(document).on('click', '.add-group', function() {
            let slideTitle = $('#title').val();
            let slideKeyword = $('#keyword').val();
            let formURL = "{{route('slide.category_store')}}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: formURL,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    title: slideTitle,
                    keyword: slideKeyword
                },
                success: function(response) {
                    addGroupSlide.modal('hide');
                    $('#myModal .alert').hide();
                    $("#folder-list").prepend(response.html);
                    swal({
                            title: "Thêm mới thành công", // this will output "Error 422: Unprocessable Entity"
                            html: 'Thêm mới thành công',
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Đóng",
                            cancelButtonText: "Hủy bỏ!",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            showCancelButton: false,
                            type: 'success'
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                },
                error: function(jqXhr, json, errorThrown) { // this are default for ajax errors 
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors['errors'], function(index, value) {
                        errorsHtml += value + '/ ';
                    });
                    $('#myModal .alert').html(errorsHtml).show();

                }
            });
        });


    });
    $(document).on('click', '.add-slide', function() {
        let img_title = [];
        let img_src = [];
        let img_link = [];
        let img_description = [];
        let img_order = [];
        let slideModal = $('#myModal2');
        $('.image-title').each(function() {
            img_title.push($(this).val());
        });
        $('.image-src').each(function() {
            img_src.push($(this).val());
        });
        $('.image-link').each(function() {
            img_link.push($(this).val());
        });
        $('.image_description').each(function() {
            img_description.push($(this).val());
        });
        $('.image-order').each(function() {
            img_order.push($(this).val());
        });
        let object = {
            'title': img_title,
            'src': img_src,
            'link': img_link,
            'description': img_description,
            'order': img_order
        };

        let catalogueid = $('.catalogueid').val();
        //console.log(object);
        if (catalogueid == 0) {
            slideModal.find('.alert').html('Bắt buộc phải lựa chọn Tên nhóm Slide.').show();
        } else {
            slideModal.find('.alert').hide();
            let formURL = "{{route('slide.store')}}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: formURL,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    object: object,
                    catalogueid: catalogueid
                },
                success: function(response) {
                    slideModal.modal('hide');
                    slideModal.find('.alert').hide();
                    swal({
                            title: "Thêm mới slide thành công", // this will output "Error 422: Unprocessable Entity"
                            html: 'Thêm mới thành công',
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Đóng",
                            cancelButtonText: "Hủy bỏ!",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            showCancelButton: false,
                            type: 'success'
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });

                },
                error: function(jqXhr, json, errorThrown) { // this are default for ajax errors 
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors['errors'], function(index, value) {
                        errorsHtml += value + '/ ';
                    });
                    $('#myModal .alert').html(errorsHtml).show();

                }
            });


        }
        return false;
    });
    $(document).on('click', '.edit-slide', function() {
        let _this = $(this);
        let data = _this.attr('data-json');
        let id = _this.attr('data-id')
        data = window.atob(data);
        let json = JSON.parse(data);
        let html = slide_update(json, id);
        $('.update-group').html(html);
        return false;
    });

    function slide_update(object, id) {

        let html = '';
        html = html + '<div class="row">';
        html = html + '<div class="col-lg-6">';
        html = html + '<div class="form-row">';
        html = html + '<small class="text-danger mb5">Click vào ảnh để thay đổi.</small>';
        html = html + '<div class="avatar slide-image image-scaledown" style="cursor: pointer;"><img src="' + object.src + '" class="img-thumbnail" alt=""></div>';
        html = html + '<input type="hidden" name="src" value="' + object.src + '">';
        html = html + '<input type="hidden" name="id" value="' + id + '">';
        html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-lg-6">';
        html = html + '<div class="form-row">';
        html = html + '<div class="form-group">';
        html = html + '<label>Chú thích</label> ';
        html = html + '<input type="text" placeholder="" name="title" class="form-control" value="' + object.title + '">';
        html = html + '</div>';
        html = html + '<div class="form-group">';
        html = html + '<label>Đường dẫn</label>';
        html = html + '<input type="text" placeholder="" name="link" class="form-control" value="' + object.link + '">';
        html = html + '</div>';
        html = html + '<div class="form-group">';
        html = html + '<label>Ghi chú</label>';
        html = html + '<textarea placeholder="" name="description" class="form-control" >' + object.description + '</textarea>';
        html = html + '</div>';
        html = html + '<div class="form-group">';
        html = html + '<label>Vị trí</label> ';
        html = html + '<input type="text" placeholder="" name="order" class="form-control" value="' + object.order + '">';
        html = html + '</div>';
        html = html + '</div>';
        html = html + '</div>';
        html = html + '</div>';


        return html;
    }
    $(document).on('click', '.update-slide', function() {
        let _this = $(this);
        let _form = $('.update-group').serializeArray();
        let formURL = "{{route('slide.update')}}";

        swal({
                title: "Bạn muốn cập nhật hạng mục này?",
                text: 'Dữ liệu sẽ thay đổi khi bạn thực hiện thao tác này. Bấm Thực hiện để tiếp tục',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Thực hiện!",
                cancelButtonText: "Hủy bỏ!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: formURL,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            data: _form
                        },
                        success: function(data) {
                            if(data.code === 200){
                                $('#slide-' + _form[1].value).find('.img-responsive').attr('src', data.src);
                                $('#slide-' + _form[1].value).find('.name').html('<span style="font-weight:bold;">Chú thích</span>: ' + data.title);
                                $('#slide-' + _form[1].value).find('.link').html('<span style="font-weight:bold;">Link</span> <i style="color:blue;">' + data.link + '</i>: ');
                                swal("Cập nhật thành công!", "Dữ liệu đã được cập nhật thành công, hãy thực hiện tiếp các thao tác khác.", "success");
                                $('#myModalEdit').modal('hide');
                            }else{
                                swal("Error", "Có lỗi xảy ra.", "error");
                                $('#myModalEdit').modal('hide');
                            }
                          

                        },
                        error: function(jqXhr, json, errorThrown) { // this are default for ajax errors 
                            var errors = jqXhr.responseJSON;
                            var errorsHtml = '';
                            $.each(errors['errors'], function(index, value) {
                                errorsHtml += value + '/ ';
                            });
                            $('#myModalEdit .alert').html(errorsHtml).show();

                        }
                    });
                } else {
                    swal("Hủy bỏ", "Thao tác bị hủy bỏ", "error");
                }
            });
        return false;

    });
</script>