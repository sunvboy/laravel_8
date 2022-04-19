@extends('dashboard.layout.dashboard')

@section('title')
<title>Danh sách nhóm phân quyền</title>

@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh mục nhóm phân quyền','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-body table-responsive">
                    <div class="pull-right">

                        <label>
                            <a href="{{route('permission.create')}}" class="btn btn-primary">Thêm mới</a>

                        </label>
                    </div>

                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-xs-6"></div>
                            <div class="col-xs-6"></div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Tên module</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">

                                @foreach($data as $v)
                                <tr class="odd">
                                    <td class="sorting_1">{{$v->id}}</td>
                                    <td>{{config('permissions.modules')[$v->title]}}</td>
                                  
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