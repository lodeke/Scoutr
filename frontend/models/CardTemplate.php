<?php
namespace frontend\models;

use common\models\Album;
use common\models\DefaultSetting;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\helpers\Url;

/**
 * Signup form
 */
class CardTemplate extends User
{
    public $temp;
    public $model;
    public $isMatch;
    public $ProfileUrl;
    public $unMatchUrl;
    public $limit;
    public $title;
    public $user;
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function user()
    {
        $default = DefaultSetting::find()->select(['list_style'])->one();
        $temp = ($this->temp)?$this->temp:$default['list_style'];
        $model = $this->model;
        $this->ProfileUrl = Url::toRoute('people/profile/').'/';
        if(!$model)
        {
            $this->notFound();
        }
        foreach($model as $key=>$list)
        {
            $this->unMatchUrl = Url::toRoute('encounter/unmatch?id=').base64_encode($list['id']);
            switch($temp)
            {
                case "one":
                    $this->templateOne($list);
                    break;
                case "two":
                    $this->templateTwo($list);
                    break;
                case "three":
                    $this->templateThree($list);
                    break;
                case "four":
                    $this->templateFour($list);
                    break;
                case "five":
                    $this->templateFive($list);
                    break;
                case "preview":
                    $this->preview($list);
                break;
                case "round":
                    $this->round($list);
                    break;
                case "blur":
                    $this->templateBlur($list);
                    break;
                case "full":
                    $this->templateFull($list);
                    break;
                default :
                    $this->templateSix($list);
                    break;
            }
        };
        return false;
    }

    public function match()
    {
        $default = DefaultSetting::find()->select(['list_style'])->one();
        $temp = $default['list_style'];
        $model = $this->model;
        $this->ProfileUrl = Url::toRoute('people/profile/').'/';
        foreach($model as $key=>$list)
        {
            $this->templateMatch($list);
        }
        return false;
    }
    public function templateOne($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        $isMatch = isset($this->isMatch)?true:false;

        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-white";
            $info = "text-dark";
            $btn = "btn-danger text-white";
            $nor = false;
            $b_r = '#d1d1d2';
            $b_l = '#fbfcff';
        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $info = "text-white";
            $btn = "bg-white text-danger";
            $nor = false;
            $b_r = '#f45a26';
            $b_l = '#ff7441';

        };
        ?>
            <div style="border-radius: 0;border-right:1px solid <?php echo  $b_r; ?>;border-left:1px solid <?php echo  $b_l; ?>" class="card <?php echo $bg;?> border-radius-0">
                <div class="card-vip <?php echo  $Vip; ?>">
                    Vip Member
                </div>
                <div class="card-img-top card-img-blur" style="background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                    <div style="width: 100%;height: 280px"></div>
                </div>
                <!-- #############  Image overlay Button where set Match =  true ###########-->
                <div  class="card-img-overlay <?php echo  ($isMatch)?'':'d-none' ?> card-img-overlay-hide p-3" align="center">
                    <div class="card-body">

                        <h3 class="card-title text-mute mt-5 <?php echo  $info ?>">Acion</h3>

                        <div class=" position-relative" >
                            <a href="<?php echo  $this->unMatchUrl ?>" class="btn btn-block btn-success p-0">
                                <i class="la la-remove"></i> Unmatch
                            </a> <!--  unmatch Button-->
                            <button onclick="openChat(<?php echo  $list['id']; ?>)" class="btn-sm btn btn-block bg-danger">
                                <i class="la la-comment-o"></i> Chat
                            </button> <!--  Chat Button-->

                            <button data-user-name="<?php echo  $list['first_name']; ?>" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class=" btn sendGift btn-block bg-green p-0">
                                <i class="la la-gift"></i> Send Gift
                            </button> <!--  Chat Button-->


                        </div>
                    </div>
                </div>
                <!-- #############  Image overlay Button where set Match =  true ###########-->

                <div class="card-body">

                    <h5 class="card-title <?php echo  $info; ?>">
                        <?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>
                        <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>" class="<?php echo  $info; ?>">
                            <i class="la la-link"></i>
                        </a>
                    </h5>

                    <p class="card-text <?php echo  $info; ?>">
                        <i class="la la-map-marker"></i> <?php echo  $list['city']; ?>,
                        <span class="<?php echo   ($distance)?$distance:'d-none'; ?>">
                        <i class="la la-map-signs"></i> Near <?php echo  substr($distance,'0','4') ?> Km
                        </span>
                    </p>

                    <p class="card-text <?php echo  $info; ?>" >
                        <i class="la la-<?php echo  $list['gender']; ?>"></i> <?php echo  $list['age']; ?> year Old
                    </p>

                    <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  \yii\helpers\Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt bg-primary circle btn btn-sm <?php echo  $btn; ?> <?php echo  ($isMatch)?'d-none':'' ?> counterBtn" style="width:40px;height: 40px">
                        <span id="iLikeIt_icon_<?php echo  $list['id']; ?>"><i class="fa fa-heart-o "></i></span>
                    </button>


                </div>
            </div>
    <?php
    } // render design one
    public function templateTwo($list)
    {
        $isMatch = isset($this->isMatch)?true:false;

        $distance = isset($list['distance'])?$list['distance']:false;
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-smoke";
            $info = "";
            $btn = "btn-danger text-white";
            $nor = false;

        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $info = "text-white";
            $btn = "bg-white text-danger";
            $nor = false;
        };
        ?>
        <div class="photo-album-item-wrap  card" id="#encounter_<?php echo  base64_encode($list['id']) ?>" >


            <div class="photo-album-item" data-mh="album-item" style="height: 430px;">
                <div class="photo-item " >
                    <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="photo" class="img-fluid">
                    <div class="overlay overlay-dark"></div>

                    <p class="post-add-icon p-2">

                        <i class="la la-angle-double-right"></i>
                        <span>Bio : <?php echo  substr($list['bio'],0,45) ?> ...</span>
                    </p>
                    <a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
                </div>

                <div class="content" align="center">
                    <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>" class="title h5">
                        <?php echo  $list['first_name']; ?>  <?php echo  $list['last_name']; ?>
                    </a>
                    <div class="p-3">
                        <?php echo  $list['city']; ?>,  <?php echo  $list['age']; ?> Yr
                    </div>
                    <div class="<?php echo   ($distance)?$distance:'d-none'; ?>">
                        <i class="la la-map-marker"></i> Near <?php echo  substr($distance,'0','3') ?> Km,
                    </div>
                    <div class="control-block-button position-relative <?php echo  ($isMatch)?'d-none':'' ?>">
                        <a class="pr-3">
                            <strong>Do you like her ?</strong>
                        </a>

                        <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt circle counterBtn btn btn-control bg-danger p-0 <?php echo  $btn; ?> <?php echo  ($isMatch)?'d-none':'' ?> counterBtn">
                            <span id="iLikeIt_icon_<?php echo  $list['id']; ?>"><i class="la la-heart-o"></i></span>
                        </button>
                    </div>
                    <!-- #############  Image overlay Button where set Match =  true ###########-->
                    <div class="justify-content-between <?php echo  ($isMatch)?'':'d-none' ?>" >

                        <a href="<?php echo  $this->unMatchUrl ?>" class=" btn text-white circle bg-primary p-2">
                            <i class="la la-remove"></i>
                        </a> <!--  Chat Button-->
                        <button onclick="openChat(<?php echo  $list['id']; ?>)" class=" btn text-white circle bg-danger ml-4 mr-4 p-0">
                            <i class="la la-comment-o"></i>
                        </button> <!--  Chat Button-->

                        <button data-user-name="<?php echo  $list['first_name']; ?>" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class=" btn sendGift text-white circle bg-warning p-0">
                            <i class="la la-gift"></i>
                        </button> <!--  Chat Button-->

                    </div>
                    <!-- #############  Image overlay Button where set Match =  true ###########-->
                </div>


            </div>
        </div>
    <?php
    } // render design two
    public function templateThree($list)
    {
        $isMatch = isset($this->isMatch)?true:false;
        $distance = isset($list['distance'])?$list['distance']:false;

        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-smoke";
            $info = "";
            $btn = "btn-danger text-white";
            $nor = false;

        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $info = "text-white";
            $btn = "bg-danger text-white";
            $nor = false;
        };
        ?>
        <div class="card <?php echo  $bg ?>" style="border-radius: 0; background-color: #000 !important;">
            <div class="card-vip <?php echo  $Vip; ?>">
                Vip Member
            </div>
            <a data-toggle="collapse" data-target="#card_<?php echo  $list['id']; ?>" class="card-more-trigger">
                <i class="la la-ellipsis-v"></i>
            </a>
            <div class="card-img-top" style="background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                <div style="width: 100%;height: 280px;overflow: hidden"></div>
            </div>

            <div class="card-name">
                <div class="d-flex justify-content-between">
                    <div class="align-self-center">
                        <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>" class="<?php echo  $info; ?>">
                            <?php echo  $list['first_name']; ?>, <?php echo  $list['age']; ?>
                        </a>
                    </div>
                    <div class="align-self-center">
                        <a href="javascript:void" style="cursor: pointer;" data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']);?>" class="iLikeIt text-white  <?php echo  ($isMatch)?'d-none':'' ?> ">
                            <span id="iLikeIt_icon_<?php echo  $list['id']; ?>">
                                <i class="la la-thumbs-o-up"></i>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="<?php echo  $info ?> h6" style="font-weight: 600;font-size: 16px;">
                            <i class="la la-map-marker"></i> <?php echo  substr($list['city'],'0','8') ?>
                        </h6>
                        <h6 class="<?php echo  $info ?> h6 <?php echo   ($distance)?$distance:'d-none'; ?>" style="text-indent: 5px">
                            <?php echo  substr($distance,'0','3') ?> Km Away,
                        </h6>
                    </div>

                </div>
            </div>
            <div class="card-more collapse" id="card_<?php echo  $list['id']; ?>">
                <div class="<?php echo  ($isMatch === true)?'d-none':'d-block' ?>">
                    <p>
                        <strong>School :</strong> <?php echo  $list['school']; ?>,
                    </p>
                    <p>
                        <strong>Company :</strong> <?php echo  $list['company']; ?>,
                    </p>
                    <p>
                        <strong>Job :</strong> <?php echo  $list['job_title']; ?>,
                    </p>

                    <p>
                        <strong>Bio :</strong> <?php echo  $list['bio']; ?>,
                    </p>
                </div>
                <div class="<?php echo  ($isMatch)?'d-block':'d-none' ?>" align="center">
                    <h3 class="mt-lg-3 h6 text-white">
                        Your Match <i class="la la-check-circle-o" style="color: limegreen"></i>
                    </h3>
                    <p>
                        <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" class="card-img-top" style="width: 30%;border-radius: 50px;" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="Card image cap">

                    </p>
                    <p>
                        Want to more with <?php echo  $list['first_name']; ?> ?
                    </p>


                    <div class="row justify-content-center">
                        <?php
                        if($isMatch)
                        {
                            ?>
                            <a href="<?php echo  $this->unMatchUrl;?>"  style="padding: 5px 12px !important;"  class="btn btn-sm p-2 bg-danger text-white" >
                                <span id="<?php echo  $list['id']; ?>" style="font-size: 20px;">
                                   <i class="la la-remove"></i>
                                </span>
                            </a>
                        <?php
                        }
                        else
                        {
                            ?>
                            <a href="javascript:void"  style="padding: 5px 15px !important;" data-user="<?php echo  $list['id']; ?>" class="btn iLikeIt btn-sm p-2 bg-danger text-white" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>">
                                <span id="iLikeIt circle_icon_<?php echo  $list['id']; ?>" style="font-size: 20px;">
                                    <i class="la la-thumbs-up"></i>
                                </span>
                            </a>
                        <?php
                        }
                        ?>

                        <button onclick="openChat(<?php echo  $list['id']; ?>)" style="padding: 5px 12px !important;" class="btn btn-sm btn-warning p-2 mr-2 ml-2 text-white">
                            <i class="fa fa-comment-o"></i>
                        </button>
                        <button data-user-name="<?php echo  $list['first_name']; ?>" style="padding: 5px 16px !important;" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>"  class="btn btn-sm p-2 btn-success sendGift text-white">
                            <i class="fa fa-gift"></i>
                        </button>

                    </div>

                </div>
                <div class="mt-lg-3" align="center">
                    <span onclick="$('#card_<?php echo  $list['id']; ?>').removeClass('show').delay(2000);" class="text-lg-center la-2x align-self-center" style="cursor: pointer">
                        <i class="flaticon-cross"></i>
                    </span>
                </div>
            </div>
        </div>
    <?php
    } // render design three
    public function templateFour($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        $isMatch = isset($this->isMatch)?true:false;

        $url = $this->ProfileUrl.$list['username'];
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-smoke";
            $btn = "btn-danger text-white";
            $nor = false;

        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $btn = "bg-green text-white";
            $nor = false;
        };
        ?>
        <div class="card border-1" style="border-radius: 0">
            <div class="card-vip <?php echo  $Vip; ?>">
                Vip Member
            </div>
            <div class="card-img-top card-img-blur" style="background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                <div style="width: 100%;height: 280px;overflow: hidden"></div>
            </div>
            <!-- #############  Image overlay Button where set Match =  true ###########-->
            <div  class="card-img-overlay <?php echo  ($isMatch)?'':'d-none' ?> card-img-overlay-hide p-3" align="center">
                <div class="card-body">

                    <h3 class="card-title text-mute mt-5">This is Your Match</h3>

                    <div class="control-block-button position-relative" >

                        <button title="Send Message" onclick="openChat(<?php echo  $list['id']; ?>)" class=" btn btn-control circle bg-danger p-0">
                            <i class="la la-comment-o"></i>
                        </button> <!--  Chat Button-->

                        <button title="Sent Gift" data-user-name="<?php echo  $list['first_name']; ?>" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class=" btn sendGift circle btn-control bg-green p-0">
                            <i class="la la-gift"></i>
                        </button> <!--  Chat Button-->

                    </div>
                </div>
            </div>
            <!-- #############  Image overlay Button where set Match =  true ###########-->
            <div class="card-body">

                <h6 class="card-title">
                    <a href="<?php echo  $url ?>">
                        <?php echo  $list['first_name']; ?>
                    </a> <?php echo  $list['last_name']; ?>, <?php echo  $list['age']; ?>

                    <?php
                    if($isMatch)
                    {
                        ?>
                        <a href="<?php echo  $this->unMatchUrl;?>"  style="padding: 5px 12px !important;"  class=" btn btn-sm p-2 bg-danger  text-white float-right" >
                            <span id="<?php echo  $list['id']; ?>" style="font-size: 20px;">
                               <i class="la la-remove"></i>
                            </span>
                        </a>
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="javascript:void()"  style="padding: 5px 12px !important;" data-user="<?php echo  $list['id']; ?>" class=" btn iLikeIt  btn-sm p-2 bg-danger text-white float-right" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>">
                            <span id="iLikeIt_icon_<?php echo  $list['id']; ?>" style="font-size: 20px;">
                                <i class="la la-thumbs-up"></i>
                            </span>
                        </a>
                    <?php
                    }
                    ?>
                </h6>
                    <h6 class="txt h6 t-light3" style="font-weight: 600;">
                        <i class="la la-map-marker"></i> <?php echo  $list['city']; ?>
                    </h6>
                    <h6 class="badge bg-smoke txt t-light5 pregular <?php echo   ($distance)?$distance:''; ?>" style="font-weight: 600;font-size: 12px;text-indent: 5px">
                        <?php echo  substr($distance,'0','3') ?> Km
                    </h6>



            </div>
        </div>
    <?php
    } // render design four
    public function templateFive($list)
    {
        $url = $this->ProfileUrl.$list['username'];
        $distance = isset($list['distance'])?$list['distance']:false;
        $isMatch = isset($this->isMatch)?true:false;

        $accept = "like";
        $acceptClass = "la la-heart";
        $denied = 'dislike';
        $deniedClass = false;
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-smoke";
            $btn = "btn-danger text-white";
            $nor = false;
            $info = "text-dark";

        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $btn = "bg-green text-white";
            $nor = false;
            $info = "text-danger";
        };
        ?>
        <div class="card">
            <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="card-img-top card-img-blur">

            <div class="card-img-overlay card-img-overlay-hide">
                <div>
                    <section class="d-flex justify-content-between">
                        <div class="text-white font-weight-bold" style="text-shadow: 1px 1px 3px #555555e6;">
                            <i class="fa fa-location-arrow"></i>  <?php echo  substr($distance,'0','3') ?> Km
                        </div>

                    </section>

                </div>
            </div>
            <div class="d-flex justify-content-around" style="position: relative;bottom: 20px;margin-bottom: -28px">

                <?php
                if($isMatch)
                {
                    ?>
                    <div class="align-self-center">
                        <button title="Send Message" onclick="openChat(<?php echo  $list['id']; ?>)" class=" btn btn-control circle bg-danger p-0">
                            <i class="la la-comment-o"></i>
                        </button> <!--  Chat Button-->
                    </div>
                    <div class="align-self-center">
                        <button title="Sent Gift" data-user-name="<?php echo  $list['first_name']; ?>" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class=" btn sendGift circle btn-control bg-green p-0">
                            <i class="la la-gift"></i>
                        </button>
                    </div>
                    <div class="align-self-center">
                        <a href="<?php echo  $this->unMatchUrl;?>" class="btn circle bg-warning text-white">
                            <span id="<?php echo  $list['id']; ?>">
                                   <i class="la la-remove"></i>
                            </span>
                        </a>
                    </div>
                <?php
                }
                else
                {
                    ?>
                    <div class="align-self-center">
                        <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt <?php echo  ($isMatch)?'d-none':'' ?> circle btn circle bg-danger text-white p-2">
                            <span id="iLikeIt_icon_<?php echo  $list['id']; ?>"><i class="fa fa-heart-o"></i></span>
                        </button>
                    </div>
                    <div class="align-self-center">
                        <a href="javascript:void()" onclick="$('#user_<?php echo  $list['id']; ?>').remove()" class="btn circle bg-warning text-white">
                            <i class="la la-remove"></i>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <h6>
                    <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>"  class="txt pbold text-redis">
                        <?php echo  $list['first_name']; ?>, <?php echo  $list['age']; ?>
                    </a>
                </h6>
                <h6 class="txt psemibold text-capitalize t-light3"> <?php echo  $list['city']; ?></h6>
            </div>
        </div>
    <?php
    } // render design five
    public function templateSix($list)
    {
        $isMatch = isset($this->isMatch)?true:false;

        $distance = isset($list['distance'])?$list['distance']:false;
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-white";
            $info = "text-redis";
            $btn = "btn-danger text-white";
            $nor = false;
            $b_r = '#d1d1d2';
            $b_l = '#fbfcff';
        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $info = "text-white";
            $btn = "bg-danger text-white";
            $nor = false;
            $b_r = '#f45a26';
            $b_l = '#ff7441';

        };
        ?>
        <div id="user_<?php echo  $list['id']; ?>" class="card <?php echo $bg;?>" style="overflow: hidden;border-radius: 0;">
            <div class="card-img-top card-img-blur" style="border-radius: 0;background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                <div style="width: 100%;height: 280px"></div>
            </div>
            <div  class="card-img-overlay card-img-overlay-hide p-3" align="center">
                <div class="card-body">
                    <h3 class="card-title text-mute mt-5 <?php echo  $info ?>">Do you Like</h3>
                    <p class="card-text  <?php echo  $info ?>"><?php echo  $list['first_name']; ?>  </p>

                    <div class="d-flex justify-content-around" style="position: relative;bottom: 20px;margin-bottom: -28px">

                        <?php
                        if($isMatch)
                        {
                            ?>
                            <div class="align-self-center">
                                <button title="Send Message" onclick="openChat(<?php echo  $list['id']; ?>)" class=" btn btn-control circle bg-danger p-0">
                                    <i class="la la-comment-o"></i>
                                </button> <!--  Chat Button-->
                            </div>
                            <div class="align-self-center">
                                <button title="Sent Gift" data-user-name="<?php echo  $list['first_name']; ?>" data-user-id="<?php echo  $list['id']; ?>" data-user-image="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class=" btn sendGift circle btn-control bg-green p-0">
                                    <i class="la la-gift"></i>
                                </button>
                            </div>
                            <div class="align-self-center">
                                <a href="<?php echo  $this->unMatchUrl;?>" class="btn circle bg-warning text-white">
                            <span id="<?php echo  $list['id']; ?>">
                                   <i class="la la-remove"></i>
                            </span>
                                </a>
                            </div>
                        <?php
                        }
                        else
                        {
                            ?>
                            <div class="align-self-center">
                                <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt <?php echo  ($isMatch)?'d-none':'' ?> circle btn circle bg-danger text-white p-2">
                                    <span id="iLikeIt_icon_<?php echo  $list['id']; ?>"><i class="fa fa-heart-o"></i></span>
                                </button>
                            </div>
                            <div class="align-self-center">
                                <a href="javascript:void()" onclick="$('#user_<?php echo  $list['id']; ?>').remove()" class="btn circle bg-warning text-white">
                                    <i class="la la-remove"></i>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card-body">

                    <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>"  class="txt pbold">
                        <h4 class="card-title <?php echo  $info ?> mt-2">
                        <?php echo  $list['first_name']; ?>, <?php echo  $list['last_name']; ?>
                        </h4>
                    </a>

                <h6 class="<?php echo  $info ?> <?php echo   ($distance)?$distance:'d-none'; ?>" style="font-weight: 600;">
                    <i class="la la-map-marker"></i>   <?php echo  substr($distance,'0','3') ?> Km Away,
                </h6>
                <p class="card-text  <?php echo  $info ?>">
                    <?php echo  $list['city']; ?>, <?php echo  $list['age']; ?> yr
                </p>


            </div>
        </div>
    <?php
    } // render design five
    public function templateFull($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        $isMatch = isset($this->isMatch)?true:false;

        $url = $this->ProfileUrl.$list['username'];
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-smoke";
            $btn = "btn-danger text-white";
            $nor = false;
            $info = "text-dark";

        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $btn = "bg-green text-white";
            $nor = false;
            $info = "text-danger";
        };
        ?>
        <div class="card">
            <div class="card-img-top card-img-blur" style="border-radius: 0;background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                <div style="width: 100%;height: 280px"></div>
            </div>
            <div  class="card-img-overlay card-img-overlay-hide p-3" align="center">
                <div class="card-body">
                    <h3 class="card-title text-secondary mt-5 <?php echo  $info ?>">Do you Like</h3>
                    <p class="card-text  <?php echo  $info ?>"><?php echo  $list['first_name']; ?>  </p>

                    <div class="control-block-button position-relative" >

                        <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt circle btn circle bg-danger p-2">
                            <span id="iLikeIt circle_icon_<?php echo  $list['id']; ?>"><i class="la la-check"></i></span>
                        </button>

                        <a href="javascript:void()" onclick="$('#user_<?php echo  $list['id']; ?>').remove()" class="btn circle bg-c-smoke text-danger">
                            <i class="la la-remove"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-img-overlay">
                <div>
                    <section class="d-flex justify-content-between">
                        <div class="text-white font-weight-bold" style="text-shadow: 1px 1px 3px #555555e6;">
                            <i class="fa fa-location-arrow"></i>  <?php echo  substr($distance,'0','3') ?> Km
                        </div>
                        <div class="text-white font-weight-bold  shadow-lg">
                            <i class="fa fa-heart-o"></i>
                        </div>
                    </section>

                </div>
            </div>
            <div class="card-body">
                <h6 class="txt pbold text-redis"><?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?>, <?php echo  $list['age']; ?></h6>
                <h6 class="txt psemibold text-capitalize t-light3"> <?php echo  $list['city']; ?></h6>
            </div>
        </div>

    <?php
    } // render design full
    public function templateBlur($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        if($list['vip'] == 0)
        {
            $Vip = "d-none ";
            $bg = "bg-white";
            $info = "text-dark";
            $btn = "btn-danger text-white";
            $nor = false;
            $b_r = '#d1d1d2';
            $b_l = '#fbfcff';
        }else
        {
            $Vip = "d-block";
            $bg = "bg-danger";
            $info = "text-white";
            $btn = "bg-danger text-white";
            $nor = false;
            $b_r = '#f45a26';
            $b_l = '#ff7441';

        };
        ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-sm-6 col-xs-12" id="user_<?php echo  $list['id']; ?>">
            <div class="card border-bottom <?php echo $bg;?>" style="overflow: hidden;border-radius: 0;">
                <div class="card-img-top card-img-blur" style="filter:blur(10px);border-radius: 0;background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                    <div style="width: 100%;height: 280px"></div>
                </div>
                <div  class="card-img-overlay card-img-overlay-hide p-3" align="center">
                    <div class="card-body">
                        <h3 class="card-title text-mute mt-5 <?php echo  $info ?>">Want to See?</h3>
                        <p class="card-text  <?php echo  $info ?>"><?php echo  substr($list['first_name'],'0','3') ?>***  </p>

                        <a href="<?php echo  Url::toRoute('vip/index') ?>" class=" btn btn-sm bg-danger p-3">
                            UPGRADE TO VIEW
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title <?php echo  $info ?> mt-2">
                        <?php echo  substr($list['first_name'],'0','3') ?>***
                    </h4>

                </div>
            </div>
        </div>
    <?php
    } // render design five
    public function templateMatch($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;

        ?>
        <div class="photo-album-item-wrap  col-2-width" id="#encounter_<?php echo  base64_encode($list['id']) ?>" >


            <div class="photo-album-item" data-mh="album-item" style="height: 430px;">
                <div class="photo-item" style="max-height: 250px;overflow: hidden">
                    <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" alt="photo">
                    <div class="overlay overlay-dark"></div>

                    <p class="post-add-icon p-2">

                        <i class="la la-angle-double-right"></i>
                        <span>Bio : <?php echo  $list['bio']; ?> </span>
                    </p>
                    <a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
                </div>

                <div class="content" align="center">
                    <a href="<?php echo  $this->ProfileUrl.$list['username']; ?>" class="title h5">
                        <?php echo  $list['first_name']; ?>  <?php echo  $list['last_name']; ?>
                    </a>
                    <div class="p-3">
                        <?php echo  $list['city']; ?>,  <?php echo  $list['age']; ?> Yr
                    </div>
                    <div class="<?php echo   ($distance)?$distance:'d-none'; ?>">
                        <i class="la la-map-marker"></i> Near <?php echo  substr($distance,'0','3') ?> Km,
                    </div>
                    <div class="control-block-button position-relative">
                        <a class="pr-3">
                            <strong>Do you like her ?</strong>
                        </a>
                        <button data-user="<?php echo  $list['id']; ?>" data-url="<?php echo  Url::toRoute('encounter/like') ?>?id=<?php echo  base64_encode($list['id']) ?>" class="iLikeIt circle btn btn-control bg-danger p-0">
                            <span id="iLikeIt circle_icon_<?php echo  $list['id']; ?>"><i class="la la-check"></i></span>
                        </button>


                    </div>
                </div>


            </div>
        </div>
        <li class="inline-items">
            <div class="author-thumb">
                <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" width="40" alt="author">
            </div>
            <div class="notification-event">
                <a href="#" class="h6 notification-friend"><?php echo  $list['first_name']; ?> <?php echo  $list['last_name']; ?></a>
                <span class="chat-message-item">6 Friends in Common</span>
            </div>

        </li>
        <?php
    }

    public function preview($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        $Vip = "d-none ";
        $bg = "bg-white";
        $info = "text-dark";
        $btn = "btn-danger text-white";
        $nor = false;
        $b_r = '#d1d1d2';
        $b_l = '#fbfcff';
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-sm-6 col-xs-12" id="user_<?php echo  $list['id']; ?>">
            <div class="card <?php echo $bg;?>  border-0" style="overflow: hidden;border-radius: 0 !important;">
                <div class="card-img-top card-img-blur" style="border-radius: 0 !important;;background-image: url('<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>');background-size: cover">
                    <div style="width: 100%;height: 200px"></div>
                </div>
                <div class="text-white" style="position: absolute;bottom: 10px;left: 5px;font-weight: 500">
                    <i class="la la-circle-o text-success"></i> Online
                </div>
                <div  class="card-img-overlay card-img-overlay-hide" align="center">
                    <div class="card-body">
                        <h4 class="card-title  <?php echo  $info ?>"><?php echo  $list['first_name']; ?>  </h4>

                        <a href="<?php echo  Url::toRoute('preview/'.$list['username']) ?>"  class="btn circle bg-danger p-2 text-white" >
                            <span id="iLikeIt circle_icon_<?php echo  $list['id']; ?>"><i class="la la-heart"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } // render design for Preview
    public function round($list)
    {
        $distance = isset($list['distance'])?$list['distance']:false;
        $Vip = "d-none ";
        $bg = "bg-white";
        $info = "text-dark";
        $btn = "btn-danger text-white";
        $nor = false;
        $b_r = '#d1d1d2';
        $b_l = '#fbfcff';
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-sm-6 col-xs-12 p-3"  align="center">
            <div style="border-radius: 100px;overflow: hidden;width: 150px;height: 150px;">
                <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" height="400">
            </div>
            <h5 class="pt-3">
                <a href="<?php echo  Url::toRoute('preview/'.$list['username']) ?>"  class="text-danger" >
                    <?php echo  $list['first_name']; ?>
                </a>
                , (<?php echo  $list['age']; ?>)
            </h5>
            <p><?php echo  $list['city']; ?></p>

        </div>
    <?php
    } // render design for Preview

    public function notFound()
    {
        ?>
        </div>
        <div class="col-12 mt-5" align="center">
            <div class="card border-shadow">
                <div class="card-body">
                    <p class="p-0" style="font-size: 80px;">
                        <i class="la la-frown-o"></i>
                    </p>
                    <h2 class="txt t-light2 p-3">Ops. We never Found Anything For you</h2>
                    <a href="<?php echo  Url::toRoute('people/search') ?>" class="btn btn-success btn-lg"><i class="la la-search"></i> Search </a>
                    <p class="p-3 txt t-light2 pbold">
                        Please Search Again
                    </p>
                </div>
            </div>
        </div>
        <?php
    }

    public function randomUser()
    {
        $newPeople = \common\models\User::find()->limit($this->limit)->all();

        foreach($newPeople as $key=>$list)
        {
            $url = Url::toRoute('people/profile/').'/'.$list['username'];
            ?>
            <div class="card shadow-none border-0 p-1">
                <a href="<?php echo  $url; ?>" data-toggle="tooltip" title="<?php echo  $list['first_name']; ?> profile">
                    <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')"  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')"  src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="card-img-top circle">
                </a>
            </div>
        <?php
        }
    }

    public function mayLike()
    {
        if (!Yii::$app->user->isGuest) {
            $uid = Yii::$app->user->identity->getId();
            $newPeople = \common\models\User::find()->where(['!=','id',$uid])->limit($this->limit)->all();
        }
        else
        {
            $newPeople = \common\models\User::find()->limit($this->limit)->all();
        }

        ?>
        <div class="bg-light p-2 mt-5 rounded border">
            <h5 class="pl-2 text-capitalize"><?php echo  $this->title ?></h5>
            <hr>
            <div class="card-group">
                <?php
                foreach($newPeople as $key=>$list)
                {
                    $url = Url::toRoute('people/profile/').'/'.$list['username'];
                    ?>
                    <div class="card  border-0 p-1 m-2 bg-white">
                        <a href="<?php echo  $url; ?>" data-toggle="tooltip" title="<?php echo  $list['first_name']; ?> profile">
                            <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')"  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="rounded img-fluid">
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

        <?php
    }

    public function premium()
    {
        $uid = Yii::$app->user->identity->getId();
        $newPeople = User::find()->where(['!=','id',$uid])->andWhere(['vip'=>'1'])->limit($this->limit)->all();
        if(!$newPeople)
        {
            $newPeople = User::find()->where(['!=','id',$uid])->orderBy(['id'=>SORT_DESC])->limit($this->limit)->all();
            $title = "New Members";
        }
        else
        {
            $title = "Vip Members";
        }
        ?>
        <div class="card mb-2">
            <div class="card-header bg-white  p-2">
                <span class="txt t-light3 psemibold p-2 text-dark"><i class="fa fa-user"></i> New Members</span>
            </div>
            <div class="card-body p-2">
                <div class="card-group">
                    <?php
                    foreach($newPeople as $key=>$list)
                    {
                        $url = Url::toRoute('people/profile/').'/'.$list['username'];

                        ?>
                        <div class="card  border-0 p-1 m-2 bg-light">
                            <a href="<?php echo  $url; ?>" data-toggle="tooltip" title="<?php echo  $list['first_name']; ?> profile">
                                <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['images']; ?>" class="rounded img-fluid">
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php
    }

    public function albumSM()
    {
        $uid = Yii::$app->user->identity->getId();
        $list = Album::find()->where(['user_id'=>$uid])->all();

        ?>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <b>
                    My Album
                </b>
            </div>
            <div class="card-body">
                <?php
                if(empty($list))
                {
                    echo "No photos yet to view";
                }
                foreach($list as $images)
                {
                    ?>

                    <div style="width: 100px;height: 100px;overflow: hidden;display: inline-block;cursor: pointer">
                        <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/album/<?php echo  $images['image']; ?>"
                             class="img-fluid rounded" data-toggle="modal" data-target="#img_<?php echo  $images['id']; ?>">
                    </div>

                    <!-- Modal image-->
                    <div class="modal fade" id="img_<?php echo  $images['id']; ?>" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-body" align="center">
                                    <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/album/<?php echo  $images['image']; ?>"
                                         class="img-fluid">
                                </div>
                                <div class="modal-footer">


                                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>



            </div>

        </div>
        <!-- Photos  card end-->

    <?php
    }

    public function albumMissanary()
    {

        $uid = ($this->user)?$this->user:Yii::$app->user->identity->getId();
        $list = Album::find()->where(['user_id'=>$uid])->all();

        ?>
        <div class="card-columns">
            <?php
            if(empty($list))
            {
                echo "No photos yet to view";
            }
            foreach($list as $images)
            {
                ?>

                <div class="card" style="cursor: pointer">
                    <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/album/<?php echo  $images['image']; ?>"
                         class="card-img-top rounded" data-toggle="modal" data-target="#imgMissanary_<?php echo  $images['id']; ?>">
                </div>

                <!-- Modal image-->
                <div class="modal fade" id="imgMissanary_<?php echo  $images['id']; ?>" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-body" align="center">
                                <img  onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" src="<?php echo  Yii::getAlias('@web') ?>/images/users/album/<?php echo  $images['image']; ?>"
                                     class="img-fluid">
                            </div>
                            <div class="modal-footer">


                                <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>
        <!-- Photos  card end-->

    <?php
    }
}
