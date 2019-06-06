<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 1/14/2019
 * Time: 2:49 PM
 */
?>
<?php
foreach($encounter as $list)
{
    $Enid = "encounter_".$list['id'];
?>
<div class="encounter" id="<?php echo  "encounter_".$list['id']; ?>">
    <div class="row no-gutters">
        <div class="col-7" align="center">
            <div style="min-height: 680px;overflow: hidden">
                <div id="SwipeStatus_<?php echo  $list['id']; ?>" class="liked">
                    Like
                </div>
                <img src="<?php echo  Yii::getAlias('@web') ?>/social/img/dem_girl.jpg" class="img-rounded" style="border-radius: 5px;">

            </div>
            <div class="row" style="position: absolute;bottom: 80px;width: 100%">
                <div class="col-4">
                    <button class="btn cust_btn_reload" >
                        <i class="la la-refresh "></i>
                    </button>
                </div>
                <div class="col-4">
                    <button class="btn cust_btn_love hot" data-user="<?php echo  $list['id']; ?>">
                        <i class="la la-heart "></i>
                    </button>
                </div>
                <div class="col-4">
                    <button class="btn cust_btn_remove not" data-user="<?php echo  $list['id']; ?>">
                        <i class="la la-remove"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col col-xl-5 order-xl-1 col-lg-5 order-lg-1 col-md-5 order-md-2 col-sm-12 col-5"  align="center">

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title text-primary"><?php echo  $list['first_name'] ?> Bio</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
                </div>
                <div class="ui-block-content">


                    <!-- W-Personal-Info -->

                    <ul class="widget w-personal-info">
                        <li>
                            <span class="title">About Me:</span>
							<span class="text">
                                Hi, I’m <?php echo  $list['first_name'] ?> <?php echo  $list['bio'] ?>
							</span>
                        </li>

                        <li>
                            <span class="title">Lives in:</span>
                            <span class="text"><?php echo  $list['city'] ?>, <?php echo  $list['country'] ?></span>
                        </li>
                        <li>
                            <span class="title"><?php echo  $list['job_title'] ?>:</span>
                            <span class="text"><?php echo  $list['company'] ?></span>
                        </li>
                        <li>
                            <span class="title">school:</span>
                            <span class="text"><?php echo  $list['school'] ?></span>
                        </li>


                    </ul>

                    <!-- ... end W-Personal-Info -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>