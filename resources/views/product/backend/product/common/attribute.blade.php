<?php

if ($action == 'create') {
    $catalogue  = old('attribute_catalogue');
    $checkbox  = old('checkbox_val');
    $attribute = old('attribute');
    $id_version = old('id_version');
    $title_version = old('title_version');
    $price_version = old('price_version');
    $code_version = old('code_version');
    $status_version =  old('status_version');
} else {
    if ($errors->any()) {
        $catalogue  = old('attribute_catalogue');
        $checkbox  = old('checkbox_val');
        $attribute = old('attribute');
        $id_version = old('id_version');
        $title_version = old('title_version');
        $price_version = old('price_version');
        $code_version = old('code_version');
        $status_version =  old('status_version');
    } else {
        $version_json = json_decode(base64_decode($detail->version_json), true);
        $checkbox = $version_json[0];
        $catalogue  = $version_json[1];
        $attribute = $version_json[2];
        if ($detail->product_version) {
            foreach ($detail->product_version as $key => $val) {
                $title_version[] = $val['title_version'];
                $price_version[] =  number_format($val['price_version'], '0', ',', '.');
                $code_version[] = $val['code_version'];
                $id_version[] = $val['id_version'];
                $status_version[] = $val['status_version'];
            }
        }
    }
}

if (isset($title_version)) {
    $version = count($title_version);
} else {
    $version = 0;
}
?>
<div class="ibox mb20 block-version <?php if (!in_array('attributes', $dropdown)) { ?>hidden<?php } ?>" data-countattribute_catalogue="<?php echo count($htmlAttribute) - 1 ?>">
    <div class="ibox-title" style="padding-bottom: 15px;">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <h5>Sản phẩm có nhiều phiên bản </h5>
            <div>
                <a class="show-version" href="" <?php echo (!empty($catalogue)) ? 'style="display:none"' : '' ?>>Thêm phiên bản</a>
                <a class="uk-flex uk-flex-middle hide-version" href="" <?php echo (!empty($catalogue)) ? '' : 'style="display:none"' ?>>
                    Đóng
                </a>
            </div>
        </div>
        <small class="text-danger">Sản phẩm có các phiên bản dựa theo thuộc tính như kích thước hoặc màu sắc,... ? ( chọn tối đa 4 )</small>
    </div>
    <div class="ibox-content" style="background: #f5f6f7; <?php echo (!empty($catalogue)) ? '' : 'display:none"' ?>">
        <div class="row block-attribute">
            <div class="col-lg-12 mb10">
                <table class="table">
                    <thead>
                        <tr>
                            <td style="width: 10%">Sản phẩm biến thể</td>
                            <td style="width: 30%;">Tên thuộc tính</td>
                            <td style="width: 50%;">Giá trị thuộc tính (Các giá trị cách nhau bởi dấu phẩy)</td>
                            <td style="width: 10%;"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($catalogue)) { ?>
                            <?php foreach ($catalogue as $key => $value) {
                                if (isset($attribute_json[$key])) { ?>
                                    <tr data-id="<?php echo $value ?>" <?php echo (isset($checkbox[$key]) && $checkbox[$key] == 1) ? 'class="bg-choose"' : '' ?>>
                                        <td data-index="<?php echo $key ?>">
                                            <?php if (isset($checkbox[$key]) && $checkbox[$key] == 1) { ?>
                                                <input type="checkbox" checked name="checkbox[]" value="1" class="checkbox-item">
                                                <input type="text" name="checkbox_val[]" value="1" class="hidden">
                                                <div for="" class="label-checkboxitem checked"></div>
                                            <?php } else { ?>
                                                <input type="checkbox" name="checkbox[]" value="1" class="checkbox-item">
                                                <input type="text" name="checkbox_val[]" value="0" class="hidden">
                                                <div for="" class="label-checkboxitem "></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <select class="form-control select3" name="attribute_catalogue[]" tabindex="-1" aria-hidden="true">
                                                @foreach($htmlAttribute as $k=>$v)
                                                <option value="{{$k}}" {{ $value == $k ? 'selected' : ''  }}>{{$v}}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <?php if ($value == 0) { ?>
                                                <input type="text" class="form-control" disabled="disabled">
                                            <?php } else { ?>
                                                <select name="attribute[<?php echo $key ?>][]" data-json="<?php echo (isset($attribute_json[$key])) ? base64_encode(json_encode($attribute_json[$key])) : '' ?>" data-condition="<?php echo $value ?>" class="form-control selectMultipe" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.." data-module="attributes" style="width: 100%;">
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-danger delete-attribute" data-id=""><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>


                        <?php } ?>


                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <a type="button" data-attribute="<?php echo base64_encode(json_encode($htmlAttribute)) ?>" style="" class="btn btn-default add-attribute m-l-sm" data-id=""><i class="fa fa-plus"></i> Thêm thuộc tính cho SP</a>
                </div>
            </div>
        </div>
        <?php if ($version > 0) { ?>
            <table class="table" id="table_version">
                <thead>
                    <tr>
                        <th style="width: 35%;">Mẫu sản phẩm</th>
                        <th style="width: 25%;">Giá</th>
                        <th style="width: 20%;">Mã sản phẩm</th>
                        <th style="width: 20%;">Hết hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($title_version as $key => $value) { ?>
                        <tr <?php echo (isset($status_version[$key]) && $status_version[$key] == 1) ? 'class="bg-choose"' : '' ?>>
                            <td style="width: 35%;">
                                <input type="text" name="id_version[]" value="<?php echo $id_version[$key] ?>" class="hidden">
                                <input type="text" name="title_version[]" readonly value="<?php echo $title_version[$key] ?>" class="form-control" autocomplete="off">
                            </td>
                            <td style="width: 25%;">
                                <input type="text" name="price_version[]" value="<?php echo $price_version[$key] ?>" class="form-control int" autocomplete="off">
                            </td>
                            <td style="width: 20%;">
                                <input type="text" name="code_version[]" value="<?php echo $code_version[$key] ?>" class="form-control" autocomplete="off">
                            </td>
                            <td style="width: 20%;">
                                <?php if (isset($status_version[$key]) && $status_version[$key] == 1) { ?>
                                    <input type="checkbox" checked name="checkbox_version[]" value="1" class="checkbox-item">
                                    <input type="text" name="status_version[]" value="1" class="hidden">
                                    <div class="label-checkboxitem checked"></div>
                                <?php } else { ?>
                                    <input type="checkbox" name="checkbox_version[]" value="1" class="checkbox-item">
                                    <input type="text" name="status_version[]" value="0" class="hidden">
                                    <div class="label-checkboxitem"></div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <table class="table" id="table_version" style="display:none">
                <thead>
                    <tr>
                        <th style="width: 35%;">Mẫu sản phẩm</th>
                        <th style="width: 25%;">Giá</th>
                        <th style="width: 20%;">Mã sản phẩm</th>
                        <th style="width: 20%;">Hết hàng</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        <?php } ?>

    </div>
</div>