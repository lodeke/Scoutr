<?php
use \yii\web\Request;
$baseUrl = str_replace('/backend/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'gridviewKrajee' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Admin',
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],

            'enableAutoLogin' => true,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'casanova-backend',
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => $baseUrl.'/frontend/web/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'js'=>[]
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=>[]
//                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ]

            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array(
                'index'=>'index',
                'location/form-state/<id>' => 'location/form-state',
                'ads/formtype/<name>' => 'ads/formtype',
                'ads/cat/<name>' => 'ads/cat',
                'payment/edit/<id>' => 'payment/edit',
                'pages/edit/<id>' => 'pages/edit',
                'payment/delete/<id>' => 'payment/delete',
                'payment/plan-edit/<plan>' => 'payment/plan-edit',
                'settings/faqedit/<id>' => 'settings/faqedit',
                'settings/faq-delete/<id>' => 'settings/faq-delete',

                'delete/category/<id>' => 'delete/category',

                'delete/sub-category/<id>' => 'delete/sub-category',
                'delete/type/<id>' => 'delete/type',
                'delete/user/<id>' => 'delete/user',
                'delete/page/<id>' => 'delete/page',
                'delete/city/<id>' => 'delete/city',
                'delete/state/<id>' => 'delete/state',
                'delete/country/<id>' => 'delete/country',
                'delete/item/<id>' => 'delete/item',
                'delete/adsense/<id>' => 'delete/adsense',
                'delete/paypal/<id>' => 'delete/paypal',
                'delete/currency/<id>' => 'delete/currency',
                'delete/custom/<id>' => 'delete/custom',
                'delete/languages/<id>' => 'delete/languages',
                'delete/footer-content/<id>' => 'delete/footer-content',
                'delete/footer-column/<id>' => 'delete/footer-column',
                'widgets/edit/<id>' => 'widgets/edit',
                'reports/detail/<id>' => 'reports/detail',
                'user/detail/<id>' => 'user/detail',
                'site/user-detail' => 'site/user-detail',
                'settings/adsense-detail' => 'settings/adsense-detail',
                //new settings
                'gift/edit/<id>' => 'gift/edit',
                'gift/delete/<id>' => 'gift/delete',


            ),
        ],
    ],
    'params' => $params,
];
