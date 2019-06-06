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
$this->title = 'Site Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    Created Page List
                </h4>
                <a class="btn btn-primary btn-round ml-auto" href="<?php echo  Url::toRoute('pages/add'); ?>">
                    <i class="la la-plus"></i>
                    Add Row
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
                    'attribute'=>'title',
                    'editableOptions'=>[
                        'header'=>'Edit Page Title',
                        'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                    ],
                    'pageSummary'=>true
                ],
// the name column configuration
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'content',
                    'pageSummary'=>true,
                    'value'=>function ($model) {
                        return substr($model->content,0,35);
                    },

                    'editableOptions'=>[
                        'header'=>'Edit Page Content',
                        'inputType' => Editable::INPUT_TEXTAREA,
                    ],
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'attribute'=>'status',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Change Page Status',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data'=>['enable'=>'enable', 'disable'=>'disable'], // any list of values
                    ],
                ],

                [
                    'class'    => 'yii\grid\ActionColumn',
                    'template' => '{leadDelete}{leadEdit}',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'buttons'  => [

                        'leadDelete' => function ($url, $model,$key) {
                            $url = 'javascript:void()';//Url::to(['controller/lead-delete', 'id' => $model->id]);
                            return Html::a('<span class="flaticon-interface-5"></span>', $url, [
                                'title'        => 'delete',
                                'class'=>'record-delete',
                                'record-delete-msg'=>'Record Deleted',
                                'record-delete-status'=>'active',
                                'record-delete-child'=>false,
                                'record-delete-url'=>Url::toRoute('delete/page/'.$model->id),
                                'record-data-key'=>$key,


                            ]);
                        },
                        'leadEdit' => function ($url, $model,$key) {
                            $url = Url::toRoute('pages/edit/'.$model->id);//Url::to(['controller/lead-delete', 'id' => $model->id]);
                            return Html::a('<span class="flaticon-pencil"></span>', $url, [
                                'title'        => 'Edit this page',
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