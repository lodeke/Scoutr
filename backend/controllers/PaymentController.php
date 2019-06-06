<?php
namespace backend\controllers;

use common\models\Coin;
use common\models\VipPlan;
use common\models\Payment;
use Yii;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\NotAcceptableHttpException;

/**
 * StaticsController
 */
class PaymentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        $model = new \common\models\VipPlan();
        $control = Yii::$app->params['demo'];
        if (isset($_POST['hasEditable']) and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out = Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return $out;
        };
        if($control == true and (Yii::$app->request->post() or $model->load(Yii::$app->request->post())))
        {
            throw new BadRequestHttpException('Its Demo You Cannot Modify anything');
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

    public function actionPaypal()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['hasEditable']))
        {
            $payId= Yii::$app->request->post('editableKey');
            $payment = Payment::findOne($payId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Payment']);
            $post = ['Payment' => $posted];
            if ($payment->load($post)) {
                // can save model or do something before saving model
                if($payment->save(false))
                {
                    $out = Json::encode(['output'=>$payment->status, 'message'=>'']);
                }
                else
                {
                    $out = Json::encode(['output'=>'error', 'message'=>'Failed']);

                }
            }
            return $out;
        }

        $searchModel = new Payment();
        $query_s = Payment::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['hasEditable']))
        {
            $payId= Yii::$app->request->post('editableKey');
            $payment = Payment::findOne($payId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Payment']);
            $post = ['Payment' => $posted];
            if ($payment->load($post)) {
                // can save model or do something before saving model
                if($payment->save(false))
                {
                    $out = Json::encode(['output'=>'', 'message'=>'']);
                }
                else
                {
                    $out = Json::encode(['output'=>'error', 'message'=>'Failed']);

                }
            }
            return $out;
        }

        $searchModel = new Payment();
        $query_s = Payment::find()->indexBy('id');
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Payment();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                Payment::updateAll(array('status'=>'disable'));
                $model->save(false);///die;
                Yii::$app->getSession()->setFlash('success', 'Update successfully');
                return $this->redirect(Url::toRoute('payment/index'));

            }

        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionEdit($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = Payment::find()->where('id='.$id)->one();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                Payment::updateAll(array('status'=>'disable'));
                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Update successfully');

                return $this->redirect(Url::toRoute('payment/index'));

            }
        }
        return $this->render('edit', ['model'=>$model]);
    }
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = Payment::find()->where('id='.$id)->one();

        $model->delete();
        return $this->redirect(Url::toRoute('payment/index'));


    }



    //ads
    public function actionVipPlan()
    {
        $all = VipPlan::find()->all();
        $new = new VipPlan();
        if ($new->load(Yii::$app->request->post())) {
            $new->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        return $this->render('vip_plan_setting',['all'=>$all,'new'=>$new]);
    }
    public function actionPlanEdit($plan)
    {
        $id = base64_decode($plan);
        $edit= VipPlan::findOne($id);
        if ($edit->load(Yii::$app->request->post())) {
            $edit->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        return $this->render('vip_plan_setting_edit',['new'=>$edit]);
    }
    public function actionCoin()
    {
        $all = Coin::find()->one();
        if ($all->load(Yii::$app->request->post())) {
            $all->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        return $this->render('coin_setting',['all'=>$all]);
    }





}
