<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 05-03-2016
 * Time: 13:20
 */
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use Yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Countries Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Location | All Country List
                </h4>

                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Add Row
                </button>
                <a titile="Refresh Table" class="btn btn-success btn-round ml-1 float-right" href="<?= Url::toRoute('location/country'); ?>">
                    <i class="la la-refresh"></i>
                </a>
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
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Countries::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                    'filterWidgetOptions'=>
                        [
                            'pluginOptions'=>['allowClear'=>true],
                        ],
                    'filterInputOptions'=>['placeholder'=>'Search Country'],
                    'editableOptions'=>[
                        'header'=>'Edit Country Name',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true,

                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'sortname',
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>false,
                    'header'=>'Shortname',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'pageSummary'=>true,


                    'editableOptions'=>[
                        'header'=>'Edit Shortname',
                        'inputType' => Editable::INPUT_TEXT,
                        'data'=>$data, // any list of values
                    ],
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'phonecode',
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>false,
                    'header'=>'Phonecode',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'pageSummary'=>true,


                    'editableOptions'=>[
                        'header'=>'Edit phonecode',
                        'inputType' => Editable::INPUT_TEXT,
                        'data'=>$data, // any list of values
                    ],
                ],//phonecode


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
                                'record-delete-url'=>Url::toRoute('delete/country/'.$model->id),
                                'record-data-key'=>$key,


                            ]);
                        },

                    ]
                ]

            ];
            ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
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
						Add New
                    </span>
                    <span class="fw-light">
                        Country
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['edit/add-country'],
                //'method' => 'get',
                'options' => ['id' => 'country_form','class' => 'master-form']
            ]); ?>
            <div class="modal-body">
                <p class="small">Create a new row using this form, make sure you fill them all</p>
                <div class="row">


                    <div class="col-sm-12">
                        <?php echo $form->field($searchModel, 'name', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Enter Country name?']) ?>

                        <?php echo $form->field($searchModel, 'sortname', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ]); ?>

                        <?php echo $form->field($searchModel, 'phonecode', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ]); ?>

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