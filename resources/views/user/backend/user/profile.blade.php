@extends('dashboard.layout.dashboard')

@section('title')
<title>Hồ sơ cá nhân</title>

@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Hồ sơ cá nhân','key'=> ''])
@include('dashboard.common.alert')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                            <div class="card text-center widget-profile px-0 border-0">
                                <div class="card-img mx-auto rounded-circle" style="margin-top:10px">
                                    <img src="{{!empty(Auth::user()->image)?Auth::user()->image:asset('backend/img/avatar.png')}}" alt="user image" style="width: 100px;height: 100px;object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h4 class="py-2 text-dark">{{Auth::user()->name}}</h4>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>

                            <hr class="w-100">
                            <div class="contact-info pt-4">
                                <h5 class="text-dark mb-1">Contact Information</h5>
                                <p class="text-dark font-weight-medium pt-4 mb-2">Address</p>
                                <p>{{Auth::user()->address}}</p>
                                <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                                <p>{{Auth::user()->phone}}</p>


                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom" style="margin-top: 20px;">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Cập nhập thông tin cá nhân</a></li>

                            </ul>
                            <div class="tab-content">
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                                <div class="tab-pane active" id="tab_1">

                                    <form role="form" action="{{route('admin.profile-store' , ['id' => Auth::user()->id])}}" method="post">
                                        <div class="box-body">
                                            @csrf
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tên thành viên</label>
                                                <input type="text" name="name" class="form-control" placeholder="" value="{{Auth::user()->name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" name="phone" class="form-control" placeholder="" value="{{Auth::user()->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="address" class="form-control" placeholder="" value="{{Auth::user()->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Ảnh đại điện</label>

                                                <div class="flex">
                                                    <div class="avatar" style="cursor: pointer;">
                                                        <img src="<?php echo (old('image')) ? old('image') : ((!empty(Auth::user()->image)) ? Auth::user()->image : asset('backend/img/not-found.png')); ?>" class="img-thumbnail" alt="">
                                                    </div>
                                                    <input style="width: calc(100% - 100px);" type="text" name="image" value="<?php echo (old('image')) ? old('image') : ((!empty(Auth::user()->image)) ? Auth::user()->image : asset('backend/img/not-found.png')); ?>" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Cập nhập</button>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                        <div class="nav-tabs-custom" style="margin-top: 20px;">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_2" data-toggle="tab">Thay đổi mật khẩu</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <form role="form" action="{{route('admin.profile-password' , ['id' => Auth::user()->id])}}" method="post">
                                        <div class="box-body">
                                            @csrf
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Mật khẩu mới</label>
                                                <input type="text" name="password" class="form-control" placeholder="" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Xác nhận mật khẩu mới</label>
                                                <input type="text" name="confirm_password" class="form-control" placeholder="" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Cập nhập</button>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div>
                </div>

            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection
<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e5e9f2;
        border-radius: 0.25rem;
    }

    .widget-profile .card-img {
        width: 100px;
        height: 100px;
        overflow: hidden;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .mr-auto,
    .mx-auto {
        margin-right: auto !important;
    }

    .ml-auto,
    .mx-auto {
        margin-left: auto !important;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .text-dark {
        color: #1b223c !important;
    }

    h5.text-dark {
        font-size: 20px;
        font-weight: bold;
    }

    .font-weight-medium {
        font-size: 16px;
        font-weight: bold;
    }

    .profile-content-left {
        padding: 20px;
    }

    .flex {
        display: flex;
        align-items: center;
    }

    .flex img {
        width: 100px !important;
        height: 100px !important;
        border-radius: 100% !important;
    }
</style>