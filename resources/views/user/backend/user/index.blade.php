@extends('dashboard.layout.dashboard')

@section('title')
<title>Danh sách thành viên</title>
@endsection
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh mục thành viên','key'=> 'Danh sách'])
@include('dashboard.common.alert')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    @can('user_create')
                    <div class="pull-right">
                        <label>
                            <a href="{{route('users.create')}}" class="btn btn-primary">Thêm mới</a>
                        </label>
                    </div>
                    @endcan

                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-xs-6"></div>
                            <div class="col-xs-6"></div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên thành viên</th>
                                    <th>Email</th>
                                    <th>Nhóm thành viên</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd">
                                <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td>{{$v->name}}
                                        @can('user_edit')
                                        <a data-url="{{ route('users.reset-password',['id'=>$v->id])}}" class="p-reset" data-userid="{{$v->id}}">RESET mật khẩu</a>

                                        @endcan
                                    </td>
                                    <td>{{$v->email}}</td>
                                    <td>
                                        @foreach($v->roles as $v1)
                                        <a href="{{ route('roles.edit',['id'=>$v1->id]) }}" class="btn btn-warning btn-sm">{{$v1->title}}</a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('user_edit')
                                        <a href="{{ route('users.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                        @endcan
                                        @can('user_destroy')

                                        <a data-url="{{ route('users.destroy',['id'=>$v->id]) }}" class="btn btn-danger p-destroy" data-userid="{{$v->id}}"><i class="fa fa-trash-o"></i></a>
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
@section('javascript')
<script src="{{ asset('backend/js/library/users.js') }}"></script>
@endsection