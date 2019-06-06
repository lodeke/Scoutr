<?php
namespace backend\controllers;

use common\models\Pages;
use PHPUnit\Runner\Exception;
use Yii;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\NotAcceptableHttpException;
/**
 * Analytic controller
 */
class PagesController extends Controller
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
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['hasEditable']))
        {
            $pageId= Yii::$app->request->post('editableKey');
            $pages = Pages::findOne($pageId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Pages']);
            $post = ['Pages' => $posted];
            if ($pages->load($post)) {
                // can save model or do something before saving model
                if($pages->save(false))
                {
                    $saved = true;
                }
                else
                {
                    $out = Json::encode(['output'=>'error', 'message'=>'Failed']);

                }
            }
            return $out;
        }

        $searchModel = new Pages();
        $query_s = Pages::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionAdd()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $model->title =  trim(htmlentities(strip_tags($model->title), ENT_QUOTES, 'UTF-8'));
                $model->content = trim(htmlentities(strip_tags($model->content), ENT_QUOTES, 'UTF-8'));
                 $model->save(false);
            }
            Yii::$app->getSession()->setFlash('success', 'Update successfully');
        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionEdit($id)
    {
        $model = Pages::find()->where('id='.$id)->one();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                 $model->save();
            }
            Yii::$app->getSession()->setFlash('success', 'Update successfully');
            return $this->redirect(Url::toRoute('pages/index'));

        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionDelete($id)
    {
        $model = Pages::find()->where('id='.$id)->one();

        $model->delete();


        return $this->redirect(Url::toRoute('pages/index'));
    }


}
