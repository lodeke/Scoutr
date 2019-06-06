<?php
$this->title = $model['first_name']." Profile";
$template = 'encounter_five';
$coin = \common\models\Point::getPoint();
?>
<div class="row">
    <div class="col-12">

        <nav class="navbar navbar-expand-lg navbar-light bg-smoke-light text-white mb-3">
            <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="navbar-brand text-danger  h6">
                <?php echo  $model['first_name']; ?><?php echo  $model['last_name']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#profilemenu" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="profilemenu">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-link">
                        <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/upload-photo') ?>">
                            Profile Photos
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/album') ?>">
                            Create Album
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/personal-information') ?>">
                            Edit Personal Information
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>">
                            Edit Profile Settings
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link h6" href="<?php echo  \yii\helpers\Url::toRoute('edit/account-settings') ?>">
                            Edit Account Settings
                        </a>
                    </li>

                </ul>
            </div>




        </nav>
    </div>
    <div class="col-12 p-2" style="overflow: hidden" align="center">
        <?php \common\models\Adsense::show('top'); ?>
    </div>
    <div class="col-lg-4">
        <div class="card mt-2">
            <div class="card-header bg-white">
                <h5 class="card-title text-redis ">
                    <?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?>, <span class="text-dark"><?php echo  $model['age']; ?></span>
                </h5>
            </div>
            <img src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" class="card-img-top">

            <div class="card-body">
                <h6 class="txt t-light2 text-capitalize ">location</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['city']; ?>, <?php echo  $model['country']; ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Looking for</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['looking_for'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">i am </h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['sexual_orientation'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">marital status </h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['marital_status'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Language</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin">English</h5>

            </div>

        </div>
        <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-warning btn-block mt-3">
            Become Vip Member
        </a>
        <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-primary btn-block mt-3">
            Buy Coin : <?php echo  \common\models\Point::getPoint(); ?>
        </a>
    </div>
    <div class="col-lg-8">
        <h4 class="txt mt-2 t-light4 font-weight-bold pl-2">More Info</h4>
        <hr>
        <div class="d-table pl-2" style="width: 100%">
            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">children</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['children'])?$model['children']:'not give'; ; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize">religion</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['religion'])?$model['religion']:'not give';; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">languages</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['languages'])?$model['languages']:'not give'; ; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['smoker']; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">drinking</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['drinking']; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['smoker']; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">height</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['height'])?$model['height']:'not give';  ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">weight</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['weight_kg'])?$model['weight_kg']:'not give'; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">build</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $model['build']; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">hair color</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['hair_color'])?$model['hair_color']:'not give'; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">eye color</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $model['eye_color']; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">smoker</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $model['smoker']; ?></h5>
                </div>

            </div>
        </div> <!--//personal info -->
        <h4 class="txt mt-3 t-light4 font-weight-bold pl-2">Album</h4>
        <hr>

        <?php
        $template = new \frontend\models\CardTemplate();
        $template->albumMissanary();
        ?>
        <?php
        $template = new \frontend\models\CardTemplate();
        $template->limit = 5;
        $template->title = "You may like";
        $template->mayLike();
        ?>

        <h4 class="txt t-light4 mt-5 font-weight-bold pl-2">Match</h4>
        <hr>
        <div class="row mt-3 p-2" id="result_container">
            <div class="d-flex pl-2">
                <?php
                $template = new \frontend\models\CardTemplate();
                $template->model = $match;
                $template->isMatch = true;;
                $template->user();
                ?>
            </div>
        </div>

    </div>
</div>

<div class="row d-none">
    <div class="col-12">

        <nav class="navbar navbar-expand-lg navbar-light bg-smoke-light text-white mb-3">
            <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="navbar-brand text-danger">
                <?php echo  $model['first_name']; ?><?php echo  $model['last_name']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#profilemenu" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="profilemenu">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-link">
                        <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/upload-photo') ?>">
                            Upload Photos
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/personal-information') ?>">
                            Edit Personal Information
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>">
                            Edit Profile Settings
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/account-settings') ?>">
                            Edit Account Settings
                        </a>
                    </li>

                </ul>
            </div>




        </nav>
    </div>
    <div class="col-12">
        <div class="ui-block">
            <div class="ui-block-content">

                <div class="row">

                    <div class="col-6">
                        <img width="100%" style="box-shadow: 1px 1px 3px rgba(85, 85, 85, 0.40);" class="mb-5" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" >

                        <div class="ui-block">
                            <h5 class="ui-block-title text-danger">
                                <i class="la la-info-circle float-right"></i> Personal Info
                            </h5>
                            <div class="ui-block-content">
                                <ui class="list--styled text-danger">
                                    <li class="">
                                        <strong class="p-1"> Relationship Status </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['marital_status'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> Sexual Orientation </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['sexual_orientation'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> children </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['children'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> languages </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['languages'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> looking for </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['looking_for'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> religion </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['religion'] ?>
                                    </li>

                                </ui>
                            </div>
                        </div> <!--//personal info -->


                        <div class="ui-block">
                            <h6 class="ui-block-title text-danger">
                                Body Info <i class="la la-bold float-right"></i>
                            </h6>
                            <div class="ui-block-content">
                                <ui class="list--styled">
                                    <li class="">
                                        <strong class="p-1"> height </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['height'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> weight </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['weight_kg'] ?> Kg
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> build </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['build'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> hair color </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['hair_color'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> eye color </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['eye_color'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> build </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['build'] ?>
                                    </li>
                                </ui>
                            </div>
                        </div> <!--//personal info -->


                    </div>
                    <div class="col-6" >
                        <div align="center">
                            <h4 class="pt-0"><?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?></h4>
                            <h5 class="p-2"><?php echo  $model['city']; ?>, <?php echo  $model['age']; ?>Yr</h5>




                            <p>Bio</p>
                            <p>
                                <?php echo  $model['bio']; ?>
                            </p>
                        </div>


                        <div class="ui-block text-danger">
                            <div class="ui-block-content">
                                <?php
                                $vip = $model['first_name'];
                                if($vip == '0')
                                {
                                    ?>
                                    <h1><i class='la la-wheelchair'></i></h1>
                                    <h5 class="card-title">BASIC MEMBER</i></h5>

                                    <p class="card-text">
                                        Now you Registered as <b>Basic Member</b>, it's time to get more matches, do upgrade now
                                        and get more match
                                    </p>
                                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn btn-sm bg-green"> UPGRADE <i class="la la-angle-double-right"></i> </a>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <h1><i class='la la-certificate'></i></h1>
                                    <h5 class="card-title"><strong>PREMIUM MEMBER</strong></h5>

                                    <p class="card-text">
                                        you Registered as <b>Premium Member</b>,Your membership plan will be end on <br><span class="text-danger"><?php echo  date('d-M-Y',$model['vip_end']); ?></span>
                                    </p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="ui-block text-danger">

                            <div class="ui-block-content">
                                <h5 class="card-title">Your Coin: <?php echo  $coin ?></h5>
                                <p class="card-text">
                                    You have only <?php echo  $coin ?> coin yet, if you want  to send more gift you should be buy coin.
                                </p>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('vip/coin') ?>" class="btn btn-sm btn-danger"> BUY MORE </a>
                            </div>
                        </div>
                        <div class="ui-block text-danger">

                            <div class="ui-block-content">
                                <h5 class="card-title">Total Gift: <?php echo  count($gifts) ?></h5>
                                <h4 class="card-title">Total Coin: <?php echo  $coin ?></h4>
                                <div class="row">
                                    <?php
                                    foreach($gifts as $gift)
                                    {
                                        $src = Yii::getAlias('@web').'/images/site/gift/'.$gift['image'];
                                        ?>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xs-12" >
                                            <div class='card' style="cursor: pointer" align="center"  >
                                                <img class='card-img-top' src='<?php echo  $src; ?>'>
                                                <div class='card-body' style="padding: 2px">
                                                    <small><?php echo  $gift['point']; ?> coin</small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p class="card-text">
                                    You have only <?php echo  $coin ?> coin yet, if you want  to send more gift you should be buy coin.
                                </p>
                                <a href="<?php echo  \yii\helpers\Url::toRoute('vip/coin') ?>" class="btn btn-sm btn-danger"> BUY MORE </a>
                            </div>
                        </div>


                        <div class="ui-block">
                            <h5 class="ui-block-title text-danger">
                                Habits Info <i class="la la-apple float-right"></i>
                            </h5>
                            <div class="ui-block-content">
                                <ui class="list--styled">
                                    <li class="">
                                        <strong class="p-1"> smoker </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['smoker'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> drinking </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['drinking'] ?>
                                    </li>
                                    <li class="">
                                        <strong class="p-1"> looking for </strong>   <i class="la la-angle-double-right"></i>  <?php echo  $model['looking_for'] ?>
                                    </li>

                                </ui>
                            </div>
                        </div> <!--//habit info -->
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

