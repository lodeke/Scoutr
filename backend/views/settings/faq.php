<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'FAQ Settings';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            FAQ Listed
                        </h4>

                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="accordion accordion-secondary">

                            <?php
                            if($list)
                            {
                                foreach($list as $list)
                                {
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="headingOne<?php echo  $list['id']; ?>" data-toggle="collapse" data-target="#collapseOne<?php echo  $list['id']; ?>" aria-expanded="false" aria-controls="collapseOne<?php echo  $list['id']; ?>" role="button">
                                            <div class="span-icon">
                                                <div class="flaticon-box-1"></div>
                                            </div>
                                            <div class="span-title">
                                                <b>Q.</b> <?php echo  $list['question']; ?>
                                            </div>
                                            <div class="span-mode"></div>
                                        </div>

                                        <div id="collapseOne<?php echo  $list['id']; ?>" class="collapse " aria-labelledby="headingOne<?php echo  $list['id']; ?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <b>A.</b> <?php echo  $list['answer']; ?>
                                            </div>
                                            <div class="card-footer">
                                                <a class="btn btn-success" href="<?php echo  \yii\helpers\Url::toRoute('settings/faqedit/'.$list['id']) ?>"> <i class="fa fa-pencil"></i> Edit </a>
                                                <a href="<?php echo  \yii\helpers\Url::toRoute('settings/faq-delete/'.$model['id']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New FAQ Question</h4>
                </div>

                <?php $form = ActiveForm::begin(
                    [
                        // 'layout' => 'horizontal',
                        // 'action' => ['edit/edit-ads?id='.$modal['id']],


                        'options' => ['id' => 'edit_ads_form','enctype' => 'multipart/form-data','class' => 'master-form22']
                    ]);
                ?>
                <div class="card-body">
                    <br>
                    <?php
                    echo $form->field($model, 'question')->label('Faq: question');
                    echo $form->field($model, 'answer')->textarea();
                    ?>
                    <br>

                </div>
                <div class="card-footer no-bd">
                    <?php echo Html::submitButton('SAVE', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
                    <?php echo Html::resetButton('RESET', ['class' => 'btn btn-default']) ?>

                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>