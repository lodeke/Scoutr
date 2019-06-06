<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property int $id
 * @property string $country
 * @property string $currency
 * @property string $code
 * @property string $symbol
 * @property string $thousand_separator
 * @property string $decimal_separator
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'currency'], 'string', 'max' => 100],
            [['code', 'symbol'], 'string', 'max' => 25],
            [['thousand_separator', 'decimal_separator'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country' => Yii::t('app', 'Country'),
            'currency' => Yii::t('app', 'Currency'),
            'code' => Yii::t('app', 'Code'),
            'symbol' => Yii::t('app', 'Symbol'),
            'thousand_separator' => Yii::t('app', 'Thousand Separator'),
            'decimal_separator' => Yii::t('app', 'Decimal Separator'),
        ];
    }
}
