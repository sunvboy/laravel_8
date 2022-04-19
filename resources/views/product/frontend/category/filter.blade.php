<div class="block-content" style="display: none;">
    <div class="filter-options">
        @if (check_array($attribute_catalogue))
        <?php $count_attr =  count($attribute_catalogue); ?>
        <style>
            .filter-options .filter-options-item {
                width: calc(100% / <?php echo $count_attr; ?>);
                margin-bottom: 30px;
            }
        </style>
        @foreach ($attribute_catalogue as $key => $val)
        <div class="filter-options-item">
            <div class="filter-options-title"><span>{{$key}}</span> <a href="javascript:void(0)" class="reset filter-reset">Mặc định</a></div>
            <div class="filter-options-content">
                <ol class="items" data-keyword="{{$val['keyword_cata']}}">
                    @if (check_array($val))
                        @foreach ($val as $k => $v)
                            @if($k != 'keyword_cata')
                                <li class="item" ><a href="" class="filter-item"   data-id="{{$k}}" data-title="{{$v}}">{{$v}}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="filter-current">
        <!---->
        <ol class="items filter-ol-list">

        </ol>
        <input type="hidden" name="attr" id="filter-attr" value="">
        <input type="hidden" name="catalogueid" value="{{$detail->id}}">
        <div class="filter-actions"><a href="javascript:void(0)" class="action clear filter-clear"><span>Xóa tất cả</span></a><a href="javascript:void(0)" class="action apply filter-apply" style="background: #333f48;color: #fff;"><span>Áp dụng</span></a></div>
    </div>
</div>