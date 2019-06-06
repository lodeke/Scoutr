<?php
$this->title = "Notification Center";
?>
<div class="row no-gutters">


    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-xs-12">
        <h2 class="text-danger mt-3">
            <i class="la la-bell"></i> <?php echo  $this->title; ?>
        </h2>
        <div class="page-description">
            <div class="icon text-white">
                <i class="la la-star"></i>
            </div>
            <span>Here you’ll see the recent Feed and information of user match, new match etc.</span>
        </div>
        <ul class="notification-list">

            <?php
            foreach($model as $notification)
            {
                $type = $notification['type'];
                if($type == "new_request")
                {
                    $list = \common\models\User::find()->where(['id'=>$notification['request_id']])->one();

                    ?>
                    <li class="un-read">
                        <div class="author-thumb">
                            <img width="35" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']).'?isNew='.$list['username'].'&token='.base64_encode($list['id']); ?>" class="h6 notification-friend">
                                <?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>
                            </a>
                            Sent you a mach request
                            <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']); ?>" class="notification-link">
                                View profile
                            </a>.
                            <span class="notification-date">
                                <time class="entry-date updated">
                                    <?php echo  \common\models\Analytic::time_elapsed_string($notification['created_at']) ?>
                                </time>
                            </span>
                        </div>

                    </li>

                <?php
                }
                elseif($type == "reject_request")
                {
                    $list = \common\models\User::find()->where(['id'=>$notification['request_id']])->one();

                    ?>
                    <li class="un-read">
                        <div class="author-thumb">
                            <img width="35" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']) ?>" class="h6 notification-friend">
                                <?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?></a>
                            Reject Your mach request <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']); ?>" class="notification-link">view profile</a>.
                                <span class="notification-date">
                                    <time class="entry-date updated">
                                        <?php echo  \common\models\Analytic::time_elapsed_string($notification['created_at']) ?>
                                    </time>
                                </span>
                        </div>
                            <span class="notification-icon">
                                <i class="la la-heart"></i>
                            </span>

                        <div class="more">
                            <i class="la la-battery-three-quarters"></i>
                            <i class="la la-remove"></i>
                        </div>
                    </li>

                <?php
                }
                else
                {
                    $list = \common\models\User::find()->where(['id'=>$notification['new_mach_id']])->one();

                    ?>
                    <li class="un-read">
                        <div class="author-thumb">
                            <img width="35" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']); ?>" class="h6 notification-friend"><?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?></a> Is new match, Go and chat <a href="<?php echo  \yii\helpers\Url::toRoute('profile/'.$list['username']); ?>" class="notification-link">view profile</a>.
                           <span class="notification-date">
                                <time class="entry-date updated">
                                    <?php echo  \common\models\Analytic::time_elapsed_string($notification['created_at']) ?>
                                </time>
                            </span>
                        </div>
                            
                    </li>

                <?php
                }
                ?>

            <?php
            }
            ?>
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-2" id="">


        <div class="mt-3">
            <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/banner/ads.png" class="img-fluid">
        </div>
    </div>

</div>

