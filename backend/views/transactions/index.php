<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
use kartik\grid\GridView;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
$this->title = 'Payment Transaction';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="row ">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-pie-chart text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Total</p>
                                <h4 class="card-title"><?= $data['total'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Revenue</p>
                                <h4 class="card-title">$ <?= $data['amount'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-attachment text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Featured Ads</p>
                                <h4 class="card-title"><?= $data['featured']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-clock-1 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Urgent Ads </p>
                                <h4 class="card-title"><?= $data['urjent']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    All Transaction Information
                </h4>

            </div>
        </div>
        <div class="card-body">


            <?php
            $gridColumns = [
                // the buy_amount column configuration
                ['class'=>'kartik\grid\SerialColumn'],

                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'user_id',
                    'header'=>'User',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'value'=>function ($model) {
                        $userInfo = \common\models\User::findIdentity($model->user_id);//($model->about_you,0,10);
                        return $userInfo['first_name']." ".$userInfo['last_name'];
                    },
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'ads_id',
                    'header'=>'Ads title',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'value'=>function ($model) {
                        $userInfo = \common\models\Ads::findOne($model->ads_id);//($model->about_you,0,10);
                        return substr($userInfo['ad_title'],'0','30');
                    },
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'amount',
                    'header'=>'Amount ? Price',
                    'format'=>'html',

                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'value'=>function ($model) {
                        return '<b>$ '.$model->amount.'</b>';
                    },
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'type',
                    'header'=>'Plan Type',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'payment_gateway',
                   // 'header'=>'Plan Type',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'payment_method',
                    // 'header'=>'Plan Type',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'pageSummary'=>true
                ],
                [
                    'class'=>'kartik\grid\DataColumn',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],

                    'attribute'=>'status',
                    'format'=>'html',
                    'content'=>function ($model) {
                        $status = $model->status;
                        return  Html::label($status,null,['class'=>'badge badge-success','style'=>'color:#fff !important']);//.//"<span class='label label-success'>$status</span>";
                    },
                    'pageSummary'=>true
                ],
                [
                    //'class'=>'kartik\grid\DataColumn',
                    'attribute'=>'created_at',
                    'label'=>'Transaction Date',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'contentOptions' => ['style' => 'color:#555'],
                    'value'=>function ($model) {
                        return date('d-m-Y',$model->created_at);
                    },
                    'pageSummary'=>true,
                    //'encode'=>false
                ],



            ];
            ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
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
//                'toolbar' =>  [
//                    ['content' =>
//                        Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add Book', 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
//                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
//                    ],
//                    '{export}',
//                    '{toggleData}',
//                ],
                // set export properties
                'export' => [
                    'fontAwesome' => true
                ],

                'columns'=>$gridColumns,



            ]) ?>
        </div>
    </div>
</div>





