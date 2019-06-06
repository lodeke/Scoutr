<?php

namespace backend\controllers;

use Yii;
use common\models\DisplayPageSettings;
use common\models\Widgets;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\NotAcceptableHttpException;

class DisplayController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        $control = Yii::$app->params['demo'];
        if (isset($_POST['hasEditable']) and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out =  Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return $out;
        };
        if($control == true and (Yii::$app->request->post() or Yii::$app->request->get()))
        {
            throw new BadRequestHttpException('Its Demo You Cannot Modify anything');
        }else{
            return parent::beforeAction($action);
        }

    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionHomePage()
    {
        $modal = Widgets::find()->where(['page'=>'home_page'])->all();
        return $this->render('home-page',['modal'=>$modal]);
    }

    public function actionStatus()
    {
        if(isset($_GET["status"]))
        {
             $status = $_GET["status"];
             $id = $_GET["id"];
            $modal = Widgets::find()->where(['id'=>$id])->one();
            $modal->status = $status;
            if($modal->save(false))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
