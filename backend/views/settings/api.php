<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Api Settings';
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
            <h4 class="card-title">Api Settings</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-md-3">
                    <?php echo  $this->render('_menu') ?>
                </div>
                <div class="col-7 col-md-9">


                            <?php
                            foreach($modal as $list)
                            {
                                $value = "";
                                if($list['type'] == "login")
                                {
                                    $value =  $list['clientSecret'];
                                    $label =  "client Secret Keys";

                                }
                                elseif($list['type'] == "translator")
                                {
                                    $value =  $list['api_key'];
                                    $label =  "Api Keys";

                                }
                                else
                                {
                                    $value =  $list['api_key'];
                                    $label =  "Api Keys";

                                }

                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo  $list['name']; ?> Keys
                                            <div class="pull-right">
                                                <input type="checkbox" class="display-home-page" data-display-url="<?php echo  \yii\helpers\Url::toRoute("settings/api-status") ?>" data-display-id="<?php echo  $list['id']; ?>" data-status="<?php echo  $list['status']; ?>" value="<?php echo  $list['status']; ?>"  name="status"  <?php echo  ($list['status'] == "enable")?"checked":""; ?> data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                                                <i id="display_<?php echo  $list['id'] ?>"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <?php  $form = ActiveForm::begin([
                                            'action' => ['edit/edit-api?id='.$list['id']],
                                            //'method' => 'get',
                                            'options' => ['id' => 'edit_api_form','class' => 'master-form']
                                        ]);


                                        ?>
                                        <?php
                                        echo "<div  class='row'>";
                                        if($list['type'] == "login")
                                        {
                                            echo "<div class='col-4'>".$form->field($list, 'clientSecret')->label($list['name'].' client Secret Keys')."</div>";
                                            echo  "<div class='col-4'>".$form->field($list, 'clientId')->label($list['name'].' client Id')."</div>";
                                            echo "<div class='col-4'>".$form->field($list, 'status')->dropDownList(['enable'=>'enable','disable'=>'disable'])->label($list['name'].' status')."</div>";

                                        }
                                        elseif($list['type'] == "translator")
                                        {
                                            echo "<div class='col-8'>".$form->field($list, 'api_key')->label($list['name'].' API Keys')."</div>";
                                            echo "<div class='col-4'>".$form->field($list, 'status')->dropDownList(['enable'=>'enable','disable'=>'disable'])->label($list['name'].' status')."</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='col-8'>".$form->field($list, 'api_key')->label($list['name'].' API Keys')."</div>";
                                            echo "<div class='col-4'>".$form->field($list, 'status')->dropDownList(['enable'=>'enable','disable'=>'disable'])->label($list['name'].' status')."</div>";
                                        }
                                        echo "</div>";

                                        ?>



                                        <div class="row">
                                            <div class="col-12">
                                                <br>
                                                <p style="color:#777;font-size: 12px;">
                                                    <?php echo  $list["suggesion_text"]; ?>
                                                    <i class="la la-external-link"></i>
                                                    <a target="_blank" href="<?php echo  $list["suggestion_url"]; ?>">
                                                        Click here
                                                    </a>
                                                </p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer no-bd">
                                        <?php echo Html::submitButton('UPDATE', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
                                        <?php echo Html::resetButton('RESET', ['class' => 'btn btn-default']) ?>
                                    </div>
                                    <?php ActiveForm::end(); ?>

                                </div>
                            <?php
                            }
                            ?>

                </div>
            </div>
        </div>
    </div>
</div>



