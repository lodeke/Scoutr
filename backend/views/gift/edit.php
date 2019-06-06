<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

if($model->id)
{
    $this->title = 'Gift Settings';
    $title = "Edit ". $model->gift ." Item";

}
else
{
    $this->title = 'Add new gift';
    $title = "Add a New Gift";

}
$this->params['breadcrumbs'][] = ['label'=>'Gift List','url'=>['gift/index']];

$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    input[type="radio"] {
        display: block;
    }
</style>
<div class="col-lg-8 ml-auto mr-auto">
    <div class="card">
        <div class="card-header">
            <div class="card-title"><?php echo  $title; ?></div>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <div class="card-body">
            <?php echo  $form->field($model, 'gift') ?>

            <?php
            echo FileInput::widget([
                'model' => $model,
                'attribute' => 'image',
                'id'=>'image',
                'options'=>[
                    'multiple'=>true,
                    'required'=>true,
                ],
                'pluginOptions' => [
                    'uploadUrl' => \yii\helpers\Url::to(['/gift/file-upload']),
                    'uploadExtraData' => [
                        'album_id' => 21,
                        'cat_id' => 'image'
                    ],
                    'maxFileCount' => 1,
                    'overwriteInitial'=>false,
                    'theme'=>'fa',
                    'initialPreviewAsData'=>'true',
                    'cancelLabel'=>'',
                    'cancelClass'=>'hidden',
                    'browseLabel'=>'Gift Image',
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
            <?php echo  $form->field($model, 'point') ?>



        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <button class="btn btn-danger">Cancel</button>
            <a href="<?php echo  \yii\helpers\Url::toRoute('pages/index') ?>" class="btn btn-info">Back</a>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>