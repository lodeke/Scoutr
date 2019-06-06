<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Second form
 */
class SecondForm extends Model
{
    public $first_name;
    public $last_name;
    public $age;
    public $gender;
    public $about_me;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 3],

            ['last_name', 'safe'],
            ['last_name', 'string', 'min' => 3],

            ['age', 'required'],
            ['age', 'number'],
            ['gender', 'required'],
            ['gender', 'string'],
            ['about_me', 'required'],
            ['about_me', 'string'],

            [['first_name', 'last_name'], 'filter', 'filter' => function($value) {
                return trim(htmlentities(strip_tags($value), ENT_QUOTES, 'UTF-8'));
            }],
            //[['first_name','last_name'],'filter','filter'=>'\yii\helpers\HtmlPurifier::process']
        ];
        return array_merge(parent::rules(),$rules);

    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function next()
    {
        if (!$this->validate()) {

            return $this->errors;
        }

        $Uid = \Yii::$app->user->identity->getId();
        $model = User::find()->where(['id'=>$Uid])->one();
        $model->first_name = $this->first_name;
        $model->age = $this->age;
        $model->gender = $this->gender;
        $model->about_me = $this->about_me;
        return $model->save(false) ? $model : $model->errors;
    }
}
