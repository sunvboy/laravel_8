@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách menu</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách menu','key'=> 'Danh sách'])
@include('dashboard.common.alert')

<script src="{{ asset('backend/js/jquery-sortable-min.js') }}" type="text/javascript"></script>
<section class="content">
    <div class="container">
        @if(count($menus) > 0 && env('APP_ENV') == "local")
        <div class="content info-box">

            Select a menu to edit:
            <form action="{{route('menus.index')}}" class="form-inline uk-flex uk-flex-middle">
                <select name="id" class="form-control">
                    @foreach($menus as $menu)
                    @if($desiredMenu != '')
                    <option value="{{$menu->id}}" @if($menu->id == $desiredMenu->id) selected @endif>{{$menu->title}}</option>
                    @else
                    <option value="{{$menu->id}}">{{$menu->title}}</option>
                    @endif
                    @endforeach
                </select>
                <button class="btn btn-primary btn-menu-select">Chọn</button>
            </form>
            hoặc <a href="{{route('menus.index',['id' => 'new'])}}">tạo menu mới</a>. Đừng quên lưu thay đổi.
        </div>
        @endif
        <div class="row" id="main-row">
            <div class="col-sm-3 cat-form @if(empty($desiredMenu)) disabled @endif ">
                <h3><span>Thêm liên kết</span></h3>
                @can('menu_create') 
                <div class="panel-group" id="menu-items">
                    @include('menu.backend.module',['data' => $categories_product,'module' => 'category_products','title' => 'Danh mục sản phẩm','in' => 'in','lft' => 'TRUE'])
                    @include('menu.backend.module',['data' => $products,'module' => 'products','title' => 'Sản phẩm','in' => '','lft' => 'FALSE'])
                    @include('menu.backend.module',['data' => $categories_article,'module' => 'category_articles','title' => 'Danh mục bài viết','in' => '','lft' => 'TRUE'])
                    @include('menu.backend.module',['data' => $articles,'module' => 'articles','title' => 'Bài viết','in' => '','lft' => 'FALSE'])
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#custom-links" data-toggle="collapse" data-parent="#menu-items">Liên kết tự tạo <span class="caret pull-right"></span></a>
                        </div>
                        <div class="panel-collapse collapse" id="custom-links">
                            <div class="panel-body">
                                <div class="item-list-body item-list-body-hidden">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="url" id="url" class="form-control" placeholder="https://">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đường dẫn</label>
                                        <input type="text" id="linktext" class="form-control" placeholder="">
                                    </div>
                                </div>
                                @can('menu_create') 
                                <div class="item-list-footer">
                                    <button type="button" class="pull-right btn btn-default btn-sm" id="add-custom-link">Thêm vào menu</button>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

            </div>
            <div class="col-sm-9 cat-view">
                <h3><span>Cấu trúc menu</span></h3>
                @if(empty($desiredMenu))
                <h4>Tạo menu mới</h4>
                <form method="post" action="{{route('menus.store')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-ban"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <label>Tên menu</label>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-sm btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
                @else
                <div id="menu-content">
                    <div>
                        <p>Kéo các mục tới vị trí bạn mong muốn. Nhấp chuột vào mũi tên bên phải để thiết lập tuỳ chỉnh cho mỗi mục. Sau đó ấn "LƯU MENU"</p>
                        @if(!empty($desiredMenu))
                        <ul class="menu ui-sortable" id="menuitems">
                            @if(!empty($menuitems))
                            @foreach($menuitems as $key=>$item)
                            @if($item['title'])
                            <li data-id="{{$item['id']}}"><span class="menu-item-bar">@if(empty($item['name'])) {{$item['title']}} @else {{$item['name']}} @endif <a href="#collapse{{$item['id']}}" class="pull-right" data-toggle="collapse"><i class="caret"></i></a></span>
                                @include('menu.backend.collapse',['data' => $item])
                                <ul>
                                    @if(isset($item['children']))
                                    @foreach($item['children'] as $data)
                                   
                                    @if($data['title'])
                                    <li data-id="{{$data['id']}}" class="menu-item"> <span class="menu-item-bar">@if(empty($data['name'])) {{$data['title']}} @else {{$data['name']}} @endif <a href="#collapse{{$data['id']}}" class="pull-right" data-toggle="collapse"><i class="caret"></i></a></span>
                                        @include('menu.backend.collapse',['data' => $data])
                                        @if(isset($data['children']))
                                            <ul>
                                                @foreach($data['children'] as $data2)
                                                    <li data-id="{{$data2['id']}}" class="menu-item"> <span class="menu-item-bar">@if(empty($data2['name'])) {{$data2['title']}} @else {{$data2['name']}} @endif <a href="#collapse{{$data2['id']}}" class="pull-right" data-toggle="collapse"><i class="caret"></i></a></span>
                                                        @include('menu.backend.collapse',['data' => $data2])    
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                       
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                        @endif
                    </div>
                    @if($menuitems)
                        <div class="text-left">
                            @can('menu_edit')
                                <button class="btn btn-sm btn-primary" id="saveMenu">LƯU MENU</button>
                            @endcan

                            @if(env('APP_ENV') == "local")
                            <a class="btn btn-sm btn-danger" href="{{route('delete-menu',$desiredMenu->id)}}">XÓA MENU</a>
                            @endif
                        </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <div id="serialize_output">@if($desiredMenu){{$desiredMenu->content}}@endif</div>
</section>


@if($desiredMenu)
<script>
    $('.add-categories').click(function() {
        var module = $(this).attr('data-module');
        var menuid = <?= $desiredMenu->id ?>;
        var n = $('.' + module + ':checked').length;
        var array = $('.' + module + ':checked');

        var ids = [];
        for (i = 0; i < n; i++) {
            ids[i] = array.eq(i).val();
        }
        if (ids.length == 0) {
            return false;
        }

        $.ajax({
            type: "get",
            data: {
                menuid: menuid,
                ids: ids,
                module: module
            },
            url: "{{route('addMenuItem')}}",
            success: function(res) {
                location.reload();
            }
        })
    })

    $("#add-custom-link").click(function() {
        var menuid = <?= $desiredMenu->id ?>;
        var url = $('#url').val();
        var link = $('#linktext').val();
        if (url.length > 0 && link.length > 0) {
            $.ajax({
                type: "get",
                data: {
                    menuid: menuid,
                    url: url,
                    link: link
                },
                url: "{{route('addCustomLink')}}",
                success: function(res) {
                    location.reload();
                }
            })
        }
    })
</script>
<script>
    var group = $("#menuitems").sortable({
        group: 'serialization',
        onDrop: function($item, container, _super) {
            var data = group.sortable("serialize").get();
            var jsonString = JSON.stringify(data, null, ' ');
            $('#serialize_output').text(jsonString);
            _super($item, container);
        }
    });
</script>
@if($desiredMenu)
<script>
    $('#saveMenu').click(function() {
        var menuid = <?php echo $desiredMenu->id ?>;
        var location = $('input[name="location"]:checked').val();
        var newText = $("#serialize_output").text();
        // console.log(newText);
        var data = JSON.parse($("#serialize_output").text());
        $.ajax({
            type: "get",
            data: {
                menuid: menuid,
                data: data,
                location: location
            },
            url: "{{route('update-menu')}}",
            success: function(res) {
                window.location.reload();
            },
            error: function(data){
                // Log in the console
                var errors = data.responseJSON;
                swal({
                    title: "ERROR",
                    text: errors.message,
                    type: "error"
                });
               
            }
        })
    })
</script>
@endif
@endif
<style>
    .btn-menu-select {
        margin-top: -1px;
        height: 34px;
    }

    #menu-items .panel-default>.panel-heading>a {
        position: relative;
    }

    #menu-items span.caret {
        position: absolute;
        top: 50%;
        right: 0px;
    }

    .item-list,
    .info-box {
        background: #fff;
        padding: 10px;
    }

    .item-list-body {
        max-height: 300px;
        overflow-y: scroll;
    }

    .panel-body p {
        margin-bottom: 5px;
    }

    .info-box {
        margin-bottom: 15px;
    }

    .item-list-footer {
        padding-top: 10px;
    }

    .panel-heading a {
        display: block;
    }

    .form-inline {
        display: inline;
    }

    .form-inline select {
        padding: 4px 10px;
    }

    .btn-menu-select {
        padding: 4px 10px
    }

    .disabled {
        pointer-events: none;
        opacity: 0.7;
    }

    .item-list-body-hidden {
        overflow-y: hidden;
    }

    #menuitems {
        padding: 0px;
        list-style: none;
    }

    .menu-item-bar {
        background: #eee;
        padding: 5px 10px;
        border: 1px solid #d7d7d7;
        margin-bottom: 5px;
        cursor: move;
        display: block;
        position: relative;
        width: 75%;
    }

    .menu-item-bar a {
        position: absolute;
        top: 0px;
        right: 0px;
        height: 30px;
        width: 50px;
        line-height: 30px;
        text-align: center;
    }

    .menu-item-bar .caret {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 4px solid;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        top: 50%;
        position: absolute;
        transform: translateY(-50%);
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #serialize_output {
        display: none;
    }

    .menulocation label {
        font-weight: normal;
        display: block;
    }

    body.dragging,
    body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        z-index: 1;
    }

    ol.example li.placeholder {
        position: relative;
    }

    ol.example li.placeholder:before {
        position: absolute;
    }

    #menuitem {
        list-style: none;
    }

    #menuitem ul {
        list-style: none;
    }

    .input-box {
        width: 75%;
        background: #fff;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 5px;
    }

    .input-box .form-control {
        width: 50%
    }

    .menulocation label {
        font-weight: normal;
        display: block;
    }
</style>

@endsection