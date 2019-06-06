<?php
$this->title = "User profile";
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile card-secondary">
                <div class="card-header" style="background-image: url('<?php echo  Yii::$app->urlManagerFrontend->baseUrl ?>/assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <img src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/users/'.$model['images'] ?>" alt="Profile Picture">
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name"><?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?></div>
                        <div class="job">
                            <i class="la la-heart"></i> <?php echo  $model['marital_status']; ?>
                        </div>
                        <div class="desc"><?php echo  $model['bio']; ?></div>
                        <div class="view-profile">
                            <a href="#" class="btn btn-secondary btn-block">
                                Member From  <i class="fa fa-angle-right"></i>
                                <?php echo  date('d-m-Y',$model['created_at']); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row user-stats text-center">
                        <div class="col">
                            <div class="number"><?php echo  count(explode(',',$elo['user_like_back'])); ?></div>
                            <div class="title">Match</div>
                        </div>

                        <div class="col">
                            <div class="number"><?php echo  $elo['profile_impression'] ?></div>
                            <div class="title">Profile  visitors </div>
                        </div>

                        <div class="col">
                            <div class="number"><?php echo  $elo['elo_score'] ?></div>
                            <div class="title">ELO Score</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">More About <?php echo  $model['first_name'] ?> (User Detail)</strong>
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd pull-right" id="pills-tab-without-border" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#detail_panel_<?php echo  $model['id'] ?>" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                <i class="flaticon-user-1"></i>
                                Detail
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#ads_panel_<?php echo  $model['id'] ?>" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                <i class="flaticon-like"></i>
                                Match
                            </a>
                        </li>

                    </ul>

                </div>
                <div class="card-body">
                    <div class="tab-content mb-3" id="pills-with-icon-tabContent_detail_panel_<?php echo  $model['id'] ?>">
                        <div class="tab-pane fade in show active" id="detail_panel_<?php echo  $model['id'] ?>" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <table class="table">
                                <?php
                                foreach($model as $key=>$user)
                                {
                                    $restrict = ['password_hash'=>'1','id'=>'1','updated_at'=>'1','image'=>'1','status'=>'1','password_reset_token'=>'1','lat'=>'1','lng'=>'1','flag_v'=>'1','purchase_code'=>'1','otp'=>'1','auth_key'=>'1'];
                                    if(array_key_exists($key,$restrict))
                                    {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo  $key; ?>
                                        </td>
                                        <td class="text-capitalize">
                                            <?php
                                            if($key == "created_at")
                                            {
                                                echo date('d-m-Y',$user);
                                            }
                                            else
                                            {
                                                echo str_replace("_"," ",$user);
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ads_panel_<?php echo  $model['id'] ?>" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                            <div class="card">
                                <div class="card-list">
                                    <?php
                                    if($match)
                                    {
                                        foreach($match as $user)
                                        {
                                            ?>
                                            <div class="item-list">
                                                <img src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/users/'.$user['images'] ?>" alt="users" class="small-pic">
                                                <div class="info-user ml-3">
                                                    <div class="username"><?php echo  $user['first_name'] ?> <?php echo  $user['last_name'] ?> (<?php echo  $user['age'] ?> year)</div>
                                                    <div class="status">
                                                        <i class="la la-heart"></i>  <?php echo  $user['marital_status'] ?>,
                                                        <i class="la la-map-marker"></i>  <?php echo  $user['city'] ?>
                                                    </div>
                                                </div>
                                                <a href="<?php echo  \yii\helpers\Url::toRoute('user/detail/'.$user['id']) ?>" class="btn btn-add">
                                                    <i class="flaticon-medical"></i>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <div class="username">No Match</div>
                                                <div class="status">
                                                </div>
                                            </div>

                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>