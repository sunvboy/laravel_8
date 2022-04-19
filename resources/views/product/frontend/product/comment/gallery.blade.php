<div class="UNFVx" style="opacity:0;z-index: -1;">
    <a class="btn-close"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
        </svg><span>Đóng</span></a>

    <div class="main-slide-wrapper">
        <div class="main-slide-container">
            <?php $list_gallery = json_decode($detail->image_json, TRUE); ?>
            @if(!empty($list_images_cmt))
            <div class="cSlider cSlider--single">
                @foreach($list_images_cmt as $v)
                    <div class="cSlider__item"><img src="{{$v}}" class="img-fluid fLNLeB" alt="{{$detail->title}}"></div>
                @endforeach
            </div>
            @endif
        </div>


    </div>
    <div class="slide-nav-wrapper">
        <div class="container">
            <div class="tab"><span class="tab-item actived">Hình ảnh thực tế từ khách hàng(<?php echo count($list_images_cmt) ?>).</span></div>
            <div class="cSlider cSlider--nav">
                @foreach($list_images_cmt as $v)
                <div class="cSlider__item cSlider__item_child">
                    <div class="cSlider__item_child_2">
                        <img src="{{$v}}" alt="{{$detail->title}}" class="kipMhU">
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>


