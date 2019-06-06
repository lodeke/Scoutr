<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\PeopleAsset;
use common\widgets\Alert;
use \yii\helpers\Url;
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
<body class="">
<div class="overlay_result" align="center">
    <div class="text-danger contents"  align="center">
        <i class="la la-spinner la-spin la-500px"></i>
        <h1 class="text-danger txt pthin">
            Searching Best Match...
        </h1>
    </div>
</div>
<?php $this->beginBody() ?>
<div class="d-lg-none  d-md-none d-block">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="navbar-brand">
            <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="text-danger nav-link p-2" style="font-weight: 500;font-size: 16px;">
                <img style="padding: <?php echo  $siteSettings['logo_padding'] ?>;width: <?php echo  $siteSettings['logo_width'] ?>;height: <?php echo  $siteSettings['logo_height'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="col-12">
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
                                <img src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  Yii::$app->user->identity->images ?>" class="img-fluid rounded">
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


                            <div class="col-6 border-right" align="center">
                                <h5 class="h6"> Your Match</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="fa fa-heart-o text-danger pr-1"></i>
                                    <?php echo  count(\common\models\EloRecords::myMatch())?>
                                </h6>

                            </div>
                            <div class="col-6" align="center">
                                <h5 class="h6">  Like Score</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="fa fa-battery-1 text-danger pr-1"></i>
                                    <?php echo  \common\models\EloRecords::likeScore() ?>%
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item border-bottom">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="text-danger nav-link p-2" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-user"></i> &nbsp; Profile
                    </a>
                </li>
                <li class="nav-item border-bottom">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-gear"></i> &nbsp; Settings
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/notification') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-bell"></i> &nbsp; Notification <?php echo  \common\models\UserFeeds::newRequest(); ?>
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/nearby') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-map-marker"></i>  &nbsp;People Nearby
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/like-by') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-question"></i>  &nbsp;Who Like Me ?
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/liked-me') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-thumbs-o-up"></i>  &nbsp;My Likes
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-search"></i>  &nbsp; People Search</a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/match') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-heart-o"></i>  &nbsp; Match
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/chats') ?>" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-comment"></i> &nbsp; Chat / Messages
                    </a>
                </li>
                <li class="nav-item border-bottom">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('site/logout') ?>" data-method="POST" class="text-danger nav-link" style="font-weight: 500;font-size: 16px;">
                        <i class="la la-power-off"></i> &nbsp; LogOut
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</div>
<!--Mobile Menu-->

<div class="container-fluid pr-0 pl-0 d-none d-lg-block d-md-block">

    <!-- ############################  Adsense display here ############################ -->
    <div align="center">
        <?php \common\models\Adsense::show('top'); ?>
    </div>
    <!-- ############################  Adsense display here ############################ -->

    <div class="d-flex flex-column flex-md-row align-items-center  px-md-4 bg-white ">
        <div class="container ">
            <div class="row">
                <div class="mr-md-auto font-weight-normal">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>">
                        <img style="padding: <?php echo  $siteSettings['logo_padding'] ?>;width: <?php echo  $siteSettings['logo_width'] ?>;height: <?php echo  $siteSettings['logo_height'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
                    </a>
                </div>
                <nav class="my-md-0 mr-md-3 align-self-center">
                    <a style="font-size: 12px;font-weight: 600; margin-bottom: 0" href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn-sm btn-success btn">
                        <i class="la la-rocket"></i> &nbsp; Upgrade Now
                    </a>
                    <a style="font-size: 16px;font-weight: 600" href="<?php echo  \yii\helpers\Url::toRoute('people/notification') ?>" class="p-2">
                       <i class="fa fa-bell-o"></i> <?php echo  \common\models\UserFeeds::newRequest(); ?>
                    </a>
                    |
                    <div class="chip">
                        <i class="flaticon-star"></i>
                       <span>
                           <span id="CountryCip745"><strong>Your Coin : <?php echo  \common\models\Point::getPoint(); ?> </strong></span>
                       </span>
                    </div>
                    |
                    <a style="font-size: 16px;font-weight: 600" href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="p-2 text-primary">
                        <?php echo  Yii::$app->user->identity->first_name; ?>&nbsp;
                        <img src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  Yii::$app->user->identity->images ?>" class="circle">
                    </a>


                </nav>
            </div>
        </div>
    </div>
<!--    For border bottom and radius use css : border-bottom, box-shadow-->
    <div class="navbar navbar-expand-sm bg-dark navbar-dark  bg_sub_head">
        <div class="container">
           <div class="row">

               <nav class="my-2 my-md-0 mr-md-3 bg_sub_head_row">
                   <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="p-2">
                       <i class="flaticon-like-1"></i> &nbsp; Encounter
                   </a>
                   <a href="<?php echo  \yii\helpers\Url::toRoute('people/nearby') ?>" class="p-2">
                       <i class="la la-user-times"></i>  &nbsp;People Nearby
                   </a>
                   <a href="<?php echo  \yii\helpers\Url::toRoute('people/search') ?>" class="p-2">
                       <i class="la la-user-plus"></i>  &nbsp; People Search
                   </a>
                   <a href="<?php echo  \yii\helpers\Url::toRoute('people/match') ?>" class="p-2">
                       <i class="la la-heart-o"></i>  &nbsp; Match
                   </a>

               </nav>
               <a style="margin-top: 0px;" class="btn d-none btn-success mt-0 pull-left" href="#">Upgrade up</a>

           </div>
        </div>

    </div>

</div>
<div class="container" id="main">

    <?php echo  Alert::widget() ?>
    <div class="row justify-content-center">
        <div  class="col-lg-3 col-md-3 d-none d-lg-block d-md-block p-0">
            <div class="mt-3 yoko-side">
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
                                <img src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  Yii::$app->user->identity->images ?>" class="img-fluid rounded">
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


                            <div class="col-6 border-right" align="center">
                                <h5 class="h6"> Your Match</h5>
                                <h6 class="h6 txt t-light2">
                                    <i class="fa fa-heart-o text-danger pr-1"></i>
                                    <?php echo  count(\common\models\EloRecords::myMatch())?>
                                </h6>

                            </div>
                            <div class="col-6" align="center">
                                <h5 class="h6">  Like Score</h5>
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
                    Buy Coin : <?php echo  \common\models\Point::getPoint(); ?> <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="mt-3">
                    <ul class="list-unstyled main_menu_nav">
                        <li>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="h6">
                                <i class="fa fa-user-o pr-3"></i> Profile
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

                <div class=" mt-3 p-0" style="max-width: 250px;overflow: hidden" align="center">
                    <?php \common\models\Adsense::show('left'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php echo  $content ?>

            <div class="row d-none d-lg-block d-md-block d-sm-none d-xs-none" align="center">
                <!-- ############################  Adsense display here ############################ -->
                <?php \common\models\Adsense::show('bottom'); ?>
                <!-- ############################  Adsense display here ############################ -->
            </div>
        </div>

    </div>


</div>
<?php $this->endBody() ?>
</body>
<script src="<?php echo  Yii::getAlias('@web')?>/js/blocker.js"></script>
<script src="<?php echo  Yii::getAlias('@web')?>/js/custom.js"></script>
</html>
<?php $this->endPage() ?>
