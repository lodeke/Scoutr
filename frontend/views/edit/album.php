<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Photo album';
?>
<div class="row">

    <div class="col-md-12">
        <div class="panel bg-transparent">
            <div class="panel-body p-2">
                <b>Add photo to the album</b>
                <hr>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?php echo $form->field($model, 'image')->fileInput(['onchange'=>'PreviewImage()'])->hint('image must be 150X150 pixel...') ?>
                <input type="submit" class="btn btn-success" value="Upload Photo">

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <h4 class="txt mt-3 t-light4 font-weight-bold pl-2">Album</h4>
        <hr>

        <?php
        $template = new \frontend\models\CardTemplate();
        $template->albumMissanary();
        ?>

    </div>
</div>