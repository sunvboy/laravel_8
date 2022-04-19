<?php if ($action == 'update') { ?>
    <div class="box box-warning">
        <div class="box-body">
            <div class="form-group">
                <label>ICON</label>
                <div class="avatar" style="cursor: pointer;"><img src="<?php echo (old('icon')) ? old('icon') : ((!empty($detail->icon)) ? url($detail->icon) :  asset('backend/img/not-found.png')); ?>" class="img-thumbnail" alt=""></div>
                <input type="text" name="icon" value="<?php echo (old('icon')) ? old('icon') : ((!empty($detail->icon)) ? $detail->icon : ''); ?>" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php } else { ?>
    <div class="box box-warning">
        <div class="box-body">

            <div class="form-group">
                <label>ICON</label>
                <div class="avatar" style="cursor: pointer;">
                    <img src="<?php if (!empty(old('icon'))) { ?>{{old('icon')}}<?php } else { ?>{{asset('backend/img/not-found.png')}}<?php } ?>" class="img-thumbnail" alt="">
                </div>
                <input type="text" name="icon" value="{{old('icon')}}" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php } ?>