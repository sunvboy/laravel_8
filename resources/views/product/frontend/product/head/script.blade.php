<script type="text/javascript" src="{{asset('product/rating/bootstrap-rating.min.js')}}"></script>
<script src="{{asset('product/product-gallery-slider/slick.min.js')}}"></script>
<script src="{{asset('product/product-gallery-slider/jquery.fancybox.min.js')}}"></script>
<!--album anh cmt!-->
<script>
    $(document).ready(function() {
        $(document).on('click', '.review-images__item', function(e) {
            $(".UNFVx").css('opacity', 1);
            $(".UNFVx").css('z-index', 99999999);
        });
        $(document).on('click', '.btn-close', function(e) {
            $(".UNFVx").css('opacity', 0);
            $(".UNFVx").css('z-index', -1);

        });
        $('.cSlider--single').slick({
            slide: '.cSlider__item',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            adaptiveHeight: true,
            infinite: false,
            useTransform: true,
            speed: 400,
            cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
            prevArrow: '<div class="slick-prev"><i class="ion-ios-arrow-left"></i><span class="sr-only sr-only-focusable"><</span></div>',
            nextArrow: '<div class="slick-next"><i class="ion-ios-arrow-right"></i><span class="sr-only sr-only-focusable">></span></div>'
        });

        $('.cSlider--nav').on('init', function(event, slick) {
                $(this).find('.slick-slide.slick-current').addClass('is-active');
            })
            .slick({
                slide: '.cSlider__item',
                slidesToShow: 12,
                slidesToScroll: 12,
                dots: false,
                focusOnSelect: false,
                infinite: false,
                arrows: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                }, {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }]
            });

        $('.cSlider--single').on('afterChange', function(event, slick, currentSlide) {
            $('.cSlider--nav').slick('slickGoTo', currentSlide);
            $('.cSlider--nav').find('.slick-slide.is-active').removeClass('is-active');
            $('.cSlider--nav').find('.slick-slide[data-slick-index="' + currentSlide + '"]').addClass('is-active');
        });

        $('.cSlider--nav').on('click', '.slick-slide', function(event) {
            event.preventDefault();
            var goToSingleSlide = $(this).data('slick-index');

            $('.cSlider--single').slick('slickGoTo', goToSingleSlide);
        });
        //post form submit
        $('#form-comment').submit(function(event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "<?php echo route('commentFrontend.post') ?>",
                type: 'POST',
                dataType: "JSON",
                data: {
                    rating: $('#form-comment input[name="rating"]').val(),
                    images: $('#form-comment input[name="images"]').val(),
                    fullname: $('#form-comment input[name="fullname"]').val(),
                    phone: $('#form-comment input[name="phone"]').val(),
                    message: $('#form-comment textarea[name="message"]').val(),
                    productid: "{{$detail->id}}"
                },
                success: function(data) {
                    if (data == 200) {
                        $('.error_comment').removeClass('alert alert-danger').addClass('alert alert-success');
                        $('.error_comment').html('').html("Gửi bình luân thành công!");
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        $('.error_comment').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.error_comment').html('').html("Có lỗi xảy ra");
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    if(errors.message == "Unauthenticated."){
                        $('.error_comment').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.error_comment').html('').html("Bạn phải đăng nhập để sử dụng tính năng này");
                    }else{
                            
                        $('.error_comment').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.error_comment').html('').html(errors.message);
                    }
                },
            });
        });
        //upload image comment
        var inputFile = $('input.write-review__file');
        var uploadURI = '<?php echo route('components.uploadImagesComment') ?>';
        var processBar = $('#progress-bar');
        $('input.write-review__file').change(function(event) {
            var filesToUpload = inputFile[0].files;
            if (filesToUpload.length > 0) {
                var formData = new FormData();
                for (var i = 0; i < filesToUpload.length; i++) {
                    var file = filesToUpload[i];
                    formData.append('file[]', file, file.name);
                }
                // console.log(formData);
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: uploadURI,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('.error_comment').removeClass('alert alert-danger');
                        $('.write-review__images').show();
                        var json = JSON.parse(data);
                        $('.write-review__images').append(json.html);
                        load_src_img();
                    },
                    error: function(jqXhr, json, errorThrown) {
                        // this are default for ajax errors
                        var errors = jqXhr.responseJSON;
                        $('.error_comment').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.error_comment').html('').html(errors.message);
                    },
                });
            }
        });

        function load_src_img() {
            var outputText = '';
            $('.write-review__images img').each(function() {
                var divHtml = $(this).attr('src');
                outputText += divHtml + '-+-';
            });
            $('#form-comment input[name="images"]').attr('value', outputText.slice(0, -3));
        }

        $(document).on('click', '.write-review__image-close', function() {
            var me = $(this);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: uploadURI,
                type: 'post',
                data: {
                    file: me.attr('data-file'),
                    delete: 'delete'
                },
                success: function() {
                    $('.error_comment').removeClass('alert alert-danger').removeClass('alert alert-danger');
                    me.parent().remove();
                    load_src_img();
                },
                error: function(jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = "";
                    $.each(errors["errors"], function(index, value) {
                        errorsHtml += value + "/ ";
                    });
                    $('.error_comment').removeClass('alert alert-success').addClass('alert alert-danger');
                    $(".error_comment").html(errorsHtml).show();
                },
            });
        });
        //end upload images
        $(document).on('click', '.write-review__button--image', function(e) {
            $(".write-review__file").click();
        });
        $(document).on('click', '.paginate_cmt a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var sort = $('.filter-review__item.active .filter-review__text').attr('data-sort');
            $('html, body').animate({
                    scrollTop: $("#getListComment").offset().top
            }, 200);

            get_list_object(page,sort);
            
        });
        //filter sort
        $(document).on('click', '.filter-review__text', function(event) {
            event.preventDefault();
            var sort = $(this).attr('data-sort');
            $('.filter-review__item').removeClass('active');
            $(this).parent().addClass('active');
            get_list_object(1,sort);
        });
        function get_list_object(page = 1,sort = 'id') {
            setTimeout(function() {
                $.post('<?php echo route('getListComment.frontend') ?>', {
                        page: page,
                        productid: '{{$detail->id}}',
                        sort: sort,
                        "_token": $('meta[name="csrf-token"]').attr("content")
                    },
                    function(data) { $('#getListComment').html(data);}
                    
                );
            }, 210);
            
        }
        $(document).on('click', '.js_btn_reply', function(e) {
            e.preventDefault();
            let _this = $(this);
            let text = _this.text();
            if(text == "Bỏ bình luận"){
                _this.parent().find('.reply-comment').html('');
                _this.html('Bình luận');
            }else{
                let param = {
                'parentid': _this.attr('data-id'),
                'name': _this.attr('data-name'),
                };
                let reply = get_comment_html(param);
                $('.reply-comment').html('');
                $('.js_btn_reply').html('Bình luận');
                _this.parent().find('.reply-comment').html(reply);
                _this.attr('data-comment', 0);
                _this.html('Bỏ bình luận');
            }
            
        });

        function get_comment_html(param = '') {
            let comment = '';
            comment += '<div class="reply-comment__outer">';
            comment += '<div class="reply-comment__avatar">';
            comment += '<img src="{{asset("image/90e54b0a7a59948dd910ba50954c702e.png")}}" alt="">';
            comment += '</div>';
            comment += '<div class="reply-comment__wrapper">';
            comment += '<div><span>@' + param.name + '</span>';
            comment += '<textarea placeholder="Viết câu trả lời" class="reply-comment__input" rows="1" style="height: 40px;"></textarea>';
            comment += '</div>';
            comment += '<button type="button" class="reply-comment__submit" data-parentid = ' + param.parentid + '  ><img src="{{asset("image/92f01c5a743f7c8c1c7433a0a7090191.png")}}" class=""></button>';
            comment += '</div>';
            comment += '</div><div class="reply-comment__error danger"></div>';
            return comment;
        }
        $(document).on('click', '.reply-comment__submit', function() {
            var parentid = $(this).attr('data-parentid');
            let message = $('.reply-comment__input').val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "<?php echo route('replyComment.post') ?>",
                type: 'POST',
                dataType: "JSON",
                data: {
                    parentid: parentid,
                    message: message,
                },
                success: function(data) {
             
                    if (data.error != '') {
                        $('.reply-comment__error').removeClass('success').addClass('danger');
                        $('.reply-comment__error').html('').html(data.message);
                        
                    } else {
                        $('.reply-comment__error').removeClass('danger').addClass('success');
                        $('.reply-comment__error').html('').html(data.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    if(errors.message == "Unauthenticated."){
                        $('.reply-comment__error').removeClass('success').addClass('danger');
                        $('.reply-comment__error').html('').html("Bạn phải đăng nhập để sử dụng tính năng này");
                    }else{
                        $('.reply-comment__error').removeClass('success').addClass('danger');
                        $('.reply-comment__error').html('').html(errors.message);
                    }
                   
                },
            });    
            return false;
        });

       
        $('.review-comment__user-name').each(function() {
            var str = $(this).text();
            var matches = str.match(/\b(\w)/g);
            
            var acronym = matches.join('');
            console.log(acronym);
            
            // $(this).prepend('<span><i>' + acronym + '</i></span>');
        
        })
    });
    
    
</script>
<!--END!-->
<script>
    $(document).ready(function() {
        /**sản phẩm liên quan */
        $('.owl-carousel-same').slick({
            infinite: true,
            centerMode: false,
            slidesToShow: 5,
            slidesToScroll: 5,
            arrows: true,
            autoplay: false,
            autoplaySpeed: 5000,
            centerPadding: 0,
            prevArrow: '<div class="slick-prev"><i class="ion-ios-arrow-left"></i></div>',
            nextArrow: '<div class="slick-next"><i class="ion-ios-arrow-right"></i></div>'
        });
        /*rating*/
        $("input.rating-disabled").rating({

            filled: 'fa fa-star rating-color',
            empty: 'fa fa-star-o'
        });


        /*gallery*/
        $('.main-img-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            fade: true,
            autoplay: false,
            autoplaySpeed: 4000,
            speed: 300,
            lazyLoad: 'ondemand',
            asNavFor: '.thumb-nav',
            prevArrow: '<div class="slick-prev"><i class="ion-ios-arrow-left"></i><span class="sr-only sr-only-focusable"><</span></div>',
            nextArrow: '<div class="slick-next"><i class="ion-ios-arrow-right"></i><span class="sr-only sr-only-focusable">></span></div>'
        });
        // Thumbnail/alternates slider for product page
        $('.thumb-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            centerPadding: '0px',
            asNavFor: '.main-img-slider',
            dots: false,
            centerMode: false,
            autoplay: false,
            draggable: true,
            speed: 200,
            focusOnSelect: true,
            prevArrow: '<div class="slick-prev"><i class="ion-ios-arrow-left"></i><span class="sr-only sr-only-focusable"><</span></div>',
            nextArrow: '<div class="slick-next"><i class="ion-ios-arrow-right"></i><span class="sr-only sr-only-focusable">></span></div>'
        });
        $('.main-img-slider').on('afterChange', function(event, slick, currentSlide, nextSlide) {
            $('.thumb-nav .slick-slide').removeClass('slick-current');
            $('.thumb-nav .slick-slide:not(.slick-cloned)').eq(currentSlide).addClass('slick-current');
        });
        // show-more
        $(document).on('click', '.show-more', function(e) {
            $('.product-detail-value').removeClass('gradient-bottom');
            $('.show-more').hide();
            $('.hide-more').show();
        });
        $(document).on('click', '.hide-more', function(e) {
            $('.product-detail-value').addClass('gradient-bottom');
            $('.show-more').show();
            $('.hide-more').hide();
        });
    });
</script>