<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Create Fake Users';
$this->params['breadcrumbs'][] = ['label'=>'Faker','url'=>['faker/index']];
$this->params['breadcrumbs'][] = ['label'=>'Faker User List','url'=>['faker/users']];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Fake User</h4>
        </div>
        <?php $form = ActiveForm::begin(
            [
                'layout' => 'horizontal',
                'fieldConfig' =>
                    [
                        'horizontalCssClasses' =>
                            [
                                'label' => 'col-md-12',
                                'offset' => '',
                                'wrapper' => 'col-12',
                                'error' => 'col-md-12',
                                'hint' => 'col-md-8  col-md-push-3 imgHintS',
                            ],
                    ],
                'options' => ['enctype' => 'multipart/form-data']
            ]);
        ?>
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-4">
                    <?php echo  $form->field($modal, 'total'); ?>
                </div>
                <div class="col-4">
                    <?php echo  $form->field($modal, 'gender')->dropDownList(array(false=>'Any','male'=>'Male','female'=>'Female')); ?>
                </div>
                <div class="col-4">
                    <?php echo  $form->field($modal, 'with_image')->checkbox(); ?>
                </div>
                <div class="col-12 bg-light">
                    <?php
                    echo $form->field($modal, 'image_directory')->textarea(['rows'=>'6','placeholder'=>'Set of image Array saperated by  (,) url like : http://xyz.com/image/user/john.jpg, http://xyz.com/image/user/seema.jpg ']);
                    ?>
                    <div style="padding: 0px 30px;">
                        <p>
                            Set of image Array saperated by  (,) url <br>
                            <b>Like <i class="la la-hand-o-right"></i> </b> <code>http://xyz.com/image/user/john.jpg, http://xyz.com/image/user/seema.jpg ............. ,http://xyz.com/image/user/dyndra.jpg</code>
                        </p>
                        <strong> <i class="la la-angle-double-right"></i> Suggesions for local Server</strong>
                        <p>
                            Please use Local Path as Image Url,<br>
                            <code>C:/Users/JohnPc/Desktop/users/users/1.jpg</code>
                        </p>
                        <strong><i class="la la-angle-double-right"></i>Suggesions for Remote Server</strong>
                        <p>
                            Always use Server Url Only as Image Url,<br>
                            <code>http://xyzOnline123.com/images/users/demoUser.jpg</code>
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <?php echo  $form->field($modal, 'country'); ?>
                </div>
                <div class="col-4">
                    <?php echo  $form->field($modal, 'state'); ?>
                </div>
                <div class="col-4">
                    <?php echo  $form->field($modal, 'city'); ?>
                </div>
            </div>

        </div>
        <div class="card-footer no-bd">
            <?php echo Html::submitButton('Create Fake Users', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
            <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script type="text/javascript">
    function getFolder(e)
    {
        var files = e.target.files;
        var path = files[0].webkitRelativePath;
        var folder = path.split("/");
        alert(path);
    }
</script>


