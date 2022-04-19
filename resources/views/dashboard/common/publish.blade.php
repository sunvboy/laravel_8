<div class="ibox mb20">
    <div class="ibox-title">
        <h5>Hiển thị </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-black mb10">Quản lý thiết lập hiển thị cho blog này.</span>
                    <div class="block clearfix">
                        <div class="i-checks mr30" style="width:100%;"><span style="color:#000;"> <input <?php echo (old('publish') == 0) ? 'checked' : ((isset($detail) && $detail->publish == 0) ? 'checked' : '') ?> class="popup_gender_1 gender" type="radio" value="0" name="publish"> <i></i>Cho phép hiển thị trên website</span></div>
                    </div>
                    <div class="block clearfix">
                        <div class="i-checks" style="width:100%;"><span style="color:#000;"> <input type="radio" <?php echo (old('publish') == 1) ? 'checked' : ((isset($detail) && $detail->publish == 1) ? 'checked' : '') ?> class="popup_gender_0 gender" required value="1" name="publish"> <i></i> Tắt chức năng hiển thị trên website. </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>