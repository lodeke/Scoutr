<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SearchForm extends Model
{
    public $gender;
    public $age_from;
    public $age_to;
    public $country;
    public $city;
    public $with_photo;
    public $search_for;
    public $ethnicity;
    public $languages;
    public $marital_status;
    public $sexual_orientation;
    public $body_type;
    public $eye_color;
    public $income;
    public $hair_color;
    public $drink;
    public $tattoos;
    public $smoke;
    public $religion;
    public $education;
    public $online;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['gender', 'safe'],
            ['gender', 'string', 'min' => 2],

            ['age_from', 'safe'],
            ['age_from', 'string', 'min' => 2],

            ['age_to', 'safe'],
            ['age_to', 'string', 'min' => 2],

            ['country', 'safe'],
            ['country', 'string', 'min' => 2],

            ['city', 'safe'],
            ['city', 'string', 'min' => 2],

            ['ethnicity', 'safe'],
            ['ethnicity', 'string', 'min' => 2],

            ['with_photo', 'safe'],
            ['with_photo', 'string', 'min' => 2],

            ['search_for', 'safe'],
            ['search_for', 'string', 'min' => 2],

            ['languages', 'safe'],
            ['languages', 'string', 'min' => 2],

            ['marital_status', 'safe'],
            ['marital_status', 'string', 'min' => 2],

            ['sexual_orientation', 'safe'],
            ['sexual_orientation', 'string', 'min' => 2],

            ['body_type', 'safe'],
            ['body_type', 'string', 'min' => 2],

            ['eye_color', 'safe'],
            ['eye_color', 'string', 'min' => 2],

            ['income', 'safe'],
            ['income', 'string', 'min' => 2],

            ['hair_color', 'safe'],
            ['hair_color', 'string', 'min' => 2],

            ['drink', 'safe'],
            ['drink', 'string', 'min' => 2],

            ['tattoos', 'safe'],
            ['tattoos', 'string', 'min' => 2],

            ['smoke', 'safe'],
            ['smoke', 'string', 'min' => 2],

            ['religion', 'safe'],
            ['religion', 'string', 'min' => 2],

            ['education', 'safe'],
            ['education', 'string', 'min' => 2],

            ['online', 'safe'],
            ['online', 'string', 'min' => 2],


        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function search()
    {
        if (!$this->validate()) {

            return null;
        }
        $uid = \Yii::$app->user->identity->getId();

        $model = User::find()->where(['!=','id',$uid]);
        if($this->gender)
        {
            $model =  $model->andWhere(['gender'=>$this->gender]);
        };
        if($this->marital_status)
        {
            $model =  $model->andWhere(['marital_status'=>$this->marital_status]);
        };
        if($this->sexual_orientation)
        {
            $model =  $model->andWhere(['sexual_orientation'=>$this->sexual_orientation]);
        };
        if($this->search_for)
        {
            $model =  $model->andWhere(['looking_for'=>$this->search_for]);
        };
        if($this->age_from == true or $this->age_to == true)
        {
            die('here');
            $model =  $model->andWhere(['between','age',$this->age_from,$this->age_to]);
        };
      return $result = $model->all();


    }
}
