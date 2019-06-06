<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$user = \common\models\User::find()->one();

$model = new \common\models\LoginForm();
?>
<div class="container-fluid p-0 bg-danger" style="height: 100%;position: fixed">
    <div class="row no-gutters justify-content-center">
        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 align-self-center p-3">
            <div style="min-height: 640px;">
                <div class="col-12" align="center">
                    <br>
                    <img class="d-none" width="<?php echo  $siteSettings['logo_width'] ?>"  height="<?php echo  $siteSettings['logo_height'] ?>" style="filter: invert;;padding: <?php echo  $siteSettings['logo_padding'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
                    <h1 class="text-white" style="font-weight: 900">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>" class="text-white" style="font-weight: 900">
                            <?php echo  $siteSettings['site_name'] ?>
                        </a>
                    </h1>
                    <h6 class="text-white" style="font-weight: 900">
                        JOIN <?php echo  $siteSettings['site_name'] ?> NOW FOR CONNECT PEOPLE
                    </h6>
                    <br>
                </div>
                <div class="card" align="left">
                    <div class="card-body">

                        <p class="text-danger">
                            <b>
                                Please fill out the following fields to login:
                            </b>
                        </p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?php echo  $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?php echo  $form->field($model, 'password')->passwordInput() ?>

                        <?php echo  $form->field($model, 'rememberMe')->checkbox() ?>

                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?php echo  Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        <div class="form-group">
                            <?php echo  Html::submitButton('Login Now', ['class' => 'btn btn-success btn-md', 'name' => 'login-button']) ?>
                            <?php echo  Html::a('Create New Account',\yii\helpers\Url::toRoute('site/signup'), ['class' => 'btn btn-warning btn-md text-white']) ?>

                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-12" align="center">
                    <h1 class="text-white"  style="font-weight: 900">
                        <span id="onlineUser" range="12">1200</span> USER REGISTERED
                    </h1>

                </div>
            </div>

        </div>

        <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 align-self-start justify-content-center">
            <div class="row ">
                <div class="col-8 p-3" align="left">
                    <h1 class="text-white d-none"> Meets New People In <?php echo  $currentCity ?></h1>
                    <h1 class="text-white"> <?php echo  \common\models\User::welcomeMembers($currentCity) ?> </h1>
                </div>
                <div class="col-4 p-3 pr-4" align="right">
                    <button class="btn btn-lg bg-white text-danger" data-toggle="modal" data-target="#welcomeModel">
                        SEARCH <i class="la la-search"></i>
                    </button>
                </div>
            </div>
            <div class="row no-gutters ">
                <?php
                $template = new \frontend\models\CardTemplate();
                $template->model  = \common\models\User::find()->limit('12')->all();;
                $template->ProfileUrl = false;
                $template->temp = "preview";
                $template->user();
                ?>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">


    setInterval(function update()
    {
        var current = $('#onlineUser').text();
        var rand = Math.floor((Math.random()*10)+1);
        var newData = (+current + +rand);
        current = $('#onlineUser').text(newData);

    },3000);
</script>