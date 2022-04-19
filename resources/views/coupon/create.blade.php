@extends('dashboard.layout.dashboard')
@section('title')
<title>Thêm mới mã giảm giá</title>
@endsection
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách mã giảm giá','key'=> 'Thêm mới'])
<section class="content">
    <form role="form" action="{{route('coupon.store')}}" method="post">
        @include('coupon.common.coupon',['action' => 'create'])
    </form>
</section>
<script>
    var product_ids = '<?php echo json_encode(old('product_ids')); ?>';
    var exclude_product_ids = '<?php echo json_encode(old('exclude_product_ids')); ?>';
    var product_categories = '<?php echo json_encode(old('product_categories')); ?>';
    var exclude_product_categories = '<?php echo json_encode(old('exclude_product_categories')); ?>';
</script>
@include('coupon.common.script')
@endsection