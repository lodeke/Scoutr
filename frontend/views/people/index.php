<?php
$this->title = "Encounter";
//$template = 'encounter_'.$settings['encounter_theme'];
$template = 'encounter_demo';
$accept = $settings['accept_button'];
$denied = $settings['denied_button'];
$tagline = $settings['denied_button'];
switch($accept)
{
    case "like":
        $acceptClass = "like.png";//'la la-thumbs-o-up';
        break;
    case "hot":
        $acceptClass =  "hot3.png";//'la la-fire';
        break;
    case "kiss":
        $acceptClass =  "kiss.png";;//'la la-smile-o';
        break;
    default:
        $acceptClass =  "yes.png";//'la la-check';
        break;
}

switch($denied)
{
    case "dislike":
        $deniedClass =  "dislike.png";//'la la-thumbs-down';
        break;
    case "not":
        $deniedClass =  "not.png";//'la la-tint';
        break;
    case "miss":
        $deniedClass =  "mis.png";//'la la-frown-o';
        break;
    default:
        $deniedClass =  "no.png";//'la la-remove';
        break;
}
if($encounter)
{
    $card = "";
    $finalStage = "hidden";
}
else
{
    $card = "d-none";
    $finalStage = "d-block";
}

$latout = isset($_GET['l'])?true:false;;
if($latout)
{
    $mainCol = "col-lg-6 col-md-6 col-sm-12 col-xs-12";
    $sider = "col-lg-3 col-3 d-none d-sm-block d-xs-block ";
    $riterder = "col-3 d-none d-sm-block d-xs-block ";
}
else
{
    $mainCol = "col-lg-8 col-md-8 pr-lg-5 pl-lg-5 col-sm-12 col-xs-12";
    $sider = "d-none ";
    $riterder = "col-4 d-none d-lg-block d-md-block d-sm-none d-xs-none";

}
?>
<div class="row justify-content-center no-gutters">
    <!--<div class=" <?php echo  $sider ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="align-self-center" style="min-width: 60px">
                        <i class="fa text-success fa-3x txt pregular"><?php echo  \common\models\Point::getPoint(); ?></i>
                    </div>
					<div class="align-self-center pl-3" >
                        <h5 class="txt t-light3 psemibold">
                            Your Score
                        </h5>
                        <small class="txt t-light2 psemibold">
                            Join now  membership plan
                        </small>
                    </div>

                </div>

                <div class="mt-3 row pl-lg-2 pr-lg-2">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-2 btn-success btn-block mt-3">
                        Buy More Coin
                    </a>
                </div>


            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="align-self-center" style="width: 60px">
                        <i class="fa fa-heart-o text-redis fa-3x"></i>
                    </div>
                    <div class="align-self-center pl-3" >
                        <h5 class="txt t-light3 psemibold">
                            Become Popular
                        </h5>
                        <small class="txt t-light2 psemibold">
                            Join now  membership plan
                        </small>
                    </div>

                </div>

                <div class="mt-3 row pl-lg-2 pr-lg-2">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-2 btn-danger btn-block mt-3">
                        Go Ads Free, Become Vip Now
                    </a>
                </div>

            </div>
        </div>
        <div class="mt-3">
            <?php \common\models\Adsense::show('left'); ?>
        </div>

    </div>-->
    <div class="<?php echo  $mainCol; ?>">
        <div class="stage pr-lg-5 pl-lg-5 <?php echo  $card; ?>">
            <h3 class="title">Do you Like? </h3>
            <div id="stacked-cards-block" class="stackedcards stackedcards--animatable init">
                <div class="stackedcards-container">
                    <?php echo $this->render($template,['encounter'=>$encounter,'settings'=>$settings]) ?>

                </div>
                <div class="stackedcards--animatable stackedcards-overlay top"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/skip.png"  width="auto" height="auto"/></div>
                <div class="stackedcards--animatable stackedcards-overlay right"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/<?php echo  $acceptClass; ?>" width="auto" height="auto"/></div>
                <div class="stackedcards--animatable stackedcards-overlay left"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/<?php echo  $deniedClass; ?>" width="auto" height="auto"/></div>
            </div>
            <div class="global-actions">
                <div class="left-action"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/remove.png"  width="25" height="25"/></div>
                <div class="top-action"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/arrow-heading-up.png" width="18" height="16"/></div>
                <div class="right-action"><img src="<?php echo  Yii::getAlias('@web') ?>/images/site/buttons/heart.png" width="25" height="25"/></div>
            </div>
        </div>

        <div class="final-state <?php echo  $finalStage; ?>" style="top:30%;position: fixed;">
            <div class="card">
                <div class="card-body" align="center">
                    <i class="la la-frown-o la-5x"></i>
                    <h1 class="card-title">Geen scoutr's meer</h1>
                    <p class="card-title">
						Op basis van jouw voorkeuren hebben we geen matches meer gevonden. </br>Kom later terug.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="<?php echo  $riterder ?> p-0">
        <div class="card mt-3 p-0">
            <div class="card-header bg-white">
                <span class="txt t-light3 psemibold p-2 text-dark"><i class="fa fa-heart-o"></i> You may Like</span>
            </div>
            <div class="card-body">
                <div class="card-columns">
                    <?php
                    $random = new \frontend\models\CardTemplate();
                    $random->limit = 20;
                    $random->randomUser();
                    ?>
                </div>
            </div>
        </div>-->

        <div class="mt-3">
            <?php \common\models\Adsense::show('right'); ?>
        </div>
    </div>
</div>

