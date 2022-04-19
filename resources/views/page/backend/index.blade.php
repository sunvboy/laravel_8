@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách page</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách page','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                      
                        @include('dashboard.common.search',['module'=>'pages'])

                        @can('page_create')
                        <div>
                            <a href="{{route('page.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                        @endcan

                    </div>
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">

                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th style="width:40px;">
                                        <input type="checkbox" id="checkbox-all">
                                        <label for="check-all" class="labelCheckAll"></label>
                                    </th>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày tạo</th>
                                    <th>Người tạo</th>
                                    <th>Hiển thị</th>

                                    <th style="width: 150px">#</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd" id="post-<?php echo $v->id; ?>">
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                                        <label for="" class="label-checkboxitem"></label>
                                    </td>
                                    <td class="sorting_1">{{$v->id}}</td>
                                    <td><?php echo $v->title; ?></td>
                                    <td>
                                        @if($v->created_at)
                                        {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>{{$v->user->name}}</td>
                                    @include('dashboard.components.publish',['module' => 'pages','title' => 'publish'])
                                    <td>
                                        @can('page_edit')
                                            <a href="{{ route('page.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('page_destroy')
                                        <a href="{{ route('page.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="pages" data-child="0" data-title="Lưu ý: Khi bạn xóa thuộc tính, thuộc tính sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
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