<?php
use yii\helpers\Url;
$this->title = $model['first_name']." Profile";
$template = 'encounter_five';
$latout = isset($_GET['l'])?true:false;;
if($latout)
{
    $mainCol = "col-6 pr-lg-5 pl-lg-5";
    $sider = "col-3";
    $riterder = "col-3";
    $gutters = "";
}
else
{
    $mainCol = "col-8 pr-lg-5 pl-lg-5";
    $sider = "d-none";
    $riterder = "col-4";
    $gutters = "no-gutters";

}
?>
<div class="row <?php echo  $gutters; ?> mb-5">
    <?php
    if($new)
    {
        ?>
        <div class="row no-gutters bg-white" id="matchReq" is-new="true">
            <div class="col-lg-8 col-lg-8 col-sm-6 col-xs-6 bg-smoke-light">
                <h3 class="card-title p-3" id="matchReqtitle">
                    <span class="text-primary" style="text-transform: capitalize;font-weight: 500"><?php echo  $new; ?></span> Stuur je Scoutr verzoek.
                </h3>
            </div>
            <div class="col-lg-2 col-lg-2 col-sm-3 col-xs-3 p-2 bg-smoke-light">
                <button data-user="<?php echo  $model['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($model['id']) ?>" class="btn btn-block bg-green iLikeIt text-capitalize">
                    Aanvaarden <span style="width: 25px;display: inline-block"><i class="la la-check"></i>
                </button>
            </div>
            <div class="col-lg-2 col-lg-2 col-sm-3 col-xs-3 p-2 bg-smoke-light text-capitalize" >
                <button data-user="<?php echo  $model['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/dislike') ?>?id=<?php echo  base64_encode($model['id']) ?>" class="btn btn-block bg-green iDontIt text-capitalize">
                    <i class="la la-remove rejIcon"></i>afwijzen
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="<?php echo  $sider ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="align-self-center" style="width: 60px">
                        <i class="fa text-success fa-3x txt pregular">50</i>
                    </div>
                    <div class="align-self-center pl-3" >
                        <h5 class="txt t-light3 psemibold">
                            Jouw score
                        </h5>
                        <small class="txt t-light2 psemibold">
                           Meld u nu aan voor het lidmaatschapsplan
                        </small>
                    </div>

                </div>

                <div class="mt-3 row pl-lg-2 pr-lg-2">
                    <button class="btn btn-success p-2 btn-block ">  <i class="fa fa-crosshairs"></i> Krijg premium </button>

                </div>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="align-self-center" style="width: 60px">
                        <i class="fa fa-heart-o text-redis fa-3x"></i>
                    </div>
                    <div class="align-self-center pl-3" >
                        <h5 class="txt t-light3 psemibold">
                            Populair worden
                        </h5>
                        <small class="txt t-light2 psemibold">
                            Meld u nu aan voor het lidmaatschapsplan
                        </small>
                    </div>

                </div>

                <div class="mt-3 row pl-lg-2 pr-lg-2">
                    <button class="btn btn-danger p-2 btn-block ">  <i class="fa fa-crosshairs"></i> Krijg premium</button>

                </div>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-white">
                <span class="txt t-light3 psemibold p-2 text-dark"><i class="fa fa-user"></i> Nieuwe leden</span>
            </div>
            <div class="card-body">
                <div class="card-columns">
                    <?php
                    $newuser = \common\models\User::find()->limit(15)->orderBy(['id'=>SORT_DESC])->all();
                    foreach($newuser as $key=>$list)
                    {
                        if($key > 14)
                        {
                            break;
                        }
                        ?>
                        <div class="card">
                            <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="circle">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <div class="<?php echo  $mainCol; ?> mt-3">
        <div class="card rounded">
            <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>" class="card-img-top rounded">

            <div class="card-img-overlay">
                <div class="p-2">
                    <section class="d-flex justify-content-between">
                        <div class="text-white font-weight-bold shadow-lg">
                            <i class="fa fa-location-arrow"></i> 26 kilometer
                        </div>
                        <div class="text-white font-weight-bold  shadow-lg">
                            <i class="fa fa-camera"></i> 1
                        </div>
                    </section>

                    <div align="center" style="bottom: 50px;position: absolute;width: 100%" >
                        <h3 class="text-white text-capitalize mb-4 shadow-text">
                            <?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?>, <?php echo  $model['age']; ?>
                        </h3>
                        <div class="d-table">






                            <div class="d-table-cell">
                                <button data-user="<?php echo  $model['id']; ?>" data-url="<?php echo  \yii\helpers\Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($model['id']) ?>" class="iLikeIt btn rounded-circle btn-danger counterBtn ml-5" >
                                    <span id="iLikeIt_icon_<?php echo  $model['id']; ?>"><i class="fa fa-heart-o fa-2x"></i></span>
                                </button>
                            </div>
                            <div class="d-table-cell">
                                <button data-toggle="modal" onclick="openChat(<?php echo  $model['id']; ?>)" href="javascript:void()"  class="btn rounded-circle btn-info counterBtn  ml-5 mr-5">
                                    <i class="flaticon-chat fa-2x"></i>
                                </button>
                            </div>
                            <div class="d-table-cell">
                                <button data-user-name="<?php echo  $model['first_name']; ?>" data-user-id="<?php echo  $model['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $model['images']; ?>"  class="btn sendGift rounded-circle btn-success counterBtn mr-5">
                                    <i class="fa fa-gift fa-2x"></i>
                                </button>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>
        <h4 class="txt mt-3 t-light4 font-weight-bold pl-2">Album</h4>
        <hr>
        <?php
        $template = new \frontend\models\CardTemplate();
        $template->user = $model['id'];
        $template->albumMissanary();
        ?>
    </div>
    <div class="<?php echo  $riterder ?>">

        <div class="card mt-3">
            <div class="card-body">

                <h5 class="txt t-light3 psemibold">
                   Your Coin
                </h5>
                <small class="txt t-light2 psemibold">
                   Je kunt meer kopen, voor meer geschenk te verzenden
                </small>
                <h1>
                    <i class="flaticon-coins"></i> <?php echo  \common\models\Point::getPoint(); ?>
                </h1>

                <div class="mt-3 row pl-lg-2 pr-lg-2" align="center">

                    <a href="<?php echo  \yii\helpers\Url::toRoute('vip/index') ?>" class="btn p-3 btn-primary btn-block mt-3">
                        KOOP MEER <i class="fa fa-angle-double-right"></i>
                    </a>

                </div>


            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-white">
                <h4 class="card-title text-redis">
                    <?php echo  $model['first_name']; ?> <?php echo  $model['last_name']; ?>, <?php echo  $model['age']; ?>
                </h4>
            </div>
            <div class="card-body">
                <h6 class="txt t-light2 text-capitalize pregular">Plaats</h6>
                <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['city']; ?> <?php echo  $model['country']; ?></h5>

                <h6 class="txt t-light2 text-capitalize pregular mt-3">Zoeken naar</h6>
                <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['looking_for'] ?></h5>

                <h6 class="txt t-light2 text-capitalize pregular mt-3">Ik ben</h6>
                <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['sexual_orientation'] ?></h5>

                <h6 class="txt t-light2 text-capitalize pregular mt-3">burgerlijke staat </h6>
                <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['marital_status'] ?></h5>

                <h6 class="txt t-light2 text-capitalize pregular mt-3">Taal</h6>
                <h5 class="txt t-light5 text-capitalize pregular">Nederlands</h5>


            </div>
        </div>

    </div>
    <div class="col-12 pl-lg-5 pr-lg-5">
            <h3 class="txt t-light4 font-weight-bold">Meer informatie</h3>
            <hr>
            <div class="d-table" style="width: 100%">
                <div class="d-table-row">
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Kinderen</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['children']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Religie</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['religion']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Talen</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['languages']; ?></h5>
                    </div>
                </div>

                <div class="d-table-row">
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Roker</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['smoker']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Drinker</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['drinking']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Smoker</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['smoker']; ?></h5>
                    </div>
                </div>

                <div class="d-table-row">
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Grote</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['height']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">gewicht</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['weight_kg']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Lichaamsbouw</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['build']; ?></h5>
                    </div>
                </div>

                <div class="d-table-row">
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Kleur haar</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['hair_color']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Kleur ogen</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['eye_color']; ?></h5>
                    </div>
                    <div class="d-table-cell">
                        <h6 class="txt t-light2 text-capitalize pregular">Roker</h6>
                        <h5 class="txt t-light5 text-capitalize pregular"><?php echo  $model['smoker']; ?></h5>
                    </div>

                </div>



            </div> <!--//personal info -->

        <?php
        $template = new \frontend\models\CardTemplate();
        $template->limit = 5;
        $template->title = "Some Suggestion For you";
        $template->mayLike();
        ?>
    </div>
</div>
<?php
echo Yii::$app->controller->renderPartial('_gift', [
    'model' => $model
]);
?>