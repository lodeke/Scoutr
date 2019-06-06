<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;

if($model->id)
{
    $this->title = 'Pages Settings';
    $title = "Edit ". $model->title ." page";

}
else
{
    $this->title = 'Create New Pages';
    $title = "Create a New page";

}
$this->params['breadcrumbs'][] = ['label'=>'Site Pages','url'=>['pages/index']];

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
            <div class="card-title"><?= $title; ?></div>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'pages-form']); ?>

        <div class="card-body">
            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'content')->textarea() ?>

            <ul class="list-inline checkboxes-radio">
                <li class="ms-hover">
                    <?= $form->field($model, 'status')->dropDownList(array('enable'=>'enable','disable'=>'disable')); ?>
                </li>
            </ul>

        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <button class="btn btn-danger">Cancel</button>
            <a href="<?= \yii\helpers\Url::toRoute('pages/index') ?>" class="btn btn-info">Back</a>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>