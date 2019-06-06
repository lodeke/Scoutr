<?php
use \yii\helpers\Url;
 $action = Yii::$app->controller->action->id;
?>
<div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" >
    <a href="<?php echo  Url::toRoute('settings/encounter') ?>" class="nav-link <?php echo  ($action == 'encounter')?'active':'' ?>">Encounter Settings</a>

    <a href="<?php echo  Url::toRoute('settings/site') ?>" class="nav-link <?php echo  ($action == 'site')?'active':'' ?>">Site Settings</a>
    <a href="<?php echo  Url::toRoute('settings/default') ?>" class="nav-link <?php echo  ($action == 'default')?'active':'' ?>">Default Settings</a>
    <a href="<?php echo  Url::toRoute('settings/admin') ?>" class="nav-link <?php echo  ($action == 'admin')?'active':'' ?>">Admin Settings</a>
    <a href="<?php echo  Url::toRoute('settings/api') ?>" class="nav-link <?php echo  ($action == 'api')?'active':'' ?>">Api Settings</a>
</div>