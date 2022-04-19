@extends('dashboard.layout.dashboard')

@section('title')
<title>Cập nhập bài viết</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Danh sách bài viết','key'=> 'Cập nhập'])
<section class="content">
    <form role="form" action="{{route('media.update',['id' => $detail->id])}}" method="post">
        <div class="row">
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="box box-warning">
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
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <?php
                            echo Form::text('title', $detail->title, ['class' => 'form-control title']);
                            ?>

                        </div>
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <div class="outer">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="base-url"><?php echo url(''); ?></div>
                                    <?php
                                    echo Form::text('slug', $detail->slug, ['class' => 'form-control canonical', 'data-flag' => 0]);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <?php
                            echo Form::textarea('description', $detail->description, ['id' => 'ckContent', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Danh mục chính</label>
                            <?php
                            echo Form::select('catalogueid', $htmlCatalogue, $detail->catalogueid, ['class' => 'form-control select2 ']);
                            ?>
                        </div>

                        @include('dashboard.common.albums')


                        <div class="ibox mb20 video ">
                            <div class="ibox-title">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <h5>Video <small class="text-danger">Để giảm tải dung lượng và băng thông bạn nên sử dụng mã nhúng video.</small></h5>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="wrap-direct" style="margin-bottom:10px;">
                                            <span href="" style="margin-right:10px;margin-bottom:10px;" title="" class="video-direct uk-flex uk-flex-middle">
                                                <input class="choose_video_type" <?php echo (old('video_type') == 0) ? 'checked' : (($detail->video_type == 0) ? 'checked' : ''); ?> style="margin-top:0;margin-right:5px;" type="radio" id="video-direct" name="video_type" value="0" />
                                                <label for="video-direct" style="margin:0;font-weight:normal;cursor:pointer">Upload trực tiếp</label>
                                            </span>
                                            <?php
                                            echo Form::text('video_link', $detail->video_link, ['class' => 'form-control', 'placeholder' => 'Click để upload', "onclick" => "openKCFinderMedia(this, 'media');", "id" => "video-link", "autocomplete" => "off", '' . (($detail->video_type == 1) ? ((old('video_type') == 1) ? 'disabled'  : '') : '') . ' ']);
                                            ?>
                                        </div>

                                        <div class="wrap-iframe">
                                            <span href="" style="margin-right:10px;margin-bottom:10px;" title="" class="video-iframe uk-flex uk-flex-middle">
                                                <input <?php echo (old('video_type') == 1) ? 'checked' : (($detail->video_type == 1) ? 'checked' : ''); ?> style="margin-top:0;margin-right:5px;" type="radio" id="iframe-video" name="video_type" class="choose_video_type" value="1" />
                                                <label for="iframe-video" style="margin:0;font-weight:normal;cursor:pointer">Mã nhúng</label>
                                            </span>
                                            <?php
                                            echo Form::textarea('video_iframe', $detail->video_iframe, ['id' => 'video-iframe', 'class' => 'form-control', '' . (($detail->video_type == 0) ? ((old('video_type') == 0) ? 'disabled'  : '') : '') . '']);
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                        @include('dashboard.common.seo')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Cập nhập</button>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                @include('dashboard.common.image',['action' => 'update'])
                @include('dashboard.common.publish')
            </div>
        </div>
    </form>
</section>

<script>
    var layoutid = <?php echo !empty(old('catalogueid')) ? old('catalogueid') : $detail->catalogueid; ?>;
</script>
@include('media.backend.media.script')

@endsection