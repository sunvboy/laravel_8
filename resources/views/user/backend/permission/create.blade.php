@extends('dashboard.layout.dashboard')

@section('title')
<title>Thêm mới phân quyền</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Phân quyên nhóm thành viên','key'=> 'Thêm mới'])

<section class="content">
    <form role="form" action="{{route('permission.store')}}" method="post">

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-warning">

                    <div class="box-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        @csrf
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên module</label>
                            <select class="form-control" name="title">
                                <option value="">Chọn tên module</option>
                                @foreach(config('permissions.modules') as $k=>$v)
                                    <option value="{{$k}}"> {{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="description" class="form-control" placeholder="" value="{{old('description')}}">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-success">
                    <div class="box-body row">
                        @foreach(config('permissions.actions') as $k=>$v)
                        <div class="form-group col-xs-3">
                            <label for="check{{$k}}">
                                <input name="permission_id[]" type="checkbox" class="inputChild" value="{{$k}}" id="check{{$k}}" />
                                {{$v}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection