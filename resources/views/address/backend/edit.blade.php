@extends('dashboard.layout.dashboard')

@section('title')
<title>Cập nhập cửa hàng</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Cập nhập cửa hàng','key'=> 'Thêm mới'])

<section class="content">
    <form role="form" action="{{route('address.update',['id' => $detail->id])}}" method="post">

        <div class="row">
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="box box-warning">

                    <div class="box-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>

                        @endif
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên cửa hàng</label>
                            <?php
                            echo Form::text('title', $detail->title, ['class' => 'form-control']);
                            ?>

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <?php
                            echo Form::text('email',  $detail->email, ['class' => 'form-control']);
                            ?>

                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <?php
                            echo Form::text('hotline',  $detail->hotline, ['class' => 'form-control']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <?php
                            echo Form::text('address', $detail->address, ['class' => 'form-control','placeholder'=>'Số 33 ngõ 629 Kim Mã']);
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Tỉnh/Thành phố</label>
                            <?php
                            echo Form::select('cityid', $listCity, $detail->cityid, ['class' => 'form-control select3', 'id' => 'city']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Quận/Huyện</label>
                            <?php
                            echo Form::select('districtid', [], '', ['class' => 'form-control select3', 'id' => 'district','placeholder'=>'Quận/Huyện']);
                            ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </div>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                @include('dashboard.common.image',['action' => 'update'])

                @include('dashboard.common.publish')
            </div>
        </div>
    </form>
</section>
@include('components.script.getLocation')
@endsection