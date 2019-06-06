<?php
$this->title = $title;
?>

<div class="row">

    <div class="col-12">
        <h2 class="text-danger pregular">
            <i class="la la-heart-o"></i> <?php echo  $this->title; ?>
        </h2>
        <p class="txt t-light4 pregular">Here is the list of people which is like by you</p>
    </div>
    <div class="col-12" id="result_container">
        <div class="card-columns">
            <?php
            $template = new \frontend\models\CardTemplate();
            $template->model = $model;
            $template->temp = (Yii::$app->user->identity->vip == 0)?'blue':false;

            $template->user();
            ?>
        </div>
    </div>
</div>
