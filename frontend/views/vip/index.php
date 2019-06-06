<?php
$this->title = "Get Vip Status";
$siteSettings = \common\models\SiteSettings::find()->one();
?>
<style>
    body{
        background-color: #fff;
    }
    .card{
       box-shadow: 0px 0px 5px rgba(85, 85, 85, 0.12) !important;
        margin-top: 2px;;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <img class="img-responsive mt-5" src="<?php echo  Yii::getAlias('@web').'/images/site/logo/'.$siteSettings['logo'] ?>">
        </div>
        <div class="col-12 mb-3">
            <h1 class="p-3 text-danger">
                Premium features
            </h1>
            <p class="p-2">
                Amazing Casanova features you can’t live without. get Vip status

            </p>
        </div>

        <div class="col-12">
            <div class="card-columns" align="center">


                <div class="card mb-3 border-bottom">
                    <div class="card-body">
                        <h1>
                            <i class="flaticon-medical"></i>
                        </h1>
                        <h5 class="card-title text-danger">See who likes you</h5>
                        <p class="card-text">
                            Get the full list of people who like you! We’ll also point them out on Profile, Visitors and DoubleTake.
                        </p>
                    </div>
                </div>
                <div class="card mb-3 border-bottom">

                    <div class="card-body">
                        <h1>
                            <i class="flaticon-lock-1"></i>
                        </h1>
                        <h5 class="card-title text-danger">Browse profiles invisibly</h5>
                        <p class="card-text">
                            No one will know if you’ve visited their profile, unless you want them to.
                        </p>
                    </div>
                </div>
                <div class="card mb-3 border-bottom">

                    <div class="card-body">
                        <h1>
                            <i class="flaticon-search-2"></i>
                        </h1>
                        <h5 class="card-title text-danger">Advanced search filters</h5>
                        <p class="card-text">
                            Search by attractiveness, body type, personality, and more! Now you can even search matches by
                            how they’ve publicly answered their questions.
                        </p>
                    </div>
                </div>
                <div class="card mb-3 border-bottom">

                    <div class="card-body">
                        <h1>
                            <i class="flaticon-chat-4"></i>
                        </h1>
                        <h5 class="card-title text-danger">Message read receipts</h5>
                        <p class="card-text">
                            Sometimes it’s nice to know that your message was seen. If you’re A-List, we’ll let you know.
                        </p>
                    </div>
                </div>
                <div class="card mb-3 border-bottom">

                    <div class="card-body">
                        <h1>
                            <i class="flaticon-signs-1"></i>
                        </h1>
                        <h5 class="card-title text-danger">No Ads</h5>
                        <p class="card-text">
                            This means faster page loads, fewer distractions, and less brainwashing.
                            No disturbance, feel free to dating
                        </p>
                    </div>
                </div>
                <div class="card mb-3 border-bottom">

                    <div class="card-body">
                        <h1>
                            <i class="flaticon-repeat"></i>
                        </h1>
                        <h5 class="card-title text-danger">Unlimited Reload</h5>
                        <p class="card-text">
                            Connect with many of People with unlimited reload, get more chance to match others people
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 mb-5">
            <h1 class="p-3">
                Let's Start
            </h1>
            <p class="p-2 mb-3">
                Are you ready for become a prime member? Click belove
            </p>
            <a href="<?php echo  \yii\helpers\Url::toRoute('vip/plan') ?>" class="btn bg-green btn-lg">
                Let's Go  for Premium <i class="la la-angle-double-right"></i>
            </a>
        </div>
    </div>
</div>
