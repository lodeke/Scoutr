<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Site Settings';
$this->params['breadcrumbs'][] = ['label'=>'Site Settings','url'=>['settings/site']];

$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-check, .form-group {

        margin-bottom: 0;
        padding: 0px 5px !important;

    }
</style>
<div class="col-md-12">
    <div class="card card-transparent">
        <div class="card-header">
            <h4 class="card-title">Default Settings</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-md-3">
                    <?php echo  $this->render('_menu') ?>

                </div>
                <div class="col-7 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Default Settings</h4>
                        </div>
                            <?php $form = ActiveForm::begin(
                                [
                                    'layout' => 'horizontal',
                                    'fieldConfig' =>
                                        [
                                            'horizontalCssClasses' =>
                                                [
                                                    'label' => 'col-md-3',
                                                    'offset' => '',
                                                    'wrapper' => 'col',
                                                    'error' => 'col-md-5',
                                                    'hint' => 'col-md-8  col-md-push-3 imgHintS',
                                                ],
                                        ],
                                        'options' => ['enctype' => 'multipart/form-data']
                                ]);
                                $country = common\models\Countries::find()->all();
                            ?>
                        <div class="card-body">
                            <div class="alert alert-info">
                                Here you can control your display settings as well
                            </div>
                            <br>
                        <?php

                        echo $form->field($modelData, 'layout')->dropDownList(
                            array(
                                "people"=>"People",
                                "find"=>"find",
                                "yoko"=>"yoko",
                                "full"=>"full",

                            )
                        );
                        echo $form->field($modelData, 'home_page')->dropDownList(
                            array(
                                "trendy"=>"Trendy",
                                'classic'=>'classic',
                            )
                        );
                        echo $form->field($modelData, 'list_style')->dropDownList(
                            array(
                                "one"=>"Style One",
                                "two"=>"Style Two",
                                "three"=>"Style Three",
                                "four"=>"Style Four",
                                "five"=>"Style Five",
                                "six"=>"Style Six",

                            )
                        );
                        echo $form->field($modelData, 'profile_style')->dropDownList(
                            array(
                                "one"=>"Style One",
                                "two"=>"Style Two",
                            )
                        );

                        echo  $form->field($modelData, 'country')
                            ->dropDownList(\yii\helpers\ArrayHelper::map($country,'name','name'),
                            [
                                'prompt'=>'Select Country',
                                'onchange'=>'
                                $.get("country?id='.'"+$(this).val(),function(data)
                                {
                                 $("select#defaultsetting-state").html(data);
                                 });',
                            ]) ;
                         echo   $form->field($modelData, 'state')
                             ->dropDownList([$modelData['state']=>$modelData['state']],
                                [
                                    'prompt'=>'Select State',
                                    'onchange'=>'$.get("state?id='.'"+$(this).val(),function(data)
                                    {
                                     $("select#defaultsetting-city").html(data);
                                     });',
                                ]) ;
                            echo   $form->field($modelData, 'city')->dropDownList([$modelData['city']=>$modelData['city']],
                                [
                                    'prompt'=>'Select City',

                                ]) ;

                            echo   $form->field($modelData, 'currency')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Currencies::find()->all(),'symbol','currency','country'),
                                [
                                    'prompt'=>'Select currency',
                                ]) ;
                            echo   $form->field($modelData, 'language');

                            ?>
                        </div>
                        <div class="card-footer no-bd">
                            <?php echo Html::submitButton('UPDATE', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
                            <?php echo Html::resetButton('RESET', ['class' => 'btn btn-default']) ?>

                        </div>
                       <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



