<div class="row">
    <div class="col-md-9">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <?php
                    echo Form::text('title',  !empty($detail) ? $detail->title : '', ['class' => 'form-control title']);
                    ?>
                </div>
                <div class="form-group">
                    <label>Đường dẫn</label>
                    <div class="outer">
                        <div class="uk-flex uk-flex-middle">
                            <div class="base-url"><?php echo url(''); ?></div>
                            <?php
                            echo Form::text('slug',  !empty($detail) ? $detail->slug : '', ['class' => 'form-control canonical', 'data-flag' => 0]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Chung</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab">Hạn chế sử dụng</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab">Các giới hạn sử dụng</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã ưu đãi</label>
                                            <div class="createnameCoupon" style="position: relative;">
                                                <?php
                                                echo Form::text('name', !empty($detail) ? $detail->name : '', ['class' => 'form-control', 'id' => 'nameCoupon', 'autocomplete' => 'off']);
                                                ?>
                                                <button type="button" class="btn render_code" style="position: absolute;right: 0px;top:0px;border-radius: 0px;background: transparent;">Tạo mã tự động</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Loại ưu đãi</label>
                                            <?php
                                            echo Form::select('typecoupon', config('cart.coupon'), !empty($detail) ? $detail->type : '', ['class' => 'form-control ']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mức ưu đãi <a href="" data-toggle="tooltip" data-placement="bottom" title="Giá trị của mã ưu đãi."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::number('value', !empty($detail) ? $detail->value : '', ['class' => 'form-control', 'id' => 'valueCoupon', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Ngày hết hạn mã ưu đãi <a href="" data-toggle="tooltip" data-placement="bottom" title="Phiếu giảm giá sẽ hết hạn vào lúc 00:00:00"><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('expiry_date', !empty($detail) ? $detail->expiry_date : '', ['class' => 'form-control', 'id' => 'reservation', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Sử dụng kết hợp cùng các mã ưu đãi khác</label>


                                            <div class="form-row">
                                                <div class="block clearfix">
                                                    <div class="i-checks mr30" style="width:100%;"><span style="color:#000;"> <input <?php echo (old('individual_use') == 0) ? 'checked' : ((isset($detail) && $detail->individual_use == 0) ? 'checked' : '') ?> class="popup_gender_1 " type="radio" value="0" name="individual_use"> <i></i>Cho phép</span></div>
                                                </div>
                                                <div class="block clearfix">
                                                    <div class="i-checks" style="width:100%;"><span style="color:#000;"> <input type="radio" <?php echo (old('individual_use') == 1) ? 'checked' : ((isset($detail) && $detail->individual_use == 1) ? 'checked' : '') ?> class="popup_gender_0 " required value="1" name="individual_use"> <i></i>Không cho phép</span></div>
                                                </div>
                                            </div>


                                        </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane " id="tab_2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chi tiêu tối thiểu <a href="" data-toggle="tooltip" data-placement="bottom" title="Trường này cho phép bạn thiết lập giá trị đơn hàng tối thiểu để sử dụng các mã ưu đãi."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('min_price', !empty($detail) ? number_format($detail->min_price, '0', ',', '.') : '', ['class' => 'form-control int', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chi tiêu tối đa <a href="" data-toggle="tooltip" data-placement="bottom" title="Trường này cho phép bạn thiết lập giá trị đơn hàng tối đa để sử dụng các mã ưu đãi."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('max_price', !empty($detail) ? number_format($detail->max_price, '0', ',', '.') : '', ['class' => 'form-control int', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số lượng đơn hàng tối thiểu <a href="" data-toggle="tooltip" data-placement="bottom" title="Trường này cho phép bạn thiết lập số lượng đơn hàng tối thiểu để sử dụng các mã ưu đãi."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('min_count', !empty($detail) ? $detail->min_count : '', ['class' => 'form-control', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số lượng đơn hàng tối đa <a href="" data-toggle="tooltip" data-placement="bottom" title="Trường này cho phép bạn thiết lập số lượng đơn hàng tối đa để sử dụng các mã ưu đãi."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('max_count', !empty($detail) ? $detail->max_count : '', ['class' => 'form-control', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sản phẩm <a href="" data-toggle="tooltip" data-placement="bottom" title="Các sản phẩm được sử dụng mã ưu đãi, hoặc cần trong giỏ hàng để có thể áp dụng."><i class="fa  fa-exclamation-circle"></i></a></label>

                                            <div>
                                                <?php
                                                echo Form::select('product_ids[]', [], old('product_ids'), ['id' => 'product_ids', 'class' => 'form-control ', 'multiple' => 'multiple', 'data-title' => "Nhập 2 kí tự để tìm kiếm..", 'data-module' => "products"]);
                                                ?>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Loại trừ sản phẩm <a href="" data-toggle="tooltip" data-placement="bottom" title="Các sản phẩm không được sử dụng phiếu giảm giá hoặc không được có trong giỏ hàng để có thể áp dụng."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <div>
                                                <?php
                                                echo Form::select('exclude_product_ids[]', [], old('exclude_product_ids'), ['id' => 'exclude_product_ids', 'class' => 'form-control ', 'multiple' => 'multiple', 'data-title' => "Nhập 2 kí tự để tìm kiếm..", 'data-module' => "products"]);
                                                ?>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Danh mục sản phẩm <a href="" data-toggle="tooltip" data-placement="bottom" title="Các danh mục sản phẩm được sử dụng mã ưu đãi, hoặc cần trong giỏ hàng để có thể áp dụng."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <div>
                                                <?php
                                                echo Form::select('product_categories[]', [], old('product_categories'), ['id' => 'product_categories', 'class' => 'form-control ', 'multiple' => 'multiple', 'data-title' => "Nhập 2 kí tự để tìm kiếm..", 'data-module' => "category_products"]);
                                                ?>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Loại trừ các danh mục <a href="" data-toggle="tooltip" data-placement="bottom" title="Các danh mục sản phẩm không được sử dụng phiếu giảm giá hoặc không được có trong giỏ hàng để có thể áp dụng."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <div>
                                                <?php
                                                echo Form::select('exclude_product_categories[]', [], old('exclude_product_categories'), ['id' => 'exclude_product_categories', 'class' => 'form-control ', 'multiple' => 'multiple', 'data-title' => "Nhập 2 kí tự để tìm kiếm..", 'data-module' => "category_products"]);
                                                ?>
                                            </div>
                                        </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Giới hạn sử dụng cho mỗi mã giảm giá <a href="" data-toggle="tooltip" data-placement="bottom" title="Mỗi mã ưu đãi được sử dụng bao nhiêu lần trước khi hết hạn."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('limit', !empty($detail) ? $detail->limit : '', ['class' => 'form-control', 'autocomplete' => 'off']);
                                            ?>
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Giới hạn sử dụng trên mỗi người dùng<a href="" data-toggle="tooltip" data-placement="bottom" title="Bao nhiêu lần mỗi mã ưu đãi có thể sử dụng bởi một khách hàng. Sử dụng địa chỉ email thanh toán cho khách không đăng nhập, và mã khách hàng nếu đã đăng nhập."><i class="fa  fa-exclamation-circle"></i></a></label>
                                            <?php
                                            echo Form::text('limit_user', !empty($detail) ? $detail->limit_user : '', ['class' => 'form-control', 'autocomplete' => 'off']);
                                            ?>
                                        </div>

                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="form-group">
                    <label>Mô tả</label>
                    <?php
                    echo Form::textarea('description', !empty($detail) ? $detail->description : '', ['id' => 'ckDescription', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                    ?>
                </div>

                @include('dashboard.common.seo')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cập nhập</button>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-3">
        @include('dashboard.common.image',['action' => $action])
        @include('dashboard.common.publish')
    </div>
</div>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>