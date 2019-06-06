<?php
namespace backend\controllers;

use backend\models\NewUserForm;
use common\models\AdminLoginForm;
use common\models\Ads;
//use common\models\Track;
use common\models\EloRecords;
use common\models\SavedAds;
use common\models\User;
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
class UserController extends Controller
{
    /**
     * @inheritdoc
     */

    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
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
                        'actions' => ['login', 'error','user','detail','user-detail','images'],
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

    public function actionIndex($id = false)
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
            $elo = EloRecords::findOne(['user_id'=>$_POST['expandRowKey']]);
            if(!empty($elo['user_like_back']))
            {
                $match = EloRecords::UserMatch($elo['user_like_back']);

            }
            else
            {
                $match =false;
            }
            return $this->renderPartial('_profile.php',['model'=>$model,'elo'=>$elo,'match'=>$match]);
        }
        else
        {
            return '<div class="alert alert-danger">No data found</div>';

        }
    }

    public function actionDetail($id)
    {
        $this->layout = "main";
        $model = User::findOne($id);
        $elo = EloRecords::findOne(['user_id'=>$id]);
        if(!empty($elo['user_like_back']))
        {
            $match = EloRecords::UserMatch($elo['user_like_back']);

        }
        else
        {
            $match =false;
        }
        return $this->render('index',['model'=>$model,'elo'=>$elo,'match'=>$match]);

    }

    public function actionImages()
    {
        $model = User::find()->select(['images','username','id'])->all();
        return $this->render('images',['model'=>$model]);
    }

}
