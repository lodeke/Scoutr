<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-8 ml-auto mr-auto">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    <i class="flaticon-customer-support"></i> <?php echo  Html::encode($this->title) ?>
                </h4>


            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


            <?php echo  $form->field($model, 'address')->label('Head office address') ?>

            <?php echo  $form->field($model, 'phone')->label('Official Contact Number') ?>

            <?php echo  $form->field($model, 'email')->label('Official Email Id') ?>

            <?php echo  $form->field($model, 'about')->textarea()->label('who are we') ?>
            <?php echo  $form->field($model, 'facebook_profile')->textarea(); ?>
            <?php echo  $form->field($model, 'twitter_profile')->textarea(); ?>
            <?php echo  $form->field($model, 'linkedin_profile')->textarea(); ?>
            <?php echo  $form->field($model, 'instagram_profile')->textarea(); ?>
            <?php echo  $form->field($model, 'pinterest_profile')->textarea(); ?>
            <?php echo  $form->field($model, 'youtube_profile')->textarea(); ?>


            <div class="form-group">
                <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'site-settings-button']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>