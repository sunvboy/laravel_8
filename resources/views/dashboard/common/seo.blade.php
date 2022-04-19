<div class="ibox mb20">
    <div class="ibox-title">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <h5>Tối ưu SEO <small class="text-danger">Thiết lập các thẻ mô tả giúp khách hàng dễ dàng tìm thấy bạn.</small></h5>

            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="edit">
                    <a href="#" class="edit-seo">Chỉnh sửa SEO</a>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($detail)) { ?>
                    <div class="google">
                        <div class="g-title"><?php echo (old('meta_title')) ? old('meta_title') : ((old('title')) ? old('title') : (($detail->meta_title != '') ? $detail->meta_title : $detail->title)); ?></div>
                        @if($module != 'page')
                        <div class="g-link"><?php echo (old('slug')) ? url(old('slug')) : url($detail->slug); ?></div>
                        @endif
                        <div class="g-description" id="metaDescription">
                            <?php echo (old('meta_description')) ? old('meta_description') : ((old('description')) ? strip_tags(old('description')) : ((!empty($detail->meta_description)) ? strip_tags($detail->meta_description) : ((!empty($detail->description)) ? cutnchar(strip_tags($detail->description)) : 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.'))); ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="google">
                        <div class="g-title"><?php echo (old('meta_title')) ? old('meta_title') : ((old('title')) ? old('title') : 'SUNVBOY - Đơn vị thiết kế website hàng đầu Việt Nam'); ?></div>
                        @if($module != 'page')
                        <div class="g-link"><?php echo (old('slug')) ? url(old('slug')) : 'https://ADMIN.COM/kho-giao-dien-website.html'; ?></div>
                        @endif

                        <div class="g-description" id="metaDescription">
                            <?php echo (old('meta_description')) ? old('meta_description') : ((old('description')) ? strip_tags(old('description')) : 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.'); ?>

                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <div class="seo-group hidden">
            <hr>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <label class="control-label ">
                                <span>Tiêu đề SEO</span>
                            </label>
                            <span style="color:#9fafba;"><span id="titleCount"><?php echo !empty($detail->meta_title) ? strlen($detail->meta_title) : 0 ?></span> trên 70 ký tự</span>
                        </div>
                        <?php
                        echo Form::text('meta_title', !empty($detail->meta_title) ? $detail->meta_title : '', ['class' => 'form-control meta-title']);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <label class="control-label ">
                                <span>Mô tả SEO</span>
                            </label>
                            <span style="color:#9fafba;"><span id="descriptionCount"><?php echo !empty($detail->meta_description) ? strlen($detail->meta_description) : 0 ?></span> trên 320 ký tự</span>
                        </div>
                        <?php
                        echo Form::textarea('meta_description',  !empty($detail->meta_description) ? $detail->meta_description : '', ['class' => 'form-control meta-description', 'id' => 'seoDescription']);
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>