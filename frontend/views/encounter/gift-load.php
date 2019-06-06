<?php
foreach($gifts as $gift)
{
    $src = Yii::getAlias('@web').'/images/site/gift/'.$gift['image'];
    $name = $gift['gift'];
    $coin = $gift['point'];
    ?>
    <div class="col-lg-2 col-xl-2 col-md-2 col-sm-4 col-xs-6" data-gift-name="<?= $name; ?>" data-gift-coin="<?= $coin; ?>" data-gift-image="<?= $src ?>"  id="gift_<?= $gift['id'] ?>">
        <div class='ui-block' style="cursor: pointer" align="center" onclick="SelectGift(<?= $gift['id'] ?>)" >
            <img class='card-img-top' src='<?= $src; ?>'>
            <div class='ui-block-content' style="padding: 2px">
                <small><?= $coin; ?> coin</small>
            </div>
        </div>
    </div>
<?php
}