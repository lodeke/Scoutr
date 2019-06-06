<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
            'cookieValidationKey' => 'QkvfY7uwqQ6pDcfKdDkf',
            'csrfParam' => '_frontendCSRF',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'assetManager'=>[
            'bundles'=>[

                'yii\bootstrap\BootstrapAsset'=>[
                    'css'=>[],
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing'=>true,
            'rules' => [
                'profile/<user>'=>'people/profile',
                'index'=>'people/index',
                'nearby'=>'people/nearby',
                'search'=>'people/search',
                'match'=>'people/match',
                'profile'=>'people/profile',
                'chats'=>'people/chats',
                'edit/index'=>'edit/index',
                'edit/personal-information'=>'edit/personal-information',
                'edit/profile-settings'=>'edit/profile-settings',
                'edit/account-settings'=>'edit/account-settings',
                'preview/<user>'=>'site/preview',
                'pages/<id>-<title>'=>'pages/index',
                'encounter/unmatch/<id>'=>'encounter/unmatch',

            ],
        ],
    ],
    'params' => $params,
    'defaultRoute'=>'people/index',

];
