@extends('dashboard.layout.dashboard')

@section('title')
<title>Thêm mới danh mục bài viết</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Danh mục bài viết','key'=> 'Thêm mới'])

<section class="content">
    <form role="form" action="{{route('articleCategory.store')}}" method="post">

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
                            echo Form::select('parentid', $htmlCatalogue, null, ['class' => 'form-control']);
                            ?>
                        </div>
                    
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
             
                @include('dashboard.common.publish')

               
            </div>



        </div>
    </form>


</section>

@endsection