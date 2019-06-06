<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\PeopleAsset;
use common\widgets\Alert;
use \yii\helpers\Url;

PeopleAsset::register($this);
$siteSettings = \common\models\SiteSettings::find()->one();
\common\models\Track::track();
$pages = \common\models\Pages::find()->select(['id','title'])->where(['status'=>'enable'])->all();
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
<body>
<?php $this->beginBody() ?>
<?php echo  Alert::widget() ?>
<div class="container">
    <div class="col-12">
        <?php echo  Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-12" align="center">
            <a href="<?php echo  Url::toRoute('site/index') ?>">
                <img class="img-responsive mt-3" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
            </a>
            <h3>
                <?php echo  $siteSettings['site_title'] ?>
            </h3>
        </div>

        <?php echo  $content ?>
    </div>
</div>

<footer class="justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 pb-5" align="center">
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>">
                    <img width="250px;" class="img-responsive mt-3" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
                </a>
                <h5>
                    <?php echo  $siteSettings['site_title']; ?>
                </h5>
            </div>
            <div class="col-12" align="center">
                <ul class="list-inline">
                    <?php
                    foreach($pages as $list)
                    {
                        $title = $list['title'];
                        $pageId = base64_encode($list['id']);

                        ?>
                        <li class="list-inline-item mr-2">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('pages/'.$pageId.'-'.trim($title)) ?>" class="p-2">
                                <?php echo  $title; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="list-inline-item mr-2">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/contact') ?>" class="p-2">
                            Contact Us
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-12 mt-5" align="center">
                <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/assets/group-bottom.png" width="50%" alt="notebook">
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo  Yii::getAlias('@web')?>/js/blocker.js"></script>
<script src="<?php echo  Yii::getAlias('@web')?>/js/custom.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
