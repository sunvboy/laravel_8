@extends('dashboard.layout.dashboard')

@section('title')
<title>Danh sách khách hàng</title>
@endsection
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh mục khách hàng','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-body table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                            <div class="uk-search" style="width: 100%;">
                                <form action="" class="uk-form row" id="search" style="margin-bottom: 0px;">
                                    <div class="col-md-2">
                                        <select style="width: 100%;" class="form-control ajax-delete-all mr10 " data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="customers">
                                            <option>Hành động</option>
                                            <option value="">Xóa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 uk-flex uk-flex-middle">
                                        <input type="search" name="keyword" class="keyword form-control filter mr10" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>">
                                        <button class="btn btn-primary" style="height: 34px;"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th style="width:40px;">
                                        <input type="checkbox" id="checkbox-all">
                                        <label for="check-all" class="labelCheckAll"></label>
                                    </th>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd choose" style="cursor:pointer;" data-info="<?php echo base64_encode(json_encode($v)); ?>">
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                                        <label for="" class="label-checkboxitem"></label>
                                    </td>
                                    <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{$v->phone}}</td>
                                    <td>
                                        @can('customer_edit')
                                        <a href="{{ route('customer.edit',['id'=>$v->id]) }}" class="btn btn-primary hidden"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('customer_destroy')
                                        <a href="{{ route('customer.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="customers" data-child="0" data-title="Lưu ý: Khi bạn xóa thuộc tính, thuộc tính sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
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
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-content">
                    <div id="contact-1" class="tab-pane active">
                        <div class="row m-b-lg">
                            <div class="col-lg-4 text-center" style="padding: 0px;">
                                <div class="m-b-sm img-cover">
                                    <img alt="image" class="img-circle" id="image" src="https://ui-avatars.com/api/?name=AVATAR" style="width: 64px;height:64px;">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h2 class="fullname">Noname</h2>
                            </div>
                        </div>
                        <div class="client-detail">
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                                <div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                    <strong>Thông tin cá nhân</strong>
                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right fullname"> - </span>
                                            Họ tên:
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right phone"> - </span>
                                            Số điện thoại:
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right email"> - </span>
                                            Email:
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right address"> - </span>
                                            <span class="">Địa chỉ:</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right updated"> - </span>
                                            <span class="">Ngày đăng ký:</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    /* CLICK VÀO THÀNH VIÊN*/
    $(document).on('click', '.choose', function() {
        let _this = $(this);
        $('.choose').removeClass('bg-choose'); //remove all trong các thẻ có class = choose
        _this.toggleClass('bg-choose');
        let data = _this.attr('data-info');
        data = window.atob(data); //decode base64
        let json = JSON.parse(data);
        setTimeout(function() {
            $('.fullname').html('').html(json.name);
            $('#image').attr('src', json.image);
            $('.phone').html('').html(json.phone);
            $('.email').html('').html(json.email);
            $('.address').html('').html(json.address);
            $('.updated').html('').html(json.created_at);
        }, 100); //sau 100ms thì mới thực hiện
    });
</script>
@endsection