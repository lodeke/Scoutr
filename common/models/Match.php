<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match".
 *
 * @property int $id
 * @property int $match_id
 * @property int $user
 * @property int $user_match
 * @property int $created_at
 */
class Match extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_id', 'user', 'user_match', 'created_at'], 'required'],
            [['match_id', 'user', 'user_match', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'match_id' => 'Match ID',
            'user' => 'User',
            'user_match' => 'User Match',
            'created_at' => 'Created At',
        ];
    }

    public static function findMatch($id)
    {
        $uid = Yii::$app->user->identity->id;
        $model = self::find()->where(['user'=>$uid])->andWhere(['user_match'=>$id])->one();
        if($model)
        {
           return $model['match_id'];
        }
        else{
            return false;
        }
    }

    public static function unMatch($id)
    {
        $uid = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user'=>$uid])->andWhere(['user_match'=>$id])->one();

        if($model)
        {
            $model->delete();
            return true;
        }
        else{
            return false;
        }
    }//unmatch
    public static function total()
    {
        $uid = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user'=>$uid])->count();

        if($model)
        {

            return $model;
        }
        else{
            return false;
        }
    }//unmatch

}
