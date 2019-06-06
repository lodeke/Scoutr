<?php
$this->title = "Edit City";
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="card">
    <div class="row" style="padding-top:100px;padding-bottom:150px;">
        <div class="col-lg-8 col-lg-push-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>
                        <i class="fa fa-pencil"></i> Edit City
                    </strong>
                </div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['id' => 'City-form']); ?>


                        <?php echo  $form->field($cat, 'name')->label('City name') ?>
                        <div class="form-group">
                            <a class="btn btn-info" href="<?php echo  \yii\helpers\Url::toRoute('location/city'); ?>">
                                Back
                            </a>
                            <?php echo  Html::submitButton('save', ['class' => 'btn btn-warning', 'name' => 'city-button']) ?>
                        </div>


                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
    </div>
</div>
