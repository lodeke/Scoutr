<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * DefaultSetting model
 * @property string $id
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $mode
 * @property string $layout
 * @property string $home_page
 * @property string $list_style
 * @property string $profile_style
 * @property string $background
 * @property string $currency
 * @property string $language
 * @property string $active
 *
 *
 */
class DefaultSetting extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'default_setting';
    }

    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mode', 'safe'],
            ['layout', 'safe'],
            ['home_page', 'safe'],
            ['list_style', 'safe'],
            ['profile_style','safe'],
            ['background','safe'],
            ['language', 'safe'],
            ['country', 'safe'],
            ['state', 'safe'],
            ['city', 'safe'],
            ['flag_icon','safe'],
            ['currency', 'safe'],
            ['active','safe']
        ];
    }

    public static function getDefaultSetting()
    {
        $default = DefaultSetting::find()->where(['active'=>'1'])->one();
        $session = Yii::$app->session;
       // $session->destroy();
        $ses_flag = $session->get('flag');
        $ses_country = $session->get('country');
        $ses_state = $session->get('state');
        $ses_city = $session->get('city');
        $ses_CurrCity = $session->get('CurrCity');
        $ses_language = $session->get('language');
        $ses_direction = $session->get('direction');
        $d_flag = ($ses_flag)?strtolower($ses_flag):strtolower($default['flag_icon']);

        $ses_L_type = $session->get('locationtype');

        $d_currency = $default['currency'];
        $d_themes = $default['layout'];

        $data = array(
            'flag'=>$d_flag,
            'country'=>($ses_country)?$ses_country:$default['country'],
            'state'=>($ses_state)?$ses_state:$default['state'],
            'city'=>($ses_city)?$ses_city:$default['city'],
            'currency'=>($d_currency)?$d_currency:$default['currency'],
            'layout'=>$d_themes,
            'background'=>$default['background'],
            'language'=>($ses_language)?$ses_language:$default['language'],
            'direction'=>($ses_direction)?$ses_direction:'ltr',
            'CurrCity'=>$ses_CurrCity,
            'l_type'=>$ses_L_type
        );
        return $data;

    }

    /**
     * @inheritdoc
     */



}
