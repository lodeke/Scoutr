<?php
namespace backend\controllers;

use common\models\GiftList;
use common\models\Pages;
use PHPUnit\Runner\Exception;
use Yii;
use yii\web\UploadedFile;

use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\NotAcceptableHttpException;
/**
 * Gift controller
 */
class GiftController extends Controller
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


        $model = GiftList::find()->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionAdd()
    {
        $model = new GiftList();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->image = UploadedFile::getInstance($model,'image');
            $gift = $model->uploadGift();
            $model->image = $gift;
            $model->save(false);

            Yii::$app->getSession()->setFlash('success', 'Update successfully');
        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionEdit($id)
    {
        $model = GiftList::find()->where(['id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->image = UploadedFile::getInstance($model,'image');
            $gift = $model->uploadGift();
            $model->image = $gift;
            $model->save(false);

            Yii::$app->getSession()->setFlash('success', 'Update successfully');
            return $this->redirect(Url::toRoute('gift/index'));        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionDelete($id)
    {
        $model = GiftList::find()->where('id='.$id)->one();

        $model->delete();

        Yii::$app->getSession()->setFlash('success', 'Delete successfully');
        return $this->redirect(Url::toRoute('gift/index'));

    }


}
