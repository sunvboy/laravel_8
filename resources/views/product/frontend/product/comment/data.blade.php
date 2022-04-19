@foreach($comment_view['listComment'] as $v)
<?php $listImageCmt = json_decode($v->images, TRUE); ?>
<div class="review-comment-item">
    <div class="row">
        <div class="col-md-4">
            <div class="review-comment">
                <div class="review-comment__user-inner">
                    <div class="review-comment__user-avatar">
                        <div class="has-character">
                            <span><img src="https://ui-avatars.com/api/?name={{$v->fullname}}"></span>
                        </div>
                    </div>
                    <div>
                        <div class="review-comment__user-name">{{$v->fullname}}</div>
                        <div class="review-comment__user-date">{{$v->created_at}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="review-comment__rating-title">
                <div class="review-comment__rating">
                    <span style="cursor: default;">
                        <?php for ($i = 1; $i <= $v->rating; $i++) { ?>
                            <i class="fa fa-star fa-star"></i>
                        <?php } ?>
                        <?php for ($i = 1; $i <= 5 - $v->rating; $i++) { ?>
                            <i class="fa fa-star fa-star-o"></i>
                        <?php } ?>
                    </span>
                </div>
                <div class="review-comment__title"><?php echo config('comment')['rating'][$v->rating] ?></div>
            </div>
            @if(!empty($v->order))
            <div class="review-comment__seller-name-attributes">
                <div class="review-comment__seller-name">
                    <span class="review-comment__check-icon"></span>Đã mua hàng
                </div>
            </div>
            @endif
            <div class="review-comment__content">{{$v->message}}</div>
            <?php if (!empty($listImageCmt)) { ?>
                <div class="review-comment__images">
                    @foreach($listImageCmt as $image)
                    <div class="review-comment__image" style="background-image: url('{{$image}}');"></div>
                    @endforeach
                </div>
            <?php } ?>
            <div class="review-comment__created-date"><span>Đánh giá vào
                    @if($v->created_at)
                    {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                    @endif
                </span>
            </div>

            <?php if (Auth::guard('customer')->user()) { ?>
                <span class="review-comment__thank hidden"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0" maskUnits="userSpaceOnUse" x="2" y="2" width="16" height="16" style="mask-type: alpha;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 2.5C7.84316 2.5 7.59618 2.68864 7.52202 2.96055L5.77263 9.375H3.125C2.77982 9.375 2.5 9.65482 2.5 10V16.875C2.5 17.2202 2.77982 17.5 3.125 17.5H14.0169C14.6136 17.4994 15.1905 17.2853 15.6432 16.8965C16.0958 16.5077 16.3945 15.9698 16.4852 15.38L17.1584 11.005C17.2131 10.6488 17.1903 10.2849 17.0913 9.93833C16.9923 9.59177 16.8195 9.27071 16.5848 8.99716C16.3501 8.72361 16.0591 8.50405 15.7316 8.35351C15.4041 8.20297 15.0479 8.12502 14.6875 8.125H10.625V5C10.625 4.33696 10.3616 3.70107 9.89277 3.23223C9.42393 2.76339 8.78804 2.5 8.125 2.5ZM5.625 16.25V10.625H3.75V16.25H5.625ZM6.875 10.0837L8.57908 3.83539C8.73871 3.89763 8.88539 3.99262 9.00888 4.11612C9.2433 4.35054 9.375 4.66848 9.375 5V8.75C9.375 9.09518 9.65482 9.375 10 9.375H14.6875C14.8677 9.37501 15.0458 9.41399 15.2095 9.48925C15.3732 9.56452 15.5188 9.67431 15.6361 9.81108C15.7535 9.94786 15.8398 10.1084 15.8893 10.2817C15.9388 10.4549 15.9503 10.6369 15.9229 10.815L15.2498 15.19C15.2044 15.4849 15.0551 15.7539 14.8287 15.9483C14.6024 16.1427 14.314 16.2497 14.0156 16.25H6.875V10.0837Z" fill="#38383D"></path>
                        </mask>
                        <g mask="url(#mask0)">
                            <rect x="2.5" y="2.5" width="15" height="15" fill="#0B74E5"></rect>
                        </g>
                    </svg><span>Hữu ích (1)</span>
                </span>
                <a href="" class="review-comment__reply js_btn_reply" data-id="{{$v->id}}" data-name="{{$v->fullname}}" data-comment="1">Bình luận</a>
            <?php } ?>


            <div class="reply-comment">
            </div>
            @if($v->child)
            <div class="review-comment__sub-comments">
                @foreach($v->child as $kc=>$vc)
                <div class="review-sub-comment">
                    <div class="review-sub-comment__avatar-thumb">
                        <div class="has-character"><span><img src="https://ui-avatars.com/api/?name={{$vc->fullname}}"></span></div>
                    </div>
                    <div class="review-sub-comment__inner">
                        <div class="review-sub-comment__avatar">
                            <div class="review-sub-comment__avatar-name">{{$vc->fullname}} @if($vc->type=="QTV")<span class="btn btn-primary btn-sm">QTV</span>@endif</div>
                            <div class="review-sub-comment__avatar-date">
                                @if($vc->created_at)
                                {{Carbon\Carbon::parse($vc->created_at)->diffForHumans()}}
                                @endif
                            </div>

                        </div>
                        <div class="review-sub-comment__content ">{{$vc->message}}</div>
                        <?php $listImageCmtChild = json_decode($vc->images, TRUE); ?>
                        @if(!empty($listImageCmtChild))
                        <div class="review-comment__images">
                            @foreach($listImageCmtChild as $image)
                                <div class="review-comment__image" style="background-image: url('{{$image}}');"></div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>
</div>

@endforeach
<div class="">
    <div class="col-xs-12">
        <div class="dataTables_paginate paging_bootstrap pull-right paginate_cmt">
            {{$comment_view['listComment']->links()}}
        </div>
    </div>
</div>