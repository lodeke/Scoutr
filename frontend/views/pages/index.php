<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $model['title'];
?>
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12" align="center">
        <h2 class="p-3 border-bottom">
            <?php echo  $model['title'] ?>
        </h2>
        <p>
            <?php echo  $model['content'] ?>
        </p>

    </div>
    <div class="col-12 page-content col-thin-left">
        <?php echo  \common\models\Adsense::show('left') ?>

    </div>
</div>
