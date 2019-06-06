<?php
namespace frontend\controllers;

use common\models\EloRecords;
use common\models\GiftList;
use common\models\User;
use common\models\UserGift;
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
use common\models\Track;

/**
 * Encounter controller
 */
class EncounterController extends Controller
{
    public function beforeAction($action) {
        $actionToRun = $action;;
        $isSuggest = ($actionToRun->uniqueId == 'encounter/welcome-search')?true:false;
        if(Yii::$app->user->isGuest and $isSuggest === false) {
            return false;
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
        $this->layout = 'people';
        throw new BadRequestHttpException("access denied");
    }
    public function actionLike($id)
    {
        $id = base64_decode($id);
        EloRecords::UserLikes($id);
        return true;
       // return true;
    }
    public function actionDislike($id)
    {
        $id = base64_decode($id);
        EloRecords::UserDisLikes($id);
        return true;
    }

    public function actionUnmatch($id)
    {
        $id = base64_decode($id);

        EloRecords::unMatched($id);
        return $this->redirect(Url::toRoute('people/match'));
    }
    public function actionWelcomeSearch($sex)
    {
        $this->layout = "plain";
        $currentCity = Track::getCity();
       $modal = User::find()->where(['!=','gender',$sex])->select(['username','images','first_name','last_name','age'])->andWhere(['city'=>$currentCity])->limit(8)->all();

        return $this->render('index', [
            'modal' => $modal,
            'currentCity'=>$currentCity,
            'sex'=>$sex
        ]);

    }

    public function actionGiftLoad()
    {
        $this->layout = "plain";

        $gifts = GiftList::find()->all();

        return $this->render('gift-load', [
            'gifts' => $gifts,
        ]);

    }

    public static function actionGiftSend($giftId,$reciever)
    {
        $sent = UserGift::send($giftId,$reciever);

        return  $sent;
    }
}
