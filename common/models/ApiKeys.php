<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "api_keys".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $api_key
 * @property string $clientId
 * @property string $clientSecret
 * @property string $suggesion_text
 * @property string $suggestion_url
 * @property string $status
 */
class ApiKeys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_keys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'api_key', 'clientId', 'clientSecret', 'suggesion_text', 'suggestion_url', 'status'], 'required'],
            [['type', 'api_key', 'clientId', 'clientSecret', 'suggesion_text', 'suggestion_url', 'status'], 'string'],
            [['name'], 'string', 'max' => 225],
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
            'type' => Yii::t('app', 'Type'),
            'api_key' => Yii::t('app', 'Api Key'),
            'clientId' => Yii::t('app', 'Client ID'),
            'clientSecret' => Yii::t('app', 'Client Secret'),
            'suggesion_text' => Yii::t('app', 'Suggesion Text'),
            'suggestion_url' => Yii::t('app', 'Suggestion Url'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    public static function getTranslator()
    {
       $modal = static::find()->where(['type'=>'translator'])->andWhere(['status'=>'enable'])->one();
        return $modal;
    }
}
