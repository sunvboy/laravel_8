@extends('dashboard.layout.dashboard')

@section('title')
<title>Cập nhập nhóm thành viên</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->

@include('dashboard.common.breadcrumb',['name' => 'Nhóm thành viên','key'=> 'Cập nhập'])
@include('dashboard.common.alert')

<section class="content">
    <form role="form" action="{{route('roles.update',['id' => $detailRole->id])}}" method="post">

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
                            <label>Tên nhóm thành viên</label>
                            <input type="text" name="title" class="form-control" placeholder="" value="{{$detailRole->title}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="description" class="form-control" placeholder="" value="{{$detailRole->description}}">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="box box-success row">
                    @foreach($permissions as $k=>$v)

                    <div class="box-header col-md-3">
                        <h3 class="box-title">
                            <span> {{config('permissions.modules')[$v->title]}}</span>
                        </h3>
                    </div>
                
                    <div class="box-header col-md-9">
                        <div class="box-body row">
                            @foreach($v->permissionsChildren as $val)
                            <div class="form-group col-xs-3 form-group-input " style="margin-bottom: 0px;">
                            <div class="i-checks">
                            <label for="check{{$val->id}}">
                                    <input {{$permissionChecked->contains('id',$val->id) ? 'checked' : ''}} name="permission_id[]" type="checkbox" class="inputChild" value="{{$val->id}}" id="check{{$val->id}}" />
                                    {{!empty(config('permissions.actions')[$val->title])?config('permissions.actions')[$val->title]:$val->title}}
                                </label>
                            </div>    
                           
                            </div>
                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    @endforeach
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cập nhập</button>

                </div>


            </div>


        </div>
    </form>
</section>



@endsection