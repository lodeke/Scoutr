<?php
$this->title = "Message Inbox";
?>
<div class="row no-gutters">

    <div class="col-12">
        <br>
        <h2 class="text-danger">
            <i class="la la-comment"></i> <?php echo  $this->title; ?>
        </h2>
        <p>Chat with Your match</p>


    </div>

    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-xs-12" id="result_container">
        <?php
        foreach($model as $key=>$list)
        {


            ?>
            <div class="d-block p-3 bg-light">
                <div class="d-flex">
                    <div class="d-table-cell ">
                        <img onerror="$(this).attr('src','<?php echo  Yii::getAlias('@web') ?>/images/users/default.jpg')" width="35" src="<?php echo  Yii::getAlias('@web') ?>/images/users/<?php echo  $list['image']; ?>" class="circle" alt="author">
                    </div>
                    <div class="d-table-cell pl-5 pr-5">
                        <a href="#" class="h6 author-name"><?php echo  $list['name']; ?> </a>
                        <div class="birthday-date"><i class="la la-map-marker"></i> <?php echo  $list['message']; ?></div>
                    </div>
                    <div class="d-table-cell pl-5 align-content-end" align="right">
                        <a href="javascript:void" onclick="openChat(<?php echo  $list['sender']; ?>)" class="btn btn-block btn-success">
                            <i class="la la-commenting"></i> Message
                        </a>

                    </div>
                </div>

            </div>
        <?php
        }
        ?>
    </div>
    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12">

    </div>
</div>

