<?php
namespace frontend\controllers;


use common\models\Boost;
use common\models\Credit;
use common\models\Payment;
use common\models\Point;
use common\models\User;
use common\models\UserBoost;
use common\models\VipPlan;
use Yii;
use yii\helpers\Url;
use yii\rest\CreateAction;
use yii\web\Controller;
/**
 * payment controller
 */



class PaymentController extends Controller
{
    public $layout = 'plain';
    /**
     * @inheritdoc
     */
    public function actionIndex($type,$pid,$price)
    {
        if($type == "boost")
        {
            $payment = Payment::find()->where(['status'=>'enable'])->one();
            $rerunUrl = Url::toRoute('payment/success',true)."?type=$type&pid=".$pid;

            return $this->render('index',[
                'type'=>$type,
                'paypalAddress'=>$payment['email'],
                'amount'=> $price,
                'rerunUrl'=>$rerunUrl,
                'item_name'=>"Boost Your profile"

            ]);

        }
        elseif($type == "coin")
        {
            $payment = Payment::find()->where(['status'=>'enable'])->one();
            $rerunUrl = Url::toRoute('payment/success',true)."?type=$type&pid=".$pid;

            return $this->render('index',[
                'type'=>$type,
                'paypalAddress'=>$payment['email'],
                'amount'=> $price,
                'rerunUrl'=>$rerunUrl,
                'item_name'=>"buy credit point"

            ]);

        }
        elseif($type == "membership")
        {

            $payment = Payment::find()->where(['status'=>'enable'])->one();
            $rerunUrl = Url::toRoute('payment/success',true)."?type=$type&pid=".$pid;



            return $this->render('index',[
                'type' => $type,
                'paypalAddress' => $payment['email'],
                'amount' => $price,
                'rerunUrl' => $rerunUrl,
                'item_name' => "buy credit point"
            ]);
        }
        else
        {
            return $this->redirect(Url::toRoute('user/access-denied'));

        }

    }
    public function actionSuccess($type,$pid)
    {
        if($type == "boost")
        {
            $boost = Boost::findOne($pid);
            UserBoost::getBoos($boost['time']);

        }
        elseif($type == "coin")
        {
            $uid = Yii::$app->user->identity->getId();
            Point::AddBuyPoint($uid,$pid);
            $msg = $pid." Coin Added Successfully in your Account";
            Yii::$app->session->setFlash('success', '<b>Coin Addedd !</b>'.$msg);

        }
        elseif($type == "membership")
        {
            $vip = VipPlan::findOne($pid);

            User::set($vip['duration'],$vip['id']);
            Yii::$app->session->setFlash('success', 'Congratulation, Now you are a Vip Member');

        }

        return $this->redirect(Url::toRoute('site/index'));

    }
    
    

    
}