@extends('dashboard.layout.dashboard')
@section('title')
<title>Chi tiết đơn hàng</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Chi tiết đơn hàng','key'=> '#'.$detail->code])
@include('dashboard.common.alert')
<section class="content invoice" style="width: 100%;">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Thông tin đơn hàng
                <small class="pull-right">Ngày tạo: {{$detail->created_at}}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

        <div class="col-sm-6 invoice-col">
            To
            <address>
                <strong>{{$detail->fullname}}</strong><br>
                Số điện thoại: <a href="tel:{{$detail->fullname}}">{{$detail->phone}}</a><br>
                Địa chỉ: {{$detail->address}}<br>
                Quận huyện: {{$detail->district_name->name}}<br>
                Tỉnh/Thành phố: {{$detail->city_name->name}}<br>
                Email: {{$detail->email}}
            </address>
        </div><!-- /.col -->
        <div class="col-sm-6 invoice-col">
            <b>Mã đơn hàng <a href="javascript:void(0)">#{{$detail->code}}</a></b><br>
            <br>
            <b>Trạng thái:</b> <?php echo config('cart')['status'][$detail->status]; ?><br>
            <b>Thanh toán:</b> <?php echo config('cart')['payment'][$detail->payment]; ?><br>
            <b>Ngày tạo:</b> {{$detail->created_at}}
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <?php $cart = json_decode($detail->cart, TRUE); ?>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0 ?>
                    @if($cart)
                    @foreach( $cart as $k=>$v)
                    <?php
                    $total += $v['price'] * $v['quantity'];
                    $slug = !empty($v['slug']) ? $v['slug'] : '';
                    $options = !empty($v['options']) ? '- '.$v['options'] : '';
                    ?>
                    <tr>
                        <td>{{$v['title']}} {{$options}}</td>
                        <td>{{$v['quantity']}}</td>
                        <td>{{number_format($v['price'])}} VNĐ</td>
                        <td>{{number_format($v['price']*$v['quantity'])}} VNĐ</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->



    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">Ghi chú:</p>

            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?php echo !empty($detail->note) ? $detail->note : 'Không có ghi chú'; ?>
            </p>
        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Tổng tiền đơn hàng</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Tạm tính:</th>
                            <td>{{number_format($detail->total_price)}} VNĐ</td>
                        </tr>
                        <?php $coupon = json_decode($detail->coupon, TRUE); ?>
                        <?php if (isset($coupon)) {
                            foreach ($coupon as $v) { ?>
                                <tr>
                                    <th>Mã giảm giá <span style="color: red;">{{$v['name']}}</span></th>
                                    <td>- {{number_format($v['price'])}} VNĐ</td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        <tr>
                            <th>Phí vận chuyện:</th>
                            <td>{{number_format($detail->total_price_ship)}} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Tổng tiền thanh toán:</th>
                            <td>{{number_format($detail->total_price-$detail->total_price_coupon+$detail->total_price_ship)}} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Cập nhập</button>
            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>Tải PDF</button>
        </div>
    </div>
</section>
@endsection