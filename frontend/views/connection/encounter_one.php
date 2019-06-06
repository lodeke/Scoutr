<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 1/14/2019
 * Time: 2:49 PM
 */
?>
<div class="row no-gutters">
    <div class="col-4">
        <h3>
            <b>Do you Like her ?</b>
        </h3>
        <br>
    </div>

</div>
<?php
foreach($encounter as $list)
{
?>
<div class="row no-gutters encounter" id="<?php echo  "encounter_".$list['id']; ?>">

    <div class="col-7" style="background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
        <div id="SwipeStatus_<?php echo  $list['id']; ?>" class="liked">
            Like
        </div>
        <div style="width: 640px;height: 480px"></div>
    </div>
    <div class="col-5 align-self-center" style="background-color: #ffffff" align="center">
        <h2 class="text-capitalize">
            <strong>
                <?php echo  $list['first_name'] ?>  <?php echo  $list['last_name'] ?>
            </strong>
        </h2>
        <p>
            <i class="la la-map-marker"></i> <?php echo  $list['city'] ?> , <?php echo  $list['age'] ?>
        </p>
        <p>
            <i class="la la-heart-o"></i> Single
        </p>
        <div class="align-self-start" >
            <button class="btn hot_btn icon_anim hot" data-user="<?php echo  $list['id'] ?>">
                Hot <span style="width: 25px;display: inline-block"><i class="la la-heart"></i></span>
            </button>
            Or
            <button class="btn not_btn icon_anim not" data-user="<?php echo  $list['id'] ?>">
                Not <span style="width: 25px;display: inline-block"><i class="la la-remove rejIcon"></i></span>
            </button>
        </div>
        <p>
            How's She ?
        </p>
    </div>
</div>
<?php
}
?>
<div class="row justify-content-center" style="display: none;">
    <?php
    foreach($encounter as $list)
    {
        ?>

        <div class="col-8" align="center">
            <div class="encounter " id="<?php echo  "encounter_".$list['id']; ?>">
                <div id="SwipeStatus_<?php echo  $list['id']; ?>" class="liked">
                    Like
                </div>
                <div class="card-custImg-wrap">
                    <img src="<?php echo  Yii::getAlias('@web') ?>/social/img/dem_girl.jpg" class="img-rounded img-responsive" style="border-radius: 5px;">
                    <div class="caption">
                        <?php echo  $list['first_name']; ?>, <?php echo  $list['age']; ?>
                    </div>
                </div>
                <div class="row" style="margin-top: -20px;">
                    <div class="col-4">
                        <button class="btn cust_btn_reload" >
                            <i class="la la-refresh "></i>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="btn cust_btn_love" data-user="<?php echo  $list['id']; ?>">
                            <i class="la la-heart "></i>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="btn cust_btn_remove" data-user="<?php echo  $list['id']; ?>">
                            <i class="la la-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>