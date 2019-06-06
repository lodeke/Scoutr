<?php
$this->title = "Account Settings";
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'account-settings-form']); ?>

<div class="row">
    <?php echo  $this->render('_header.php') ;?>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="title">Profile Setting</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <?php echo  $form->field($model, 'match_age_from')
                            ->dropDownList(\common\models\AccountSettings::AgeDropdown()); ?>
                    </div>
                    <div class="col-3">
                        <?php echo  $form->field($model, 'match_age_to')
                            ->dropDownList(\common\models\AccountSettings::AgeDropdown()); ?>
                    </div>
                    <div class="col-6">
                        <?php echo  $form->field($model, 'distance_radius')
                            ->dropDownList(\common\models\AccountSettings::distance())
                        ->label('Result show within this range (kilometers)'); ?>
                    </div>
                    <div class="col-12">
                        <?php echo  $form->field($model, 'show_me')
                            ->radioList(array('others'=>'Both','male'=>'Man','female'=>'Woman'))->label('Show me only') ?>
                    </div>
                    <div class="col-12">
                        <?php echo  $form->field($model, 'hide_age')
                            ->checkbox(['value'=>'1'])->label('Hide My Age') ?>
                    </div>
                    <div class="col-12">
                        <?php echo  $form->field($model, 'hide_photo')
                            ->checkbox(['value'=>'1'])->label('Hide My Photos') ?>
                    </div>
                    <div class="col-12">
                        <?php echo  $form->field($model, 'hide_locality')
                            ->checkbox(['value'=>'1'])->label('Hide My Location') ?>
                    </div>

                    <hr>
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo  Html::submitButton('Save Settings', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                </div>




            </div>

        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
