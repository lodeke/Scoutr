<?php
namespace backend\controllers;

use backend\models\CategoryForm;
use common\models\AdminNotification;
use common\models\Analytic;
use common\models\Category;
use common\models\MainMenu;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Analytic controller
 */
class NotificationsController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        if(isset($_GET['sort']) == "all")
        {
            if($_GET['sort'] == "all")
            {
                $active = "all";
                $modal = AdminNotification::find()->orderBy(['id'=>SORT_DESC])->all();
            }
            else
            {
                $active = "unread";
                $modal = AdminNotification::find()->where(['status'=>'unread'])->orderBy(['id'=>SORT_DESC])->all();
                AdminNotification::updateAll(['status'=>'read']);
            }
        }
        else
        {
            $active = "unread";
            $modal = AdminNotification::find()->where(['status'=>'unread'])->orderBy(['id'=>SORT_DESC])->all();
            AdminNotification::updateAll(['status'=>'read']);
        };
        return $this->render('index', ['modal'=>$modal,'active'=>$active]);

    }



}
