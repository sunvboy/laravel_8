@extends('dashboard.layout.dashboard')

@section('title')
<title>Cập nhập thành viên</title>

@section('content')

@include('dashboard.common.breadcrumb',['name' => 'Thành viên','key'=> 'Cập nhập'])
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<section class="content">
    <form role="form" action="{{route('users.update' , ['id' => $detailUser->id])}}" method="post">

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
                            <input type="text" name="name" class="form-control" placeholder="" value="{{$detailUser->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="" value="{{$detailUser->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" placeholder="" value="{{$detailUser->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" placeholder="" value="{{$detailUser->address}}">
                        </div>
                        <div class="form-group">
                            <label>Chọn nhóm thành viên</label>
                            <select name="role_id[]" class="form-control select2" multiple>
                                <option value=""></option>
                                @foreach($roles as $k=>$v)
                                <option value="{{$v->id}}" {{$role_user->contains('role_id',$v->id) ? 'selected' : ''}}>{{$v->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Cập nhập</button>
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
                                <img src="<?php echo (old('image')) ? old('image') : ((!empty($detailUser['image'])) ? $detailUser['image'] : asset('backend/img/not-found.png')); ?>" class="img-thumbnail" alt="">
                            </div>
                            <input type="text" name="image" value="<?php echo (old('image')) ? old('image') : ((!empty($detailUser['image'])) ? $detailUser['image'] : asset('backend/img/not-found.png')); ?>" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
                        
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>


        </div>
    </form>

</section>
<script type="text/javascript">
    $('.select2').select2({
        'placeholder': 'Chọn nhóm thành viên'
    });
</script>
@endsection