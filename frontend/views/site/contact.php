<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="ui-block">
            <h3 class="ui-block-title"><?php echo  Html::encode($this->title) ?></h3>
            <div class="ui-block-content">
                <small align="center">
                    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
                </small>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?php echo  $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?php echo  $form->field($model, 'email') ?>

                <?php echo  $form->field($model, 'subject') ?>

                <?php echo  $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?php echo  $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>



    </div>
</div>
