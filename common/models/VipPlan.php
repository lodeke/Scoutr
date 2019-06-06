<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vip_plan".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $currency
 * @property int $duration
 * @property string $features
 */
class VipPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vip_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'currency', 'duration', 'features'], 'required'],
            [['duration'], 'integer'],
            [['features'], 'string'],
            [['name', 'price'], 'string', 'max' => 225],
            [['currency'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'currency' => 'Currency',
            'duration' => 'Duration',
            'features' => 'Features',
        ];
    }
}
