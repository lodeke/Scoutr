<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <div class="ui-block">
        <h3 class="ui-block-title"><?php echo  Html::encode($this->title) ?></h3>
        <div class="ui-block-content">
            <p>Kies uw nieuwe wachtwoord:</p>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?php echo  $form->field($model, 'password')->passwordInput(['autofocus' => true,'class'=>'form-control-lg']) ?>

            <div class="form-group">
                <?php echo  Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

