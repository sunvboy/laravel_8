@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách đơn hàng</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách đơn hàng','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">

                        <div class="uk-search" style="width: 100%;">

                            <form action="" class="uk-form row" id="search" style="margin-bottom: 0px;">
                                <div class="col-md-2">
                                    <select class="form-control ajax-delete-all mr10 " data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="{{$module}}">
                                        <option>Hành động</option>
                                        <option value="">Xóa</option>
                                    </select>
                                </div>
                                <?php
                                $status = ['0' => 'Trạng thái'];
                                $status = array_merge($status, config('cart')['status']);
                                $payment = ['0' => 'Thanh toán'];
                                $payment = array_merge($payment, config('cart')['payment']);

                                ?>
                                <div class="mb10 col-md-2">
                                    <?php
                                    echo Form::select('status', $status, request()->get('status'), ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="mb10 col-md-2">
                                    <?php
                                    echo Form::select('payment', $payment, request()->get('payment'), ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="mb10 col-md-2">
                                   
                                    <button class="btn btn-default pull-right" id="daterange-btn">
                                        <div id="reportrange"><span><?php if(request()->get('date')){?>{{request()->get('date')}}<?php }else{?> <i class="fa fa-calendar"></i>Chọn ngày<i class="fa fa-caret-down"></i><?php }?></span></div>
                                        <input type="hidden" name="date" value="{{request()->get('date')}}">
                                    </button>
                                </div>
                               
                                <div class="col-md-4 uk-flex uk-flex-middle">
                                    <input type="search" name="keyword" class="keyword form-control filter mr10" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>">
                                    <button class="btn btn-primary" style="height: 34px;"><i class="fa fa-search"></i></button>
                                </div>

                            </form>

                        </div>

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
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày tạo</th>

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
                                    <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td><a href="{{route('order.edit',['id'=>$v->id])}}">#<?php echo $v->code; ?></a></td>

                                    <td><?php echo $v->fullname; ?></td>
                                    <td><?php echo number_format($v->total_price - $v->total_price_coupon + $v->total_price_ship); ?> VNĐ</td>

                                    <td><?php echo $v->total_item; ?></td>

                                    <td><?php echo config('cart')['status'][$v->status]; ?></td>
                                    <td><?php echo config('cart')['payment'][$v->payment]; ?></td>

                                    <td>
                                        @if($v->created_at)
                                        {{$v->created_at}}
                                        @endif
                                    </td>
                                    <td>
                                        @can('order_edit')
                                            <a href="{{ route('order.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('order_destroy')
                                            <a href="javascript:void(0)" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="orders" data-child="0" data-title="Lưu ý: Khi bạn xóa thuộc tính, thuộc tính sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
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
<style>
    #daterange-btn {
        width: 100% !important;
    }
</style>
<link href="{{asset('backend/css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" />
<script src="{{asset('backend/js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script>
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment().subtract('days', 29),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            $('input[name="date"]').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }
    );
</script>
@endsection