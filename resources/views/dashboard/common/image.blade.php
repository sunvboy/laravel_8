<?php if ($action == 'update') { ?>
    <div class="box box-warning">
        <div class="box-body">
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <div class="avatar" style="cursor: pointer;"><img src="<?php echo (old('image')) ? old('image') : ((!empty($detail->image)) ? url($detail->image) :  asset('backend/img/not-found.png')); ?>" class="img-thumbnail" alt=""></div>
                <input type="text" name="image" value="<?php echo (old('image')) ? old('image') : ((!empty($detail->image)) ? $detail->image : ''); ?>" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php } else { ?>
    <div class="box box-warning">
        <div class="box-body">
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <div class="avatar" style="cursor: pointer;">
                    <img src="<?php if (!empty(old('image'))) { ?>{{old('image')}}<?php } else { ?>{{asset('backend/img/not-found.png')}}<?php } ?>" class="img-thumbnail" alt="">
                </div>
                <input type="text" name="image" value="{{old('image')}}" class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)" autocomplete="off">
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
<?php } ?>