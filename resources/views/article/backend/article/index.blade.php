@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách bài viết</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách bài viết','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                        @include('dashboard.common.search',['module'=>'articles','htmlOption' => $htmlOption])
                        @can('article_create')
                        <div>
                            <a href="{{route('article.create')}}" class="btn btn-primary">Thêm mới</a>
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
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Vị trí</th>
                                    <th>Nhóm bài viết</th>
                                    <th>Ngày tạo</th>
                                    <th>Người tạo</th>
                                    <th>Hiển thị</th>
                                    <th style="width: 150px">#</th>
                                </tr>
                            </thead>
                            <tbody id="table_data" role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd" id="post-<?php echo $v->id; ?>">
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                                        <label for="" class="label-checkboxitem"></label>
                                    </td>
                                    <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td><?php echo $v->title; ?></td>
                                    @include('dashboard.components.order',['module' => 'articles'])
                                    <td>
                                        <div class="list-catalogue">
                                            @foreach($v->relationships as $kc=>$c)
                                            <a href="{{route('article.index',['catalogueid' => $c->id])}}"><?php echo !empty($kc == 0) ? '' : ',' ?>{{$c->title}}</a>
                                            @endforeach
                                        </div>

                                    </td>

                                    <td>
                                        @if($v->created_at)
                                        {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>{{$v->user->name}}</td>
                                    @include('dashboard.components.publish',['module' => 'articles','title' => 'publish'])

                                    <td>
                                        @can('article_edit')
                                        <a href="{{ route('article.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('article_destroy')
                                        <a href="{{ route('article.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="articles" data-child="0" data-title="Lưu ý: Khi bạn xóa bài viết, bài viết sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
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
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    </div>
</section>
@include('article.backend.article.script')

@endsection