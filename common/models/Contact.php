<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Contact model
 *
 * @property integer $id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $about
 * @property string $facebook_profile
 * @property string $twitter_profile
 * @property string $linkedin_profile
 * @property string $instagram_profile
 * @property string $pinterest_profile
 * @property string $youtube_profile
 *
 */
class Contact extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['address', 'safe'],
            ['phone', 'safe'],
            ['email', 'safe'],
            ['about','safe'],
            ['facebook_profile','safe'],
            ['twitter_profile','safe'],
            ['linkedin_profile','safe'],
            ['instagram_profile','safe'],
            ['pinterest_profile','safe'],
            ['youtube_profile','safe'],
        ];
    }

    public static function getSocial()
    {
        $contact = \common\models\Contact::find()->one();
        if($contact['facebook_profile'] != '')
        {
            echo ' <li><a class="icon-color fb" title="Facebook" data-placement="top" data-toggle="tooltip" href="//'.$contact['facebook_profile'].'"><i class="fa fa-facebook"></i> </a></li>';
        }
        if($contact['twitter_profile'] != '')
        {
            echo ' <li><a class="icon-color tw" title="twitter" data-placement="top" data-toggle="tooltip" href="//'.$contact['twitter_profile'].'"><i class="fa fa-twitter"></i> </a></li>';
        }
        if($contact['instagram_profile'] != '')
        {
            echo ' <li><a class="icon-color insta" title="Instagram" data-placement="top" data-toggle="tooltip" href="//'.$contact['instagram_profile'].'"><i class="fa fa-instagram"></i> </a></li>';
        }
        if($contact['pinterest_profile'] != '')
        {
            echo ' <li><a class="icon-color pin" title="Pinterest" data-placement="top" data-toggle="tooltip" href="//'.$contact['pinterest_profile'].'"><i class="fa fa-pinterest"></i> </a></li>';
        }
        if($contact['youtube_profile'] != '')
        {
            echo ' <li><a class="icon-color yt" title="Youtube" data-placement="top" data-toggle="tooltip" href="//'.$contact['youtube_profile'].'"><i class="fa fa-youtube"></i> </a></li>';
        }
        if($contact['linkedin_profile'] != '')
        {
            echo ' <li><a class="icon-color pin" title="linkedin" data-placement="top" data-toggle="tooltip" href="//'.$contact['linkedin_profile'].'"><i class="fa fa-linkedin"></i> </a></li>';
        }

    }
}
