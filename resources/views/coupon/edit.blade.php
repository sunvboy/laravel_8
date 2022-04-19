@extends('dashboard.layout.dashboard')
@section('title')
<title>Cập nhập mã giảm giá</title>
@endsection
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Cập nhập mã giảm giá','key'=> 'Thêm mới'])
<section class="content">
    <form role="form" action="{{route('coupon.update',['id'=>$detail->id])}}" method="post">
        @include('coupon.common.coupon',['action' => 'update'])
    </form>
</section>
<script>
    var product_ids = '<?php echo $detail->product_ids; ?>';
    var exclude_product_ids = '<?php echo $detail->exclude_product_ids; ?>';
    var product_categories = '<?php echo $detail->product_categories; ?>';
    var exclude_product_categories = '<?php echo $detail->exclude_product_categories; ?>';
</script>
@include('coupon.common.script')

@endsection