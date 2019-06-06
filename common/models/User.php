<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $images
 * @property string $first_name
 * @property string $last_name
 * @property string $age
 * @property string $gender
 * @property string $bio
 * @property string $school
 * @property string $job_title
 * @property string $company
 * @property string $phone_numbers
 * @property string $country
 * @property string $state
 * @property string $city
 * @property double $lat
 * @property double $lang
 * @property string $sexual_orientation
 * @property string $marital_status
 * @property string $children
 * @property string $languages
 * @property string $looking_for
 * @property string $ethnicity
 * @property string $religion
 * @property string $smoker
 * @property string $drinking
 * @property string $education
 * @property string $height
 * @property string $weight_kg
 * @property string $build
 * @property string $hair_color
 * @property string $eye_color
 * @property string $about_me
 * @property string $about_partner
 * @property string $match
 * @property string $user_likes
 * @property string $user_unlikes
 * @property string $vip
 * @property string $vip_end
 * @property string $boost
 * @property string $auth_key
 * @property string $fake
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $change_password = '';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function beforeValidate()
    {
        foreach (array_keys($this->getAttributes()) as $attr){
            if(!empty($this->$attr)){
                $this->$attr = \yii\helpers\HtmlPurifier::process($this->$attr);
            }
        }

        return parent::beforeValidate();// to keep parent validator available
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['change_password', 'required'],
            ['change_password', 'string', 'min' => 6],

            ['images', 'required'],
            [['images'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 5],


            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 3],

            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 3],

            ['age', 'required'],
            ['age', 'number','min' => 18,'max'=>80,'message' => 'Age should be between 18 to 80.'],
            ['age', 'default', 'value' => "18"],

            ['gender', 'required'],
            ['gender', 'string'],

            ['bio', 'required'],
            ['bio', 'string', 'min' => 50,'max'=>'250'],

            ['school', 'required'],
            ['school', 'string'],

            ['job_title', 'required'],
            ['job_title', 'string', 'min' => 3],

            ['company', 'required'],
            ['company', 'string', 'min' => 3],

            ['city', 'required'],
            ['city', 'string'],

            ['state', 'required'],
            ['state', 'string'],

            ['country', 'required'],
            ['country', 'string'],
            //new start
            ['lat', 'required'],
            ['lat', 'number'],

            ['lang', 'required'],
            ['lang', 'number'],

            ['sexual_orientation', 'required'],
            ['sexual_orientation', 'string'],

            ['marital_status', 'required'],
            ['marital_status', 'string'],

            ['languages', 'required'],
            ['languages', 'string'],

            ['looking_for', 'required'],
            ['looking_for', 'string'],

            ['ethnicity', 'required'],
            ['ethnicity', 'string'],

            ['religion', 'required'],
            ['religion', 'string'],

            ['smoker', 'required'],
            ['smoker', 'string'],

            ['drinking', 'required'],
            ['drinking', 'string'],

            ['education', 'required'],
            ['education', 'string'],

            ['height', 'required'],
            ['height', 'number'],

            ['weight_kg', 'required'],
            ['weight_kg', 'number'],

            ['build', 'required'],
            ['build', 'string'],

            ['hair_color', 'required'],
            ['hair_color', 'string'],

            ['eye_color', 'required'],
            ['eye_color', 'string'],

            ['about_me', 'required'],
            ['about_me', 'string'],

            ['about_partner', 'required'],
            ['about_partner', 'string'],

            ['phone_numbers','safe'],
            ['phone_numbers','string'],
            ['fake','safe'],
            ['fake','number'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['first_name', 'last_name', 'username'], 'filter', 'filter' => function($value) {
                return trim(htmlentities(strip_tags($value), ENT_QUOTES, 'UTF-8'));
            }]
        ];


    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function welcomeMembers($currentCity)
    {
        $model = self::find()->where(['city'=>$currentCity])->count();
        if($model)
        {
            return $model." people from ".$currentCity;
        }
        else
        {
            $model = self::find()->count();
            return $model." people from waiting for you";

        }
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * get user encounter
     */
    public static function encounter($max=false)
    {
        $uId = Yii::$app->user->identity->getId();
        $elo = EloRecords::find()->where(['user_id'=>$uId])->one();

        $userInterest = AccountSettings::UserInterest();
        if($userInterest['show_me'])
        {
            $gender = $userInterest['show_me'];
        }
        else
        {
            $Checkgender = Yii::$app->user->identity->gender;
            $gender = ($Checkgender == 'male')?'female':'male';

        }
        $modal = self::find()->where(['!=','id',$uId]);
        $likes = empty($elo['user_likes'])?'0':$elo['user_likes'];
        $ignored = empty($elo['user_ignore'])?'0':$elo['user_ignore'];

        $modal = User::find()->where(['!=','id',$uId])->andWhere(['gender'=>$gender])->andWhere('id not in ('.$likes.')')->andWhere('id not in ('.$ignored.')');

        if($max)
        {
            $user =  $modal->limit($max)->all();
        }
        else
        {
            $user = $modal->all();

        }

        return $user;
    }

    public function ScreenShot()
    {

        foreach($this->images as $file)
        {
            $ext = $file->extension;// substr(strrchr($file,'.'),1);
            //die($ext);
            $desiredExt='jpg';
            $name = rand(137, 999) . time() . ".$desiredExt";
            $images[] = $name;
            $path[0] = $file->tempName;
            $path[1] = PROFILE_DIR . $name;
            if(empty($path[0]))
            {
                Yii::$app->getSession()->setFlash('error', '<b>Error: </b> Image may be currepted or too big file size. try another image');
               return $array = ['response'=>false,'msg'=>'Image may be currepted or too big file size. try another image','type'=>'error'];
            }
            else{
                User::createThumb($path[0],$path[1], $ext,false,false,THUMB_SIZE);
            }

        }
        $array = ['response'=>true,'msg'=>'Image uploaded Successfully','type'=>'Success','images'=>implode(",", $images)];
        return $array;

    }

    public static function set($days,$plan)
    {

        $id = Yii::$app->user->identity->getId();

        $last = strtotime('+'.$days.' month',time());
        $model = static::findOne($id);
        $model->vip = $plan;
        $model->vip_end = $last;
        $model->save(false);
        return true;

    }
    public static function createThumb($path1, $path2, $file_type, $new_w, $new_h, $squareSize = ''){
        /* read the source image */
        $source_image = FALSE;

        if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
            $source_image = imagecreatefromjpeg($path1);
        }
        elseif (preg_match("/png|PNG/", $file_type)) {

            if (!$source_image = @imagecreatefrompng($path1)) {
                $source_image = imagecreatefromjpeg($path1);
            }
        }
        elseif (preg_match("/gif|GIF/", $file_type)) {
            $source_image = imagecreatefromgif($path1);
        }
        if ($source_image == FALSE) {
            $source_image = imagecreatefromjpeg($path1);
        }

        $orig_w = imageSX($source_image);
        $orig_h = imageSY($source_image);

        if ($orig_w < $new_w && $orig_h < $new_h) {
            $desired_width = $orig_w;
            $desired_height = $orig_h;
        } else {
            $scale = min($new_w / $orig_w, $new_h / $orig_h);
            $desired_width = ceil($scale * $orig_w);
            $desired_height = ceil($scale * $orig_h);
        }

        if ($squareSize != '') {
            $desired_width = $desired_height = $squareSize;
        }

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        // for PNG background white----------->
        $kek = imagecolorallocate($virtual_image, 255, 255, 255);
        imagefill($virtual_image, 0, 0, $kek);

        if ($squareSize == '') {
            /* copy source image at a resized size */
            imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
        } else {
            $wm = $orig_w / $squareSize;
            $hm = $orig_h / $squareSize;
            $h_height = $squareSize / 2;
            $w_height = $squareSize / 2;

            if ($orig_w > $orig_h) {
                $adjusted_width = $orig_w / $hm;
                $half_width = $adjusted_width / 2;
                $int_width = $half_width - $w_height;
                imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
            }

            elseif (($orig_w <= $orig_h)) {
                $adjusted_height = $orig_h / $wm;
                $half_height = $adjusted_height / 2;
                imagecopyresampled($virtual_image, $source_image, 0,0, 0, 0, $squareSize, $adjusted_height, $orig_w, $orig_h);
            } else {
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $squareSize, $squareSize, $orig_w, $orig_h);
            }
        }

        if (@imagejpeg($virtual_image, $path2, 90)) {
            imagedestroy($virtual_image);
            imagedestroy($source_image);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
