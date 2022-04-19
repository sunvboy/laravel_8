<?php

$code = CodeRender('product');
$price = $price_sale = 0;
$title = $slug = $description = '';
if ($action == 'create') {
    if ($errors->any()) {
        $code = old('code');
        $price = old('price');
        $price_sale = old('price_sale');
        $price_contact = old('price_contact');
        $title =  old('title');
        $slug = old('slug');
        $description = old('description');
    }
} else {
    if ($errors->any()) {
        $code = old('code');
        $price = old('price');
        $price_sale = old('price_sale');
        $price_contact = old('price_contact');
        $title =  old('title');
        $slug = old('slug');
        $description = old('description');
    } else {
        $title =  $detail->title;
        $slug = $detail->slug;
        $code = $detail->code;
        $price =  number_format($detail->price, '0', ',', '.');
        $price_sale =  number_format($detail->price_sale, '0', ',', '.');
        $price_contact = $detail->price_contact;
        $description = $detail->description;

    }
}

?>
<!-- text input -->
<div class="form-group">
    <label>Tiêu đề</label>
    <?php
    echo Form::text('title', $title, ['class' => 'form-control title']);
    ?>
</div>
<div class="form-group">
    <label>Đường dẫn</label>
    <div class="outer">
        <div class="uk-flex uk-flex-middle">
            <div class="base-url"><?php echo url('san-pham'); ?></div>
            <?php
            echo Form::text('slug', $slug, ['class' => 'form-control canonical', 'data-flag' => 0]);
            ?>
        </div>
    </div>

</div>
<div class="form-group">
    <label>Mô tả</label>
    <?php
    echo Form::textarea('description', $description, ['id' => 'ckDescription', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
    ?>
</div>
<div class="ibox mb20 block-detail-product ">
    <div class="ibox-title uk-flex uk-flex-middle uk-flex-space-between">
        <h5>Thông tin chi tiết</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12 mb15">
                <label class="control-label ">
                    <span>Mã sản phẩm</span>
                </label>
                <div class="form-row">
                    <?php
                    echo Form::text('code', $code, ['class' => 'form-control']);
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 mb10">
                <label class="control-label ">
                    <span>Giá<b class="text-danger">(*)</b></span>
                </label>
                <div class="form-row">
                    <div class="mb15">
                        <?php
                        echo Form::text('price', $price, ['class' => 'form-control int price']);
                        ?>
                    </div>
                    <div class="uk-flex uk-flex-middle">
                        <div class="m-r-sm">
                            <?php if (isset($price_contact) && $price_contact == 1) { ?>
                                <input type="checkbox" checked name="price_contact" value="1" class="checkbox-item">
                                <div for="" class="label-checkboxitem checked"></div>
                            <?php } else { ?>
                                <input type="checkbox" name="price_contact" value="1" class="checkbox-item">
                                <div for="" class="label-checkboxitem "></div>
                            <?php } ?>
                        </div>
                        <div>
                            Liên hệ để biết giá
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb10">
                <label class="control-label">
                    <span>Giá khuyến mại</span>
                </label>
                <div class="form-row">
                    <?php
                    echo Form::text('price_sale', $price_sale, ['class' => 'form-control int']);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>