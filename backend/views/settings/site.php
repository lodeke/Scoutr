<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use \yii\helpers\Url;
$this->title = 'Site Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .help-block
    {
        color: #999;
        font-size: 11px;
        margin-top: 10px;
        font-weight: 600;
    }
</style>
<div class="col-md-12">
    <div class="card card-transparent">
        <div class="card-header">
            <h4 class="card-title">Website General Settings (Logo and Others)</h4>
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <i class="flaticon-settings"></i> <?php echo  Html::encode($this->title) ?>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                            <?php echo  $form->field($model, 'site_name') ?>
                            <?php echo  $form->field($model, 'site_title') ?>

                            <?php
                            echo FileInput::widget([
                                'model' => $model,
                                'attribute' => 'logo',
                                'id'=>'logo',
                                'options'=>[
                                    'multiple'=>false
                                ],
                                'pluginOptions' => [
                                    'uploadUrl' => \yii\helpers\Url::to(['/site/file-upload']),
                                    'uploadExtraData' => [
                                        'album_id' => 21,
                                        'cat_id' => 'logo'
                                    ],
                                    'maxFileCount' => 1,
                                    'overwriteInitial'=>false,
                                    'theme'=>'fa',
                                    'initialPreviewAsData'=>'true',
                                    'cancelLabel'=>'',
                                    'cancelClass'=>'hidden',
                                    'browseLabel'=>'Logo',
                                    'browseClass'=>'btn btn-success',
                                    'browseIcon'=>'<i class="fa fa-image"></i>',
                                    'removeLabel'=>'',
                                    'removeIcon'=>'<i class="fa fa-trash"></i>',
                                    'uploadLabel'=>'',
                                    'uploadIcon'=>'<i class="fa fa-upload"></i>',
                                    'previewFileType'=>'image',
                                    'allowedFileExtensions'=>['jpg','jpeg','png'],
                                    'previewClass'=>'bg-light'
                                ]
                            ]);
                            ?>
                           <div class="row" style="padding: 20px;">
                               <div class="col-6">
                                   <?php echo  $form->field($model, 'logo_width')->textInput(['placeholder'=>'eg, 50px'])->hint('format : 50px,50%,50vh etc. define (px) at the end') ?>
                               </div>

                               <div class="col-6">
                                   <?php echo  $form->field($model, 'logo_height')->textInput(['placeholder'=>'eg, 50px'])->hint('format : 50px,50%,50vh etc. define (px) at the end') ?>
                               </div>

                               <div class="col-6">
                                   <?php echo  $form->field($model, 'logo_padding')->textInput(['placeholder'=>'eg, 5px or 5px 5px'])->hint('example : 5px, or 5px 5px, or 5px 3px 2px 5px ') ?>
                               </div>

                               <div class="col-6">
                                   <?php echo  $form->field($model, 'logo_margin')->textInput(['placeholder'=>'eg, 5px or 5px 5px'])->hint('example : 5px, or 5px 5px, or 5px 3px 2px 5px ') ?>
                               </div>
                           </div>


                            <div>
                                <h5>Current:</h5>
                                <img src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/site/logo/'.$model->logo ?>" class="img-thumbnail">
                                <hr>
                            </div>
                            <?php echo  $form->field($model, 'meta_keyword') ?>
                            <?php echo  $form->field($model, 'meta_description') ?>
                            <div class="form-group">
                                <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'site-settings-button']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
















