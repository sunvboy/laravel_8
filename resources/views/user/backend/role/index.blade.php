@extends('dashboard.layout.dashboard')

@section('title')
<title>Danh sách nhóm thành viên</title>

@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh mục nhóm thành viên','key'=> 'Danh sách'])
@include('dashboard.common.alert')

<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body table-responsive">
                    @can('role_create')
                    <div class="pull-right">
                        <label>
                            <a href="{{route('roles.create')}}" class="btn btn-primary">Thêm mới</a>
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
                                    <th>Tên nhóm thành viên</th>
                                    <th >Thao tác</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">

                                @foreach($data as $v)
                                <tr class="odd">
                                <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td>{{$v->title}}</td>
                                    <td>
                                        @can('role_edit')
                                            <a href="{{ route('roles.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('role_destroy')
                                            <a href="javascript:void(0)" data-url="{{ route('roles.destroy',['id'=>$v->id]) }}" data-id="{{ $v->id }}"class="btn btn-danger p-destroy"><i class="fa fa-trash-o"></i></a>
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
<script src="{{ asset('backend/js/library/role.js') }}"></script>
@endsection