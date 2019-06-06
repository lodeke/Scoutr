<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Maak een account aan!';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 bg-smoke p-2 mt-3 align-content-center">
    <div class="ui-block">
        <div class="ui-block-content mt-3">
            <h5 class="text-danger" align="center"> <?php echo  Html::encode($this->title) ?></h5>

            <p align="center">Vul de volgende velden in om aan te melden:</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?php echo  $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?php echo  $form->field($model, 'email') ?>

            <?php echo  $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?php echo  Html::submitButton('MAAK ACCOUNT AAN', ['class' => 'btn bg-green', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>