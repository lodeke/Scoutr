<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Edit Premium Plan price';

$uid = Yii::$app->user->id;
$usrInfo = \common\models\User::findOne($uid);
$this->params['breadcrumbs'][] = ['label'=>'Premium Plan','url'=>['payment/vip-plan']];

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-md-6 ml-auto mr-auto">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    <i class="flaticon-coins"></i> <?php echo  Html::encode($this->title) ?>
                </h4>
            </div>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([

                'options' => ['enctype' => 'multipart/form-data']
            ]) ?>

            <?php echo  $form->field($new, 'name')->label("Name Of Plan") ?>
            <?php echo  $form->field($new, 'duration')->dropDownList(array(
                '1'=>'1 month',
                '2'=>'2 month',
                '3'=>'3 month',
                '6'=>'6 month',
                '8'=>'8 month',
                '10'=>'10 month',
                '12'=>'12 month',
            ))->label("ad active duration in month") ?>
            <?php echo  $form->field($new, 'currency')->hint("currency should be in sort code eg. USD, INR, YMR, KWD") ?>
            <?php echo  $form->field($new, 'price')->label("Price of your premium plan") ?>

            <?php echo  $form->field($new, 'features')->hint('classified benefit which is your provide separated by (,)') ?>
            <br>
            <div class="clearfix"></div>

            <div align="center">
                <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-success', 'name' => 'ads-button']) ?>

            </div>

            <div class="clearfix"></div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>




