<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 2/14/2019
 * Time: 2:16 PM
 */
?>
<div class="row mt-3">
    <?php
    $model = \common\models\User::find()->where(['id'=>'15'])->one();

    $temp = new \frontend\models\CardTemplate();
    $temp->templateOne($model);
    $temp->templateTwo($model);
    $temp->templateThree($model);
    ?>
</div>
<div class="row mt-5">
    <?php
    $model = \common\models\User::find()->where(['id'=>'15'])->one();

    $temp = new \frontend\models\CardTemplate();
    $temp->templateFour($model);
    $temp->templateFive($model);
    $temp->templateSix($model);
    ?>
</div>