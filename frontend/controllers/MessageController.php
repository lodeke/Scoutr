<?php
namespace frontend\controllers;

use common\models\EloRecords;
use common\models\Match;
use common\models\Message;
use common\models\User;
use frontend\models\SearchForm;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class MessageController extends Controller
{
    //code 0 for user is in match list (do chat)
    // code 1 for user is in match list but conversation is not start yet
    // code 3 user is not is in match list, wait for accept request
    // code 4 for message is successfully sent

    public function beforeAction($action) {
        $actionToRun = $action;;
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        }

        return parent::beforeAction($action);
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionMsg($reciever)
    {
        $this->layout = 'people';
        $uid = Yii::$app->user->identity->getId();

        $matchId = Match::findMatch($reciever);
        if($matchId)
        {
            $model = Message::find()->where(['match_id'=>$matchId])->all();

        }
        else
        {
            Yii::$app->session->setFlash('danger', 'There are no  active chat with this user');

        }

        return $this->render('msg',['model'=>$model,'user'=>$uid]);

    }
    public function actionSendMsg($reciever,$msg)
    {
        $this->layout = 'people';
        $success = Message::sendMsg($reciever,$msg);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'data' => [
                'success' => $success['response'],
                'message' => $success['msg'],
            ],
            'code' => $success['code'],
        ];
    }

    public function actionLoadMsg($reciever)
    {

        $this->layout = 'plain';
       $model = Message::loadMsg($reciever);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => [
                'success' => $model['response'],
                'message' => $model['msg'],
                'total' => $model['total'],
            ],
            'code' => $model['code'],
        ];
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionCheck($reciever)
    {
        $chat1 = Message::total($reciever);
        if($chat1)
        {
            return $chat1;
        }
        else{
            return false;

        }
    }

    public function actionUpdate($reciever,$check)
    {
        $model = Message::loadNewMsg($reciever,$check);
        if($model)
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'data' => [
                    'success' => $model['response'],
                    'message' => $model['msg'],
                    'total' => $model['total'],
                ],
                'code' => $model['code'],
            ];
        }
        else{
            return false;

        }
    }

}
