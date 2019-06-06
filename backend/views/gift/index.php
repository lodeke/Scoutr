<?php
$this->title = "Gift Listing";
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
                 <i class="flaticon-gift"></i> All Available Gift List
                </h4>
                <a class="btn btn-primary btn-round ml-auto" href="<?php echo  \yii\helpers\Url::toRoute('gift/add') ?>" >
                    <i class="la la-plus"></i>
                    Add New Gift
                </a>
            </div>
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th>GIFT</th>
                    <th>GIFT</th>
                    <th>PRICE</th>
                    <th>SENT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <?php
                if(!$model)
                {
                    echo "<tr><td colspan='5' align='center'><h5 class='p-3'>No gift found, Please Add new gift</h5></td></tr>";
                }
                ?>
                <?php
                foreach($model as $gift)
                {
                    ?>
                    <tr>
                        <td>
                            <img  data-toggle="modal"  src="<?php echo  Yii::$app->urlManagerFrontend->baseUrl.'/images/site/gift/'.$gift['image'] ?>" width="60px" alt="<?php echo  $gift['gift'] ?> Gift">

                        </td>
                        <td><?php echo  $gift['gift'] ?></td>
                        <td><?php echo  $gift['point'] ?></td>
                        <td><?php echo  $gift['sent'] ?></td>

                        <td>
                            <a class="btn btn-xs btn-default" href="<?php echo  \yii\helpers\Url::toRoute('gift/delete/'.$gift['id']) ?>">
                                 <i class="fa fa-trash"></i> DELETE
                            </a>
                            <a class="btn btn-xs btn-success" href="<?php echo  \yii\helpers\Url::toRoute('gift/edit/'.$gift['id']) ?>">
                                <i class="fa fa-edit"></i> EDIT
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
