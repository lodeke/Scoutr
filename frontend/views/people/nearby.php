<?php
$this->title = "People Nearby In"
?>

<div class="row no-gutters">


    <div class="col-12">

        <div class="row no-gutters p-2 pt-3 pb-3   border-left">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <h3 class="text-danger d-none d-lg-block d-xl-block d-md-block">
                    <i class="la la-map-marker"></i>  <?php echo  $this->title; ?> - <span class="range_preview"><?php echo  isset($_GET['radius'])?$_GET['radius']:'50' ?></span> Km Range
                </h3>
                <h3 class="text-danger d-block d-lg-none d-xl-none d-md-none">
                    <i class="la la-map-marker"></i>  <?php echo  $this->title; ?> - <span class="range_preview"><?php echo  isset($_GET['radius'])?$_GET['radius']:'50' ?></span> Km
                </h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <br>
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
    <div class="col-12 mt-3" id="result_container">
        <div class="card-columns">
            <?php
            $template = new \frontend\models\CardTemplate();
            $ListCust = isset($_SESSION['list'])?$_SESSION['list']:false;
            $template->temp = $ListCust;
            $template->model = $model;
            $template->user();
            ?>
        </div>
    </div>
</div>
