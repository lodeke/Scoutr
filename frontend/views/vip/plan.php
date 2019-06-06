<?php
$this->title = "Pricing plan";
$siteSettings = \common\models\SiteSettings::find()->one();

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="img-responsive mt-5" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
        </div>
        <div class="col-12 mb-3">
            <h1 class="p-3 text-primary">
                Our Premium Plan
            </h1>
            <p class="p-2">
                Vip Membership plan List,Exciting Membership Plan, Choose Best for you
            </p>
        </div>

        <div class="col-12">
            <div class="row" align="center">
                <?php
                foreach($plan as $list)
                {
                    ?>
                    <div class="col-lg-4 col-ms-4 col-sm-12 col-xs-12 " >
                        <div class="card mb-3 border-bottom ">
                            <div class="card-header">
                                <?php echo  $list['name'] ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo  $list['name'] ?></h5>
                                <h1 class="text-primary"> $<?php echo  $list['price'] ?>/-</h1>
                                <h5 class="text-success"> <?php echo  $list['duration'] ?> month</h5>

                                <p class="card-text">
                                    <?php
                                    $features = explode(',',$list['features']);
                                    foreach($features as $feature)
                                    {
                                        echo "<p class='card-text'> ".$feature."</p>";
                                    }
                                    ?>
                                </p>
                                <button data-plan-id="<?php echo  $list['id']; ?>" data-plan-price="<?php echo  $list['price']; ?>" class="btn bg-smoke text-primary membershipPaymentBtn">
                                        Select Plane
                                </button>

                            </div>
                        </div>
                    </div>


                <?php
                }
                ?>



            </div>
        </div>

        <div class="col-12 p-2 mb-5">
            <h1 class="p-3">
                All sets?
            </h1>
            <p class="p-2 mb-3">
                Shall We Go for Premium Membership?
            </p>
            <?php $form = ActiveForm::begin(['id' => 'form-vip']); ?>
            <?php echo  $form->field($model, 'type')->hiddenInput(['id'=>'payment_type','value'=>'membership'])->label(false) ?>
            <?php echo  $form->field($model, 'plan')->hiddenInput(['id'=>'payment_plan_id','value'=>''])->label(false) ?>
            <?php echo  $form->field($model, 'price')->hiddenInput(['id'=>'payment_price','value'=>''])->label(false) ?>
            <button type="submit" class="btn bg-green btn-lg" disabled id="do-payment">
               Please Select a Plan <i class="la la-ban"></i>
            </button>
            <?php ActiveForm::end(); ?>
            <a href="<?php echo  \yii\helpers\Url::toRoute('site/index')?>" class="text-small text-secondary">
                Skip for now. Back to homepage
            </a>
        </div>
        <div>


        </div>
    </div>
</div>




