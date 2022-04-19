@extends('homepage.layout.home')
@section('content')

<main class="py-8 bg-gray-50">
    <div class=" container mx-auto">
        <h1 class="uppercase w-full text-center font-medium text-4xl py-4">Đặt hàng thành công</h1>
        <div class="text-center py-4">
            <p>
                Trên thị trường có quá nhiều sự lựa chọn, cảm ơn bạn đã lựa chọn mua sắm tại <a href="/" target="_blank"><b>Coolmate.me</b></a></p>
            <p>
                Đơn hàng của bạn CHẮC CHẮN đã được chuyển tới hệ thống xử lý đơn hàng của Coolmate.
                <br>
                Trong quá trình xử lý Coolmate sẽ liên hệ lại nếu như cần thêm thông tin từ bạn.
                <br>
                Ngoài ra Coolmate cũng sẽ có gửi xác nhận đơn hàng bằng Email và tin nhắn
            </p>
            <p><i>Do ảnh hưởng dịch bệnh, đơn hàng của bạn có thể được giao chậm hơn bình thường. Coolmate sẽ cố gắng hết sức, bạn chờ Coolmate nha.</i></p>
            <p>
                Tham gia cộng đồng <a href="https://www.facebook.com/groups/2103080403316797" target="_blank"><b>Mặc Đẹp Sống Chất</b></a> cùng Coolmate.
            </p>
        </div>
        <div class=" text-center flex justify-center py-4">
            <a href="" class=" bg-red-600 text-white rounded-full px-6 py-2 w-auto">Khám phá thêm các sản phẩm khác tại đây</a>
        </div>
        <div class="py-4">
            <h2 class="text-3xl font-medium w-full text-center mb-6">Thông tin đơn hàng</h2>
            <div class="rounded-xl border border-red-300 p-4 md:w-[736px] mx-auto">
                <div class="grid grid-cols-7 gap-4 items-center">
                    <div class="col-start-3 col-span-3">
                        <div class="rounded-xl border border-red-300 p-2 text-center font-semibold">
                            ĐƠN HÀNG #198055683
                        </div>
                    </div>
                    <div class="col-start-6 col-end-8 text-right">
                        14:45 15.04.2022
                    </div>
                    <div class="col-start-1 col-end-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th width="120px">Giá niêm yết</th>
                                    <th>Biến thể</th>
                                    <th class="text--right">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text--left">
                                        Áo thun nam 100% Cotton Coolmate Basics
                                    </td>
                                    <td>1</td>
                                    <td>99.000đ</td>
                                    <td>
                                        màu Rêu bụi L
                                    </td>
                                    <td>99.000đ</td>
                                </tr>
                                <tr>
                                    <td class="text--left">
                                        Áo thun nam 100% Cotton Coolmate Basics
                                    </td>
                                    <td>1</td>
                                    <td>99.000đ</td>
                                    <td>
                                        màu xanh Biển L
                                    </td>
                                    <td>99.000đ</td>
                                </tr>
                                <tr>
                                    <td class="text--left">
                                        Áo Polo thể thao nam ProMax-S1 Logo thoáng khí
                                    </td>
                                    <td>1</td>
                                    <td>219.000đ</td>
                                    <td>
                                        Xanh Aqua / 2XL
                                    </td>
                                    <td>219.000đ</td>
                                </tr>
                                <tr>
                                    <td class="text--left">
                                        Áo Polo thể thao nam ProMax-S1 Logo thoáng khí
                                    </td>
                                    <td>1</td>
                                    <td>219.000đ</td>
                                    <td>
                                        Xanh bóng đêm / 2XL
                                    </td>
                                    <td>219.000đ</td>
                                </tr>
                                <tr>
                                    <td class="text--left">
                                        Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu đen
                                    </td>
                                    <td>1</td>
                                    <td>99.000đ</td>
                                    <td>
                                        2XL
                                    </td>
                                    <td>99.000đ</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        Mã giảm giá
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        Tổng giá trị sản phẩm
                                    </td>
                                    <td>
                                        735.000đ
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        Voucher khuyến mãi
                                    </td>
                                    <td>
                                        0đ
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Phí giao hàng</td>
                                    <td>0đ</td>
                                </tr>
                                <tr class="total_payment">
                                    <td colspan="4">
                                        Tổng thanh toán
                                    </td>
                                    <td>
                                        735.000đ
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <div class="py-4">
            <h2 class="text-3xl font-medium w-full text-center mb-6">Thông tin nhận hàng</h2>

            <div class="rounded-xl border border-red-300 p-4 md:w-[736px] mx-auto">
                <p>
                    Tên người nhận: Nguyễn Văn Quyền
                </p>
                <p>
                    Email: nguyenquyen571995@gmail.com
                </p>
                <p>
                    Số điện thoại: 0348464081
                </p>
                <p>
                    Hình thức thanh toán: ZALOPAY
                </p>
                <p>
                    Địa chỉ nhận hàng: Đối diện số nhà 33 ngách 12 ngõ 629 Kim Mã
                </p>
            </div>

        </div>
    </div>
</main>
<style>
    .table {
        width: 100%;
        border-spacing: 0;
        background: #d9d9d9;
        border-radius: 16px;
    }

    .thank-box .table {
        margin: 1rem 0;
    }

    .table td,
    .table th {
        padding: 10px 20px !important;
    }

    .table thead>tr th {
        color: #fff;
        background-color: #2f5acf;
        font-weight: 500;
        text-align: center;
    }

    .table thead>tr th:last-child {
        border-radius: 0 16px 16px 0;
    }

    .table thead>tr th:first-child {
        border-radius: 16px 0 0 16px;
    }

    .text--left {
        text-align: left;
    }

    .table tbody tr:nth-child(2n) td {
        background-color: #eee;
    }

    .table th,
    .table tr:last-child td {
        border: 0px !important;
    }

    .table tfoot td {
        text-align: left;
        background-color: #fff !important;
    }
</style>
@include('product.frontend.category.head')
@endsection