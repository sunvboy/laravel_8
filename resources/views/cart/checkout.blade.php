@extends('homepage.layout.home')
@section('content')
@if($cart)
<?php $total = 0 ?>
<form class="checkout" action="{{route('cart.order')}}" method="POST">

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>Thông tin thanh toán</h3>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Error!</b> {{session('error')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Success!</b> {{session('success')}}
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label>Họ và tên <span class="red">*</span></label>
                    <?php
                    echo Form::text('fullname', !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->name : 'Nguyễn Văn Quyền', ['class' => 'form-control', 'autocomplete' => 'off']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Email <span class="red">*</span></label>
                    <?php
                    echo Form::text('email', !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->email : 'nguyenquyen571995@gmail.com', ['class' => 'form-control', 'autocomplete' => 'off']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Số điện thoại <span class="red">*</span></label>
                    <?php
                    echo Form::text('phone', !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->phone : '0348464081', ['class' => 'form-control', 'autocomplete' => 'off']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Địa chỉ @if(!empty(Auth::guard('customer')->user()))<a href="" style="color: red;"><i>Thay đổi địa chỉ</i></a>@endif <span class="red">*</span></label>
                    <?php
                    echo Form::text('address', !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->address : 'Số 33 ngách 12 ngõ 629 Kim Mã', ['class' => 'form-control', 'autocomplete' => 'off']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Tỉnh/Thành phố <span class="red">*</span></label>
                    <?php
                    echo Form::select('cityid', $listCity, old('cityid'), ['class' => 'form-control select3', 'id' => 'city']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Quận/Huyện <span class="red">*</span></label>
                    <?php
                    echo Form::select('districtid', [], '', ['class' => 'form-control select3', 'id' => 'district', 'placeholder' => 'Quận/Huyện']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Ghi chú đơn hàng (tuỳ chọn)</label>
                    <?php
                    echo Form::textarea('note',  '', ['class' => 'form-control', 'style' => 'min-height: 120px']);
                    ?>
                </div>



            </div>
            <div class="col-md-5">
                <div class="cart_totals">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name" colspan="2" style="border-width:3px;">ĐƠN HÀNG CỦA BẠN</th>
                            </tr>
                        </thead>
                    </table>
                    <table cellspacing="0" class="shop_table">
                        <thead>
                            @if($cart)
                            @foreach( $cart as $k=>$v)
                            <?php
                            $total += $v['price'] * $v['quantity'];
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
                                    <span class="amount" id="total_cart_old">{{ number_format($total) }} VNĐ</span>
                                </td>
                            </tr>

                        </thead>
                        <tbody class="cart-discount">
                            <?php $price_coupon = 0; ?>
                            <?php if (isset($coupon)) {
                                foreach ($coupon as $v) {
                                    $price_coupon += !empty($v['price']) ? $v['price'] : 0; ?>
                                    <tr>
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

                        </thead>
                    </table>
                    <div class="coupon">
                        <h3 class="widget-title"><i class="ion-pricetag"></i> Phiếu ưu đãi</h3>
                        <div class="message-container"></div>
                        <div class="apply_counpon">
                            <input type="text" class="form-control" id="coupon_code" value="" placeholder="Mã ưu đãi">
                            <input type="submit" id="apply_coupon" value="Áp dụng">
                        </div>
                    </div>
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name" colspan="2" style="border-width:3px;">Phương thức thanh toán</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="cart-payment">
                        <div class="payment-item">
                            <label for="COD">
                                <input id="COD" type="radio" value="COD" name="payment" checked>
                                <span><b>Thanh toán khi nhận hàng (COD)</b></span>
                                <div class="small" style="display: none;">Thanh toán bằng tiền mặt khi nhận hàng</div>
                            </label>
                        </div>
                        <div class="payment-item">
                            <label for="BANKING">
                                <input id="BANKING" type="radio" value="BANKING" name="payment">
                                <span><b>Chuyển khoản qua ngân hàng</b></span>
                                <div class="small" style="display: none;">
                                    Quý khách có thể chuyển tiền thanh toán tới một trong các tài khoản sau:<br>
                                    Chủ tài khoản: NGUYỄN VĂN QUYỀN<br>
                                    + Số tài khoản tại Ngân hàng Techcombank: 19035807845011
                                </div>
                            </label>
                        </div>

                        <div class="payment-item">
                            <label for="MOMO">
                                <input id="MOMO" type="radio" value="MOMO" name="payment">
                                <span><b>Thanh toán bằng MOMO</b></span>
                                <div class="small" style="display: none;padding-left: 50px;">
                                    <div class="payment-item-child">
                                        <label for="MOMOATM">
                                            <input id="MOMOATM" type="radio" value="MOMOATM" name="payment_type_momo" checked>
                                            <span><b>ATM,Visa, Master, JCB...</b></span>


                                        </label>
                                    </div>
                                    <div class="payment-item-child">
                                        <label for="MOMOQRCode">
                                            <input id="MOMOQRCode" type="radio" value="MOMOQRCode" name="payment_type_momo">
                                            <span><b>QRCode</b></span>
                                        </label>
                                    </div>


                                    <table>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tên</th>
                                                <th>Số thẻ </th>
                                                <th>Hạn ghi trên thẻ</th>
                                                <th>OTP</th>
                                                <th>Trường hợp test</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>NGUYEN VAN A</td>
                                                <td>9704000000000018</td>
                                                <td>03/07</td>
                                                <td>OTP</td>
                                                <td>Thành công</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>NGUYEN VAN A</td>
                                                <td>9704000000000026</td>
                                                <td>03/07</td>
                                                <td>OTP</td>
                                                <td>Thẻ bị khóa</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>NGUYEN VAN A</td>
                                                <td>9704000000000034</td>
                                                <td>03/07</td>
                                                <td>OTP</td>
                                                <td>Nguồn tiền không đủ</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>NGUYEN VAN A</td>
                                                <td>9704000000000042</td>
                                                <td>03/07</td>
                                                <td>OTP</td>
                                                <td>Hạn mức thẻ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </label>
                        </div>
                        <div class="payment-item hidden">
                            <label for="ZALOPAY">
                                <input id="ZALOPAY" type="radio" value="ZALOPAY" name="payment">
                                <span><b>Thanh toán bằng ZaloPay</b></span>
                                <div class="small" style="display: none;padding-left: 50px;">
                                    <div class="payment-item-child">
                                        <label for="ZaloPayATM">
                                            <input id="ZaloPayATM" type="radio" value="ZaloPayATM" name="payment_type_zalopay" checked>
                                            <span><b>ATM,Visa, Master, JCB...</b></span>
                                        </label>
                                    </div>
                                    <div class="payment-item-child">
                                        <label for="ZaloPayQRCode">
                                            <input id="ZaloPayQRCode" value="ZaloPayQRCode" type="radio" name="payment_type_zalopay">
                                            <span><b>QRCode</b></span>
                                        </label>
                                    </div>
                                    <b>1. Thông tin thẻ Visa, Master, JCB</b><br>
                                    Số thẻ: 4111111111111111<br>
                                    Tên chủ thẻ:NGUYEN VAN A<br>
                                    Hạn ghi trên thẻ:01/22<br>
                                    Mã CVV:123<br>
                                    <b>2. Danh sách thẻ ATM (test với bank SBI)</b><br>
                                    <b>2.1. Thẻ hợp lệ</b><br>
                                    Số thẻ: 9704540000000062<br>
                                    Tên chủ thẻ:NGUYEN VAN A<br>
                                    Ngày phát hành:1018<br>
                                    <b>2.2. Thẻ bị mất/đánh cắp</b><br>
                                    Số thẻ: 9704540000000013<br>
                                    Tên chủ thẻ:NGUYEN VAN A<br>
                                    Ngày phát hành:1018<br>
                                    <b>2.3. Thẻ bị timeout</b><br>
                                    Số thẻ: 9704540000000039<br>
                                    Tên chủ thẻ:NGUYEN VAN A<br>
                                    Ngày phát hành:1018<br>
                                    <b>2.4. Thẻ hết tiền</b><br>
                                    Số thẻ: 9704540000000047<br>
                                    Tên chủ thẻ:NGUYEN VAN A<br>
                                    Ngày phát hành:1018<br>
                                </div>
                            </label>
                        </div>
                        <div class="payment-item">
                            <label for="VNPAY">
                                <input id="VNPAY" type="radio" value="VNPAY" name="payment">
                                <span><b>Thanh toán bằng VNPAY</b></span>
                                <div class="small" style="display: none;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Thông tin thẻ</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div>Ngân hàng: <code>NCB</code></div>
                                                    <div>Số thẻ: <code>9704198526191432198</code></div>
                                                    <div>Tên chủ thẻ:<code>NGUYEN VAN A</code></div>
                                                    <div>Ngày phát hành:<code>07/15</code></div>
                                                    <div>Mật khẩu OTP:<code>123456</code></div>
                                                </td>
                                                <td>Thành công</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <div>Ngân hàng: <code>NCB</code></div>
                                                    <div>Số thẻ: <code>9704195798459170488</code></div>
                                                    <div>Tên chủ thẻ:<code>NGUYEN VAN A</code></div>
                                                    <div>Ngày phát hành:<code>07/15</code></div>
                                                </td>
                                                <td>Thẻ không đủ số dư</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <div>Ngân hàng: <code>NCB</code></div>
                                                    <div>Số thẻ: <code>9704192181368742</code></div>
                                                    <div>Tên chủ thẻ:<code>NGUYEN VAN A</code></div>
                                                    <div>Ngày phát hành:<code>07/15</code></div>
                                                </td>
                                                <td>Thẻ chưa kích hoạt</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>
                                                    <div>Ngân hàng: <code>NCB</code></div>
                                                    <div>Số thẻ: <code>9704193370791314</code></div>
                                                    <div>Tên chủ thẻ:<code>NGUYEN VAN A</code></div>
                                                    <div>Ngày phát hành:<code>07/15</code></div>
                                                </td>
                                                <td>Thẻ bị khóa</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>
                                                    <div>Ngân hàng: <code>NCB</code></div>
                                                    <div>Số thẻ: <code>9704194841945513</code></div>
                                                    <div>Tên chủ thẻ:<code>NGUYEN VAN A</code></div>
                                                    <div>Ngày phát hành:<code>07/15</code></div>
                                                </td>
                                                <td>Thẻ bị hết hạn</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </label>
                        </div>
                        <div class="payment-item hidden">
                            <label for="ALEPAY">
                                <input id="ALEPAY" type="radio" value="ALEPAY" name="payment">
                                <span><b>Thanh toán bằng Alepay</b></span>
                                <div class="small" style="display: none;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Loại thẻ </th>
                                                <th>Số thẻ</th>
                                                <th>Ngày hết hạn (mm/yy)</th>
                                                <th>CVV ( 3 digits )</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Visa</td>
                                                <td>4111111111111111</td>
                                                <td>12/20</td>
                                                <td>123</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Visa 3D</td>
                                                <td>4444000000004404</td>
                                                <td>12/20</td>
                                                <td>123</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>MasterCard</td>
                                                <td>5555555555554444</td>
                                                <td>12/20</td>
                                                <td>123</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>JCB</td>
                                                <td>3566111111111113</td>
                                                <td>12/20</td>
                                                <td>123</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="checkout">
                        <button type="submit" class="checkout-button btn btn-default">ĐẶT HÀNG</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
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