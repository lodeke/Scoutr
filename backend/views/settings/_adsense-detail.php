<?php
$list = $model;
?>

<div class="row">
    <div class="col-md-4">
        <div class="col-sm-6 col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-primary">
                                <i class="flaticon-interface-1 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Ads Title</p>
                                <h4 class="card-title"><?php echo  $list['title'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="flaticon-interface-2 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Position</p>
                                <h4 class="card-title"><?php echo  $list['position'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-success">
                                <i class="flaticon-interface-3 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Status</p>
                                <h4 class="card-title"><?php echo  $list['status'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Ads Look Like
            </div>
            <div class="card-body">
                <div class="col-md-2">
                    <p>
                        <?php echo  $list['script'] ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

