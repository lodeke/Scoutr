<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $ads_id
 * @property string $type
 * @property string $amount
 * @property string $payment_gateway
 * @property string $payment_method
 * @property string $status
 * @property int $created_at
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'ads_id', 'payment_gateway', 'type', 'payment_method', 'status', 'created_at'], 'required'],
            [['user_id', 'ads_id', 'created_at'], 'integer'],
            [['status'], 'string'],
            ['amount','safe'],
            [['type', 'payment_method'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'ads_id' => Yii::t('app', 'Ads ID'),
            'type' => Yii::t('app', 'Type'),
            'payment_gateway'=>Yii::t('app', 'payment gateway'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public static function Add($user,$ads,$AdsType,$payment_gateway,$paymentMethod,$status,$amount=false)
    {
        $modal = new Transactions();
        $modal->user_id = $user;
        $modal->ads_id = $ads;
        $modal->type = $AdsType;
        $modal->amount = $amount;
        $modal->payment_gateway = $payment_gateway;
        $modal->payment_method = $paymentMethod;
        $modal->status = $status;
        $modal->created_at =time();
        $modal->save(false);
    }
}
