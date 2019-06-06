<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-8 ml-auto mr-auto">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <h4 class="card-title">
                    <i class="flaticon-settings"></i> You have <?php echo  count($modal); ?> new notification

                </h4>

                <div class="card-tools">
                    <ul class="nav nav-pills nav-success nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo  ("unread" != $active)?'':'active'; ?>" id="pills-home" href="?sort=unread"  >
                                New
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  ("all" != $active)?'':'active'; ?>" id="pills-profile" href="?sort=all" >
                                all
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="notif-box animated list" style="width: auto">

                <div>
                    <div class="notif-center">
                        <?php
                        foreach($modal as $list)
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
                                    <span class="time"><?php echo  $list['message'] ?></span>
                                </div>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


