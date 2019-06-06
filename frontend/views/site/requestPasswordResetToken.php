<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
    <div class=" site-request-password-reset">
        <h3 class="ui-block-title"><?php echo  Html::encode($this->title) ?></h3>
        <div class="ui-block-content">
            <p>Please fill out your email. A link to reset password will be sent there.</p>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <h5 class="p-2">Your Current Email :</h5>
            <?php echo  $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Your Email'])->label(false) ?>

            <div class="form-group">
                <?php echo  Html::submitButton('Send', ['class' => 'btn btn-primary btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

