<td>
    <div class="switch">
        <div class="onoffswitch">
            <input type="checkbox" <?php echo ($v->$title == 0) ? 'checked=""' : ''; ?> class="onoffswitch-checkbox publish-ajax" data-module="{{$module}}" data-id="<?php echo $v->id; ?>" data-title="{{$title}}" id="{{$title}}-<?php echo $v->id; ?>">
            <label class="onoffswitch-label" for="{{$title}}-<?php echo $v->id; ?>">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
    </div>
</td>