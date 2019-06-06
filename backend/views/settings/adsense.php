<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Google Ad sense';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Google Adsence
                </h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Add Row
                </button>
            </div>
        </div>
        <div class="card-body">


            <?php
            $gridColumns = [
                // the buy_amount column configuration
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'class' =>'\kartik\grid\ExpandRowColumn',
                    'header'=>'Detail',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'expandIcon'=>'<span class="flaticon-download-1 text-primary"></span>',

                    'value'=>function ($model, $key, $index,$column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl'=> Yii::$app->request->getBaseUrl().'/settings/adsense-detail',
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'title',
                    'editableOptions'=>[
                        'header'=>'Name',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'script',
                    'editableOptions'=>[
                        'header'=>'Edit Script',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXTAREA,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'position',
                    'pageSummary'=>true,


                    'editableOptions'=>[
                        'header'=>'Edit Ads Positions',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['top'=>'top','bottom'=>'bottom','left'=>'left','right'=>'right'], // any list of values
                    ],
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'status',
                    'pageSummary'=>true,
                    'editableOptions'=>[
                        'header'=>'Change Ads Satus',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['active'=>'active','disable'=>'disable'], // any list of values
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
                                'record-delete-url'=>Url::toRoute('delete/adsense/'.$model->id),
                                'record-data-key'=>$key,


                            ]);
                        },
                    ]
                ]

            ];
            ?>
            <?= GridView::widget([
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
<!--            Model start here-->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
					<span class="fw-mediumbold">
						Create New
                    </span>
                    <span class="fw-light">
                        Ads
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['edit/add-adsense'],
                'options' => ['id' => 'adsense_form','class' => 'master-form']
            ]); ?>
            <div class="modal-body">
                <p class="small">Create a new row using this form, make sure you fill them all</p>
                <div class="row">


                    <div class="col-sm-12">
                        <?php echo $form->field($searchModel, 'title', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Title?Name of ads']) ?>
                        <?php echo $form->field($searchModel, 'script', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textarea(['placeholder'=>'Google adssense sript/code paste here ']) ?>
                        <?php echo $form->field($searchModel, 'position', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->dropDownList(
                            ['top'=>'top','bottom'=>'bottom','left'=>'left','right'=>'right'],
                            ['prompt'=>'Select...']) ?>

                        <?php echo $form->field($searchModel, 'status', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->dropDownList(
                            ['active'=>'active','disable'=>'disable'],
                            ['prompt'=>'Select...']) ?>

                    </div>




                </div>
            </div>
            <div class="modal-footer no-bd">
                <?php echo Html::submitButton('Add', ['class' => 'btn btn-primary','id'=>'submit_id']) ?>
                <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                <?php echo Html::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal']) ?>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--            model add row closed-->











