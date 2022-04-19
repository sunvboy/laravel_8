<?php if (Auth::guard('customer')->user()) { ?>
    <button type="button" class="btn btn-cmt" data-toggle="modal" data-target="#exampleModal">
        Viết đánh giá
    </button>
    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="write-review__product">
                        <img src="{{$detail->image}}" alt="{{$detail->title}}" class="write-review__product-img">
                        <div class="write-review__product-name">{{$detail->title}}</div>

                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-comment">
                        <div class="write-review__heading">Vui lòng đánh giá</div>
                        <div class="write-review__stars">
                            <input type="hidden" class="rating-disabled" value="5" name="rating" />
                            <input type="hidden" value="" name="images">
                        </div>
                        <div class="write-review__info">
                            <input value="<?php echo Auth::guard('customer')->user()->name?>" type="hidden" name="fullname" placeholder="Họ và tên" class="form-control">
                            <input value="<?php echo Auth::guard('customer')->user()->phone?>" type="hidden" name="phone" placeholder="Số điện thoại" class="form-control">

                        </div>

                        <textarea rows="8" placeholder="Chia sẻ thêm thông tin sản phẩm" class="write-review__input" name="message"></textarea>
                        <div class="error_comment" ></div>
                        <div class="write-review__images" style="display: none;">
                        </div>
                        <div class="write-review__buttons">
                            <input class="write-review__file" type="file" multiple="">
                            <button type="button" class="write-review__button write-review__button--image">
                                <img src="https://salt.tikicdn.com/ts/upload/1b/7a/3b/d8ff2d5d709c730e12e11ba0b70a1285.jpg"><span>Thêm ảnh</span>
                            </button>
                            <button type="submit" class="write-review__button write-review__button--submit"><span>Gửi đánh giá</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php } else { ?>
    <a href="{{route('customer.login',['redirect' => 'san-pham/'.$detail->slug])}}" type="button" class="btn btn-cmt">
        Viết đánh giá
    </a>
<?php } ?>