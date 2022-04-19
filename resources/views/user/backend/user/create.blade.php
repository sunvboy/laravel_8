@extends('dashboard.layout.dashboard')

@section('title')
<title>Thêm mới thành viên</title>

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Thành viên','key'=> 'Thêm mới'])



<section class="content">
    <form form role="form" action="{{route('users.store')}}" method="post">
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
                            <label>Tên thành viên</label>
                            <input type="text" name="name" class="form-control" placeholder="" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" placeholder="" value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" placeholder="" value="{{old('address')}}">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label>Chọn nhóm thành viên</label>
                            <select name="role_id[]" class="form-control select2" multiple>
                                <option value=""></option>
                                @foreach($roles as $k=>$v)
                                <option value="{{$v->id}}">{{$v->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-row">
                            <label>Ảnh đại diện</label>
                            <div class="avatar" style="cursor: pointer;">
                                <img src="<?php if(!empty(old('image'))){?>{{old('image')}}<?php }else{?>{{asset('backend/img/not-found.png')}}<?php }?>" class="img-thumbnail" alt="">
                            </div>
                            <input type="text" name="image" value="{{old('image')}}" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>


        </div>

    </form>


</section>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2({
        'placeholder': 'Chọn nhóm thành viên'
    });
</script>
@endsection