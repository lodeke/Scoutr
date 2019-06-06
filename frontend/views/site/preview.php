<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$user = \common\models\User::find()->one();
$siteSettings = \common\models\SiteSettings::find()->one();
$defaultSettings = \common\models\DefaultSetting::find()->one();
$model = new \common\models\LoginForm();
?>
<div class="container-fluid p-0 ">
    <div class="row no-gutters justify-content-center">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 align-self-start p-3">
            <div style="min-height: 100%;position: fixed;width: 31%;" class="">
                <div class="col-12 " align="center">
                    <br>
                    <img class="d-none" width="<?php echo  $siteSettings['logo_width'] ?>"  height="<?php echo  $siteSettings['logo_height'] ?>" style="filter: invert;;padding: <?php echo  $siteSettings['logo_padding'] ?>;margin: <?php echo  $siteSettings['logo_margin'] ?>" src="<?php echo  Yii::getAlias('@web') ?>/images/site/logo/<?php echo  $siteSettings['logo'] ?>">
                    <h1 >
                       <a href="<?php echo  Url::toRoute('site/index') ?>" class="text-danger" style="font-weight: 900">
                           <?php echo  $siteSettings['site_name'] ?>
                       </a>
                    </h1>
                    <h6 class="text-secondary" style="font-weight: 900">
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
                            <?php echo  Html::submitButton('Login Now', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            <?php echo  Html::a('Create New Account',\yii\helpers\Url::toRoute('site/signup'), ['class' => 'btn bg-green p-2']) ?>

                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-12" align="center">
                    <h1 class="text-secondary"  style="font-weight: 900">
                        <span id="onlineUser" range="12">1200</span> USER REGISTERED
                    </h1>

                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 align-self-start justify-content-center">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mt-2">
                        <div class="card-header bg-white">
                            <h5 class="card-title text-redis ">
                                <?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>, <span class="text-dark"><?php echo  $list['age']; ?></span>
                            </h5>
                        </div>
                        <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="card-img-top">
                        <div class="card-img-overlay">
                            <div class="p-2">

                                <div align="center" style="position: relative;top: 150px;" >
                                    <h3 class="text-danger text-capitalize h6 shadow-text">
                                        DO you Like?
                                    </h3>
                                    <h3 class="text-white text-capitalize h6 mt-1 mb-4 shadow-text">
                                        <?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>
                                    </h3>
                                    <div class="d-table">
                                        <div class="d-table-cell">
                                            <button  data-toggle="modal" data-target="#DoLogin" class=" btn rounded-circle btn-danger  ml-2" style="width:40px;height: 40px">
                                                <span id="iLikeIt_icon_<?php echo  $list['id']; ?>"><i class="fa fa-heart-o "></i></span>
                                            </button>
                                        </div>
                                        <div class="d-table-cell">
                                            <button  data-toggle="modal" data-target="#DoLogin" class="btn rounded-circle btn-info  ml-3 mr-3" style="width:40px;height: 40px">
                                                <i class="flaticon-chat"></i>
                                            </button>
                                        </div>
                                        <div class="d-table-cell">
                                            <button  data-toggle="modal" data-target="#DoLogin" style="width:40px;height: 40px"  class="btn rounded-circle btn-success  mr-2">
                                                <i class="fa fa-gift"></i>
                                            </button>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="txt t-light2 text-capitalize ">location</h6>
                            <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['city']; ?>, <?php echo  $list['country']; ?></h5>

                            <h6 class="txt t-light2 text-capitalize  mt-3">Looking for</h6>
                            <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['looking_for'] ?></h5>

                            <h6 class="txt t-light2 text-capitalize  mt-3">i am </h6>
                            <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['sexual_orientation'] ?></h5>

                            <h6 class="txt t-light2 text-capitalize  mt-3">marital status </h6>
                            <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['marital_status'] ?></h5>

                            <h6 class="txt t-light2 text-capitalize  mt-3">Language</h6>
                            <h5 class="txt h6 t-light5 text-capitalize pthin">English</h5>

                        </div>

                    </div>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-warning btn-block mt-3">
                        Become Vip Member
                    </a>
                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-primary btn-block mt-3">
                        Buy Coin
                    </a>
                </div>
                <div class="col-lg-8">
                    <h4 class="txt mt-2 t-light4 font-weight-bold pl-2">More Info</h4>
                    <hr>
                    <div class="d-table pl-2" style="width: 100%">
                        <div class="d-table-row">
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">children</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($list['children'])?$list['children']:'not give'; ; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize">religion</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($list['religion'])?$list['religion']:'not give';; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">languages</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($list['languages'])?$list['languages']:'not give'; ; ?></h5>
                            </div>
                        </div>

                        <div class="d-table-row">
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['smoker']; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">drinking</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['drinking']; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $list['smoker']; ?></h5>
                            </div>
                        </div>

                        <div class="d-table-row">
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">height</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($list['height'])?$list['height']:'not give';  ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">weight</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($list['weight_kg'])?$list['weight_kg']:'not give'; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">build</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $list['build']; ?></h5>
                            </div>
                        </div>

                        <div class="d-table-row">
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">hair color</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($list['hair_color'])?$list['hair_color']:'not give'; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">eye color</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $list['eye_color']; ?></h5>
                            </div>
                            <div class="d-table-cell">
                                <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                                <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $list['smoker']; ?></h5>
                            </div>

                        </div>
                    </div> <!--//personal info -->
                    <h4 class="txt mt-3 t-light4 font-weight-bold pl-2">Album</h4>
                    <hr>

                    <?php
                    $template = new \frontend\models\CardTemplate();
                    $template->user = $list['id'];
                    $template->albumMissanary();
                    ?>
                    <?php
                    $template = new \frontend\models\CardTemplate();
                    $template->limit = 5;
                    $template->title = "You may like";
                    $template->mayLike();
                    ?>



                </div>
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
