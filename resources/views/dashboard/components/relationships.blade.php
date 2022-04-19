<?php if (!empty($module == 'product')) { ?>
    <div class="box box-warning <?php if (!in_array('brands', $dropdown)) { ?>hidden<?php } ?>">
        <div class="box-body">
            <div class="form-group">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <label>Thương hiệu</label>
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <div class="edit">
                            <a href="" class="popup-show" data-module="brands">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <?php
                echo Form::select('brands[]',  [], old('brands'), ['data-json' =>  base64_encode(json_encode($brands)), 'id' => 'brands', 'class' => 'form-control', 'multiple' => 'multiple']);
                ?>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php } ?>
<div class="box box-warning <?php if (!in_array('tags', $dropdown)) { ?>hidden<?php } ?>">
    <div class="box-body">
        <div class="form-group">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <label>Tags</label>
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <div class="edit">
                        <a href="" class="popup-show" data-module="tags">Thêm mới</a>
                    </div>
                </div>
            </div>
            <?php
            echo Form::select('tags[]', [], old('tag'), ['data-json' =>  base64_encode(json_encode($tags)), 'id' => 'tags', 'class' => 'form-control', 'multiple' => 'multiple']);
            ?>
        </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->