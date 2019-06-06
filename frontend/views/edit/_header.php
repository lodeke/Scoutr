<div class="col-12">

    <nav class="navbar navbar-expand-lg navbar-light bg-smoke-light text-white mb-3">
        <a href="<?php echo  \yii\helpers\Url::toRoute('people/profile') ?>" class="navbar-brand text-primary">
            <?php echo  Yii::$app->user->identity->first_name ?> <?php echo  Yii::$app->user->identity->last_name ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#profilemenu" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="profilemenu">

            <ul class="navbar-nav mr-auto">
                <li class="nav-link">
                    <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/upload-photo') ?>">
                        Upload Photos
                    </a>
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/personal-information') ?>">
                        Edit Personal Information
                    </a>
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/profile-settings') ?>">
                        Edit Profile Settings
                    </a>
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="<?php echo  \yii\helpers\Url::toRoute('edit/account-settings') ?>">
                        Edit Account Settings
                    </a>
                </li>

            </ul>
        </div>




    </nav>
</div>