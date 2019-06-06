<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Fake Users List';
$this->params['breadcrumbs'][] = ['label'=>'Faker','url'=>['faker/index']];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Fake User List
                </h4>
                <a class="btn btn-primary btn-round ml-auto" href="<?php echo  Url::toRoute('faker/users-create') ?>">
                    <i class="la la-plus"></i>
                    Create New Fake Record
                </a>
            </div>
        </div>
        <div class="card-body">


            <?php
            $gridColumns = [
                // the buy_amount column configuration
                ['class'=>'kartik\grid\SerialColumn'],
                ///======== Detail button section =========////

                [
                    'class' =>'\kartik\grid\ExpandRowColumn',
                    'header'=>'Detail',
                    // 'headerOptions' => ['style' => 'color:#337ab7'],
                    'expandIcon'=>'<span class="flaticon-download-1 text-primary"></span>',

                    'value'=>function ($model, $key, $index,$column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl'=> Yii::$app->request->getBaseUrl().'/site/user-detail',
                ],

                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'username',
                    'editableOptions'=>[
                        'header'=>'Edit Username',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                ///======== username email =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'email',
                    'pageSummary'=>true,
                    'editableOptions'=>[
                        'header'=>'Edit Email',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                ///======== User Type section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'type',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Main Category',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['professional', 'individual'], // any list of values
                    ],
                ],
                ///======== First name section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'first_name',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Edit First Name',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                ///======== Last name section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'last_name',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Edit Last name',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                ///======== Phone number section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'phone_number',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Edit Phone Number',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                ///======== user about section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'about_you',
                    'pageSummary'=>true,
                    'value'=>function ($model) {
                        return substr($model->about_you,0,10);
                    },

                    'editableOptions'=>[
                        'header'=>'EditL User Description',
                        'inputType' => Editable::INPUT_TEXTAREA,
                    ],
                ],
                ///======== user city section =========////
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'city',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Edit User City',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{leadDelete}',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'buttons'  => [

                        'leadDelete' => function ($url, $model,$key) {
                            $url = 'javascript:void()';
                            return Html::a('<span class="flaticon-interface-5"></span>', $url, [
                                'title'        => 'delete',
                                'class'=>'record-delete',
                                'record-delete-msg'=>'Record Deleted',
                                'record-delete-status'=>'active',
                                'record-delete-child'=>false,
                                'record-delete-url'=>Url::toRoute('delete/user/'.$model->id),
                                'record-data-key'=>$key,


                            ]);
                        },
                    ]
                ]

            ];
            ?>
            <?php echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax'=>true,
                'pjaxSettings'=>[
                    'neverTimeout'=>true,
                ],

                'responsive'=>true,
                'floatHeader'=>false,
                'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
                'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                'export' => [
                    'fontAwesome' => true
                ],
                'columns'=>$gridColumns,

            ]) ?>
        </div>
    </div>
</div>
