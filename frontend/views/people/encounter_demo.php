<?php
foreach($encounter as $list )
{
    ?>
    <div class="card card-item"  dataUrl="<?php echo  \yii\helpers\Url::toRoute('encounter/') ?>" id="<?php echo  base64_encode($list['id']) ?>">
        <div class="card-content">
            <div class="card-image">
                <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')"  src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  "default.jpg";//$list['images']; ?>" width="100%" style="height: 400px;"/>
            </div>
            <div class="card-titles">
                <h3 class="text-white"><?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>,  <?php echo  $list['age']; ?>yr</h3>
                <h6 class="text-white"><?php echo  $list['bio']; ?></h6>
            </div>
        </div>
        <div class="card-footer d-lg-block d-sm-none d-xs-none d-none">
            <div class="popular-destinations-text">Looking For <span class="text-danger"><?php echo  $list['looking_for']; ?></span> <br/>
                <i class="la la-map-marker"></i> <?php echo  $list['city']; ?></div>

        </div>
    </div>
<?php
}
?>
