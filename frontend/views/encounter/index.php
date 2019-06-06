<?php
use yii\helpers\Url;
use common\models\User;

if($modal)
{
    echo "<div class='card-columns'>";
    foreach($modal as $list)
    {
        $url = Url::toRoute('preview/').'/'.$list['username'];

        $img = Yii::getAlias('@web').'/images/users/'.$list['images'];
        $content = '<strong>'.$list['first_name'].'&nbsp;'.$list['last_name'].'</strong>, '.$list['age'].' yr old';

        ?>
        <div class="card">
            <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" class="card-img-top" src="<?= $img; ?>">
            <div class="card-body">
                <p><?= $content; ?></p>
                <a href="'.$url.'" class="btn btn-sm btn-danger">
                    <i class="la la-thumbs-o-up"></i>
                    Like</a>
            </div>
        </div>
        <?php
    }
    echo "</div>";

}
else
{
    $modal = User::find()->where(['!=','gender',$sex])->select(['username','images','first_name','last_name','age'])->limit(8)->all();
    echo "<p class='bg-blue p-2 alert  alert-primary'> Sorry we never got any result from $currentCity. we are showing you some other suggestion.</p>";
    if($modal)
    {
        echo "<div class='card-columns'>";
        foreach($modal as $list)
        {
            $url = Url::toRoute('preview/').'/'.$list['username'];

            $img = Yii::getAlias('@web').'/images/users/'.$list['images'];
            $content = '<strong>'.$list['first_name'].'&nbsp;'.$list['last_name'].'</strong>, '.$list['age'].' yr old';

            echo $dataTmp = '';

            ?>
            <div class="card">
                <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" class="card-img-top" src="<?= $img; ?>">
                <div class="card-body">
                    <p><?= $content; ?></p>
                    <a href="<?= $url; ?>" class="btn btn-sm btn-success"> View Profile</a>
                </div>
            </div>

        <?php

        }
        echo "</div>";

    }
    else
    {
        echo $dataTmp = '<h2>We Sorry to say you</h2><h5>No Perfect match found for you. Please Signup for best Result </h5>';

    }

}