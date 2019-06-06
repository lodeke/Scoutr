<?php
namespace backend\controllers;

use common\models\Currencies;
use common\models\Currency;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;

/**
 * Currency controller
 */
class CurrencyController extends Controller
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

        if(isset($_POST['hasEditable']) and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out = Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return  $out;
        }else{
            return parent::beforeAction($action);
        }
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

    /**
     *
     * @return string
     */

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['hasEditable']))
        {
            $CurrenciesId = Yii::$app->request->post('editableKey');
            $currencies = Currencies::findOne($CurrenciesId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Currencies']);
            $post = ['Currencies' => $posted];
            if ($currencies->load($post)) {
                // can save model or do something before saving model
                $currencies->save();
            }
            return  $out;
        }

        $searchModel = new Currencies();
        $query_s = Currencies::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionAdd()
    {

        $model = new Currency();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::toRoute('currency/index'));
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionEdit($id)
    {

        $model = Currency::find()->where(['id'=>$id])->one();
        if ($model->load(Yii::$app->request->post()))
        {
            Currency::updateAll(array('currency_status'=>'disable'));
            $model->save(false);
            return $this->redirect(Url::toRoute('currency/index'));
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

}
