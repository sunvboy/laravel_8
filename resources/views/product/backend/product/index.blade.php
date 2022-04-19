@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách sản phẩm</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách sản phẩm','key'=> 'Danh sách'])
@include('dashboard.common.alert')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                        <div class="uk-search uk-flex uk-flex-middle ">
                            <select class="form-control ajax-delete-all mr10" data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="products">
                                <option>Hành động</option>
                                <option value="">Xóa</option>
                            </select>
                            <form action="" class="uk-form uk-search uk-flex uk-flex-middle" id="search" style="margin-bottom: 0px;">
                                <div style="width:200px" class="mr10">
                                    <?php
                                    echo Form::select('catalogueid', $htmlCatalogue, request()->get('catalogueid'), ['class' => 'form-control select3 filter catalogueid']);
                                    ?>
                                </div>
                                <input type="search" name="keyword" class="keyword form-control mr10 filter" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>" style="width: 200px;" required>
                            </form>
                        </div>
                        @can('product_create')
                        <div>
                            <a href="{{route('product.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                        @endcan
                    </div>
                    <div class="title-filter uk-flex uk-flex-middle uk-flex-space-between ">
                        <h3><a class="full-search" href="">Tìm kiếm nâng cao</a></h3>
                    </div>
                    <div class="mb10 row filter-more hidden">
                        <div class="col-md-4" id="filter_price">
                            <div class="form-control" style="width:100%">
                                <span>Nhập khoảng giá</span>
                            </div>
                            <div>
                                <div class="input-daterange input-group">
                                    <input type="text" class="input-sm form-control int filter" name="start_price" value="0">
                                    <span class="input-group-addon"> <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                    <input type="text" class="input-sm form-control int filter" name="end_price" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb10">
                            <select name="tags[]" data-json="" data-condition="" class="form-control selectMultipe filter" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm theo tag.." data-module="tags" style="width:100%"></select>
                        </div>
                        <div class="col-md-4">
                            <select name="brands[]" data-json="" data-condition="" class="form-control selectMultipe filter" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm theo thương hiệu.." data-module="brands" style="width:100%"></select>
                        </div>
                       
                        <div class="col-sm-12 p-l-none p-r-none">
                            <div id="choose_attr">
                                <div class="form-control" style="width:100%;height: auto;">
                                    <span>Chọn thuộc tính</span>
                                </div>
                                <input type="text" class="hidden filter" name="attr" value="">
                                <ul class="list_attr_catalogue">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        @include('product.backend.product.index.data')
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
@include('product.backend.product.index.script')
@endsection