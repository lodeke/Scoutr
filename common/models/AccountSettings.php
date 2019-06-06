<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * TYpe model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $show_me
 * @property string $match_age_from
 * @property string $match_age_to
 * @property string $distance_radius
 * @property string $hide_age
 * @property string $hide_locality
 * @property string $hide_photo
 *
 */
class AccountSettings extends ActiveRecord
{
    public $distance = '';


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account_settings}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['show_me', 'required'],
            ['match_age_from', 'required'],
            ['match_age_to','safe'],
            ['distance_radius','safe'],
            ['hide_age','safe'],
            ['hide_locality','safe'],
            ['hide_photo','safe'],



        ];
    }
    public static function AgeDropdown()
    {
        for($dis = 18;$dis < 80;$dis ++)
        {
            $range[$dis] = $dis;
        }
        return $range;
    }
    public static function distance()
    {
        for($dis = 20;$dis < 500;$dis ++)
        {
            $mod = $dis%10;
            $mod2 = $dis%100;
            if($mod == 0 and $dis < 100)
            {
                $range[$dis] = $dis;
            }
            elseif($mod2 == 0 and $dis < 500)
            {
                $range[$dis] = $dis;
            }

        }
        return $range;
    }

    /**
     * get user interest
     */
    public static function UserInterest()
    {
        $uId = Yii::$app->user->identity->getId();
        $interest = self::find()->where(['user_id'=>$uId])->one();
        return $interest;
    }
}
