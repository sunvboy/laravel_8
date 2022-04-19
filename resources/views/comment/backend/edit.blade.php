@extends('dashboard.layout.dashboard')

@section('title')
<title>Chi tiết comment</title>
@endsection
@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Chi tiết comment','key'=> 'Cập nhập'])
<section class="content">
    <div class="row">
        <div class="col-md-4">

            <div class="box box-primary">

                <!-- form start -->
                <form role="form" action="{{ route('comment.update',['id'=>$detail->id]) }}" method="post" id="form-comment">
                    <div class="box-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Success!</b> {{session('success')}}
                        </div>
                        @endif
                        @csrf
                        <div class="form-group uk-flex uk-flex-middle" style="justify-content: center;">
                            <?php for ($i = 1; $i <= $detail->rating; $i++) { ?>
                                <i class="fa fa-star fa-star"></i>
                            <?php } ?>
                            <?php for ($i = 1; $i <= 5 - $detail->rating; $i++) { ?>
                                <i class="fa fa-star fa-star-o"></i>

                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Sản phẩm</label>
                            <div>
                                {{$detail->product->title}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <div>
                                {{$detail->fullname}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <div>
                                {{$detail->phone}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <div>{{$detail->message}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trả lời bình luận</label>
                            <textarea class="form-control" rows="10" name="message" placeholder="Trả lời bình luận" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="error_comment"></div>
                            <div class="write-review__images" style="display: none;"></div>
                            <div class="write-review__buttons">
                                <input type="hidden" value="" name="images">

                                <input class="write-review__file" type="file" multiple="">
                                <button type="button" class="write-review__button write-review__button--image">
                                    <img src="https://salt.tikicdn.com/ts/upload/1b/7a/3b/d8ff2d5d709c730e12e11ba0b70a1285.jpg"><span>Thêm ảnh</span>
                                </button>
                                <button type="submit" class="write-review__button write-review__button--submit"><span>Trả lời</span></button>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </form>
            </div>
        </div>
        <div class="col-md-8">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Phản hồi bình luận</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Albums ảnh</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        @if(!$child->isEmpty())
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- The time line -->
                                <ul class="timeline">
                                    @foreach($dataChild as $k=>$v)
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-green">
                                            {{$k}}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    @foreach($v as $c)
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>
                                        <div class="timeline-item">
                                            <div class="uk-flex uk-flex-middle time">
                                                <span class=""><i class="fa fa-clock-o"></i> {{$c->created_at}}</span>
                                                <div class="switch" style="margin-left: 10px;">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" <?php echo ($c->publish == 0) ? 'checked=""' : ''; ?> class="onoffswitch-checkbox publish-ajax" data-module="comments" data-id="<?php echo $c->id; ?>" data-title="publish" id="publish-<?php echo $c->id; ?>">
                                                        <label class="onoffswitch-label" for="publish-<?php echo $c->id; ?>">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="uk-flex uk-flex-middle ">
                                                <h3 class="timeline-header"><a href="#">{{$c->fullname}}</a> </h3>
                                                @if($c->type == "QTV")
                                                <div class='timeline-footer'>
                                                    <a class="btn btn-danger btn-flat btn-xs">{{$c->type}}</a>
                                                </div>
                                                @endif


                                            </div>
                                            <div class="timeline-body">
                                                {{$c->message}}
                                            </div>
                                            <?php $listImageCmt = json_decode($c->images, TRUE); ?>
                                            @if(!empty($listImageCmt))
                                            <div class="timeline-body">
                                                @foreach($listImageCmt as $image)
                                                <img src="{{$image}}" alt="..." class="margin" style="width: 150px;height: 100px;object-fit: cover;">
                                                @endforeach
                                            </div>
                                            @endif

                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    @endforeach
                                    @endforeach
                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                    </li>
                                </ul>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="dataTables_paginate paging_bootstrap pull-right">
                                    {{$child->links()}}
                                </div>
                            </div>
                        </div>
                        @endif


                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <?php $list_images_cmt = json_decode($detail->images, TRUE); ?>
                        @if(isset($list_images_cmt))
                        <div class="review-images">
                            <div class="review-images__inner row">
                                @foreach($list_images_cmt as $kimage=>$image)
                                <div class="col-md-2" style="margin-bottom: 15px;">
                                    <div class="review-images__item">
                                        <div class="review-images__img" style="background-image: url('<?php echo $image ?>');"></div>
                                    </div>

                                </div>

                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div>


        </div>

    </div>

</section><!-- /.content -->
<style>
    /* review_images */
    .review-images__heading {
        margin: 0px 0px 16px;
        font-size: 17px;
        line-height: 24px;
        font-weight: 500;
    }



    .review-images__item {
        width: 120px;
        height: 120px;
        margin: 0px 16px 0px 0px;
        cursor: pointer;
        max-width: 100%;
    }

    .review-images__img {
        background-size: cover;
        border-radius: 4px;
        height: 100%;
        width: 100%;
        background-position: center center;
    }

    .review-images__item:last-child {
        position: relative;
        z-index: 1;
        margin: 0px;
    }

    .review-images__total {
        background-color: rgba(36, 36, 36, 0.7);
        font-size: 17px;
        font-weight: 500;
        position: absolute;
        inset: 0px;
        line-height: 120px;
        text-align: center;
        color: rgb(255, 255, 255);
        border-radius: 4px;
    }

    .write-review__buttons {
        flex: 1 1 0%;
        align-items: flex-end;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        padding: 0px 0px 16px;
        margin: 0px;
    }

    .write-review__input {
        border: 1px solid rgb(238, 238, 238);
        padding: 12px;
        border-radius: 4px;
        resize: none;
        width: 100%;
        outline: 0px;
        margin: 12px 0px 12px;
    }

    .write-review__file {
        position: absolute;
        height: 0px;
        width: 0px;
        visibility: hidden;
        opacity: 0;
        clip: rect(0px, 0px, 0px, 0px);
    }

    .write-review__button {
        width: 49%;
        height: 36px;
        border: 0px;
        background: 0px center;
        padding: 0px;
        line-height: 36px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        outline: 0px;
    }

    .write-review__button--image {
        color: rgb(11, 116, 229);
        border: 1px solid rgb(11, 116, 229);
    }

    .write-review__button--image img {
        width: 15px;
        margin: 0px 4px 0px 0px;
    }

    .write-review__button--submit {
        background-color: rgb(11, 116, 229);
        color: rgb(255, 255, 255);
    }

    .write-review__images {
        text-align: left;
        margin: 0px 0px 12px;
    }

    .write-review__image {
        display: inline-block;
        width: 48px;
        height: 48px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        margin: 0px 12px 0px 0px;
        border: 1px solid rgb(224, 224, 224);
        border-radius: 4px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .write-review__image-close {
        width: 21px;
        height: 21px;
        background-color: rgb(255, 255, 255);
        border-radius: 50%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        line-height: 21px;
        font-size: 18px;
        display: none;
        text-align: center;
    }

    .write-review__image:hover .write-review__image-close {
        display: block;
    }

    .write-review__image:hover::after {
        content: "";
        position: absolute;
        inset: 0px;
        background-color: rgba(36, 36, 36, 0.7);
    }

    .write-review__info {
        flex: 1 1 0%;
        align-items: flex-end;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        margin: 12px 0px 0px;
    }

    .write-review__info input {
        width: 49%;
        height: 36px;
        background: 0px center;

        line-height: 36px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        outline: 0px;
    }
    .fa.fa-star-o,.fa.fa-star{
        color: #fbc634 !important;
        font-size: 30px;
    }
</style>
<script>
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
    $(document).on('click', '.write-review__button--image', function(e) {
        $(".write-review__file").click();
    });
    //end upload images
</script>
@endsection