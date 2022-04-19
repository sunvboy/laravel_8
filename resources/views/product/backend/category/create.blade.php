@extends('dashboard.layout.dashboard')
@section('title')
<title>Thêm mới danh mục sản phẩm</title>
@endsection
@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Danh mục sản phẩm','key'=> 'Thêm mới'])
<section class="content">
    <form role="form" action="{{route('productCategory.store')}}" method="post">
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
                            <label>Tên danh mục</label>
                            <?php
                            echo Form::text('title', '', ['class' => 'form-control title']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <div class="outer">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="base-url"><?php echo url(''); ?></div>
                                    <?php
                                    echo Form::text('slug', '', ['class' => 'form-control canonical', 'data-flag' => 0]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <?php
                            echo Form::textarea('description', '', ['id' => 'ckDescription', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                            ?>
                        </div>
                        @include('dashboard.common.albums')
                        @include('dashboard.common.seo')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <?php
                            echo Form::select('parentid', $htmlOption, null, ['class' => 'form-control select3']);
                            ?>
                        </div>
                        @include('dashboard.common.icon',['action' => 'create'])
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- <div class="ibox mb20">
                    <div class="ibox-title">
                        <h5>Hiển thị </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <span class="text-black mb15">Quản lý thiết lập hiển thị cho blog này.</span>
                                    <div class="block clearfix">
                                        <div class="i-checks mr30" style="width:100%;"><span style="color:#000;"> <input <?php echo (old('publish') == 0) ? 'checked' : '' ?> class="popup_gender_1 gender" type="radio" value="0" name="publish"> <i></i>Cho phép hiển thị trên website</span></div>
                                    </div>
                                    <div class="block clearfix">
                                        <div class="i-checks" style="width:100%;"><span style="color:#000;"> <input type="radio" <?php echo (old('publish') == 1) ? 'checked' : '' ?> class="popup_gender_0 gender" required value="1" name="publish"> <i></i> Tắt chức năng hiển thị trên website. </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                @include('dashboard.common.publish')
            </div>
        </div>
    </form>
</section>
@endsection