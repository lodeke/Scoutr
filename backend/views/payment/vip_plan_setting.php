<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Vip User Plan';

$uid = Yii::$app->user->id;
$usrInfo = \common\models\User::findOne($uid);
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                    <i class="flaticon-coins"></i> <?php echo  Html::encode($this->title) ?>
                </h4>
            </div>
        </div>
        <div class="card-body">
            <?php
            if(!$all)
            {
                echo "<p> No premium Plan found </p>";
            }
            ?>
            <table class="table">
                <tr>
                    <th>Plan Name</th>
                    <th>Plan Price</th>
                    <th>Currency</th>
                    <th>Duration</th>
                    <th>feature</th>
                    <th>Action</th>

                </tr>
                <tbody>

                <?php

                foreach($all as $list)
                {
                    ?>

                    <tr>
                        <td>
                               <b class="text-info">  <?php echo  $list->name; ?> </b>
                        </td>
                        <td>

                            <span class="label label-success">$<?php echo  $list->price ; ?></span>
                        </td>
                        <td>
                            <span class="label label-info"><?php echo  $list->currency ; ?></span>

                        </td>
                        <td>
                            <span class="label label-info"><?php echo  $list->duration ; ?> Month</span>

                        </td>
                        <td>
                            <span class="label label-info"><?php echo  $list->features ; ?></span>

                        </td>
                        <td class="td-actions text-right">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('payment/plan-edit/'.base64_encode($list->id)) ?>" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>

                <?php
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>


