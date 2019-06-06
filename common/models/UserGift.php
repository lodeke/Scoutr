<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * UserGift model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $sender
 * @property string $gift_id
 * @property string $image
 * @property string $point
 */
class UserGift extends ActiveRecord
{




    public static function tableName()
    {
        return 'user_gift';
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gift_id','used_id','sender','image','point'], 'safe'],

        ];
    }

    public static function send($giftId,$recieverId)
    {
        $uId = Yii::$app->user->identity->getId();
        $gift = GiftList::find()->where(['id'=>$giftId])->one();
        $point = $gift['point'];
        $model = new UserGift();
        $model->user_id = $recieverId;
        $model->sender = $uId;
        $model->gift_id = $giftId;
        $model->image = $gift['image'];
        $model->point = $point;
        if($model->save(false))
        {
            Point::AddPoint($recieverId,$point);
            Point::deducePoint($point);
            GiftList::increment($giftId);
            return true;
        }
        else{
            return false;
        }



    }


}
