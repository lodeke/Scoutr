<?php
$this->title = "Upload Photo";
$siteSettings = \common\models\SiteSettings::find()->one();

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

?>

<div class="row justify-content-center">
    <?php echo  $this->render('_header.php') ;?>


    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="left">
        <h1 class="p-3 ">
            Upload Photo
        </h1>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <?php echo   $form->field($model, 'images')->widget(FileInput::classname(), [
            'options'=>[
                'multiple'=>true,
                'required'=>true,
                'onchange'=>'sellerLogos()',

            ],
        ]); ?>

        <p class="p-2 mb-3">
            Shall We Go for Premium Membership?
        </p>
        <button type="submit" class="btn btn-success" >
            UPLOAD <i class="la la-upload"></i>
        </button>
        <?php ActiveForm::end(); ?>

    </div>

    <div class="col-6 p-2 mb-5" align="center">
        <div class="col-6 mt-5">
            <img  id="sellerLogo"  class="rounded-circle" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" alt="<?php echo  $model['images']; ?>">
        </div>
        <h1 class="mt-3 ">
            <?php echo  $model['first_name']; ?>
        </h1>
        <p class="p-2 mb-3">
            Photo should be clear and not blur or group photos
        </p>
    </div>

</div>

<script>
    function sellerLogos() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadimages").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("sellerLogo").src = oFREvent.target.result;
        };
        // $('#uploadPreview4').show();
    }
</script>
