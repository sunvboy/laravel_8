<div class="col-md-12">
    <div class="product-detail">
        <h3>Đánh Giá - Nhận Xét Từ Khách Hàng</h3>
    </div>
    <div class="row">
        <?php
        $list_images_cmt = [];
        foreach ($comment_view['listComment'] as $v) {
            if (!empty($v->images)) {
                $tmp_images_cmt = json_decode($v->images, TRUE);
                if (!empty($tmp_images_cmt)) {
                    foreach ($tmp_images_cmt as $v) {
                        $list_images_cmt[] = $v;
                    }
                }
            }
        }
        ?>
        <div class="col-md-4">
            @include('product.frontend.product.comment.review')

            @include('product.frontend.product.comment.form')
        </div>

        <div class="col-md-8">
            @include('product.frontend.product.comment.filter')

        </div>
    </div>
    <div class="col-md-12" style="margin-top: 10px;">
        <div id="getListComment">
            @include('product.frontend.product.comment.data')
        </div>

    </div>
    @include('product.frontend.product.comment.gallery')

</div>