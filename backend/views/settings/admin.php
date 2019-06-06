<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Admin Settings';
$this->params['breadcrumbs'][] = ['label'=>'Site Settings','url'=>['settings/site']];

$this->params['breadcrumbs'][] = $this->title;?>
<div class="col-md-12">
    <div class="card card-transparent">
        <div class="card-header">
            <h4 class="card-title">Admin Log-on Settings</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-md-3">
                    <?php echo  $this->render('_menu') ?>
                </div>
                <div class="col-7 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <i class="flaticon-user-5"></i> <?php echo  Html::encode($this->title) ?>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


                            <?php echo  $form->field($model, 'username') ?>

                            <?php echo  $form->field($model, 'email') ?>

                            <?php echo  $form->field($model, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <?php echo  Html::submitButton('Change', ['class' => 'btn btn-primary', 'name' => 'admin-settings-button']) ?>

                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




