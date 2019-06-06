<?php
namespace frontend\controllers;

use common\models\AccountSettings;
use common\models\DefaultSetting;
use common\models\EloRecords;
use common\models\EncounterSettings;
use common\models\GiftList;
use common\models\Match;
use common\models\Message;
use common\models\User;
use common\models\UserFeeds;
use common\models\UserGift;
use frontend\models\CardTemplate;
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
$default = DefaultSetting::find()->select(['layout'])->one();
$layout = $default['layout'];
define('LAYOUT',$layout);
/**
 * People controller
 */
class PeopleController extends Controller
{
    public $layout = LAYOUT;
    public function beforeAction($action) {

        $actionToRun = $action;;
        if (Yii::$app->user->isGuest)
        {
            $actionToRun = Url::toRoute('site/index');;
             Yii::$app->controller->redirect($actionToRun);
            return false;
        };
        if(isset($_GET['token_layout']))
        {
            $_SESSION['layout'] = $_GET['token_layout'];
            $sesLayout = $_SESSION['layout'];
            $layout = LAYOUT;
            $layoutCust = isset($sesLayout)?$sesLayout:$layout;
            $this->layout = $layoutCust;
        }
        else{
            $sesLayout = isset($_SESSION['layout'])?$_SESSION['layout']:false;
            $layout = LAYOUT;
            $layoutCust = ($sesLayout == true)?$sesLayout:$layout;
            $this->layout = $layoutCust;
        };
        if(isset($_GET['token_list']))
        {
            $_SESSION['list'] = $_GET['token_list'];
            $List = $_SESSION['list'];
            $ListCust = isset($List)?$List:false;
            $tmp = new CardTemplate();
            $tmp->temp = $ListCust;
        }
        else{

            $ListCust = isset($_SESSION['list'])?$_SESSION['list']:false;
            $tmp = new CardTemplate();
            $tmp->temp = $ListCust;
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

    /**
     * {@inheritdoc}
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $temp = EncounterSettings::find()->one();
        $encounter = User::encounter();
        return $this->render('index',['encounter'=>$encounter,'settings'=>$temp]);
    }
    public function actionDemo()
    {
        $encounter = User::encounter();

        return $this->render('demo',['model'=>$encounter]);

    }
    public function actionLikedMe()
    {
        $title = "Your Liked People";
        $likes = EloRecords::Likes();
        return $this->render('liked-me',['model'=>$likes,'title'=>$title]);
    }
    public function actionLikeBy()
    {
        $title = "People Who Like You";
        $likeBy = EloRecords::LikedBy();
        return $this->render('liked-me',['model'=>$likeBy,'title'=>$title]);
    }
    public function actionSearch()
    {
        $encounter = User::encounter();
        $search = new SearchForm();
        if ($search->load(Yii::$app->request->post()) && $search->validate()) {
            $encounter = $search->search();
        }
        else
        {
            $encounter = false;
        }
        return $this->render('search',['model'=>$encounter,'search'=>$search]);

    }

    public function actionDashboard($lat=false,$lang=false,$radius=false)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $userInterest = AccountSettings::UserInterest();
        if($userInterest['show_me'])
        {
            $gender = $userInterest['show_me'];
        }
        else
        {
            $Checkgender = Yii::$app->user->identity->gender;
            $gender = ($Checkgender == 'male')?'female':'male';

        }

        $uid = Yii::$app->user->identity->getId();
        $latDefault = Yii::$app->user->identity->lat;
        $langDefault = Yii::$app->user->identity->lang;

        $center_lat = ($lat != false)?$lat:$latDefault;
        $center_lng = ($lang != false)?$lang:$langDefault;
        $radius = ($radius != false)?$radius:50;
        $query = sprintf("SELECT  `id`,`username`,`first_name`, `last_name`,`gender`,`bio`,`school`, `lat`, `lang`, `vip`, `images`, `age`, `city`, `job_title`, `company`, ( 3959 * acos( cos( radians('%s') ) * cos( radians(lat) ) * cos( radians( lang ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM user WHERE gender = '$gender'  HAVING distance < '%s'  ORDER BY distance LIMIT 0 , 20",
            $center_lat,
            $center_lng,
            $center_lat,
            $radius);

        $connection = \Yii::$app->db;
        $model = $connection->createCommand($query);
        $result = $model->queryAll();

        if (!$result)
        {
            Yii::$app->session->setFlash('info', 'There are no user active under '.$radius.'km range');

            return $this->render('dashboard',['model'=>$result]);
        }
        return $this->render('dashboard',['model'=>$result]);
    }
    public function actionNearby($lat=false,$lang=false,$radius=false)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $userInterest = AccountSettings::UserInterest();
        if($userInterest['show_me'])
        {
            $gender = $userInterest['show_me'];
        }
        else
        {
            $Checkgender = Yii::$app->user->identity->gender;
            $gender = ($Checkgender == 'male')?'female':'male';

        }

        $uid = Yii::$app->user->identity->getId();
        $latDefault = Yii::$app->user->identity->lat;
        $langDefault = Yii::$app->user->identity->lang;

        $center_lat = ($lat != false)?$lat:$latDefault;
        $center_lng = ($lang != false)?$lang:$langDefault;

        $radius = ($radius != false)?$radius:50;
        $query = sprintf("SELECT  `id`,`username`,`first_name`, `last_name`,`gender`,`bio`,`school`, `lat`, `lang`, `vip`, `images`, `age`, `city`, `job_title`, `company`, ( 3959 * acos( cos( radians('%s') ) * cos( radians(lat) ) * cos( radians( lang ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM user WHERE gender = '$gender'  HAVING distance < '%s'  ORDER BY distance LIMIT 0 , 20",
            $center_lat,
            $center_lng,
            $center_lat,
            $radius);

        $connection = \Yii::$app->db;
        $model = $connection->createCommand($query);
        $result = $model->queryAll();
        if (!$result)
        {
            Yii::$app->session->setFlash('info', 'There are no user active under '.$radius.'km range');

            return $this->render('nearby',['model'=>$result]);
        }
        return $this->render('nearby',['model'=>$result]);

    }
    public function actionMatch()
    {
        $model = EloRecords::myMatch();
        return $this->render('match',['model'=>$model]);

    }
    public function actionMsg($reciever)
    {
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
    public function actionChats()
    {
        $uid = Yii::$app->user->identity->getId();

        $model = Message::find()->where(['reciever'=>$uid])->groupBy('reciever')->all();
        return $this->render('msg',['model'=>$model,'user'=>$uid]);

    }
    public function actionEncounter()
    {
        $encounter = User::encounter();

        return $this->render('index',['encounter'=>$encounter]);
    }

    public function actionEncounterLike($id)
    {

       EloRecords::UserLikes($id);

        return true;
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionProfile($user = false)
    {
        $issNew = Isset($_GET['isNew'])?$_GET['isNew']:false;
        if($issNew == true && isset($_GET['token']))
        {
            $token = base64_decode($_GET['token']);
            $verify = UserFeeds::VerifyRequest($token);
            $issNew = ($verify == true)?$_GET['isNew']:false;
        }
        else
        {
            $issNew = false;
        }

        $username = $user;
        if($user)
        {
            $model = User::findByUsername($username);
            $gifts = UserGift::find()->where(['user_id'=>$model->id])->all();

            return $this->render('profile',['model'=>$model,'gifts'=>$gifts,'new'=>$issNew,'match'=>false]);
        }
        else
        {
            $uid = Yii::$app->user->identity->getId();
            $model = User::findOne($uid);
            $gifts = UserGift::find()->where(['user_id'=>$uid])->all();
            $match = EloRecords::myMatch();
            return $this->render('my-profile',['model'=>$model,'gifts'=>$gifts,'new'=>$issNew,'match'=>$match]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionNotification()
    {
        UserFeeds::makeRead();
        $notification = UserFeeds::notification();

        return $this->render('notification',['model'=>$notification,'count'=>count($notification)]);
    }
}
