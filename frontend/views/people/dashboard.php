<?php
$this->title = "People Nearby In"
?>

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <div class="align-self-center">
                <h4 class="txt t-light3 psemibold">Find girl from 28 - to - 30 in Jodhpur under <span class="range_preview"><?php echo  isset($_GET['radius'])?$_GET['radius']:'50' ?></span> km : </h4>
                <div class="align-self-center pb-3">

                    <form method="get" id="FormNearbySearch">
                        <div class="slidercontainer">
                            <input type="hidden" name="lat" value="26.276680" id="FormNearbyLat">
                            <input type="hidden" name="lang" value="73.008940" id="FormNearbyLang">

                            <input id="range_selection" type="range" name="radius" class="slider" min="10" max="500" value="<?php echo  isset($_GET['radius'])?$_GET['radius']:'50' ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
   <div class="col-12 mt-3">
       <div class="card-columns">
           <?php
           $template = new \frontend\models\CardTemplate();
           $ListCust = isset($_SESSION['list'])?$_SESSION['list']:false;
           $template->temp = "full";
           $template->model = $model;
           $template->user();
           ?>
       </div>
   </div>
</div>