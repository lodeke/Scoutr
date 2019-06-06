

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Stap drie - 3/5';
?>
<div class="row justify-content-center mt-2">

    <div class="col-12 align-content-center">
        <div class="ui-block">

            <div class="ui-block-content mt-3">
                <div class="site-signup">
                    <div class="row">
                        <div class="col-lg-6 align-self-baseline">
                            <div class="ui-block border-0">
                                <h5 class="ui-block-title">
                                    Mijn interesse en meer:
                                </h5>
                                <div class="ui-block-content">
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
                                        <li>
                                            Schrijf uw aantrekkelijke, korte bio die zeer nuttig is voor andere gebruikers.
                                        </li>
                                    </ul>


                                </div>

                            </div>
                            <br>

                        </div>
                        <div class="col-lg-6">
                            <h5> <?php echo  Html::encode($this->title) ?>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('start/step-four') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                                    Skip >
                                </a>
                            </h5>
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>



                            <select class="form-control" name="User[languages]"  id="languages">
                                <option>Taal</option>
                                <option value="Hindi">Hindi</option>
                                <option value="english">English</option>
                                <option value="french">french</option>
                                <option value="arabic">arabic</option>
                                <option value="russian">Russian</option>
                                <option value="spanish">spanish</option>
                                <option value="portuguese">portuguese</option>
                                <option value="japanese">japanese</option>
                                <option value="german">german</option>
                                <option value="korean">korean</option>
                                <option value="turkish">turkish</option>
                                <option value="italian">italian</option>
                                <option value="thai">thai</option>
                                <option value="duch">dutch</option>
                                <option value="kurdish">kurdish</option>
                                <option value="greek">greek</option>
                            </select>
                            <?php echo  $form->field($model, 'about_partner')->textarea(['row'=>200,'value'=>'Waar moet je date goed in zijn? Wees lief voor elkaar! ']) ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo  $form->field($model, 'sexual_orientation')->radioList(
                                        [
                                            'straight'=>'Hetero',
                                            'lesbian'=>'esbienne',
                                            'gay'=>'Homo',
                                            'bisexual'=>'biseksueel'

                                        ]);
                                    ?>
                                </div>
                                <div class="col-lg-6">

                                    <?php echo  $form->field($model, 'looking_for')->radioList(
                                        [
                                            'friends'=>'Vrienden',
                                            'adventure'=>'Avontuur',
                                            'soulmate'=>'Zielsverwant',
                                            'dating'=>'Date'

                                        ]);
                                    ?>


                                </div>

                            </div>
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
