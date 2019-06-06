<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Payment Gateway Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Listed Payment Method
                </h4>

            </div>
        </div>
        <div class="card-body">


            <?php
            $gridColumns = [
                // the buy_amount column configuration
                ['class'=>'kartik\grid\SerialColumn'],

                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'name',
                    'editableOptions'=>[
                        'header'=>'Paypal Name',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'public_key',
                    'editableOptions'=>[
                        'header'=>'Edit public key',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'private_key',
                    'editableOptions'=>[
                        'header'=>'Edit private key',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'email',
                    'pageSummary'=>true,


                    'editableOptions'=>[
                        'header'=>'Edit Paypal Email',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'status',
                    'pageSummary'=>true,
                    'editableOptions'=>[
                        'header'=>'Change Paypal Account Satus',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['enable'=>'enable','disable'=>'disable'], // any list of values
                    ],
                ],


            ];
            ?>
            <?php echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax'=>true,
                'pjaxSettings'=>[
                    'neverTimeout'=>true,
                    'beforeGrid'=>'My fancy content before.',
                    'afterGrid'=>'My fancy content after.',
                ],

                'responsive'=>true,
                'floatHeader'=>false,
                'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
                'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                'filterRowOptions'=>['class'=>'kartik-sheet-style'],

                // set export properties
                'export' => [
                    'fontAwesome' => true
                ],

                'columns'=>$gridColumns,



            ]) ?>
        </div>
    </div>
</div>





