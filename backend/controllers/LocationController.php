<?php
namespace backend\controllers;

use backend\models\CityForm;
use backend\models\CitySearchForm;
use common\models\Admin;
use common\models\Ads;
use common\models\Cities;
use common\models\City;
use common\models\Contact;
use common\models\Countries;
use common\models\Faq;
use common\models\SiteSettings;
use common\models\MainMenu;
use common\models\Product;
use common\models\State;
use common\models\States;
use common\models\Track;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
/**
 * location controller
 */


define('LOGO_W', 223);
define('LOGO_H',50);
define('FAV_ICON_SIZE', 10);
class LocationController extends Controller
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
        if (isset($_POST['hasEditable']) and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out = Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return $out;
        }else{
            return parent::beforeAction($action);
        }
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }



    //country Action

    public function actionCountry()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $main = ArrayHelper::map(Countries::find()->select(['id','name'])->all(),'id','name');
        if (isset($_POST['hasEditable']))
        {
            $stateId = Yii::$app->request->post('editableKey');
            $state = Countries::findOne($stateId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Countries']);
            $post = ['Countries' => $posted];
            if ($state->load($post)) {
                // can save model or do something before saving model
                $state->save(false);
            }
            return $out;
        }
        if(isset($_GET['Countries']))
        {

            $searchModel = new Countries();//
            $query_s = Countries::find()
                ->where(['id' => $_GET['Countries']['name']])
                ->indexBy('id');
            $dataProvider = new ActiveDataProvider([
                'query' => $query_s,
            ]);
            return $this->render('country', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'data'=>$main,
            ]);
        }

        $searchModel = new Countries();
        $query_s = Countries::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('country', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'data'=>$main,
        ]);
    }


    //state Action

    public function actionState()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $main = ArrayHelper::map(Countries::find()->select(['id','name'])->all(),'id','name');
        if (isset($_POST['hasEditable']))
        {
            $stateId = Yii::$app->request->post('editableKey');
            $state = States::findOne($stateId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['States']);
            $post = ['States' => $posted];
            if ($state->load($post)) {
                // can save model or do something before saving model
                $state->save(false);
            }
            return $out;
        }
        if(isset($_GET['States']))
        {

            $searchModel = new States();
            $query_s = States::find()->where(['id' => $_GET['States']['name']])->orwhere(['country_id' => $_GET['States']['country_id']])->indexBy('id');
            $dataProvider = new ActiveDataProvider([
                'query' => $query_s,
            ]);
            return $this->render('state', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'data'=>$main,
            ]);
        }

        $searchModel = new States();
        $query_s = States::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('state', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'data'=>$main,
        ]);
    }

    public function actionCity()
    {

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $main = ArrayHelper::map(States::find()->select(['id','name'])->all(),'id','name');
        if (isset($_POST['hasEditable']))
        {
            $CityId = Yii::$app->request->post('editableKey');
            $city = Cities::findOne($CityId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Cities']);
            $post = ['Cities' => $posted];
            if ($city->load($post)) {
                // can save model or do something before saving model
                $city->save(false);
            }
            return $out;
        }
        if(isset($_GET['Cities'])) {

            $searchModel = new Cities();
            $query_s = Cities::find()->where(['id' => $_GET['Cities']['name']])->orwhere(['state_id' => $_GET['Cities']['state_id']])->indexBy('id');
            $dataProvider = new ActiveDataProvider([
                'query' => $query_s,
            ]);
            return $this->render('city', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'data'=>$main,
            ]);
        }

        $searchModel = new Cities();
        $query_s = Cities::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('city', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'data'=>$main,
        ]);

    }

    public function actionFormState($id)
    {
        $state = States::find()->where(['country_id'=>$id])->all();
        $count = count($state);

        if($count > 0) {
            echo "<option value='other'> Other</option>";
            foreach ($state as $name) {
                echo "<option value='" . $name['id'] . "'>" . $name['name'] . "</option>";
            }

        }
        else
        {
            echo "<option value='1'> other </option>";
        }
    }


}
