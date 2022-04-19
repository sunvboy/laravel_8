@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh mục sản phẩm</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh mục sản phẩm','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                        @include('dashboard.common.search',['module'=>'category_products','catalogue' => TRUE])
                        @can('product_category_create')
                        <div>
                            <a href="{{route('productCategory.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                        @endcan
                    </div>
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Vị trí</th>
                                    <th>Ngày tạo</th>
                                    <th>Người tạo</th>
                                    <th>Hiển thị</th>
                                    <th style="width: 150px">#</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd" id="post-<?php echo $v->id; ?>">
                                    <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td><a href="{{route('product.index',['catalogueid'=>$v->id])}}"><?php echo str_repeat('|----', (($v->level > 0) ? ($v->level - 1) : 0)) . $v->title; ?> ({{!empty($v->countProduct)?count($v->countProduct):0}})</a> </td>
                                    @include('dashboard.components.order',['module' => 'category_products'])
                                    <td>
                                        @if($v->created_at)
                                        {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>{{$v->user->name}}</td>
                                    @include('dashboard.components.publish',['module' => 'category_products','title' => 'publish'])
                                    <td>
                                        @can('product_category_edit')
                                        <a href="{{ route('productCategory.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('product_category_destroy')
                                        <a <?php echo ($v->rgt - $v->lft > 1) ? 'disabled="disabled" ' : ''; ?> <?php echo ($v->countProduct->isNotEmpty()) ? 'disabled="disabled"' : "" ?> href="{{ route('productCategory.destroy',['id'=>$v->id]) }}" class="btn btn-danger <?php echo ($v->countProduct->isEmpty()) ? 'ajax-delete' : '' ?>" data-id="<?php echo $v->id ?>" data-module="category_products" data-child="0" data-title="Lưu ý: Khi bạn xóa danh mục, danh mục sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="dataTables_paginate paging_bootstrap pull-right">
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection