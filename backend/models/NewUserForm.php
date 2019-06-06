<?php
namespace backend\models;

use common\models\AdminNotification;
use yii\base\Model;
use common\models\User;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * Signup form
 */
class NewUserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $about_you;
    public $type;
    public $phone_number;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],




            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['first_name'],'default','value'=>'User_'.time()],
            ['first_name', 'string', 'max' => 255],

            [['type'],'default','value'=>'individual'],
            ['type', 'string', 'max' => 255],



            [['first_name'],'default','value'=>'User_'.time()],
            ['first_name', 'string', 'max' => 255],

            [['last_name'],'default','value'=>'demo'],
            ['last_name', 'string', 'max' => 255],

            ['phone_number', 'required'],
            [['phone_number'], 'string'],
           // [['phone_number'], PhoneInputValidator::className()],

            [['about_you'],'default','value'=>'Hi!!!, i am guest user of '.\Yii::$app->name],
            ['about_you', 'string', 'max' => 500,'min'=>50],

           // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '']

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->phone_number = $this->phone_number;
            $user->about_you = $this->about_you;
            $user->type = $this->type;



            \Yii::$app->session->setFlash('success', 'login success');
            if($user->save(false))
            {
                $msg = "New User Just register with the name ".$this->first_name." ".$this->last_name;
                AdminNotification::add('new user registration',$msg,'user/detail/'.$user->id);
                return $user;
            }
            else
            {
                return  null;

            }
        } else {
            // validation failed: $errors is an array containing error messages
            $errors = $this->errors;
            foreach ($errors as $list)
            {
                \Yii::$app->session->setFlash('warning', $list);

            }
            return null;
        }
        

    }
}
