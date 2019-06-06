<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 2/6/2019
 * Time: 3:47 PM
 */
$Banner = Yii::getAlias('@web').'/images/site/banner/slide_four.jpg';
?>
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead" style="background-image: url('<?php echo  $Banner; ?>');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-right d-sm-none d-lg-block d-none">
                <h1 class="mt-5 text-white" style="text-transform: uppercase;font-weight: 900;font-size: 55px;text-shadow: 1px 1px 13px #1918188c">
                    <?php echo  $siteSettings['site_name'] ?>
                </h1>
                <h1 class="mt-5 text-white" style="text-transform: uppercase;font-size: 85px;font-weight: 600;text-shadow: 2px 2px 5px #1918188c">
                    Zoek je naar <span class="text-danger">iemand</span>?,<br>die ook in de  <span class="text-danger">scouts zit</span>?
                </h1>
                <p class="lead text-white" >Waar je leert sjorren ;)</p>


                <a href="<?php echo  \yii\helpers\Url::toRoute('site/login') ?>" class="btn btn-lg btn-primary text-white d-none">
                    Het is gratis ;) <i class="la la-angle-double-right"></i>
                </a>
                <button class="btn btn-lg btn-danger" data-toggle="modal" data-target="#welcomeModel">
                    Zoek nu je scoutr! <i class="la la-search"></i>
                </button>
            </div><!------ ########## For desktop --->
            <div class="col-12 text-center d-sm-block d-lg-none d-md-none d-xs-block d-block">
                <h1 class="mt-5 text-white" style="text-transform: uppercase;font-weight: 900;font-size: 50px;text-shadow: 1px 1px 13px #1918188c">
                    <?php echo  $siteSettings['site_name'] ?>
                </h1>
                <h1 class="mt-5 text-white" style="text-transform: uppercase;font-size: 40px;font-weight: 600;text-shadow: 2px 2px 5px #1918188c">
                    Zoeken naar <span class="text-danger">iemand</span>?,<br>Willen <span class="text-danger">daten</span>?
                </h1>
                <p class="lead text-white" >#1 datingwebsite ter wereld, meer dan 10 miljoen mensen op Scoutr</p>


                <a href="<?php echo  \yii\helpers\Url::toRoute('site/login') ?>" class="btn btn-lg btn-primary text-white d-none">
                    Het is gratis! <i class="la la-angle-double-right"></i>
                </a>
                <button class="btn btn-lg bg-danger mt-5" data-toggle="modal" data-target="#welcomeModel">
                    Find Now New People <i class="la la-search"></i>
                </button>
            </div> <!------ ########## For Mobile --->
        </div>
    </div>
</header>
<!-- Page Content -->
<section class="pt-5 bg-smoke">
    <div class="container pt-5">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/assets/guy.png" width="80%" alt="notebook">

            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" align="left">
                <h2 class="font-weight-light p-3">Wereld nummer #1 dating website</h2>
                <p class="p-3 mb-5">
                      Scoutr brengt leden snel met elkaar in contact, binnen een minuut kun je al een chat aangaan. Zo kun je dagelijks nieuwe mensen leren kennen. Wanneer je je registreert, beantwoord je enkele vragen over welke leden je wil leren kennen. 
                </p>
            </div>
        </div>

    </div>
</section>
<section class="py-5 bg-smoke-light d-lg-block d-none ">
    <div class="container">

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12" align="left">
                <h2 class="font-weight-light p-3">Nieuwe Scoutr's</h2>
                <div class="row no-gutters ">
                    <?php
                    $template = new \frontend\models\CardTemplate();
                    $template->model = \common\models\User::find()->limit('8')->all();
                    $template->temp = "round";
                    $template->user();
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="ui-block mt-5">
                    <div class="widget w-build-fav ">

                        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>

                        <div class="widget-thumb">
                            <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/assets/guy2.png" alt="login now">
                        </div>

                        <div class="content">
                            <span>Maak nieuwe vrienden!</span>
                            <a href="#" class="h4 title">Kies slim, kies Scoutr
</a>
                            <p>We help you for finding your perfect match! </p>
                            <a href="" class="btn btn-sm btn-danger">
                                MEDL JE AAN! <i class="la la-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- W-Create-Fav-Page -->



                    <!-- ... end W-Create-Fav-Page -->
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 pb-5">
                <h2 class="font-weight-light p-3">Doe nu mee, het is gratis</h2>
                <p class="p-3 mb-5">
                    Scoutr.be is de leukste manier om nieuwe mensen in je buurt te leren kennen. Je maakt een profiel aan, speelt games en chat met andere leden. Wat eruit volgt (nieuwe vrienden, een date, …) is volledig aan jou!” <span class=""><?php echo  $currentCity ?></span>
                </p>
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/signup') ?>" class="btn btn-lg btn-success bg-green"> Create New Account</a>
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/login') ?>" class="btn btn-lg btn-danger"> Member Login</a>
            </div>

        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 pb-5">
                <a href="<?php echo  \yii\helpers\Url::toRoute('site/index') ?>">
                    <img width="250px;" class="img-responsive mt-3" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
                </a>
                <h5>
                    <?php echo  $siteSettings['site_title']; ?>
                </h5>
            </div>
            <div class="col-12">
                <ul class="list-inline">
                    <?php
                    foreach($pages as $list)
                    {
                        $title = $list['title'];
                        $pageId = base64_encode($list['id']);

                        ?>
                        <li class="list-inline-item mr-2">
                            <a href="<?php echo  \yii\helpers\Url::toRoute('pages/'.$pageId.'-'.trim($title)) ?>" class="p-2">
                                <?php echo  $title; ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="list-inline-item mr-2">
                        <a href="<?php echo  \yii\helpers\Url::toRoute('site/contact') ?>" class="p-2">
                            Contact Us
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-12 mt-5">
                <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/assets/group-bottom.png" width="80%" alt="notebook">
            </div>
        </div>
    </div>
</footer>