@extends('dashboard.layout.dashboard')

@section('title')
<title>Quản lý Banner & Slide</title>
@section('content')
<!-- Content Header (Page header) -->
@include('dashboard.common.breadcrumb',['name' => 'Quản lý Banner & Slide','key'=> 'Thêm mới'])
<section class="content">
    <form form role="form" action="{{route('users.store')}}" method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <button class="btn btn-primary btn-block btn-upload" data-catalogueid="0" data-toggle="modal" data-target="#myModal2">Upload hình ảnh</button>
                            <div class="hr-line-dashed"></div>
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <h5 style="font-size:20px">Nhóm Slide</h5>
                                @if(env('APP_ENV') == "local")
                                <a href="" title="" data-toggle="modal" data-target="#myModal">+ Thêm mới</a>
                                @endif
                            </div>
                        </div>
                        <ul class="folder-list" id="folder-list" style="padding: 0">
                            @foreach($slideGroup as $v)
                            <li>
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <a href="" class="slide-catalogue" data-id="{{$v->id}}"><i class="fa fa-picture-o"></i>{{$v->title}}</a>
                                    @if(env('APP_ENV') == "local")
                                    <a type="button" class="slide-group-delete ajax-delete" data-title="Lưu ý: Dữ liệu sẽ không thể khôi phục. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!" data-module="category_slides" data-id="{{$v->id}}" data-child="1" style="color:#676a6c;"> Xóa</a>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9" id="listData">
                @foreach($slideGroup as $key => $val)
                <div class="row" style="padding-left:5px;padding-right:5px;" id="listData{{$val->id}}">
                    <div class="col-lg-12">
                        <h2 style="font-size:20px;font-weight:normal;margin: 0 0 10px 0;font-family:Segoe UI;">{{$val->title}}</h2>
                    </div>
                    <div class="">
                        @foreach($val->slides as $key => $v)
                        <div class="file-box col-md-3" id="slide-<?php echo $v->id; ?>">
                            <div class="file">
                                <div href="#">
                                    <span class="corner"></span>
                                    <div class="image">
                                        <img alt="image" class="img-responsive" src="<?php echo $v->src; ?>">
                                    </div>
                                    <div class="file-name">
                                        <span class="name"><span style="font-weight:bold;">Chú thích</span>: <?php echo (!empty($v->title)) ? $v->title : ''; ?></span>
                                        <br>
                                        <a class="link" style="color:#676a6c;" href=""><span style="font-weight:bold;">Link</span>: <?php echo (!empty($v->link)) ? '<i style="color:blue;">' . $v->link . '</i>' : ''; ?></a>
                                        <br>
                                        <span class="name"><span style="font-weight:bold;">Ghi chú</span>: <?php echo (!empty($v->description)) ? $v->description : '<span class="text-danger"-</span>'; ?></span>

                                        <div class="file-action uk-flex uk-flex-middle uk-flex-space-between" style="margin-top:10px;">
                                            <a data-toggle="modal" data-json="<?php echo base64_encode(json_encode($v)) ?>" data-target="#myModalEdit" href="" title="" class="edit-slide" data-id="<?php echo $v->id; ?>">Chỉnh sửa</a>
                                            <a href="javascript:void(0)" type="button" class="ajax-delete" data-parent="file-box" data-title="Lưu ý: Dữ liệu sẽ không thể khôi phục. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!" data-module="slides" data-id="<?php echo $v->id; ?>" style="color:red;"> Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <hr>
                @endforeach


            </div>
        </div>

    </form>


</section>
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="bg-loader" style="display: none;"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Thêm mới nhóm Banner &amp; Slide</h4>
                <small class="font-bold">Kích thước banner hiển thị tốt nhất 1920x760 pixel, các banner nên có kích thước bằng nhau.</small>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m0" style="display: none;margin-left: 0px;margin-right: 0px;"></div>
                <form class="m-t slide-group" role="form" method="post" action="{{route('slide.category_store')}}">

                    <div class="form-group">
                        <label>Tên nhóm Slide</label>
                        <input type="text" placeholder="" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" placeholder="" id="keyword" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-group">Tạo mới</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog  modal-lg slide-container">
        <div class="modal-content animated fadeIn">
            <div class="bg-loader" style="display: none;"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Upload hình ảnh</h4>
                <small class="font-bold">Kích thước banner hiển thị tốt nhất <span class="text-danger" style="font-size:16px;">1920x760</span> pixel, các banner nên có kích thước bằng nhau.</small>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger ml0" style="display: none;"></div>
                <form class="m-t slide-group" role="form" method="post" action="">

                    <div class="form-group uk-flex uk-flex-middle">
                        <label style="width:110px;margin-right:10px;">Chọn nhóm slide</label>
                        <div class="col-sm-6">
                            <select name="catalogueid" class="form-control catalogueid">
                                <option value="0">[Chọn nhóm slide]</option>

                                @foreach($slideGroup as $v)
                                <option value="{{$v->id}}">{{$v->title}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="text-right" style="margin-bottom:5px;"><a onclick="openKCFinderSlide(this);return false;" href="javascript:void(0)" title="" class="upload-picture">Chọn hình</a></div>
                    <div class="click-to-upload ">
                        <div class="icon">
                            <a type="button" class="upload-picture" onclick="openKCFinderSlide(this);return false;">
                                <svg style="width:80px;height:80px;fill: #d3dbe2;margin-bottom: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                                    <path d="M80 57.6l-4-18.7v-23.9c0-1.1-.9-2-2-2h-3.5l-1.1-5.4c-.3-1.1-1.4-1.8-2.4-1.6l-32.6 7h-27.4c-1.1 0-2 .9-2 2v4.3l-3.4.7c-1.1.2-1.8 1.3-1.5 2.4l5 23.4v20.2c0 1.1.9 2 2 2h2.7l.9 4.4c.2.9 1 1.6 2 1.6h.4l27.9-6h33c1.1 0 2-.9 2-2v-5.5l2.4-.5c1.1-.2 1.8-1.3 1.6-2.4zm-75-21.5l-3-14.1 3-.6v14.7zm62.4-28.1l1.1 5h-24.5l23.4-5zm-54.8 64l-.8-4h19.6l-18.8 4zm37.7-6h-43.3v-51h67v51h-23.7zm25.7-7.5v-9.9l2 9.4-2 .5zm-52-21.5c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm-13-10v43h59v-43h-59zm57 2v24.1l-12.8-12.8c-3-3-7.9-3-11 0l-13.3 13.2-.1-.1c-1.1-1.1-2.5-1.7-4.1-1.7-1.5 0-3 .6-4.1 1.7l-9.6 9.8v-34.2h55zm-55 39v-2l11.1-11.2c1.4-1.4 3.9-1.4 5.3 0l9.7 9.7c-5.2 1.3-9 2.4-9.4 2.5l-3.7 1h-13zm55 0h-34.2c7.1-2 23.2-5.9 33-5.9l1.2-.1v6zm-1.3-7.9c-7.2 0-17.4 2-25.3 3.9l-9.1-9.1 13.3-13.3c2.2-2.2 5.9-2.2 8.1 0l14.3 14.3v4.1l-1.3.1z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="small-text">Sử dụng nút <b>Chọn hình</b> để thêm hình.</div>
                    </div>
                    <div class="upload-list" style="padding: 5px; margin-top: 15px; display: none;">
                        <div class="row">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-slide">Tạo mới</button>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="bg-loader" style="display: none;"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Cập nhật Banner Slide</h4>
                <small class="font-bold">Kích thước banner hiển thị tốt nhất 1920x760 pixel, các banner nên có kích thước bằng nhau.</small>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mt5" style="display: none;"></div>
                <form class="m-t update-group" role="form" method="post" action="">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update-slide">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
@include('slide.backend.style')
@include('slide.backend.script')
@endsection