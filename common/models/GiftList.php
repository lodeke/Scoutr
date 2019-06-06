<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * GiftList model
 *
 * @property integer $id
 * @property string $gift
 * @property string $image
 * @property string $point
 * @property string $sent
 *
 *
 */
define('IMG_PATH_GIFT',\yii::getAlias('@frontend').'/web/images/site/gift/');

class GiftList extends ActiveRecord
{




    public static function tableName()
    {
        return 'gift_list';
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['gift', 'trim'],


            [['image'], 'file','extensions' => ['jpg',' png'] ,'checkExtensionByMimeType'=>false],
            ['image', 'required'],

            [['gift','image','point'], 'required'],

        ];
    }
    public function uploadGift()
    {
        $name = rand(137, 999) . time();
        $this->image->saveAs(IMG_PATH_GIFT . $name . '.' . $this->image->extension);
        return $name.'.'.$this->image->extension;
    }
    public function countSent($id = false)
    {
        if($id)
        {
            $model = self::find()->where(['id'=>$id])->count();
            return $model;
        }
        else
        {
            $model = self::find()->count();
            return $model;
        }
    }//count all gift sent or a how many time a particular gift was sent.

    public static function increment($id = false)
    {
        $model = self::find()->where(['id'=>$id])->one();
        if($model)
        {
            $model->sent = $model->sent + 1;
            $model->save(false);
        }
        else
        {
           return false;
        }
    }//add increment when a gift is sent
}
