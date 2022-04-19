@extends('homepage.layout.home')
@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @include('product.frontend.product.common.gallery')
            </div>
            <div class="col-md-7">
                <div class="product-top">
                    <h1>{{$detail->title}}</h1>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="flex">
                            <div class="product-brand">
                                <strong class="type">Thương hiệu:</strong>
                                <a href="">Mead Johnson</a>
                            </div>
                            <div class="product-brand">
                                <strong class="type">Mã sản phẩm:</strong>
                                <a href="">{{$detail->code}}</a>
                            </div>

                        </div>
                        <div class="flex  uk-flex-space-between ">
                            <div class="product-rating flex">
                                <input type="hidden" class="rating-disabled" value="2.5" disabled="disabled" />
                                <a href="" class="count-cmt">(3 Đánh giá)</a>
                            </div>
                            <div class="product-share flex">
                                <a href="" class="to-share flex">
                                    <i class="ion-social-facebook"></i> <span>Chia sẻ</span>
                                </a>
                                <a href="javascript:void(0)" class="to-wishlist">
                                    <i class="ion-heart"></i>
                                </a>
                            </div>

                        </div>
                        <div class="product-price">
                            <div class="product-price-box">
                                <div class="price-view">
                                    <label>Giá bán:</label>
                                </div>
                                <div class="flex">
                                    <div class="product-price-old">
                                        <span class="price">980.000đ</span>
                                    </div>
                                    <div class="product-price-final">
                                        <span class="price">980.000đ</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="product-add-form">
                            <div class="box-tocart">
                                <div class="fieldset flex  uk-flex-space-between " style="align-items: end;">
                                    <div class="field qty">
                                        <label class="label" for="qty"><span>Số lượng</span></label>
                                        <div class="control">
                                            <span class="qty-minus"><i class="ion-ios-minus-empty"></i></span>
                                            <input type="number" name="qty" id="qty" min="0" value="1" title="Số lượng" class="input-text qty">
                                            <span class="qty-plus"><i class="ion-ios-plus-empty"></i></span>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button type="submit" class="action addtocart-btn btn btn-default">
                                            <span><i class="ion-android-cart"></i>&nbsp;&nbsp;Chọn Mua</span>
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product-service">
                            <div class="info">
                                <div class="info-text">
                                    <div class="info-img"><img src="https://cdn.kidsplaza.vn/media/catalog/Group_15017.png" alt="" width="24" height="25">
                                        <p>Đổi trả hàng miễn phí 45 ngày</p>
                                    </div>
                                </div>
                                <div class="info-text">
                                    <div class="info-img"><img src="https://cdn.kidsplaza.vn/media/catalog/Group_15018.png" alt="" width="24" height="25">
                                        <p>Bảo hành chính hãng 12 tháng</p>
                                    </div>
                                </div>
                                <div class="info-text">
                                    <div class="info-img"><img src="https://cdn.kidsplaza.vn/media/catalog/Group_15019.png" alt="" width="24" height="24">
                                        <p>Freeship Dưới 7km</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <div class="col-md-12">
                <div class="product-same">
                    <h2>Sản phẩm liên quan</h2>

                </div>
                <div class="owl-carousel-same">
                    <div class="product-card">
                        <div class="product-badge text-danger">23% Off</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/nXgI5iT.png" alt="Product"></a>
                        <h3 class="product-title"><a href="#" data-abc="true">Microsoft Surface Pro 4</a></h3>
                        <h4 class="product-price"> <del>$444.99</del>$344.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                    <div class="product-card">
                        <div class="product-badge text-danger">25% Off</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/ILEU18M.jpg" alt="Product"></a>
                        <h3 class="product-title"><a href="#" data-abc="true">Dell Inspiration 4</a></h3>
                        <h4 class="product-price"> <del>$544.99</del>$444.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                    <div class="product-card">
                        <div class="product-badge text-danger">28% Off</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/2kePJmX.jpg" alt="Product"></a>
                        <h3 class="product-title"><a href="#" data-abc="true">Dell Xtreame 5</a></h3>
                        <h4 class="product-price"> <del>$244.99</del>$144.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                    <div class="product-card">
                        <div class="product-badge text-danger">48% Off</div><a class="product-thumb" href="" data-abc="true"><img src="https://i.imgur.com/yugQN69.jpg" alt="Product"></a>
                        <h3 class="product-title"><a href="" data-abc="true">HP Pro 4</a></h3>
                        <h4 class="product-price"> <del>$544.99</del>$344.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                    <div class="product-card">
                        <div class="product-badge text-danger">29% Off</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/JOpmFkw.png" alt="Product"></a>
                        <h3 class="product-title"><a href="#" data-abc="true">Microsoft surface 5</a></h3>
                        <h4 class="product-price"> <del>$644.99</del>$344.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                    <div class="product-card">
                        <div class="product-badge text-danger">28% Off</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/O02Owsf.jpg" alt="Product"></a>
                        <h3 class="product-title"><a href="#" data-abc="true">HP Elitebook 840</a></h3>
                        <h4 class="product-price"> <del>$844.99</del>$644.99 </h4>
                        <div class="product-buttons"> <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="fa fa-heart"></i></button> <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="product-detail">
                    <h3>Mô tả sản phẩm</h3>
                    <div class="product-detail-value gradient-bottom">
                        <?php echo $detail->description ?>
                    </div>
                    <div class="product-show">
                        <button type="button" class="btn show-more">
                            Xem thêm
                        </button>
                        <button type="button" class="btn hide-more" style="display: none;">
                            Rút gọn
                        </button>
                    </div>

                </div>

            </div>
            <div class="col-md-5">
                <div class="product-detail">
                    <h3>Thông tin chi tiết</h3>
                    <table class="additional-attributes">
                        <tbody>
                            <tr>
                                <th class="col label">SKU</th>
                                <td class="col data">211110363</td>
                            </tr>
                            <tr>
                                <th class="col label">Xuất xứ</th>
                                <td class="col data">Đức</td>
                            </tr>
                            <tr>
                                <th class="col label">Độ tuổi</th>
                                <td class="col data">3Y+</td>
                            </tr>
                            <tr>
                                <th class="col label">Kích thước (Bao bì)</th>
                                <td class="col data">12.8x8.0x19.3cm</td>
                            </tr>
                            <tr>
                                <th class="col label">Khối lượng</th>
                                <td class="col data">800g</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            @include('product.frontend.product.comment.index')

          
        </div>

    </div>

    </div>

    </div>




</main>
@include('product.frontend.product.head.style')
@include('product.frontend.product.head.script')




@endsection