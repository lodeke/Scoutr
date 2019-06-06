<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Scoutr profiel : 1';

?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<div class="site-signup mt-5">
    <div class="row">
        <div class="col-lg-6 align-self-baseline">
            <div class="ui-block">
                <h5 class="ui-block-title">
                    Kies afbeeldingen uit je scoutsjaren!
                </h5>
                <div class="ui-block-content">
                    <h4>
                       Hier wat korte regels!
                    </h4>
                    <p>
                        Alleen JPG-, PNG-afbeeldingen zijn toegestaan
                    </p>
                    <p>
                        Afbeeldingsgrootte moet 500X500 zijn
                    </p>
                    <p>
                        Enkel foto's met je scoutskleren en zorg ervoor dat je hoofd er op staat.
                    </p>
                    <p>
                        Blur / Edited Image is niet toegestaan
                    </p>
                    <img   class="img-responsive" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" alt="<?php echo  $model['images']; ?>">


                </div>

            </div>
            <br>

        </div>
        <div class="col-lg-6">
            <h5> <?php echo  Html::encode($this->title) ?>
                <a href="<?php echo  \yii\helpers\Url::toRoute('start/step-second') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                    Skip >
                </a>
            </h5>

            <p>Kies afbeeldingen uit galerij:</p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


            <?php echo   $form->field($model, 'images')->widget(\kartik\file\FileInput::classname(), [
                'options'=>[
                    'multiple'=>false,
                    'required'=>true,
                    'onchange'=>'sellerLogos()',
                    'accept' => 'image/*'

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
                    'cancelClass'=>'d-none',
                    'browseLabel'=>'Profiel afbeeldingen',
                    'browseClass'=>'btn btn-success',
                    'browseIcon'=>'<i class="la la-image"></i>',
                    'removeLabel'=>'',
                    'removeIcon'=>'<i class="la la-trash"></i>',
                    'uploadClass'=>'d-none',
                    'uploadLabel'=>'',
                    'uploadIcon'=>'<i class="la la-upload"></i>',
                    'previewFileType'=>'image',
                    'allowedFileExtensions'=>['jpg','jpeg','png'],
                    'previewClass'=>'bg-light'
                ]
            ])->label("Profiel afbeeldingen"); ?>
            <br>



            <div class="form-group">
                <?php echo  Html::submitButton('Ga door!', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

<?php ActiveForm::end(); ?>

