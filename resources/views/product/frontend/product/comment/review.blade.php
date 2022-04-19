<div class="review-rating__inner">
    <div class="review-rating__summary">
        <div class="review-rating__point">{{$comment_view['averagePoint']}}</div>
        <div class="review-rating__stars">
            <input type="hidden" class="rating-disabled" value="{{$comment_view['averagePoint']}}" disabled="disabled" />
            <div class="review-rating__total">{{$comment_view['totalComment']}} nhận xét</div>
        </div>

    </div>

    <?php

    $arrayRate5 = $arrayRate4 = $arrayRate3 = $arrayRate2 = $arrayRate1 = 0;
    $arrayRate5PT = $arrayRate4PT = $arrayRate3PT = $arrayRate2PT = $arrayRate1PT = 0;
    if (isset($comment_view) && is_array($comment_view) && count($comment_view)) {
        $averagePoint = round($comment_view['averagePoint']);
        $totalComment = $comment_view['totalComment'];
        $arrayRate5 = $comment_view['arrayRate'][5];
        if ($arrayRate5 > 0) {
            $arrayRate5PT = ($arrayRate5 / $totalComment) * 100;
        }
        $arrayRate4 = $comment_view['arrayRate'][4];
        if ($arrayRate4 > 0) {
            $arrayRate4PT = ($arrayRate4 / $totalComment) * 100;
        }
        $arrayRate3 = $comment_view['arrayRate'][3];
        if ($arrayRate3 > 0) {
            $arrayRate3PT = ($arrayRate3 / $totalComment) * 100;
        }
        $arrayRate2 = $comment_view['arrayRate'][2];
        if ($arrayRate2 > 0) {
            $arrayRate2PT = ($arrayRate2 / $totalComment) * 100;
        }
        $arrayRate1 = $comment_view['arrayRate'][1];
        if ($arrayRate1 > 0) {
            $arrayRate1PT = ($arrayRate1 / $totalComment) * 100;
        }
    }
    ?>
</div>
<div class="review-rating__detail">
    <div class="review-rating__level">
        <div class="review-rating__star"><input type="hidden" class="rating-disabled" value="5" disabled="disabled" /></div>
        <div class="review-rating__width">
            <div style="width: <?php echo $arrayRate5PT ?>%;"></div>
        </div>
        <div class="review-rating__number"><?php echo $arrayRate5 ?></div>
    </div>
    <div class="review-rating__level">
        <div class="review-rating__star"><input type="hidden" class="rating-disabled" value="4" disabled="disabled" /></div>
        <div class="review-rating__width">
            <div style="width: <?php echo $arrayRate4PT ?>%;"></div>
        </div>
        <div class="review-rating__number"><?php echo $arrayRate4 ?></div>
    </div>
    <div class="review-rating__level">
        <div class="review-rating__star"><input type="hidden" class="rating-disabled" value="3" disabled="disabled" /></div>
        <div class="review-rating__width">
            <div style="width: <?php echo $arrayRate3PT ?>%;"></div>
        </div>
        <div class="review-rating__number"><?php echo $arrayRate3 ?></div>
    </div>
    <div class="review-rating__level">
        <div class="review-rating__star"><input type="hidden" class="rating-disabled" value="2" disabled="disabled" /></div>
        <div class="review-rating__width">
            <div style="width: <?php echo $arrayRate2PT ?>%;"></div>
        </div>
        <div class="review-rating__number"><?php echo $arrayRate2 ?></div>
    </div>
    <div class="review-rating__level">
        <div class="review-rating__star"><input type="hidden" class="rating-disabled" value="1" disabled="disabled" /></div>
        <div class="review-rating__width">
            <div style="width: <?php echo $arrayRate1PT ?>%;"></div>
        </div>
        <div class="review-rating__number"><?php echo $arrayRate1 ?></div>
    </div>
</div>