<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coin".
 *
 * @property int $id
 * @property string $currency
 * @property string $price
 * @property int $max_purchase
 * @property int $min_purchase
 */
class Coin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency', 'price', 'max_purchase', 'min_purchase'], 'required'],
            [['max_purchase', 'min_purchase'], 'integer'],
            [['currency'], 'string', 'max' => 4],
            [['price'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency' => 'Currency',
            'price' => 'Price',
            'max_purchase' => 'Max Purchase',
            'min_purchase' => 'Min Purchase',
        ];
    }

}
