<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$logo= \common\models\SiteSettings::find()->one();
 //$background = \common\models\DefaultSetting::find()->select(['background'])->one();
//themes/assets/img/
?>

<div class="container container-login animated fadeIn" style="display: block;">
    <h3 class="text-center"><?php echo  $logo['site_name']; ?> Admin</h3>

    <div class="">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?php echo $form->field($model, 'username', [
            'template' => '<div class=" form-floating-label">
                                {label} {input}{error}{hint}
                                </div>'
        ])->textInput(['placeholder'=>'ADMIN USERNAME','class'=>'form-control input-border-bottom'])
        ?>

        <?php echo $form->field($model, 'password', [
            'template' => '<div class="form-floating-label">
                                {label} {input}{error}{hint}
                                </div>'
        ])->passwordInput(['placeholder'=>'ADMIN PASSWORD','class'=>'form-control input-border-bottom'])
        ?>
        <div class="row form-sub m-0">
            <div class="col col-md-6">
                <?php echo  $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col col-md-6">
                <?php echo  Html::submitButton('Login', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>




        <div class="login-account">
            <span class="msg">
                Warning! Please do not share your Admin Password from anyone.
            </span>
        </div>
    </div>
</div>

