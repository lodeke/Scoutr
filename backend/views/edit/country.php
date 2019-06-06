<?php
$this->title = "Edit Country";
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="card">
    <div class="row" style="padding-top:100px;padding-bottom:150px;">
        <div class="col-lg-8 col-lg-push-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>
                        <i class="fa fa-pencil"></i> Edit Country
                    </strong>
                </div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?php echo  $form->field($cat, 'sortname') ?>

                    <?php echo  $form->field($cat, 'name')->label('Country name') ?>

                    <?php echo  $form->field($cat, 'phonecode') ?>


                    <div class="form-group">
                        <a class="btn btn-info" href="<?php echo  \yii\helpers\Url::toRoute('location/country'); ?>">
                            Back
                        </a>
                        <?php echo  Html::submitButton('save', ['class' => 'btn btn-warning', 'name' => 'country-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
    </div>
</div>
