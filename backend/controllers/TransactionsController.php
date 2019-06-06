<?php
namespace backend\controllers;

use common\models\Ads;
use common\models\Transactions;
use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;

/**
 * StaticsController
 */
class TransactionsController extends Controller
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

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        $amount = Transactions::find()->sum('amount');
        $total = Transactions::find()->count();
        $urjent = Transactions::find()->where(['type'=>'urgent'])->count();
        $featured = Transactions::find()->where(['type'=>'featured'])->count();

        $searchModel = new Transactions();
        $query_s = Transactions::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'data'=>['total'=>$total,'amount'=>$amount,'urjent'=>$urjent,'featured'=>$featured]
        ]);

    }






}
