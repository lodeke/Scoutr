<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Stap vier - 4/5';
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
                                    Gewoonte en carrière:
                                </h5>
                                <div class="ui-block-content">
                                    In welke scoutsgroep zit je?
                                    <p>Onthoud</p>
                                    <ul class="list--styled">
                                        <li>
                                            Vul uw juiste informatie in.
                                        </li>
                                        <li>
                                            Wees eerlijk en jezelf!
                                        </li>
                                        <li>
                                            Deze informatie helpt anderen mensen te weten wat u bent.
                                        </li>
                                    </ul>


                                </div>

                            </div>
                            <br>

                        </div>
                        <div class="col-lg-6">
                            <h5> <?php echo  Html::encode($this->title) ?>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('start/step-five') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                                    Skip >
                                </a>
                            </h5>
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <?php echo  $form->field($model, 'smoker')->dropDownList(
                                [
                                    'Nee'=>'Nee',
                                    'Ja'=>'Ja',
                                    'Soms'=>'Soms'

                                ]);
                            ?>
                            <?php echo  $form->field($model, 'drinking')->dropDownList(
                                [
                                    'Nee'=>'Nee',
                                    'Ja'=>'Ja',
                                    'Soms'=>'Soms'

                                ]);
                            ?>
                            <?php echo  $form->field($model, 'education')->dropDownList(
                                [
                                    'Nee'=>'Nee',
                                    'school'=>'school',
                                    'college'=>'college',
                                    'Universiteit'=>'Universiteit',
                                    'geavanceerde graad'=>'geavanceerde graad'
                                ]);
                            ?>
                            <div class="form-group">
                                <?php echo  Html::submitButton('Save And Next', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

