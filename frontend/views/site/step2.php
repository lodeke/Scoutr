<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Step - 2/4';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<div class="row">
    <div class="col-lg-12">

        <ul class="hidden welcome-progressbar">
            <li class="active"><span>Profielfoto</span></li>
            <li>
                <span>Persoonlijke informatie</span>
            </li>
            <li>
                <span>
                    Mijn interesse en meer
                </span>
            </li>
            <li>
                <span>
                    Gewoonte en carrière
                </span>
            </li>
            <li>
                <span>
                    Lichaam en fysiek
                </span>
            </li>
        </ul>


        <div class="row">
            <div class="col-lg-8 col-lg-push-2 " align="center">
                <p  class="blue-text text-lighten-5  text-center" style="font-family: raleway-Light;font-size: 36px;">
                    Wij maken je profiel op
                </p>
                <p class="blue-text text-lighten-2 text-center " style="font-family: roboto-regular;font-size: 18px;">
                    1 / 5
                </p>
                <div class="arrow-up" style="display: block;">
                    <div class="welcomeArrow"></div>
                    <div class="card" style="border-radius: 12px;">
                        <div class="card-content">
                            <div class="card-title blue-text text-darken-1">
                                Je eerste blik
                                <a href="<?php echo  \yii\helpers\Url::toRoute('welcome/step-second') ?>" class="blue-text pull-right" style="text-decoration: none;font-size:12px;">
                                    PAS >
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <img  id="sellerLogo"  class="img-responsive" src="<?php echo  Yii::getAlias('@web') ?>/imagess/members/<?php echo  $model['images']; ?>" alt="<?php echo  $model['images']; ?>">

                                </div>

                                <div class="col-lg-6">
                                    <h1 class="grey-text">
                                        Kies Afbeelding uit galerij
                                    </h1>
                                    <hr>
                                    <?php echo  $form->field($model, 'images')->fileInput(['required'=>'required','onchange'=>'sellerLogos()','id'=>'uploadimages'])->label("Profile images");?>
                                    <br>
                                    <?php echo  Html::submitButton('Save and next', ['class' => 'buy-button', 'name' => 'one-button']) ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>


</div>

<?php ActiveForm::end(); ?>
<div class="row justify-content-center ">

    <div class="col-8 align-content-center">
        <div class="card">
            <h1 class="card-header text-primary">
                Scoutr - Premium Dating!
            </h1>
            <div class="card-body mt-3">
                <div class="site-signup">


                    <div class="row">
                        <div class="col-lg-6 align-self-baseline">

                            <div class="ui-block">
                                <h5 class="ui-block-title">
                                    Over je lichaamstype
                                </h5>
                                <div class="ui-block-content">
                      Hoe zie jij als Scoutr er uit?
                                    <br><br>
                                </div>

                            </div>
                            <br>

                        </div>
                        <div class="col-lg-6">
                            <h5> <?php echo  Html::encode($this->title) ?></h5>

                            <p>Vul de volgende velden in om aan te melden:</p>
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                            <?php echo  $form->field($model, 'sexual_orientation')
                                ->dropDownList(
                                    [
                                'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                ) ?>

                            <?php echo  $form->field($model, 'burgerlijke staat')
                                ->dropDownList(
                                    [
                                        'Not Given'=>'Not Given',
                                        'Single'=>'Single',
                                        'In a relationship'=>'In a relationship',
                                        'Married'=>'Married',
                                        'Divorced'=>'Divorced',
                                        'Widowed'=>'Widowed',
                                        'Rather not say'=>'Rather not say',
                                        'Separated'=>'Separated'
                                    ]
                                ) ?>

                            <?php echo  $form->field($model, 'Kinderen')
                                ->dropDownList(
                                    [
                                        'Not Given'=>'Not Given','No children'=>'No children',
                                        'Only one'=>'Only one','More than two'=>'More than two'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'languages')->textInput() ?>
                            <?php echo  $form->field($model, 'looking_for')
                                ->dropDownList(
                                    [
                                        'friends'=>'friends',
                                        'adventure'=>'adventure',
                                        'soulmate'=>'soulmate',
                                        'job'=>'job'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'ethnicity')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'religion')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'smoker')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'drinking')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'education')->textInput()
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'height')->textInput() ?>
                            <?php echo  $form->field($model, 'weight_kg')->textInput() ?>
                            <?php echo  $form->field($model, 'build')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'hair_color')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'eye_color')
                                ->dropDownList(
                                    [
                                        'heterosexual'=>'heterosexual','homosexual'=>'homosexual','bisexual'=>'bisexual'
                                    ]
                                );
                            ?>
                            <?php echo  $form->field($model, 'about_me')->textInput() ?>


                            <div class="form-group">
                                <?php echo  Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
