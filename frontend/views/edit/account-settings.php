<?php
$this->title = "Account Settings";
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'account-settings-form']); ?>

<div class="row">
    <?php echo  $this->render('_header.php') ;?>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h6 class="title">Account Settings</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <?php echo  $form->field($model, "email")->textInput(['autofocus' => true]) ?>
                    </div>

                    <div class="col-12">
                        <?php echo  $form->field($model, 'username')->textInput() ?>
                    </div>
                    <div class="col-12">
                        <?php echo  $form->field($model, 'change_password')->passwordInput() ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?php echo  Html::submitButton('Save Settings', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>


            </div>
        </div>


    </div>


</div>

<?php ActiveForm::end(); ?>
