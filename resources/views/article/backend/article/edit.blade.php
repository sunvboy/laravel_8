@extends('dashboard.layout.dashboard')

@section('title')
<title>Cập nhập bài viết</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Danh sách bài viết','key'=> 'Cập nhập'])
<section class="content">
    <form role="form" action="{{route('article.update',['id' => $detail->id])}}" method="post">
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
                            echo Form::textarea('description', $detail->description, ['id' => 'editor1', 'class' => 'form-control', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Chi tiết bài viết</label>
                            <?php
                            echo Form::textarea('content',$detail->content, ['id' => 'ckContent', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                            ?>
                        </div>
                        @include('dashboard.common.seo')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Cập nhập</button>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Danh mục chính</label>
                            <?php
                            echo Form::select('catalogueid', $htmlCatalogue, $detail->catalogueid, ['class' => 'form-control select2']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Danh mục phụ</label>
                            <?php if (!empty(old('catalogue'))) { ?>
                                <select name="catalogue[]" class="form-control select2" multiple>
                                    <option value=""></option>
                                    @foreach($htmlCatalogue as $k=>$v)
                                    <option value="{{$k}}" {{ (collect(old("catalogue"))->contains($k)) ? 'selected':'';}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            <?php } else { ?>
                                <select name="catalogue[]" class="form-control select2" multiple>
                                    <option value=""></option>
                                    @foreach($htmlCatalogue as $k=>$v)
                                    <option value="{{$k}}" {{ (collect(json_decode($detail->catalogue))->contains($k)) ? 'selected':'';}}>{{$v}}</option>
                                    @endforeach
                                </select>

                            <?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                @include('dashboard.common.image',['action' => 'update'])

                @include('dashboard.common.publish')

                @include('dashboard.components.relationships',['module' =>'articles','action' => 'create'])


            </div>
        </div>
    </form>
</section>

@include('article.backend.article.script')
@include('product.backend.product.common.popup')

@endsection