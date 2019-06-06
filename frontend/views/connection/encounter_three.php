<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 1/14/2019
 * Time: 2:49 PM
 */
?>
<?php
foreach($encounter as $key=>$list)
{
    if($key == "0")
    {
        $rotate = "0";
        $show  = "display:block";
    }
    else
    {
        $rotate = '-'.$key * 2;
        $show  = "display:none";

    }
    if($key > 6)
    {
        continue;
    }

    ?>
    <div class="encounter" id="<?php echo "encounter_".$list['id']; ?>"  style="width: 100%;background: none;transform: rotate(<?php echo $rotate ?>deg);transform-origin: bottom right;z-index:-<?php echo $key ?>;">
        <div style="padding: 30px;" align="center">
            <div id="SwipeStatus_<?php echo $list['id']; ?>" class="liked">
                Like
            </div>
            <div class="tmp_2_img" style="background-image: url('<?php echo Yii::getAlias('@web') ?>/images/users/<?php echo $list['images']; ?>')">

                <div class="align-self-start" style="top: 80%;position: relative" >
                    <h2 class="text-white" style="<?php echo $show; ?>">
                        <strong>
                            <?php echo $list['first_name']; ?> <?php echo $list['first_name']; ?>
                        </strong>
                    </h2>
                    <button class="btn btn-lg btn-primary  hot" data-user="<?php echo $list['id'] ?>">
                        Hot <span style="width: 25px;display: inline-block"><i class="la la-heart"></i></span>
                    </button>
                    Or
                    <button class="btn btn-lg btn-secondary  not" data-user="<?php echo $list['id'] ?>">
                        Not <span style="width: 25px;display: inline-block"><i class="la la-remove rejIcon"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
