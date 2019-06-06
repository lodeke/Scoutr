<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Step Four - 5/5';
?>


<div class="row justify-content-center ">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 align-content-center">
        <div class="ui-block">

            <div class="ui-block-content mt-3">
                <div class="site-signup">
                    <div class="row">
                        <div class="col-lg-6  align-self-baseline">
                            <div class="ui-block border-0">
                                <h5 class="ui-block-title">
                                    Lichaam en fysiek:
                                </h5>
                                <div class="ui-block-content d-none d-lg-block d-xl-block d-md-block">
                                    Wat informatie over je uiterlijk en persoonlijkheid <br>
                                    <p>onthoud</p>
                                    <ul class="list--styled">
                                        <li>
                                           Vul uw juiste informatie in.
                                        </li>
                                        <li>
                                            Deze informatie helpt anderen mensen te weten wat u bent.
                                        </li>
                                        <li>
                                           Deze informatie helpt anderen mensen te weten wat u bent.
                                        </li>
                                    </ul>


                                </div>

                            </div>
                            <br>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h5> <?php echo  Html::encode($this->title) ?>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('people/index') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                                    Skip >
                                </a>
                            </h5>
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <?php echo  $form->field($model, 'height')->hint('hoogte in centimeter') ?>
                            <?php echo  $form->field($model, 'weight_kg')->hint('Gewicht in kilogram') ?>
                            <?php echo  $form->field($model, 'build')->dropDownList(
                                [
                                    'Geen antwoord'=>'Geen antwoord',
                                    'Atletisch'=>'Atletisch',
                                    'Slank'=>'Slank',
                                    'Zwaar'=>'Zwaar'
                                ]);
                            ?>
                            <div class="form-group">
                                <?php echo  Html::submitButton('Finish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
