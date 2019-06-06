<?php
$this->title = "Admin Dashboard";
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 10/31/2018
 * Time: 6:38 PM
 */

?>
<div class="row col-12">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-primary card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Total Page View</p>
                            <h4 class="card-title"><?php echo  $page_view; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-info card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Total Members</p>
                            <h4 class="card-title"><?php echo  $totalUser; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-success card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-gift"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Total Gift</p>
                            <h4 class="card-title"><?php echo  $totalGift; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-secondary card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-user-2"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Vip User</p>
                            <h4 class="card-title"><?php echo  $vip; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mt-12 mb-12">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-round">
                <div class="card-body">
                    <div class="card-title">Top Five New People</div>
                    <div class="card-list">
                        <?php
                        foreach($member as $list)
                        {
                            ?>
                            <div class="item-list">
                                <img src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/users/'.$list['images'] ?>" alt="users" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username"><?php echo  $list['first_name'] ?></div>
                                    <div class="status"><?php echo  \common\models\Analytic::time_elapsed_string($list['created_at']) ?></div>
                                </div>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('user/detail/'.$list['id']) ?>" class="btn btn-add">
                                    <i class="flaticon-medical"></i>
                                </a>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-round">
                <div class="card-body">
                    <div class="card-title">Latest Website Statistics</div>
                    <table class="table">
                        <tr>
                            <th>Visitor Agent</th>
                            <th>Visitor Browser</th>
                            <th>Visitor System</th>
                            <th>Visitor iP</th>
                            <th>Visitor City / Country</th>
                            <th>Refer Url</th>

                        </tr>
                        <?php
                        foreach($statistics as $list)
                        {
                            ?>
                            <tr>

                                <td><?php echo  \common\models\Track::ExactOs($list['agent']) ; ?></td>
                                <td><?php echo  \common\models\Track::ExactBrowserName($list['agent']) ; ?></td>
                                <td> <?php echo  $list['system']; ?></td>
                                <td> <?php echo  $list['ip']; ?></td>
                                <td><?php echo  $list['city']; ?> - <?php echo  $list['country']; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo  $list['ref']; ?>">
                                        <?php echo  $list['ref']; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
