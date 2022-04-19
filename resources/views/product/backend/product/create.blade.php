@extends('dashboard.layout.dashboard')
@section('title')
<title>Thêm mới sản phẩm</title>
@endsection
@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Danh sách sản phẩm','key'=> 'Thêm mới'])
<section class="content">
    <form role="form" action="{{route('product.store')}}" method="post">
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
                        @include('product.backend.product.common._detail',['action' => 'create'])
                        @include('dashboard.common.albums')
                        @include('product.backend.product.common.attribute',['action' => 'create'])
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
                            <label>Danh mục chính</label>
                            <?php
                            echo Form::select('catalogueid', $htmlCatalogue, old('catalogueid'), ['class' => 'form-control select2']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Danh mục phụ</label>
                            <?php
                            echo Form::select('catalogue[]', $htmlCatalogue, null, ['class' => 'form-control select2', 'multiple']);
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                @include('dashboard.components.relationships',['module' =>'product','action' => 'create'])
                @include('dashboard.common.publish')
            </div>
        </div>
    </form>
</section>
@include('product.backend.product.common.script')
@include('product.backend.product.common.popup')
@endsection