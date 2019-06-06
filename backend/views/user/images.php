<?php
$this->title = "Users Images";
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .fade.show {
        opacity: 1;
    }
</style>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">
                   All User Images
                </h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>IMAGE</th>
                    <th>IMAGE NAME</th>
                    <th>USER</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <?php
                foreach($model as $image)
                {
                    ?>
                    <tr>
                        <td>
                            <img  data-toggle="modal" data-target="#zoom_<?php echo  $image['id'] ?>" style="cursor: pointer" src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/users/'.$image['images'] ?>" width="60px" alt="Profile Picture">

                        </td>
                        <td><?php echo  $image['images'] ?></td>
                        <td><?php echo  $image['username'] ?></td>

                        <td>
                            <a href="">
                                DELETE
                            </a>
                        </td>
                    </tr>
                    <!--            Model start here-->
                    <div class="modal fade"  id="zoom_<?php echo  $image['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="dialog" style="margin-top: 13%">
                            <div class="modal-content">
                                <div class="card" >
                                    <div class="card-title" align="center">
                                       <?php echo \yii\bootstrap\Html::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal']) ?>
                                    </div>
                                    <div class="card-body">
                                        <img class="card-img" src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/users/'.$image['images']?>" alt="Profile Picture">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--            model add row closed-->
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

