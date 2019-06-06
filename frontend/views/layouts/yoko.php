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

<body class="landing-page ">

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
<div class="container-fluid bg-white border-shadow d-none d-sm-block d-xs-block">
    <div class="container">
        <div class="d-flex justify-content-between">

            <div class="align-self-center">
                <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="p-0">
                    <img width="<?php echo  $siteSettings['logo_width'] ?>" height="<?php echo  $siteSettings['logo_height'] ?>" style="padding: <?php echo  $siteSettings['logo_padding'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
                </a>

            </div> <!--  Location Select-->
            <div class="align-self-baseline align-content-center">
                <ul class="list-inline head-icon">
                    <li class="list-inline-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>">
                            <i class="fa fa-handshake-o"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('people/chats') ?>">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('people/notification') ?>">
                            <i class="fa fa-bell-o"></i>
                            <?php echo  \common\models\UserFeeds::newRequest(); ?>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <div class="dropdown">
                            <button class="btn p-0 m-0 bg-transparent dropdown-toggle " type="button" id="menudpr" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  Yii::$app->user->identity->images ?>" class="img-fluid circle circle-sm">

                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menudpr">
                                <a class="h6 dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('edit/upload-photo') ?>">
                                    Upload Photos
                                </a>
                                <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/personal-information') ?>">
                                     Personal Information
                                </a>
                                <a class="dropdown-item h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>">
                                     Profile Settings
                                </a>
                                <a class="dropdown-item h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/account-settings') ?>">
                                     Account Settings
                                </a>

                                <a class="dropdown-item text-danger h6" href="<?php echo  \yii\helpers\Url::toRoute('site/logout') ?>" data-method="POST" >
                                    Logout
                                </a>
                            </div>
                        </div>

                    </li>
                </ul>
            </div> <!--  Location Select-->
        </div>
    </div>
</div>
<div class="container mt-3 mb-3">
    <div class="row mb-3 ">

        <div class="col-12 d-none d-sm-block d-xs-block">
            <?php
            $template = new \frontend\models\CardTemplate();
            $template->limit = 12;
            $template->premium();
            ?>

        </div>
        <div class="col-12 d-none d-sm-block d-xs-block" align="center">
            <?php \common\models\Adsense::show('top'); ?>
        </div>
        <div class="col-3 d-none d-sm-block d-xs-block">
            <div class="yoko-side">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-2" >
                            <div class="dropdown">
                                <button class="btn bg-transparent dropdown-toggle btn-outline-light" type="button" id="dpr" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-gear fa-2x txt t-light0"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dpr">
                                    <a class="h6 dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('edit/upload-photo') ?>">
                                        Upload Photos
                                    </a>
                                    <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/personal-information') ?>">
                                        Edit Personal Information
                                    </a>
                                    <a class="dropdown-item h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>">
                                        Edit Profile Settings
                                    </a>
                                    <a class="dropdown-item h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/account-settings') ?>">
                                        Edit Account Settings
                                    </a>


                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-start">
                            <div class="align-self-center" style="width: 60px">
                                <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  Yii::$app->user->identity->images ?>" class="img-fluid rounded">
                            </div>
                            <div class="align-self-center pl-3" >
                                <h5 class="txt t-light3 psemibold">
                                    <?php echo  Yii::$app->user->identity->first_name; ?>
                                </h5>
                            <span class="txt t-light2 pregular">
                                 <?php echo  Yii::$app->user->identity->city; ?>,
                                <span class="text-primary txt psemibold"><i class="fa fa-heart-o"></i>
                                    <?php echo  Yii::$app->user->identity->marital_status; ?>
                                </span>
                            </span>
                            </div>

                        </div>

                        <div class="mt-3 row ">
                            <div class="col-4 border-right" align="center">
                                <h5 class="h6">Coin</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="flaticon-coins text-danger pr-1"></i>
                                    <?php echo  \common\models\Point::getPoint(); ?>
                                </h6>

                            </div>

                            <div class="col-4 border-right" align="center">
                                <h5 class="h6">  Match</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="fa fa-heart-o text-danger pr-1"></i>
                                    <?php echo  count(\common\models\EloRecords::myMatch())?>
                                </h6>

                            </div>
                            <div class="col-4" align="center">
                                <h5 class="h6">Score</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="fa fa-battery-1 text-danger pr-1"></i>
                                    <?php echo  \common\models\EloRecords::likeScore() ?>%
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-warning btn-block mt-3">
                    Become Vip Member<i class="fa fa-angle-double-right"></i>
                </a>
                <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-primary btn-block mt-3">
                    Buy Coin  <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="mt-3">
                    <ul class="list-unstyled main_menu_nav">
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="h6">
                                <i class="fa fa-user-o pr-3"></i>John Demo Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>">
                                <i class="fa fa-handshake-o pr-3"></i>Live encounter
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/nearby') ?>">
                                <i class="fa fa-map-o pr-3"></i> People Nearby You
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/like-by') ?>">
                                <i class="fa fa-question pr-3"></i> Who Like Me ?
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/match') ?>">
                                <i class="fa fa-heartbeat pr-3"></i> Your Match
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/liked-me') ?>">
                                <i class="fa fa-thumbs-o-up pr-3"></i> People You Likes
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>">
                                <i class="fa fa-search pr-3"></i> Find New Match
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="card mt-3 p-0">
                    <div class="card-header bg-white">
                        <span class="txt t-light3 psemibold p-2 text-dark"><i class="fa fa-user-o mr-2"></i> You May Like</span>
                    </div>
                    <div class="card-body">
                        <div class="card-columns">
                            <?php
                            $template = new \frontend\models\CardTemplate();
                            $template->limit = 12;
                            $template->randomUser();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 ">
            <?php echo  Alert::widget() ?>
            <?php echo  $content ?>
        </div>
        <!-- ##### Chat Widgets is placed here ###-->

        <div id="ChatBox" class="ChatBar card">
            <h3 class="card-header" style="position: fixed;background-color: white;z-index: 999;width: inherit">
                <i class="la la-comment"></i> Chat
                <a href="javascript:void(0)" class="closebtn" onclick="closeChat()">&times;</a>
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
<script src="<?= Yii::getAlias('@web')?>/js/blocker.js"></script>
<script src="<?= Yii::getAlias('@web')?>/js/custom.js"></script>
</body>


</html>
<?php $this->endPage() ?>
