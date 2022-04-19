@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách comment</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Nhóm comment','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">

                        <div class="uk-search" style="width: 100%;">

                            <form action="" class="uk-form row" id="search" style="margin-bottom: 0px;">
                                @can('comment_destroy')
                                <div class="col-md-2">
                                    <select class="form-control ajax-delete-all mr10 " data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="{{$module}}">
                                        <option>Hành động</option>
                                        <option value="">Xóa</option>
                                    </select>
                                </div>
                                @endcan

                                <?php
                                    $array_star = [
                                        '' => 'Chọn đánh giá',
                                        '1' => '1 sao',
                                        '2' => '2 sao',
                                        '3' => '3 sao',
                                        '4' => '4 sao',
                                        '5' => '5 sao',
                                    ];
                                ?>
                                <div class="mb10 col-md-2">
                                    <?php
                                   echo Form::select('rating', $array_star, request()->get('rating'), ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="mb10 col-md-2">
                                    <?php
                                   echo Form::select('productid', $getProduct, request()->get('productid'), ['class' => 'form-control']);
                                    ?>
                                </div>
                               
                                <div class="mb10 col-md-2">

                                    <button class="btn btn-default pull-right" id="daterange-btn">
                                        <div id="reportrange"><span><?php if (request()->get('date')) { ?>{{request()->get('date')}}<?php } else { ?> <i class="fa fa-calendar"></i>Chọn ngày<i class="fa fa-caret-down"></i><?php } ?></span></div>
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
                                    @can('comment_destroy')
                                    <th style="width:40px;">
                                        <input type="checkbox" id="checkbox-all">
                                        <label for="check-all" class="labelCheckAll"></label>
                                    </th>
                                    @endcan
                                    <th>STT</th>
                                    <th style="width: 200px;">Tên khách hàng</th>
                                    <th>Nội dung</th>
                                    <th>Sản phẩm</th>
                                    <th>Đánh giá</th>
                                    <th>Ngày tạo</th>
                                    <th>Hiển thị</th>
                                    <th style="width: 150px">#</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd" id="post-<?php echo $v->id; ?>">
                                    @can('comment_destroy')
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                                        <label for="" class="label-checkboxitem"></label>
                                    </td>
                                    @endcan
                                    <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
                                    <td><?php echo  $v->fullname; ?></td>
                                    <td>
                                        {{$v->message}}
                                    </td>

                                    <td>
                                        <a href="{{route('productFrontend.index',$v->product->slug)}}" target="_blank">{{$v->product->title}}</a>
                                    </td>
                                    <td>
                                       
                                        
                                        <div class="uk-flex uk-flex-middle">
                                            <?php for($i = 1;$i<=$v->rating;$i++){?>
                                                <i class="fa fa-star fa-star"></i>
                                            <?php }?>
                                            <?php for($i = 1;$i<=5-$v->rating;$i++){?>
                                                <i class="fa fa-star fa-star-o"></i>

                                            <?php }?>
                                        </div>
                                    </td>
                                    <td>
                                        {{$v->created_at}}
                                    </td>

                                    @include('dashboard.components.publish',['module' => 'comments','title' => 'publish'])
                                    <td>
                                        @if($v->id != 1)
                                        @can('comment_edit')
                                        <a href="{{ route('comment.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('comment_destroy')
                                        <a href="{{ route('comment.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="comments" data-child="0" data-title="Lưu ý: Khi bạn xóa sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
                                        @endcan
                                        @endif
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
    .fa.fa-star-o,.fa.fa-star{
        color: #fbc634 !important;
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