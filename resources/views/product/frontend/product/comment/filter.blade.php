
@if(isset($list_images_cmt))
<div class="review-images">
    <div class="review-images__heading">Tất cả hình ảnh (<?php echo !empty($list_images_cmt)?count($list_images_cmt):0?>)</div>
    <div class="review-images__inner">
        @foreach($list_images_cmt as $kimage=>$image)
        @if($kimage <= 4) <div class="review-images__item">
            <div class="review-images__img" style="background-image: url('<?php echo $image ?>');"></div>
    </div>
    @endif
    @if($kimage == 5)
    <div class="review-images__item">
        <div class="review-images__img" style="background-image: url('<?php echo $image ?>');"></div>
        @if(count($list_images_cmt) > 6)
        <div class="review-images__total">+<?php echo count($list_images_cmt) - 6 ?></div>
        @endif
    </div>
    @endif
    @endforeach
</div>
@endif
<div class="filter-review">
    <div class="filter-review__label">Lọc xem theo :</div>
    <div class="filter-review__inner">
        <div class="filter-review__item active">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="id">Mới nhất</span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="gallery">Có hình ảnh</span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="payment">Đã mua hàng</span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="5">5 <i class="fa fa-star rating-color"></i></span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="4">4 <i class="fa fa-star rating-color"></i></span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="3">3 <i class="fa fa-star rating-color"></i></span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="2">2 <i class="fa fa-star rating-color"></i></span>
        </div>
        <div class="filter-review__item ">
            <span class="filter-review__check"><img src="https://salt.tikicdn.com/ts/upload/68/59/32/9589577c7e094d3dccbe57dd0af2bbb8.png"></span>
            <span class="filter-review__text" data-sort="1">1 <i class="fa fa-star rating-color"></i></span>
        </div>
    </div>
</div>