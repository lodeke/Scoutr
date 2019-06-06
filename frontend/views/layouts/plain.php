<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\SocialAsset;
use common\widgets\Alert;

\frontend\assets\PeopleAsset::register($this);
$siteSettings = \common\models\SiteSettings::find()->one();
define("SITE_NAME",$siteSettings['site_name']);
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
<body class="text-center">
<?php $this->beginBody() ?>


<?php
if(Alert::widget())
{
    echo Alert::widget();
}
else
{
    false;
}?>
<?php echo  $content ?>
<div class="modal fade show" id="DoLogin" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 10%">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <div class="modal-body">

                <h2 class="p-3 text-black-50">
                    Login Required
                </h2>

                <p class="p-2">
                You have to do Login / Signup for perform this action
                </p>
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/login') ?>" class="btn btn-sm btn-danger"> <i class="la la-angle-double-right"></i> Login </a>
                <span> - OR - </span>
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/signup') ?>" class="btn btn-sm btn-success text-white "> <i class="la la-angle-double-right"></i> SignUp  </a>

            </div>

        </div>
    </div>
    <!--            model add row closed-->
</div>

<?php $this->endBody() ?>
</body>


<script src="<?php echo  Yii::getAlias('@web')?>/js/blocker.js"></script>
<script src="<?php echo  Yii::getAlias('@web')?>/js/custom.js"></script>
</html>
<?php $this->endPage() ?>
