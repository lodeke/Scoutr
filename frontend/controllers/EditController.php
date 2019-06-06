<?php
namespace frontend\controllers;

use common\models\DefaultSetting;
use common\models\AccountSettings;
use common\models\GiftList;
use common\models\User;
use Faker\Factory;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;
use common\models\Album;

/**
 * edit controller
 */
$default = DefaultSetting::find()->select(['layout'])->one();
define('LAYOUT',$default['layout']);
define('PROFILE_DIR', Yii::getAlias('@webroot') .'/images/users/');
define('THUMB_SIZE', 500);
define('ALBUM_DIR', Yii::getAlias('@webroot') .'/images/users/album/');
class EditController extends Controller
{

    public $layout = LAYOUT;
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        }
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $uId = Yii::$app->user->identity->getId();
        $model = User::findOne($uId);
        if ($model->load(Yii::$app->request->post())) {

            $model->save(false);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionUploadPhoto()
    {
        $uId = Yii::$app->user->identity->getId();
        $model = User::findOne($uId);
        if (UploadedFile::getInstances($model, 'images'))
        {
            $model->images = UploadedFile::getInstances($model, 'images');
            $data = $model->ScreenShot();
            if($data['response'])
            {
                $model->images = $data['images'];
            }
            else{
                Yii::$app->getSession()->setFlash($data['type'], $data['msg']);
                return $this->refresh();
            }

        }
        return $this->render('photo', [
            'model' => $model
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */

    public function actionPersonalInformation()
    {

        $uId = Yii::$app->user->identity->getId();
        $model = User::findOne($uId);
        if ($model->load(Yii::$app->request->post())) {
            $model->first_name = trim(htmlentities(strip_tags($model->first_name), ENT_QUOTES, 'UTF-8'));
            $model->last_name = trim(htmlentities(strip_tags($model->last_name), ENT_QUOTES, 'UTF-8'));

            $model->age = trim(htmlentities(strip_tags($model->age), ENT_QUOTES, 'UTF-8'));
            $model->gender = trim(htmlentities(strip_tags($model->gender), ENT_QUOTES, 'UTF-8'));
            $model->about_me = trim(htmlentities(strip_tags($model->about_me), ENT_QUOTES, 'UTF-8'));

            $model->school = trim(htmlentities(strip_tags($model->school), ENT_QUOTES, 'UTF-8'));
            $model->job_title = trim(htmlentities(strip_tags($model->job_title), ENT_QUOTES, 'UTF-8'));
            $model->company = trim(htmlentities(strip_tags($model->company), ENT_QUOTES, 'UTF-8'));

            $model->save(false);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionProfileSettings()
    {

        $uId = Yii::$app->user->identity->getId();
        $model = AccountSettings::find()->where(['user_id'=>$uId])->one();
        if(!$model)
        {
            $model = new AccountSettings();
            $model->user_id = $uId;
            $model->save(false);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
        }
        return $this->render('profile-settings', [
            'model' => $model,
        ]);
    }
    public function actionAccountSettings()
    {

        $uId = Yii::$app->user->identity->getId();
        $model = User::findOne($uId);
        if ($model->load(Yii::$app->request->post())) {
            $temp =  Yii::$app->getSecurity()->generatePasswordHash($model->change_password);
            $model->password_hash = $temp;
            $model->save(false);
        }
        return $this->render('account-settings', [
            'model' => $model,
        ]);
    }
    public function actionFaker()
    {


        for($fak = 1; $fak < 8 ;$fak++)
        {
            $model = new User();

            $faker = Factory::create();
            $model->username = $faker->userName;
            $model->email = $faker->email;
            $model->first_name = $faker->firstNameFemale;
            $model->last_name = $faker->lastName;
            $model->age = rand(18,35);
            $model->bio = $faker->realText(150);
            $model->school = 'Ask Latter';
            $model->job_title = $faker->jobTitle;
            $model->company = $faker->company;
            $model->images = $faker->randomElement(array('g1.jpg','g2.jpg','g3.jpg','g4.jpg','g5.jpg','g6.jpg','g7.jpg'));
            $model->gender = 'female';
            $model->city = $faker->city;;
            $model->state = $faker->streetName;;
            $model->country = $faker->country;;
            //$model->phone_numbers = $faker->phoneNumber;
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash('123456');
            $model->created_at = time();
            $model->updated_at = time();
            $model->save(false);

          echo  $msg = "user $faker->firstNameFemale created <br>";
        }

        return true;
    }

    public function actionFileUpload()
    {
        return $_REQUEST;
    }

    public function actionAlbum()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $uid = Yii::$app->user->identity->getId();
        $model = new Album();
        $images = Album::find()->where(['user_id'=>$uid])->all();
        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model,'image');
            $ext = substr(strrchr($model->image,'.'),1);
            $desiredExt='jpg';
            $fileNameNew = rand(137, 999) . time() . ".$desiredExt";
            $path[0] = $model->image->tempName;
            $path[1] = ALBUM_DIR . $fileNameNew;

            Album::createThumb($path[0],$path[1], $ext, false,false,THUMB_SIZE);
            $model->user_id = $uid;
            $model->image = $fileNameNew;
            $model->created_at = time();
            $model->save(false);
            return $this->redirect(Url::toRoute('edit/album'));
        } else {
            return $this->render('album', [
                'model' => $model,
                'list'=>$images
            ]);
        }

    }

}
