<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Encounter Settings';
$this->params['breadcrumbs'][] = ['label'=>'Site Settings','url'=>['settings/site']];

$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-check, .form-group {

        margin-bottom: 0;
        padding: 0px 5px !important;

    }
</style>
<div class="col-md-12">
    <div class="card card-transparent">
        <div class="card-header">
            <h4 class="card-title">Api Settings</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-md-3">
                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" >
                        <?php echo  $this->render('_menu') ?>
                    </div>
                </div>
                <div class="col-7 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="la la-heart"></i> Encounter Settings
                            </div>

                        </div>
                        <div class="card-body">
                            <?php  $form = ActiveForm::begin([
                                'options' => ['id' => 'edit_encounter_form']
                            ]);
                            echo  $form->field($modal, 'max_match');
                            echo   $form->field($modal, 'accept_button')->dropDownList(array(
                                'hot'=>'Hot',
                                'like'=>'Like',
                                'kiss'=>'Kiss',
                                'yes'=>'Yes',

                            ))->label('Like Overlay Style');
                            echo   $form->field($modal, 'denied_button')->dropDownList(array(
                                'not'=>'Not',
                                'dislike'=>'Dislike',
                                'miss'=>'Miss',
                                'no'=>'No',

                            ))->label('Ignore Overlay Style');

                            echo   $form->field($modal, 'tag_line');


                            ?>



                        </div>
                        <div class="card-footer no-bd">
                            <?php echo Html::submitButton('UPDATE', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
                            <?php echo Html::resetButton('RESET', ['class' => 'btn btn-default']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
