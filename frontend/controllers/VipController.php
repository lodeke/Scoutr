<?php
namespace frontend\controllers;
use common\models\Boost;
use common\models\Coin;
use common\models\Connection;
use common\models\Credit;
use common\models\Match;
use common\models\Message;
use common\models\MyConnection;
use common\models\Notification;
use common\models\ProfileView;
use common\models\Request;
use common\models\Shortlist;
use common\models\VipPlan;
use frontend\models\VipForm;
use Yii;
use yii\data\Pagination;
use frontend\models\RegisterForm;
use common\models\PersonalInfo;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\FamilyForm;
use frontend\models\PersonalForm;
use common\models\User;

error_reporting(E_ALL);
/**
 * Vip controller
 */
//


class VipController extends Controller
{
    public $layout = 'plain';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays  page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index');

       // return $this->render('index');
    }


    /**
     * Displays plan page.
     *
     * @return mixed
     */
    public function actionPlan()
    {

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $form = new VipForm();
        if ($form->load(Yii::$app->request->post())) {
            $type =  $form->type;
            $pid =  $form->plan;


            $pricePlan = VipPlan::findOne($form->plan);
            $price =  $pricePlan['price'];

            $Url = Url::toRoute('payment/index',true)."?type=$type&pid=".$pid.'&price='.$price;
            return $this->redirect($Url);
        } else {
            $plan = VipPlan::find()->all();
            return $this->render('plan',['plan'=>$plan,'model'=>$form]);
        }



    }

    /**
     * Displays credit page.
     *
     * @return mixed
     */
    public function actionCoin()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $form = new VipForm();
        if ($form->load(Yii::$app->request->post())) {
            $type =  $form->type;
            $coin =  $form->coin;
            $price =  $form->price;
            $Url = Url::toRoute('payment/index',true)."?type=$type&pid=".$coin.'&price='.$price;
            return $this->redirect($Url);
        } else {
            $plan = Coin::find()->one();
            return $this->render('coin',['plan'=>$plan,'model'=>$form]);
        }

    }
    public function actionBoost()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $form = new VipForm();
        if ($form->load(Yii::$app->request->post())) {
            $type =  $form->type;
            $pid =  $form->plan;


            $pricePlan = Boost::findOne($form->plan);
            $price =  $pricePlan['price'];

            $Url = Url::toRoute('payment/index',true)."?type=$type&pid=".$pid.'&price='.$price;
            return $this->redirect($Url);
        }
    }



}