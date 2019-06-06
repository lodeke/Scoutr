<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$template ='_welcome_three';
$siteSettings = \common\models\SiteSettings::find()->one();
$defaultSettings = \common\models\DefaultSetting::find()->one();
$this->title = $siteSettings['site_name'].' - '.$siteSettings['site_title'];

$homePageCust = isset($_GET['token'])?$_GET['token']:$defaultSettings['home_page'];
if(isset($_GET['token']))
{
    switch($homePageCust)
    {
        case "trendy":
            $home = "classic";

            break;
        case "classic":
            $home = "trendy";

            break;
        default:
            $home = $defaultSettings['home_page'];
            break;
    }
}
else
{
    $home = $defaultSettings['home_page'];
    $home = ($home == "classic")?$home:'trendy';

}

$basUrl = \yii\helpers\Url::toRoute('site/index').'?token='.$home;

$template ='_home_'.$home;
$currentCity = \common\models\Track::getCity();
?>

<!-- ############################  Demo Settings ############################ -->
<!--<div class="bg-white control_block_prv" id="themecontroll"  align="left">
    <div class="control_block_clsBtn" id="closeb" onclick="$('#themecontroll').css('width','0px');$('#closeb').hide();$('#openb').show();">
        <i class="la la-gear la-spin"></i>
    </div>
    <div class="control_block_clsBtn" id="openb" onclick="$('#themecontroll').css('width','300px');$('#openb').hide();$('#closeb').show();">
        <i class="la la-gear la-spin"></i>
    </div>
    <div class="control_block_content">
        <div class="p-3">
            <h5>
                Home Page Settings
            </h5>
            <p>
                Two Awesome Home Page Design <i class="la la-smile-o"></i>
            </p>
            <h3 class="p-2">
                <span class="text-primary"><?php echo  $home; ?> </span>Style
            </h3>
            <a href="<?php echo  $basUrl; ?>" class="btn bg-green btn-block"> View Next Home Page </a>
            <hr>

            <?php
            $controller = Yii::$app->controller->action->id;
            ?>

        </div>
    </div>
</div>-->
<!-- ############################  Demo Settings end ############################ -->

<?php echo  $this->render($template,['siteSettings'=>$siteSettings,'model'=>$model,'user'=>$user,'pages'=>$pages,'currentCity'=>$currentCity]) ?>
<div class="modal fade in" id="welcomeModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
               <span class="fw-mediumbold">
                   <strong>Vertel iets over je zelf</strong>
               </span>
            </div>
            <div class="modal-body">
                <h2>
                    Welkom op <?php echo  Html::encode($siteSettings['site_name']) ?>
                </h2>
                <p class="small"><?php echo  Html::encode($siteSettings['site_title']) ?></p>
                <div class="row justify-content-center">
                    <div class="col-12" id="wlcmsrchCntnr">
                        <input type="hidden" value="<?php echo  \yii\helpers\Url::toRoute('encounter/welcome-search') ?>" id="wlcmsrchurl">
                        <h3 class="p-3 text-black-50">
                            Hi Scoutr, stel je zelf even voor!
                        </h3>
                        <button value="male" class="btn btn-danger p-2 wlcmsrchinpt"> <i class="la la-male"></i> Ik ben een man </button>
                        <button value="female" class="btn btn-mute p-2 text-danger wlcmsrchinpt"> <i class="la la-female"></i> Ik ben een vrouw  </button>
                        <p class="mt-2">
                           Van: <i class="la la-map-marker"></i>
                            <?php echo  $currentCity ; ?>
                        </p>

                    </div>
                    <p>Wij zullen jouw match vinden.</p>
                    <div class="col-lg-12 d-none" id="wlcmsrchRsltwrp">
                        <h5>Resultaat weergeven van <?php echo  $currentCity ; ?></h5>
                        <div id="wlcmsrchRslt">
                            <h2>
                                <i class="la la-spinner la-spin"></i> Bezig met laden...
                            </h2>
                        </div>
                        <h1><i class="flaticon-like-1"></i></h1>
                        <h2 class="p-3">
                             Ben je blij met het resultaat?
                        </h2>
                        <p class="p-2">
                           Laten we een profiel maken of login met uw gebruikersnaam en wachtwoord
                        </p>
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/login') ?>" class="btn btn-sm bg-blue-light text-white">
                           LOGIN <i class="la la-angle-double-right"></i>
                        </a>
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/signup') ?>" class="btn btn-sm btn-primary text-white">
                           Maak een profiel <i class="la la-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">SLUIT</button>
            </div>
        </div>
    </div>
    <!--            model add row closed-->
</div>

<script type="text/javascript">
    setTimeout(function(){
        $("#welcomeModel").modal({backdrop : "static",keyboard : false});
    },3000)
</script>

