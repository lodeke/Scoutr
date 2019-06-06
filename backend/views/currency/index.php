<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = "All Included Currencies List";
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Currencies
                </h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Add Currency
                </button>
            </div>
        </div>
        <div class="card-body">


            <?php
            $gridColumns = [
                // the buy_amount column configuration
                ['class'=>'kartik\grid\SerialColumn'],

                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'country',
                    'editableOptions'=>[
                        'header'=>'Edit Country',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'currency',
                    'pageSummary'=>true,

                    'filterType'=>GridView::TEXT,
                    'filterWidgetOptions'=>
                        [
                            'pluginOptions'=>['allowClear'=>true],
                        ],
                    'filterInputOptions'=>['placeholder'=>'Currency'],
                    'editableOptions'=>[
                        'header'=>'Main Category',
                        'inputType' => Editable::INPUT_TEXT,
                    ],
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'code',
                    'editableOptions'=>[
                        'header'=>'Edit ISO Code',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'symbol',
                    'editableOptions'=>[
                        'header'=>'Edit symbol',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'thousand_separator',
                    'editableOptions'=>[
                        'header'=>'Edit Thousand Separator',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'decimal_separator',
                    'editableOptions'=>[
                        'header'=>'Edit Decimal Separator',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
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
                                'record-delete-url'=>Url::toRoute('delete/currency/'.$model->id),
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
<!--            Model start here-->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
					<span class="fw-mediumbold">
						New
                    </span>
                    <span class="fw-light">
                        Currency
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['edit/add-currency'],
                //'method' => 'get',
                'options' => ['id' => 'currency_form','class' => 'master-form']
            ]); ?>
            <div class="modal-body">
                <p class="small">Create a new row using this form, make sure you fill them all</p>
                <div class="row">


                    <div class="col-sm-12">
                        <?php echo $form->field($searchModel, 'currency', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Enter currency name?'])
                        ?>

                        <?php echo $form->field($searchModel, 'country', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'currency Country name?'])
                        ?>

                        <?php echo $form->field($searchModel, 'code', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'currency Country ISO code'])
                        ?>

                        <?php echo $form->field($searchModel, 'symbol', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'currency Country symbol'])
                        ?>

                        <?php echo $form->field($searchModel, 'thousand_separator', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'currency Country Thousand Separator'])
                        ?>

                        <?php echo $form->field($searchModel, 'decimal_separator', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'currency Country Decimal Separator'])
                        ?>


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

