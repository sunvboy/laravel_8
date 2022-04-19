@extends('dashboard.layout.dashboard')

@section('title')
<title>Thêm mới page</title>
@endsection

@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách page','key'=> 'Thêm mới'])

<section class="content">
    <form role="form" action="{{route('page.store')}}" method="post">

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
                            <label>Tiêu đề</label>
                            <?php
                            echo Form::text('title', '', ['class' => 'form-control']);
                            ?>

                        </div>
                        
                        <div class="form-group">
                            <label>Mô tả</label>
                            <?php
                            echo Form::textarea('description', '', ['id' => 'ckDescription', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                            ?>
                        </div>
                        @include('dashboard.common.seo')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </div>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
            <div class="col-md-3">
                @include('dashboard.common.image',['action' => 'create'])
                @include('dashboard.common.publish')
              
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Trang</label>
                            <?php echo Form::select('page',config('page'),old('page'), ['class' => 'form-control']);?>
                        </div>
                    </div><!-- /.box-body -->
                </div>
             
            </div>
        </div>
    </form>


</section>
@endsection