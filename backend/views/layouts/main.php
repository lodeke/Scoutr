<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\ThemeAssets;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\AdminNotification;
ThemeAssets::register($this);
backend\assets\TopAsset::register($this);
$siteSettings = \common\models\SiteSettings::find()->one();
$admin = \common\models\Admin::find()->one();
$notimodal =  AdminNotification::latest();
$NotificationCount = ($notimodal['count'])?$notimodal['count']:'';;
$NotificationModal = $notimodal['modal'];
$NotificationTrue = ($notimodal['modal'])?true:false;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo  Yii::$app->language ?>">
<head>
    <meta charset="<?php echo  Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php echo  Html::csrfMetaTags() ?>
    <title><?php echo  Html::encode($this->title) ?></title>
    <?php echo  $this->head() ?>

    <script>
        WebFont.load({
            google: {"families":["Montserrat:100,200,300,400,500,600,700,800,900"]},
            custom: {"families":["Flaticon", "LineAwesome"], urls: ['<?php echo  Yii::getAlias('@web') ?>/themes/assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Fonts and icons -->

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <div class="main-header ">
        <!-- Logo Header -->
        <div class="logo-header" >
            <!--
                Tip 1: You can change the background color of the logo header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            -->
            <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>" class="big-logo">
                &nbsp;
            </a>
            <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>" class="logo">
                <img style="max-width: 160px;max-height: 40px" src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/site/logo/'.$siteSettings->logo ?>" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="la la-bars"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">
            <!--
                Tip 1: You can change the background color of the navbar header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            -->
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="la la-navicon"></i>
                    </button>
                </div>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                            <i class="flaticon-search-1"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-alarm"></i>
                            <span class="notification">
                               <?php echo  $NotificationCount; ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title">You have <?php echo  $NotificationCount; ?> new notification</div>
                            </li>
                            <li>
                                <div class="notif-center">
                                    <?php
                                    foreach($NotificationModal as $list)
                                    {
                                        $class = $list['type'];
                                        switch($list['type'])
                                        {
                                            case "ad report found":
                                                $class = "notif-danger";
                                                break;
                                            case "new user registration":
                                                $class = "notif-success";
                                                break;
                                            case "new free ad submitted":
                                                $class = "notif-info";
                                                break;
                                            case "new premium ad submitted":
                                                $class = "notif-info";
                                                break;
                                            case "New Notification":
                                                $class = "notif-info";
                                                break;

                                        }
                                        ?>
                                        <a target="_blank" href="<?php echo  \yii\helpers\Url::toRoute($list['url']); ?>">
                                            <div class="notif-icon <?php echo  $class; ?>"> <i class="<?php echo  $list['icon'] ?>"></i> </div>
                                            <div class="notif-content">
												<span class="block">
													<?php echo  $list['type'] ?>
												</span>
                                                <span class="time">5 min ago</span>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="<?php echo  \yii\helpers\Url::toRoute('notifications/index') ?>">See all notifications<i class="la la-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i style="font-size: 26px;color: #fff;" class="flaticon-customer-support"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <li>
                                <div class="user-box">
                                    <div class="u-text">
                                        <h4>Admin</h4>
                                        <p class="text-muted">
                                            <?php echo  $admin['email'] ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('settings/admin') ?>">
                                    Admin Settings
                                </a>
                                <a class="dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('settings/site') ?>">Site Settings</a>
                                <a class="dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('settings/default') ?>">Default Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo  \yii\helpers\Url::toRoute('contact/index') ?>">Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-method="POST" href="<?php echo  \yii\helpers\Url::toRoute('site/logout') ?>">Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar font-weight-bold" >
        <!--
            Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            Tip 2: you can also add an image using data-image attribute
        -->
        <div class="sidebar-background"></div>
        <div class="sidebar-wrapper scrollbar-inner">
            <div class="sidebar-content">

                <ul class="nav">
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>">
                            <i class="flaticon-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Users</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('user/index') ?>">
                            <i class="flaticon-users"></i>
                            <p>USERS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('user/images') ?>">
                            <i class="flaticon-diagram"></i>
                            <p>IMAGE GALLERY</p>
                        </a>
                    </li>

                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">MODELs</h4>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('settings/adsense') ?>">
                            <i class="flaticon-credit-card-1"></i>
                            <p>Adsense</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('payment/vip-plan') ?>">
                            <i class="flaticon-price-tag"></i>
                            <p>Vip Plan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('currency/index') ?>">
                            <i class="flaticon-coins"></i>
                            <p>currency</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('payment/index') ?>">
                            <i class="flaticon-paypal"></i>
                            <p>Payment Account</p>
                        </a>
                    </li>


                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Localise Settings</h4>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#location">
                            <i class="flaticon-location"></i>
                            <p>Location</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="location">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('location/city') ?>">
                                        <span class="sub-item">Cities</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('location/state') ?>">
                                        <span class="sub-item">States</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('location/country') ?>">
                                        <span class="sub-item">Country</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Common Settings</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('settings/encounter') ?>">
                            <i class="flaticon-like-1"></i>
                            <p>Encounter Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('settings/default') ?>">
                            <i class="flaticon-laptop"></i>
                            <p>Theme Selection</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('gift/index') ?>">
                            <i class="la la-gift"></i>
                            <p>Gift Selection</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('payment/coin') ?>">
                            <i class="la la-money"></i>
                            <p>Coin Price</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#123478S">
                            <i class="flaticon-settings"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="123478S">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('settings/site') ?>">
                                        <span class="sub-item">Logo & Others</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('settings/default') ?>">
                                        <span class="sub-item">Default Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('settings/api') ?>">
                                        <span class="sub-item">Api Keys Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('contact/index') ?>">
                                        <span class="sub-item">Contact Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('settings/faq') ?>">
                                        <span class="sub-item">FAQ</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Others</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('faker/index') ?>">
                            <i class="flaticon-pen"></i>
                            <p>Faker</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('pages/index') ?>">
                            <i class="flaticon-pen"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('statics/index') ?>">
                            <i class="flaticon-analytics"></i>
                            <p>Site Statics</p>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            <?php echo  Alert::widget() ?>
            <div class="container-fluid">
                <div class="page-header">

                    <h4 class="page-title"><?php echo  Html::encode($this->title) ?></h4>

                    <?php echo  Breadcrumbs::widget([
                        'itemTemplate'=>"<li class='nav-home'>{link}</li><li class='separator'><i class='flaticon-right-arrow'></i></li>",
                        'homeLink'=>['label'=>"<i class='flaticon-home'></i>",'url'=>\yii\helpers\Url::toRoute('site/index')],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'encodeLabels' => false,
                    ]) ?>
                </div>
                <div class="row">


                    <?php echo  $content ?>
                </div>
            </div>
        </div>

    </div>
    <div class="quick-sidebar">
        <a href="#" class="close-quick-sidebar">
            <i class="flaticon-cross"></i>
        </a>
        <div class="quick-sidebar-wrapper">
            <ul class="nav nav-tabs nav-line nav-color-primary" role="tablist">
                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
                    <div class="messages-contact">
                        <div class="quick-wrapper">
                            <div class="quick-scroll scrollbar-outer">
                                <div class="quick-content contact-content">
                                    <span class="category-title mt-0">Recent</span>
                                    <div class="contact-list contact-list-recent">
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/jm_denis.jpg" alt="denis">
                                                    <span class="status online"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Jimmy Denis</span>
                                                    <span class="message">How are you ?</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Chad</span>
                                                    <span class="message">Ok, Thanks !</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/mlane.jpg" alt="john doe">
                                                    <span class="status offline"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">John Doe</span>
                                                    <span class="message">Ready for the meeting today with...</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="category-title">Contacts</span>
                                    <div class="contact-list">
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/jm_denis.jpg" alt="denis">
                                                    <span class="status"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Jimmy Denis</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Chad</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/talha.jpg" alt="talha">
                                                    <span class="status offline"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Talha</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="messages-wrapper">
                        <div class="messages-title">
                            <div class="user">
                                <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                <span class="name">Chad</span>
                                <span class="last-active">Active 2h ago</span>
                            </div>
                            <button class="return">
                                <i class="flaticon-left-arrow-3"></i>
                            </button>
                        </div>
                        <div class="messages-body messages-scroll scrollbar-outer">
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">Hello, Rian</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                Hello, Chad
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                When is the deadline of the project we are working on ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                The deadline is about 2 months away
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                Ok, Thanks !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="messages-form">
                            <div class="messages-form-control">
                                <input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
                            </div>
                            <div class="messages-form-tool">
                                <a href="#" class="attachment">
                                    <i class="flaticon-file"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tasks" role="tabpanel">
                    <div class="tasks-wrapper">
                        <div class="tasks-scroll scrollbar-outer">
                            <div class="tasks-content">
                                <span class="category-title mt-0">Today</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                </ul>

                                <span class="category-title">Tomorrow</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!				</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="mt-3">
                                    <div class="btn btn-primary btn-rounded btn-sm">
											<span class="btn-label">
												<i class="la la-plus"></i>
											</span>
                                        Add Task
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel">
                    <div class="quick-wrapper settings-wrapper">
                        <div class="quick-scroll scrollbar-outer">
                            <div class="quick-content settings-content">

                                <span class="category-title mt-0">General Settings</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Enable Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Signin with social media</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Backup storage</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">SMS Alert</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>

                                <span class="category-title mt-0">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Email Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Comments</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Chat Messages</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Project Updates </span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Tasks</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Custom template -->

</div>


<?php
//var_dump(Yii::$app->controller);
$current = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
$restrict = ['faker/index','faker/users','faker/user-create','faker/ads','faker/ads-create','footer/footer-content','footer/index','site/index','payment/ads','settings/default','user/detail','user/images','contact/index','settings/faq','settings/api','display/home-page','widgets/edit','widgets/index','notifications/index','reports/index'];
if(in_array($current,$restrict))
{

    ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/js/core/jquery.3.2.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/js/core/bootstrap.min.js"></script>
    <?php

}


?>
<?php $this->endBody() ?>




</body>
</html>
<?php $this->endPage() ?>
