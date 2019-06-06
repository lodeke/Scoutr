<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class PeopleAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/yoko/';
    public $css = [

        'css/bootstrap.css',
        'css/bootstrap-reboot.css',
        'css/component.css',
        'css/fonts.css',
        'fonts/font-awesome/css/font-awesome.css',

    ];
    public $js = [
        'js/material.min.js',
        'js/bootstrap-select.js',
        'js/bootstrap.bundle.js',
        'js/popper.min.js',

        'js/bootstrap.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
