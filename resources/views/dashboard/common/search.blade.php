<div class="uk-search uk-flex uk-flex-middle ">

    <?php if (empty($catalogue)) { ?>
        <select class="form-control ajax-delete-all mr10" data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="{{$module}}">
            <option>Hành động</option>
            <option value="">Xóa</option>
        </select>
    <?php } ?>
    <form action="" class="uk-form uk-search uk-flex uk-flex-middle" id="search" style="margin-bottom: 0px;">
        <?php if(isset($htmlOption)){?>
            <div style="width:200px" class="mr10">
                <?php
                echo Form::select('catalogueid', $htmlOption, request()->get('catalogueid'), ['class' => 'form-control select3']);
                ?>
            </div>
        <?php }?>
        <input type="search" name="keyword" class="keyword form-control filter mr10" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>" style="width: 200px;">
        <button class="btn btn-primary" style="height: 34px;"><i class="fa fa-search"></i></button>
    </form>

</div>