<?php
namespace backend\controllers;

use common\models\AdminLoginForm;
//use common\models\Track;
use common\models\GiftList;
use common\models\Track;
use common\models\User;
use backend\models\NewUserForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {

        $control = Yii::$app->params['demo'];
        if(Yii::$app->request->isAjax and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out = Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return $out;
        }else{
            return parent::beforeAction($action);
        }
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','user','user-detail','dashboard'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        $user = User::find()->orderBy(['created_at'=>SORT_DESC])->limit('5')->all();
        $statistics = Track::find()->limit('5')->all();
        $totalGift = GiftList::find()->count();

        $totalPageView = Track::find()->count();
        $totalUser = User::find()->count();
        $vipUser = User::find()->where(['!=','vip','0'])->count();
        $Vip = User::find()->where(['!=','vip','0'])->count();
        $totalReport = false;;

        return $this->render('index',[
            'totalGift'=>$totalGift,
            'statistics'=>$statistics,
            'member'=>$user,
            'vip'=>$Vip,
            'page_view'=>$totalPageView,
            'totalUser'=>$totalUser,
            'report'=>$totalReport,
            'vip'=>$vipUser
        ]);
    }
    public function actionUser($id = false)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        };

        $searchModel = new NewUserForm();

        if (isset($_POST['hasEditable']))
        {
            $userId = Yii::$app->request->post('editableKey');
            $UserModel = User::findOne($userId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['User']);
            $post = ['User' => $posted];
            if ($UserModel->load($post)) {
                // can save model or do something before saving model
                $UserModel->save(false);
            }
            return $out;
        }

        $query_s = User::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);


        return $this->render('user', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }

    public function actionUserDetail()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        if(isset($_POST['expandRowKey'])) {
            $model = User::findOne($_POST['expandRowKey']);
            $ads = \common\models\Ads::find()->where(['user_id'=>$model['id']])->all();
            $adsPremium = \common\models\Ads::find()->where(['user_id'=>$model['id']])->andWhere('premium != ""')->count();
            $Like = SavedAds::find()->where(['user_id'=>$model['id']])->count();

            return $this->renderPartial('_profile.php',['like'=>$Like,'model'=>$model,'member'=>$model,'premium'=>$adsPremium,'ads'=>$ads]);
        }
        else
        {
            return '<div class="alert alert-danger">No data found</div>';

        }
    }


    public function actionLogin()
    {
        $this->layout = "plain";
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }



        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Url::toRoute('site/index'));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
