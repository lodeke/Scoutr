<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'front end banner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-5">
            <div class="panel panel-piluku">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo  $this->title; ?>
                        <span class="panel-options">
                           <a href="#" class="panel-refresh">
                               <i class="icon ti-reload"></i>
                           </a>
                          <a href="#" class="panel-minimize">
                              <i class="icon ti-angle-up"></i>
                          </a>
                          <a href="#" class="panel-close">
                              <i class="icon ti-close"></i>
                          </a>
                      </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


                    <?php echo  $form->field($model, 'name')->fileInput(); ?>

                    <?php echo  $form->field($model, 'title') ?>


                    <div class="form-group">
                        <?php echo  Html::submitButton('Upload', ['class' => 'btn btn-primary', 'name' => 'banner-settings-button']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>
                    <!-- /row -->
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <?php
            foreach($banner as $img)
            {
                ?>
                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-body">
                            <h4><?php echo  $img['title'] ?></h4>
                            <hr>
                            <img class="img-thumbnail img-responsive" src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/site/'.$img['name'] ?>" alt="<?php echo  $img['title'] ?>">
                            <hr>
                            <a href="<?php echo  \yii\helpers\Url::toRoute('delete/banner?id='.$img['id']) ?>">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
