<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Coin Price And other settings';

$uid = Yii::$app->user->id;
$usrInfo = \common\models\User::findOne($uid);
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <strong>Casanova Coin Settings</strong>
        </div>
        <div class="card-body" align="left">
            <?php $form = ActiveForm::begin(['id' => 'coin-form']); ?>

            <?php echo  $form->field($all, 'price')->hint('Price of one coin') ?>

            <?php echo  $form->field($all, 'currency')->hint('sort name of currency'); ?>
            <?php echo  $form->field($all, 'max_purchase')->hint('force user to buy a fix minimum account of coin'); ?>
            <?php echo  $form->field($all, 'min_purchase')->hint('force user to buy a fix maximum account of coin'); ?>


            <div class="form-group">
                <?php echo  Html::submitButton('UPDATE', ['class' => 'btn btn-primary', 'name' => 'analytic-button']) ?>
                <a href="<?php echo  \yii\helpers\Url::toRoute('payment/index') ?>" class="btn btn-info">Back</a>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <strong>Casanova Coin</strong>
        </div>
        <div class="card-body p-3" align="center">
            <p style="font-size:55px" class="mt-3 mb-2">
                <i class="flaticon-coins"></i>
            </p>
            <h1 style="font-size: 25px" class="card-title p-2 text-primary">Coin price : <?php echo  $all['currency'] ?> <?php echo  $all['price'] ?>/-</h1>
            <h6 style="font-weight: 100" class="card-subtitle p-2 text-mute">This is price of one coin eg. 1 coin = <?php echo  $all['currency'] ?> <?php echo  $all['price'] ?></h6>
            <p class="card-text p-2">
                Max :  <?php echo  $all['max_purchase'] ?> coin in one one order <br>
                Min : <?php echo  $all['min_purchase'] ?> coin in one one order
            </p>
            <p class="card-text p-2">

            </p>
        </div>
    </div>
</div>


