@extends('dashboard.layout.dashboard')

@section('title')
<title>Thêm mới thuộc tính</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Danh sách thuộc tính','key'=> 'Thêm mới'])

<section class="content">
    <form role="form" action="{{route('attribute.store')}}" method="post">

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
                            <label>Danh mục</label>
                            <?php
                            echo Form::select('catalogueid', $htmlOption, null, ['class' => 'form-control select3']);
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-warning">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Màu sắc</label>
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <?php
                                echo Form::text('color', '', ['class' => 'form-control demo1','autocomplete'=>'off','style'=>'width: calc(100% - 30px);']);
                                ?>
                                <div data-color="rgb(255, 255, 255)" id="demo_apidemo" class="btn btn-white btn-block colorpicker-element" style="width: 20px; height: 34px;border-color: #dddddddd;<?php if (!empty(old('color'))) { ?>background-color: {{old('color')}};<?php } ?>"></div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="box box-warning">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Khoảng giá</label>
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <?php
                                echo Form::text('price_start', old('price_start'), ['placeholder'=> 'Từ','class' => 'form-control int','autocomplete'=>'off','style'=>'width: calc(100% - 30px);']);
                                ?>
                                <span style="margin: 0px 5px;">-</span>
                                 <?php
                                echo Form::text('price_end',  old('price_end'), ['placeholder'=> 'đến','class' => 'form-control int','autocomplete'=>'off','style'=>'width: calc(100% - 30px);']);
                                ?>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                @include('dashboard.common.image',['action' => 'create'])
                
                @include('dashboard.common.publish')
            </div>
        </div>
    </form>


</section>
@include('attribute.backend.attribute.head')
@endsection