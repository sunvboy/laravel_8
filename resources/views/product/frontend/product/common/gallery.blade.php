<?php $list_gallery = json_decode($detail->image_json, TRUE); ?>
@if(!empty($list_gallery))
<div class="main_img">
    <div class="product-images demo-gallery">
        <div class="main-img-slider">
            @foreach($list_gallery as $v)
            <a data-fancybox="gallery" href="{{$v}}"><img src="{{$v}}" class="img-fluid" alt="{{$detail->title}}"></a>
            @endforeach
        </div>
        <ul class="thumb-nav">
            @foreach($list_gallery as $v)
            <li><img src="{{$v}}" alt="{{$detail->title}}"></li>
            @endforeach
        </ul>
    </div>
</div>
@endif