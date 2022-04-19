@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách của hàng</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách cửa hàng','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                        @include('dashboard.common.search',['module'=>'addresses'])
                        @can('address_create')
                        <div>
                            <a href="{{route('address.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                        @endcan
                    </div>
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">

                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên cửa hàng</th>
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
                                    <td><a href="{{route('attribute.index',['catalogueid'=>$v->id])}}"><?php echo str_repeat('|----', (($v->level > 0) ? ($v->level - 1) : 0)) . $v->title; ?></a></td>
                                    @include('dashboard.components.order',['module' => 'addresses'])
                                    <td>
                                        @if($v->created_at)
                                        {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>{{$v->user->name}}</td>
                                    @include('dashboard.components.publish',['module' => 'addresses','title' => 'publish'])
                                    <td>
                                        @can('address_edit')
                                            <a href="{{ route('address.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('address_destroy')
                                            <a  href="{{ route('address.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete"  data-id="<?php echo $v->id ?>" data-module="addresses" data-child="0" data-title="Lưu ý: Khi bạn xóa danh mục, danh mục sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
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