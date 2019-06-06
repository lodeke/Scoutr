<?php
$this->title = "Personal Information";
$siteSettings = \common\models\SiteSettings::find()->one();

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

?>
<?php $form = ActiveForm::begin(['id' => 'account-settings-form']); ?>

<div class="row">
    <?php echo $this->render('_header.php') ;?>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="title">Personal Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'first_name')->textInput(['class'=>'form-control h6'])->label("First Name") ?>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'last_name')->textInput(['class'=>'form-control h6'])->label("Last name") ?>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'about_me')->textarea(['row'=>'800','value'=>'i am good looking person,i am good looking, i like bike riding, i like to play pool, i like swiming'])->label("Something special about you") ?>

                    </div>
                    <div class="co-6">
                        <div class="row no-gutters p-3">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pr-2">
                                <?php echo $form->field($model, 'age')->textInput(['class'=>'form-control h6'])->label("How old are you?") ?>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pr-2">
                                <?php echo $form->field($model, 'gender')->dropDownList(['Male'=>'Male','Female'=>'Female','Others']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="title">Education And others Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'school')->textInput(['class'=>'form-control h6']);?>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'job_title')->textInput(['class'=>'form-control h6']);?>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'company')->textInput(['class'=>'form-control h6']);?>

                    </div>
                </div>
            </div>

        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="title">Locality Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'city')->textInput(['class'=>'form-control h6']);?>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'state')->textInput(['class'=>'form-control h6']);?>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'country')->textInput(['class'=>'form-control h6']);?>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="title">Interest and more Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'languages')->dropDownList(
                            [
                                'Hindi'=>'Hindi',
                                'English'=>'English',
                                'french'=>'french',
                                'arabic'=>'arabic',
                                'Russian'=>'Russian',
                                'spanish'=>'spanish',
                                'portuguese'=>'portuguese',
                                'japanese'=>'japanese',
                                'german'=>'german',
                                'korean'=>'korean',
                                'turkish'=>'turkish',
                                'italian'=>'italian',
                                'thai'=>'thai',
                                'duch'=>'duch',
                                'kurdish'=>'kurdish',
                                'greek'=>'greek',



                            ]);
                        ?>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'sexual_orientation')->dropDownList(
                            [
                                'straight'=>'straight',
                                'lesbian'=>'lesbian',
                                'gay'=>'gay',
                                'bisexual'=>'bisexual'

                            ]);
                        ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'looking_for')->dropDownList(
                            [
                                'friends'=>'friends',
                                'adventure'=>'adventure',
                                'soulmate'=>'soulmate',
                                'dating'=>'dating'

                            ]);
                        ?>

                    </div>
                    <div class="col-12">
                        <?php echo $form->field($model, 'about_partner')->textarea(['row'=>200,'class'=>'form-control h6']); ?>

                    </div>

                </div>
            </div>

        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="title"> Habit and Career Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'smoker')->dropDownList(
                            [
                                'no'=>'no',
                                'yes'=>'yes',
                                'some time'=>'some time'

                            ]);
                        ?>


                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'drinking')->dropDownList(
                            [
                                'no'=>'no',
                                'yes'=>'yes',
                                'some time'=>'some time'

                            ]);
                        ?>


                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'education')->dropDownList(
                            [
                                'no'=>'no',
                                'school'=>'school',
                                'college'=>'college',
                                'university'=>'university',
                                'advance degree'=>'advance degree'
                            ]);
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="title">Education And others Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'height')->textInput(['class'=>'form-control h6'])->hint('height in centimeter') ?>


                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'weight_kg')->textInput(['class'=>'form-control h6'])->hint('weight in kilogram') ?>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <?php echo $form->field($model, 'build')->dropDownList(
                            [
                                'no answer'=>'no answer',
                                'athletic'=>'athletic',
                                'slim'=>'slim',
                                'fatty'=>'fatty'
                            ]);
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <hr>
        <div class="col-12">
            <div class="form-group">
                <?php echo Html::submitButton('Save Settings', ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
        </div>
    </div>


</div>

<?php ActiveForm::end(); ?>


