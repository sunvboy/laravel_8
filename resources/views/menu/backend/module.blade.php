<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#{{$module}}_box" data-toggle="collapse" data-parent="#menu-items">{{$title}}<span class="caret pull-right"></span></a>
    </div>
    <div class="panel-collapse collapse {{$in}}" id="{{$module}}_box">
        <div class="panel-body">
            <div class="item-list-body">
                @foreach($data as $v)
                    <p><input type="checkbox" class="{{$module}}" value="{{$v->id}}"> 
                        @if($lft == 'TRUE')
                            {{str_repeat('|----', (($v->level > 0) ? ($v->level - 1) : 0)) . $v->title;}}
                        @else
                            {{$v->title}}
                        @endif
                    
                    
                    </p>
                @endforeach
            </div>
            @can('menu_create') 
            <div class="item-list-footer uk-flex uk-flex-middle">
                <label class="btn btn-sm btn-default uk-flex uk-flex-middle">
                    <input type="checkbox" id="select_all_{{$module}}" style="margin-top: 0px;display: none;">&nbsp;<span>Chọn toàn bộ</span>
                </label>&nbsp;
                <button type="button" class="pull-right btn btn-default btn-sm add-categories" data-module="{{$module}}">Thêm vào menu</button>
            </div>
            @endcan
        </div>
    </div>
    <script>
        $('#select_all_{{$module}}').click(function(event) {
            if (this.checked) {
                $('#{{$module}}_box :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('#{{$module}}_box :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
</div>