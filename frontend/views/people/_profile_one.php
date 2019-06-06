<?php
$this->title = $model['first_name']." Profile";
$template = 'encounter_five';
$coin = \common\models\Point::getPoint();
?>
<div class="row">

    <div class="col-lg-4">
        <div class="card mt-2">
            <div class="card-header bg-white">
                <h5 class="card-title text-redis ">
                    <?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?>, <span class="text-dark"><?php echo  $model['age']; ?></span>
                </h5>
            </div>
            <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" class="card-img-top">
            <div class="card-img-overlay">
                <div class="p-2">

                    <div align="center" style="position: relative;top: 150px;" >
                        <h3 class="text-danger text-capitalize h6 shadow-text">
                           Vind je leuk?
                        </h3>
                        <h3 class="text-white text-capitalize h6 mt-1 mb-4 shadow-text">
                            <?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?>
                        </h3>
                        <div class="d-table">
                            <div class="d-table-cell">
                                <button data-user="<?php echo  $model['id']; ?>" data-url="<?php echo  \yii\helpers\Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($model['id']) ?>" class="iLikeIt btn rounded-circle btn-danger counterBtn ml-2" style="width:40px;height: 40px">
                                    <span id="iLikeIt_icon_<?php echo  $model['id']; ?>"><i class="fa fa-heart-o "></i></span>
                                </button>
                            </div>
                            <div class="d-table-cell">
                                <button data-toggle="modal" onclick="openChat(<?php echo  $model['id']; ?>)" href="javascript:void()"  class="btn rounded-circle btn-info counterBtn  ml-3 mr-3" style="width:40px;height: 40px">
                                    <i class="flaticon-chat"></i>
                                </button>
                            </div>
                            <div class="d-table-cell">
                                <button data-user-name="<?php echo  $model['first_name']; ?>" data-user-id="<?php echo  $model['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" style="width:40px;height: 40px"  class="btn sendGift rounded-circle btn-success counterBtn mr-2">
                                    <i class="fa fa-gift"></i>
                                </button>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="txt t-light2 text-capitalize ">Locatie</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['city']; ?>, <?php echo  $model['country']; ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Zoeken naar</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['looking_for'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Ik ben</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['sexual_orientation'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Burgerlijke staat </h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['marital_status'] ?></h5>

                <h6 class="txt t-light2 text-capitalize  mt-3">Taal</h6>
                <h5 class="txt h6 t-light5 text-capitalize pthin">Nederlands</h5>

            </div>

        </div>
        <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-warning btn-block mt-3">
            Word VIP-Scoutr
        </a>
        <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-primary btn-block mt-3">
           Koop Coins: <?php echo  \common\models\Point::getPoint(); ?>
        </a>
    </div>
    <div class="col-lg-8">
        <h4 class="txt mt-2 t-light4 font-weight-bold pl-2">Meer informatie</h4>
        <hr>
        <div class="d-table pl-2" style="width: 100%">
            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Kinderen</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['children'])?$model['children']:'not give'; ; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize">Religie</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['religion'])?$model['religion']:'not give';; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Talen</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  ($model['languages'])?$model['languages']:'not give'; ; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Roker</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['smoker']; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Drinker</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['drinking']; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Roker</h6>
                    <h5 class="txt h6 t-light5 text-capitalize pthin"><?php echo  $model['smoker']; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Hoogte</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['height'])?$model['height']:'not give';  ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Gewicht</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['weight_kg'])?$model['weight_kg']:'not give'; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Lichaamsbouw</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $model['build']; ?></h5>
                </div>
            </div>

            <div class="d-table-row">
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Haar kleur</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  ($model['hair_color'])?$model['hair_color']:'not give'; ?></h5>
                </div>
                <div class="d-table-cell">
                    <h6 class="txt t-light2 text-capitalize ">Oog kleur</h6>
                    <h5 class="txt t-light5 h6 text-capitalize pthin"><?php echo  $model['eye_color']; ?></h5>
                </div>
            </div>
        </div> <!--//personal info -->
        <h4 class="txt mt-3 t-light4 font-weight-bold pl-2">Album</h4>
        <hr>

        <?php
        $template = new \frontend\models\CardTemplate();
        $template->user = $model['id'];
        $template->albumMissanary();
        ?>
        <?php
        $template = new \frontend\models\CardTemplate();
        $template->limit = 5;
        $template->title = "You may like";
        $template->mayLike();
        ?>



    </div>
</div>


