@extends('dashboard.layout.dashboard')
@section('title')
<title>Cập nhập sản phẩm</title>
@endsection
@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Danh sách sản phẩm','key'=> 'Cập nhập'])
<section class="content">
    <form role="form" action="{{route('product.update',['id' => $detail->id ])}}" method="post">
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
                        @include('product.backend.product.common._detail',['action' => 'update'])
                        @include('dashboard.common.albums')
                        @include('product.backend.product.common.attribute',['action' => 'update'])
                        @include('dashboard.common.seo')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Cập nhập</button>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Danh mục chính</label>
                            <?php
                            echo Form::select('catalogueid', $htmlCatalogue, $detail->catalogueid, ['class' => 'form-control select2']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Danh mục phụ</label>
                            <?php if (!empty(old('catalogue'))) { ?>
                                <select name="catalogue[]" class="form-control select2" multiple>
                                    <option value=""></option>
                                    @foreach($htmlCatalogue as $k=>$v)
                                    <option value="{{$k}}" {{ (collect(old("catalogue"))->contains($k)) ? 'selected':'';}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            <?php } else { ?>
                                <select name="catalogue[]" class="form-control select2" multiple>
                                    <option value=""></option>
                                    @foreach($htmlCatalogue as $k=>$v)
                                    <option value="{{$k}}" {{ (collect(json_decode($detail->catalogue))->contains($k)) ? 'selected':'';}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            <?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                @include('dashboard.components.relationships',['module' =>'product','action' => 'update'])
                @include('dashboard.common.publish')
            </div>
        </div>
    </form>
</section>
@include('product.backend.product.common.script')
@include('product.backend.product.common.popup')
@endsection