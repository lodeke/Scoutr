<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 11-05-2016
 * Time: 11:36
 */
//var_dump($model);

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use Yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use \yii\helpers\Url;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'User List';
$this->params['breadcrumbs'][] = $this->title;

?>
<input type="hidden" name="SubCatUrl" id="useraddurl" value="<?php echo  \yii\helpers\Url::toRoute('site/user') ?>">

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    User List
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
                ///======== Detail button section =========////

                [
                    'class' =>'\kartik\grid\ExpandRowColumn',
                    'header'=>'Detail',
                    'expandIcon'=>'<span class="flaticon-download-1 text-primary"></span>',

                    'value'=>function ($model, $key, $index,$column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl'=> Yii::$app->request->getBaseUrl().'/user/user-detail',
                ],

                ///======== username section =========////
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
                    'attribute'=>'phone_numbers',
                    'pageSummary'=>true,

                    'editableOptions'=>[
                        'header'=>'Edit Phone Number',
                        'inputType' => Editable::INPUT_TEXT,
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
                // 'filterModel' => $searchModel,
                'pjax'=>true,
                'pjaxSettings'=>[
                    'neverTimeout'=>true,
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
						Add
                    </span>
                    <span class="fw-light">
                        New User
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['edit/add-user'],
                'options' => ['id' => 'add_user_form','class' => 'master-form']
            ]); ?>
            <div class="modal-body">
                <p class="small">Create a new row using this form, make sure you fill them all</p>
                <div class="row">


                    <div class="col-sm-12">
                        <?php
                        echo $form->field($searchModel, 'username', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Enter unique username?'])
                        ?>

                        <?php
                        echo $form->field($searchModel, 'email', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Enter Email Address?'])
                        ?>
                        <?php
                        echo $form->field($searchModel, 'password', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->passwordInput(['placeholder'=>'Enter User Password?'])
                        ?>
                        <?php echo $form->field($searchModel, 'first_name', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textInput(['placeholder'=>'Enter sub category name?']) ?>

                        <?php echo $form->field($searchModel, 'last_name', [
                            'template' => '
                                <div class="form-group form-group-default">
                                    {label} {input}{error}{hint}
                                </div>'
                        ]); ?>
                        <?php
                        echo $form->field($searchModel, 'about_you', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ])->textarea(['placeholder'=>'Enter User Password?'])
                        ?>
                        <?php
                        echo $form->field($searchModel, 'phone_number', [
                            'template' => '<div class="form-group form-group-default">
                                {label} {input}{error}{hint}
                                </div>'
                        ]);
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
