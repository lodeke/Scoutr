<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Point model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $point
 */
class Point extends ActiveRecord
{




    public static function tableName()
    {
        return 'point';
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','used_id','point'], 'safe'],

        ];
    }
    public static function getPoint()
    {
        $current = Yii::$app->user->identity->id;
        $model = static::find()->where(['user_id'=>$current])->one();
        return $model['point'];
    }
    public static function deducePoint($point)
    {
        $current = Yii::$app->user->identity->id;
        $model = static::find()->where(['user_id'=>$current])->one();
        if($model)
        {
            $model->point = $model->point - $point;
            $model->save(false);
            return true;
        }
        else
        {
            $model = new Point();
            $model->user_id = $current;
            $model->point = $model->point - $point;
            $model->save(false);
            return true;
        }

    }
    public static function AddPoint($reciever,$point)
    {
        $model = Point::find()->where(['user_id'=>$reciever])->one();
        if($model)
        {
            $model->point = $model->point + $point;
            if($model->save(false))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            $model = new Point();
            $model->user_id = $reciever;
            $model->point = $point;
            if($model->save(false))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }
    public static function AddBuyPoint($user,$point)
    {
        $model = static::find()->where(['user_id'=>$user])->one();
        if($model)
        {
            $model->point = ($model->point + $point);
            $model->save(false);
            return true;
        }
        else
        {
            $model = new Point();
            $model->point = $point;
            $model->user_id = $user;
            $model->save(false);
            return true;
        }
    }


}
