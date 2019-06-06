<?php
$this->title = "Pricing plan";
$siteSettings = \common\models\SiteSettings::find()->one();

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="img-responsive mt-5" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
        </div>
        <div class="col-12 mb-3">
            <h1 class="p-3 text-primary">
                Buy More Coin?
            </h1>
            <p class="p-2">
                hey, Want to buy more coin for more fun. please tell us how many coin you need
            </p>
        </div>

        <div class="col-12" align="center">
            <div class="checkCorrectCoin">
            </div>
            <h1 class="p-3">
                I Want to Buy <span class="chngCoin">10</span> Coin
            </h1>
            <input id="coinFrmInpt" data-multiple="<?php echo  $plan['price']?>" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" required="true" type="number" step="10" max="<?php echo  $plan['max_purchase']?>" placeholder="Hey how Many Coin You Want" max="<?php echo  $plan['min_purchase']?>">
            <h4 class="p-3">
                Worth <?php echo  $plan['currency']?> <span class="chngprice"><?php echo  $plan['price']?></span>/-
            </h4>
        </div>

        <div class="col-12 p-2 mb-5">

            <p class="p-2 mb-3">
                Shall We Go for Premium Membership?
            </p>
            <?php $form = ActiveForm::begin(['id' => 'form-vip']); ?>
            <?php echo  $form->field($model, 'type')->hiddenInput(['id'=>'payment_type','value'=>'coin'])->label(false) ?>
            <?php echo  $form->field($model, 'coin')->hiddenInput(['id'=>'number_of_coin','value'=>''])->label(false) ?>
            <?php echo  $form->field($model, 'price')->hiddenInput(['id'=>'total_price','value'=>''])->label(false) ?>
            <?php echo  $form->field($model, 'currency')->hiddenInput(['value'=>$plan['currency']])->label(false) ?>

            <button type="submit" class="btn bg-green btn-lg" disabled id="do-payment">
                Enter Correct Amount <i class="la la-ban"></i>
            </button>
            <?php ActiveForm::end(); ?>
            <a href="<?php echo  \yii\helpers\Url::toRoute('site/index')?>" class="text-small text-secondary">
                Skip for now. Back to homepage
            </a>
        </div>
        <div>


        </div>
    </div>
</div>




