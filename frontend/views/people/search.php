<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = "Find Your Perfect Match";
$vip = (Yii::$app->user->identity->vip == 0)?false:true
?>
<div id="mySidenav" class="sidenav card p-0">
    <h3 class="card-header" style="position: fixed;background-color: white;z-index: 999;width: inherit">
        <i class="la la-search"></i> Search
        <a href="javascript:void(0)" class="float-right closebtn" onclick="closeNav()">&times;</a>
    </h3>
    <div class="card-body">
        <p>
            Hello, Wish You Best wishes for your match Keep searching,
        </p>
        <br>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <div class="row" align="left">
            <div class="col-6">
                <div class="md-form mt-0">
                    <?php echo  $form->field($search, 'gender')->dropDownList(
                        [
                            'male'=>'male',
                            'female'=>'female',
                            'others'=>'others',
                        ]);
                    ?>
                </div>
            </div>
            <div class="col-6">
                <?php echo  $form->field($search, 'sexual_orientation')->dropDownList(
                    [
                        'straight'=>'straight',
                        'lesbian'=>'lesbian',
                        'gay'=>'gay',
                        'bisexual'=>'bisexual'

                    ]);
                ?>

            </div>

        </div>


        <div class="row" style="background-color: #fff7ec;padding-bottom: 20px;border-radius: 7px;box-shadow: 0px 0px 3px rgba(85, 85, 85, 0.14)" align="left">
            <div class="col-4 align-self-center" align="center">
                <div class="md-form">
                    <div class="slidercontainer">
                        <label for="age_from">Age From : </label>
                        <input id="age_from" type="range" name="age_from" class="slider" min="16" max="60" value="18">
                    </div>
                </div>
            </div>
            <div class="col-4 align-self-center" align="center">
                <div style="font-size:40px;">
                    <span id="age_from_preview">18</span></label>-<i class="la la-user"></i>-<span id="age_to_preview">22</span>
                </div>
            </div>
            <div class="col-4 align-self-center">
                <div class="md-form">
                    <div class="slidercontainer">
                        <label for="age_to">Age to :</label>
                        <input id="age_to" type="range" name="age_to" class="slider" min="18" max="70" value="22">
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-6">
                <div class="md-form mt-0">
                    <?php echo  $form->field($search, 'search_for')->dropDownList(
                        [
                            'friends'=>'friends',
                            'adventure'=>'adventure',
                            'soulmate'=>'soulmate',
                            'dating'=>'dating'

                        ]);
                    ?>
                </div>
            </div>
            <div class="col-6">
                <?php echo  $form->field($search, 'marital_status')->dropDownList(
                    [
                        'Single'=>'Single',
                        'In a relationship'=>'In a relationship',
                        'Married'=>'Married',
                        'Divorced'=>'Divorced',
                        'Widowed'=>'Widowed',
                        'Rather not say'=>'Rather not say',
                        'Separated'=>'Separated'
                    ]);
                ?>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="md-form mt-10">
                    <input type="submit" value="Find" class="btn-lg btn btn-block btn-primary">
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


<div class="row no-gutters">
    <div class="col-12">

        <h2 class="text-danger pregular d-lg-block d-sm-none d-none">
            <i class="la la-search"></i> <?php echo  $this->title; ?>
            <span style="font-size:30px;cursor:pointer;float: right" onclick="openNav()">&#9776;</span>


        </h2>
        <h2 class="text-danger pregular d-lg-none">
            <i class="la la-user-plus"></i>
            Find People
            <span style="font-size:30px;cursor:pointer;float: right" onclick="openNav()" >
                <i class="la la-search"></i>
            </span>

        </h2>
        <p class="txt t-light4 pregular">Click on the element below to open the side Search bar</p>


    </div>
    <div class="col-12">
        <div class="card-columns">
            <?php
            if($model && $vip)
            {

                $template = new \frontend\models\CardTemplate();
                $ListCust = isset($_SESSION['list'])?$_SESSION['list']:false;
                $template->temp = $ListCust;
                $template->model = $model;
                $template->user();
            }
            else
            {
                if($vip)
                {
                    $title = "No Result found";
                    $subtitle = "Click on <span class='text-primary p-2'>&#9776;</span> icon for find new people, connect with people";
                }
                else
                {
                    $title = "Upgrade Now";
                    $url = \yii\helpers\Url::toRoute('vip/index');
                    $subtitle = "hello wanna search more people? upgrade premium membership now <br><br><br> <a class='btn btn-lg bg-green' href='$url'>UPGRADE</a> ";
                }
                ?>
                <div class="col-12" align="center">
                    <div class="card mt-5">
                        <div class="card-body" align="center">
                            <i class="la la-search la-5x"></i>
                            <h1 class="card-title"> <?php echo  $title; ?></h1>
                            <p class="card-title">
                                <?php echo  $subtitle; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
    </div>


</div>
