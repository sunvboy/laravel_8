@extends('dashboard.layout.dashboard')
@section('title')
<title>Bật/tắt module</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách module','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
           
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">

                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                        
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Hiển thị</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $v)
                                <tr class="odd" id="post-<?php echo $v->id; ?>">
                                    <td class="sorting_1">{{$v->id}}</td>
                                    <td><?php echo $v->title; ?></td>
                                    @include('dashboard.components.publish',['module' => 'functions','title' => 'publish'])
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection