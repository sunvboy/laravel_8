<div class="collapse" id="collapse{{$data['id']}}">
    <div class="input-box">
        <form method="post" action="{{route('update-menu-item',$data['id'])}}">
            @csrf
            <div class="form-group">
                <label>Tên đường dẫn</label>
                <input type="text" name="name" value="@if(empty($data['name'])) {{$data['title']}} @else {{$data['name']}} @endif" class="form-control">
            </div>
            @if($data['id'] == 'custom')
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" value="{{$data['slug']}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="checkbox" name="target" value="_blank" @if($data['target'] == "_blank") checked @endif> Mở sang tab mới
            </div>
            @endif
            <div class="form-group">
                @can('menu_edit') 
                    <button class="btn btn-sm btn-primary">Lưu</button>
                @endcan
                @can('menu_destroy') 
                <a <?php if(isset($data['children'])){?>disabled<?php }?> href="{{route('delete-menu-item',$data['id'])}}" class="btn btn-sm btn-danger">Xóa</a>
                @endcan

            </div>
        </form>
    </div>
</div>