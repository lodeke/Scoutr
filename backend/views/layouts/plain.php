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

<body class="login">
<?php $this->beginBody() ?>

<div class="wrapper wrapper-login">
    <?php echo  Alert::widget() ?>
    <?php echo  $content ?>

</div>




<?php $this->endBody() ?>

<!-- jQuery 2.1.4 -->
<script src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/js/core/jquery.3.2.1.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo  Yii::getAlias('@web') ?>/themes/assets/js/core/bootstrap.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>
