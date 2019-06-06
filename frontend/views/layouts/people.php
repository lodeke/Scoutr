<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\PeopleAsset;

use common\widgets\Alert;

PeopleAsset::register($this);
$siteSettings = \common\models\SiteSettings::find()->one();
\common\models\Track::track();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo  Yii::$app->language ?>">
<head>
    <meta charset="<?php echo  Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo  Html::csrfMetaTags() ?>
    <title><?php echo  Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?php echo  Yii::getAlias('@web')?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo  Yii::getAlias('@web')?>/css/blocker.css" rel="stylesheet">
    <link href="<?php echo  Yii::getAlias('@web')?>/css/semi-full.css" rel="stylesheet">

</head>
<body class="landing-page bg-white">

<!-- ############################  Overlay div ###############################-->
<div class="overlay_result" align="center">
    <div class="text-danger contents"  align="center">
        <i class="la la-spinner la-spin la-500px"></i>
        <h1 class="text-danger">
            Searching Best Match...
        </h1>
    </div>
</div>
<!-- ############################  Overlay div ###############################-->
<?php $this->beginBody() ?>
<!-- ############################  mobile Header ############################ -->
<div class="row no-gutters  justify-content-center border-bottom d-lg-none" style="box-shadow: 0px 3px 5px #55555524;">
    <div class="col border-right align-self-center" align="center">
        <p onclick="openMenu()" class="text-info" style="font-size: 25px;">
            <span style="font-size:30px;cursor:pointer;" >&#9776;</span>
        </p>
    </div>
    <div class="col border-right p-3" align="center">
        <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>" class="text-success" style="font-size: 25px;">
            <i class="la la-search"></i>
        </a>
    </div>
    <div class="col p-3" align="center">
        <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="text-danger " style="font-size: 25px;">
            <i class="la la-heart-o"></i>
        </a>
    </div>
    <div class="col border-left  p-3" align="center">
        <a href="<?php echo  \yii\helpers\Url::toRoute('people/chats') ?>" class="text-info" style="font-size: 25px;">
            <i class="la la-comment"></i>
        </a>

    </div>

</div>
<!--############################  mobile Header ############################ -->



<!-- ############################  Main Container ############################ -->
<div class="container" id="main">

    <div class="row justify-content-center">
        <div class="col-md-3 col-lg-3 col-3 d-none d-sm-block d-xs-block">
            <div class="fixed-sidebar">
                <h1 class="text-danger">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>">
                        <img width="<?php echo  $siteSettings['logo_width'] ?>" height="<?php echo  $siteSettings['logo_height'] ?>" style="padding: <?php echo  $siteSettings['logo_padding'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">

                    </a>
                </h1>

                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-user"></i> &nbsp; Profile
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-heartbeat"></i> &nbsp; Encounter
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/notification') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-bell"></i> &nbsp; Notification <?php echo  \common\models\UserFeeds::newRequest(); ?>
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/nearby') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-map-marker"></i>  &nbsp;People Nearby
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/like-by') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-question"></i>  &nbsp;Who Like Me ?
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/liked-me') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-thumbs-o-up"></i>  &nbsp;My Likes
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-search"></i>  &nbsp; People Search</a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/match') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-heart-o"></i>  &nbsp; Match
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/chats') ?>" class="text-danger" style="font-weight: 300">
                        <i class="la la-comment"></i> &nbsp; Chat / Messages
                    </a>
                </h4>
                <hr>
                <h4>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('site/logout') ?>" data-method="POST" class="text-danger" style="font-weight: 300">
                        <i class="la la-power-off"></i> &nbsp; LogOut
                    </a>
                </h4>
                <hr>
            </div>

        </div>
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <?php echo  Alert::widget() ?>

            <?php echo  $content ?>
        </div>


        <!-- ##### Chat Widgets is placed here ###-->

        <div id="ChatBox" class="ChatBar card">
            <h3 class="card-header" style="position: fixed;background-color: white;z-index: 999;width: inherit">
                <i class="la la-comment"></i> Chat
                <a href="javascript:void(0)" class="float-right closebtn" onclick="closeChat()">&times;</a>
            </h3>

            <div class="card-body"  style="padding: 0;margin-top: 64px;">

                <!-- Chat Render Code Is here-->
                <input type="hidden" id="loadMsgUrl" name="loadmsgurl" value="<?php echo  \yii\helpers\Url::toRoute('message/load-msg') ?>">
                <input type="hidden" id="checkUrl" value="<?php echo  \yii\helpers\Url::toRoute('message/check'); ?>?reciever=">
                <input type="hidden" id="current" value="">
                <div class="chat-box">
                    <div id="scrollTop" class=" chat-message-field p-3" style="overflow-y: scroll;height:570px;">

                    </div>
                    <div class="chat_footer">
                        <form id="chat_form" class="chat_form_master border-top" action="<?php echo  \yii\helpers\Url::toRoute('message/send-msg') ?>" method="get">
                            <div class="row no-gutters">
                                <div class="col-10">
                                    <textarea id="chat_text_input" class="chat_text_input form-control p-3" style="padding:10px 2px;"  placeholder="hi.. there!"></textarea>

                                </div>
                                <div class="col-2">
                                    <button type="button"  data-reciever="1" class="chat_text_send text-danger col btn bg-white btn-sm ">
                                        <i class="la la-send"></i>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="reciever" value="">


                        </form>
                    </div>
                </div>

                <!-- Chat Render Code Is here-->

            </div>
        </div>

        <!-- ### Chat Widgets is placed here ###-->

    </div>

</div>
<!-- ############################  Main Container ############################ -->

<!--############################  mobile menu ############################ -->
<div id="mobile_menu" class="mobile_menu card p-0" style="width: 0px">
    <div class="card-header" style="position: fixed;background-color: white;z-index: 9;width: inherit">
        <img width="50%" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
        <a href="javascript:void(0)" class="float-left closebtn" onclick="closeMenu()">&times;</a>
    </div>
    <div class="card-body" style="position: relative;top: 33px;">
        <div class="mt-5">
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-user"></i> &nbsp; Profile
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-gear"></i> &nbsp; Settings
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/notification') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-bell"></i> &nbsp; Notification <?php echo  \common\models\UserFeeds::newRequest(); ?>
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/nearby') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-map-marker"></i>  &nbsp;People Nearby
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/like-by') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-question"></i>  &nbsp;Who Like Me ?
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/liked-me') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-thumbs-o-up"></i>  &nbsp;My Likes
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-search"></i>  &nbsp; People Search</a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/match') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-heart-o"></i>  &nbsp; Match
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/chats') ?>" class="text-danger" style="font-weight: 300">
                    <i class="la la-comment"></i> &nbsp; Chat / Messages
                </a>
            </h4>
            <hr>
            <h4>
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/logout') ?>" data-method="POST" class="text-danger" style="font-weight: 300">
                    <i class="la la-power-off"></i> &nbsp; LogOut
                </a>
            </h4>
            <hr>
        </div>
    </div>
</div>
<!--############################  mobile menu end ############################ -->

<?php $this->endBody() ?>
</body>
<script src="<?php echo  Yii::getAlias('@web')?>/js/blocker.js"></script>
<script src="<?php echo  Yii::getAlias('@web')?>/js/custom.js"></script>
</html>
<?php $this->endPage() ?>
