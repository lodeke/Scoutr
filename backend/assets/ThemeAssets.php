<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class ThemeAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'themes/assets/css/bootstrap.min.css',
        'themes/assets/css/ready.min.css',
        'themes/assets/fonts/font-awesome/css/font-awesome.css',


    ];
//    public $cssOptions = [
//        'id' => 'theme',
//    ];

    public $js = [

        'themes/assets/js/core/popper.min.js',
        'themes/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
        'themes/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
        'themes/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
        'themes/assets/js/plugin/moment/moment.min.js',
        'themes/assets/js/plugin/chart.js/chart.min.js',
        'themes/assets/js/plugin/chart-circle/circles.min.js',
        'themes/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
        'themes/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js',
        'themes/assets/js/plugin/jqvmap/jquery.vmap.min.js',
        'themes/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js',
        'themes/assets/js/plugin/gmaps/gmaps.js',
        'themes/assets/js/plugin/dropzone/dropzone.min.js',
        'themes/assets/js/plugin/fullcalendar/fullcalendar.min.js',
        'themes/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js',
        'themes/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
        'themes/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js',
        'themes/assets/js/plugin/jquery.validate/jquery.validate.min.js',
        'themes/assets/js/plugin/summernote/summernote-bs4.min.js',
        'themes/assets/js/plugin/select2/select2.full.min.js',
        'themes/assets/js/plugin/sweetalert/sweetalert.min.js',
        'themes/assets/js/ready.min.js',
        'themes/assets/js/ajax.js',


    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
class TopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => View::POS_HEAD];
    public $js = [
        'themes/assets/js/plugin/webfont/webfont.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

