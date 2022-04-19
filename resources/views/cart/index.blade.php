@extends('homepage.layout.home')
@section('content')
@if($cart)
<div class="container">
    <div class="row">

        <div class="col-md-7">
            <table class="shop_table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name" colspan="3">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tạm tính</th>
                    </tr>
                </thead>
                <tbody id="main-cart">
                    <?php $total = 0 ?>

                    @foreach($cart as $k=>$v)
                    <?php $total += $v['price'] * $v['quantity'] ?>
                    <?php echo htmlItemCart($k, $v) ?>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="actions clear">
                            <div class="continue-shopping pull-left">
                                <a class="button-continue-shopping btn btn-default" href=""> ←&nbsp;Tiếp tục mua hàng </a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-5">
            <div class="cart_totals">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name" colspan="2" style="border-width:3px;">Cộng giỏ hàng</th>
                        </tr>
                    </thead>
                </table>
                <table cellspacing="0" class="shop_table">
                    <thead>
                        <tr class="cart-subtotal">
                            <th>Tạm tính</th>
                            <td>
                                <span class="amount" id="total_cart_old">{{ number_format($total) }} VNĐ</span>
                            </td>
                        </tr>

                    </thead>
                    <tbody class="cart-discount">
                        <?php $price_coupon = 0; ?>
                        <?php if (isset($coupon)) {
                            foreach ($coupon as $v) {
                                $price_coupon += !empty($v['price']) ? $v['price'] : 0; ?>
                                <tr >
                                    <th>Mã giảm giá : <span class="cart-coupon-name">{{$v['name']}}</span></th>
                                    <td>-<span class="amount cart-coupon-price">{{number_format($v['price'])}} VNĐ</span> <a href="" data-id="{{$v['id']}}" class="remove-coupon">[Xóa]</a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr class="order-total">
                        <th>Tổng</th>
                        <td>
                            <span class="amount" id="total_cart_final">{{ number_format($total-$price_coupon) }} VNĐ</span>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <div class="checkout">
                    <a href="{{route('cart.checkout')}}" class="checkout-button btn btn-default">Tiến hành thanh toán</a>
                </div>
            </div>
            <div class="coupon">
                <h3 class="widget-title"><i class="ion-pricetag"></i> Phiếu ưu đãi</h3>
                <div class="message-container"></div>
                <div class="apply_counpon">
                    <input type="text" class="form-control" id="coupon_code" value="" placeholder="Mã ưu đãi">
                    <input type="submit" id="apply_coupon" value="Áp dụng">
                </div>
            </div>
        </div>
    </div>
</div>
@include('cart.common.script')
@include('cart.common.style')
@else
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="cart-empty">Chưa có sản phẩm nào trong giỏ hàng.</p>
            <p class="return-to-shop">
                <a class="button btn btn-primary" href="<?php echo url('') ?>">Quay trở lại cửa hàng</a>
            </p>
        </div>
    </div>
</div>
@endif
@endsection