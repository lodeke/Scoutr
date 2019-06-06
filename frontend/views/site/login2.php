<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$Banner = Yii::getAlias('@web').'/images/site/banner/slide_four.jpg';

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .masthead {
        height: 100vh;
        min-height: 500px;
        background-image: url('<?php echo  $Banner; ?>');
        background-color: rgba(19, 8, 13, 0.96) !important;

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: inset 0px 0px  560px #000;
    }
</style>
<!-- Navigation -->

<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-right">
                <div class="col-lg-5 float-right" align="left">
                    <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>" class="btn btn-lg btn-primary text-white">
                         <i class="la la-angle-double-left"></i> back to home
                    </a>
                    <h1 class="mt-5 text-white" style="text-transform: uppercase;font-weight: 900;font-size: 45px;text-shadow: 1px 1px 13px #dd5123">
                        Login
                    </h1>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?php echo  $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                    <?php echo  $form->field($model, 'password')->passwordInput() ?>

                    <?php echo  $form->field($model, 'rememberMe')->checkbox() ?>

                    <div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?php echo  Html::a('reset it', ['site/request-password-reset']) ?>.
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary text-white" name="login-button">
                           Let's Go <i class="la la-angle-double-right"></i>
                        </button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</header>
