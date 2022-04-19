@extends('homepage.layout.home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="order-details__title">Chi tiết đơn hàng</h2>
            <table cellspacing="0" class="shop_table">
                <?php $cart = json_decode($detail->cart, TRUE); ?>
                <?php $coupon = json_decode($detail->coupon, TRUE); ?>

                <thead>
                    <?php $total = 0 ?>
                    @if($cart)
                    @foreach( $cart as $k=>$v)
                    <?php
                    $slug = !empty($v['slug']) ? $v['slug'] : '';
                    $options = !empty($v['options']) ? $v['options'] : '';
                    ?>
                    <tr class="cart-subtotal">
                        <th><a href="{{$slug}}" target="_blank">{{$v['title']}}</a><br>{{$options}}</th>
                        <td>
                            <span class="amount" id="total_cart_old">{{number_format($v['quantity'] * $v['price'])}} VNĐ</span>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    <tr class="cart-subtotal">
                        <th>Tạm tính</th>
                        <td>
                            <span class="amount" id="total_cart_old">{{ number_format($detail->total_price) }} VNĐ</span>
                        </td>
                    </tr>

                </thead>
                <tbody class="cart-discount">
                    <?php if (isset($coupon)) {
                        foreach ($coupon as $v) {?>
                            <tr>
                                <th>Mã giảm giá : <span class="cart-coupon-name">{{$v['name']}}</span></th>
                                <td>-<span class="amount cart-coupon-price">{{number_format($v['price'])}} VNĐ</span></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="order-total">
                        <th>Tổng</th>
                        <td>
                            <span class="amount" id="total_cart_final">{{ number_format($detail->total_price-$detail->total_price_coupon+$detail->total_price_ship) }} VNĐ</span>
                        </td>
                    </tr>
                </tfoot>

                </thead>
            </table>
        </div>
        <div class="col-md-5">
            <div class="is-well">
                <p class="success-notice"><strong>Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</strong></p>

                <ul class=" order_details">

                    <li class=" order">
                        Mã đơn hàng: <strong>{{$detail->code}}</strong>
                    </li>
                    <li class=" order">
                        Họ và tên: <strong>{{$detail->fullname}}</strong>
                    </li>
                    <li class=" order">
                        Email: <strong>{{$detail->email}}</strong>
                    </li>
                    <li class=" order">
                        Số điện thoại: <strong>{{$detail->phone}}</strong>
                    </li>
                    <li class=" order">
                        Địa chỉ: <strong>{{$detail->address}}</strong>
                    </li>
                    <li class=" order">
                       Quận/Huyện: <strong>{{$detail->district_name->name}}</strong>
                    </li>
                    <li class=" order">
                        Tỉnh/Thành Phố: <strong>{{$detail->city_name->name}}</strong>
                    </li>
                    <li class=" order">
                        Ghi chú: <br><p>{{$detail->note}}</p>
                    </li>
                    <li class=" order">
                        Thanh toán: <strong>{{config('cart')['payment'][$detail->payment]}}</strong>
                    </li>
                   
                    <li class="date">
                        Ngày đặt: <strong>{{$detail->created_at}}</strong>
                    </li>


                    <li class="total">
                        Tổng cộng: <strong>{{ number_format($detail->total_price-$detail->total_price_coupon+$detail->total_price_ship) }} VNĐ</strong>
                    </li>


                </ul>

                <div class="clear"></div>
            </div>
        </div>

    </div>

</div>
<style>
    .order-details__title{
        font-size: 25px;
    }
    .order_details{
        padding-left: 20px;
    }
    .success-notice{
        color: #7a9c59;
    }
    .is-well {
    padding: 30px;
    background-color: rgba(0,0,0,.02);
    -webkit-box-shadow: 1px 1px 3px 0px rgb(0 0 0 / 20%), 0 1px 0 rgb(0 0 0 / 7%), inset 0 0 0 1px rgb(0 0 0 / 5%);
    box-shadow: 1px 1px 3px 0px rgb(0 0 0 / 20%), 0 1px 0 rgb(0 0 0 / 7%), inset 0 0 0 1px rgb(0 0 0 / 5%);
    position: relative;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    background-position: 50% 50%;
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-box-flex: 1;
    -ms-flex: 1 0 auto;
    flex: 1 0 auto;
}
</style>
@include('cart.common.style')

@endsection