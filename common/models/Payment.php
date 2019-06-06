<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $image
 * @property string $public_key
 * @property string $private_key
 * @property string $hint
 * @property int $brokerage
 * @property string $view
 * @property string $currency currency should be in currency code eg: USD,RS 
 * @property string $status
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'image', 'public_key', 'private_key', 'hint', 'brokerage', 'currency', 'status'], 'required'],
            [['public_key', 'private_key', 'hint', 'status'], 'string'],
            [['brokerage'], 'integer'],
            ['view','safe'],
            [['name'], 'string', 'max' => 50],
            [['email', 'image', 'currency'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
            'public_key' => Yii::t('app', 'Public Key Or Client ID'),
            'private_key' => Yii::t('app', 'Private Key'),
            'hint' => Yii::t('app', 'Hint'),
            'brokerage' => Yii::t('app', 'Brokerage'),
            'currency' => Yii::t('app', 'currency should be in currency code eg: USD,RS '),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    public static function getBrokerCharge()
    {
        $model=  static::findOne(['status' => 'enable']);
        return $model->brokerage;
    }
}
