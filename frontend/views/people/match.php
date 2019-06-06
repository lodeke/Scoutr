<?php
$this->title = "Mijn Scoutr's";
use common\models\Message;
?>
<div class="row">

    <div class="col-12">
        <br>
        <h2 class="text-danger pregular d-lg-block d-sm-none d-none">
            <i class="la la-user-plus"></i> <?php echo  $this->title; ?> - Scoutr's die jou ook leuk vinden!
            <span style="font-size:30px;cursor:pointer;float: right" >&#9776;</span>

        </h2>
        <h2 class="text-danger pregular d-lg-none">
            <i class="la la-user-plus"></i>
            <?php echo  $this->title; ?>
            <span style="font-size:30px;cursor:pointer;float: right" >&#9776;</span>

        </h2>
        <p class="txt t-light4 pregular">Klik op het onderstaande element om de zoekbalk aan de zijkant te openen</p>


    </div>
    <div class="col-12">
        <div class="card-columns" id="result_container">
            <?php
            $template = new \frontend\models\CardTemplate();
            $template->model = $model;
            $template->isMatch = true;;
            //$template->temp = "four";
            $template->user();
            ?>
        </div>
    </div>
    <div class="col-12 mt-3 " align="center">
        <?php \common\models\Adsense::show('top'); ?>
    </div>
    <div class="col-12  mt-4">
        <h4 class="txt t-light3 pregular position-sticky pt-3 pb-3" style="top: 0;z-index: 1;">
           Stel mensen voor
        </h4>
        <div class="card-columns mt-3" id="result_container">
            <?php
            $suggetion = \common\models\User::find()->limit(10)->all();
            $template = new \frontend\models\CardTemplate();
            $template->model = $suggetion;
            $template->isMatch = true;;
            $template->user();
            ?>
        </div>
    </div>
</div>
<?php
echo Yii::$app->controller->renderPartial('_gift', [
    'model' => $model
]);
?>