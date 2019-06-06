<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 11-05-2016
 * Time: 11:36
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use Yii\bootstrap\Modal;
use kartik\editable\Editable;
use \yii\helpers\Url;
use kartik\grid\DataColumn;

$this->title = 'Faker - Create Fake data';

?>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                   Fake User
                </h4>

            </div>
        </div>
        <div class="card-body" align="center">

            <h1 class="text-success">
                <i class="la la-user"></i>
            </h1>
            <h4 style="color:#999">
                Create Fake User
            </h4>
            <br>

            <a href="<?php echo  Url::toRoute('faker/users') ?>" class="btn btn-block btn-success col-4"> <i class="la la-upload"></i> Create Record </a>


        </div>
        <div class="card-footer ">

        </div>
    </div>
</div>
