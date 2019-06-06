
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'STAP 2 Scoutr - 2 / 5';
?>
<div class="row justify-content-center ">

    <div class="col-12 align-content-center">
        <div class="ui-block">

            <div class="ui-block-content mt-3">
                <div class="site-signup">
                    <div class="row">
                        <div class="col-lg-6 align-self-baseline">
                            <div class="ui-block border-0">
                                <h5 class="ui-block-title">
                                    Persoonlijke informatie :
                                </h5>
                                <div class="ui-block-content">
                                   Laat ons meer over u weten. wie ben jij, jouw leeftijd enz.?
                                    <p>Keep in mind:</p>
                                    <ul class="list--styled">
                                        <li>
                                            Vul de juiste informatie in.
                                        </li>
                                        <li>
                                            Deze informatie helpt anderen mensen te weten wat u bent.
                                        </li>
                                        <li>
                                            Schrijf uw aantrekkelijke, korte bio die zeer nuttig is voor andere gebruikers. Als je snapt wat we bedoelen ;)
                                        </li>
                                    </ul>


                                </div>

                            </div>
                            <br>

                        </div>
                        <div class="col-lg-6">
                            <h5> <?php echo  Html::encode($this->title) ?>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('start/step-three') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                                    Skip >
                                </a>
                            </h5>
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                            <?php echo  $form->field($model, 'first_name')->textInput(['class'=>'homeInpt'])->label("Wat is de volgende naam") ?>

                            <?php echo  $form->field($model, 'age')->textInput(['class'=>'homeInpt'])->label("Leeftijd?") ?>

                            <?php echo  $form->field($model, 'gender')->radioList(['Male'=>'Male','Female'=>'Female','Others']); ?>

                            <?php echo  $form->field($model, 'about_me')->textarea(['row'=>'800','value'=>'Vertel een je beste scoutsverhaal! Welke totem heb je? vertel het aan de andere Scoutr mooie ice breaker ;)'])->label("Iets speciaals aan jou ice breaker time!") ?>



                            <div class="form-group">
                                <?php echo  Html::submitButton('Ga door!', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
