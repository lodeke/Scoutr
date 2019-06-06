<?php
namespace frontend\controllers;

use common\models\Album;
use common\models\Point;
use common\models\Track;
use common\models\User;
use frontend\models\SecondForm;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * plain controller
 */
define('PROFILE_DIR', Yii::getAlias('@webroot') .'/images/users/');
define('THUMB_SIZE', 500);
class StartController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup',],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','match'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays step 1.
     *
     * @return mixed
     */
    public function actionStepFirst()
    {
        $model = User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post()))
        {
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
            else {
                $model->images = false;
            }
            $model->save(false);
            Yii::$app->getSession()->setFlash('success', '<b>Success</b> Account detail successfully updated');
            return $this->redirect(Url::toRoute('start/step-second'));

            //
        } else {
            return $this->render('one', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Displays step 2.
     *
     * @return mixed
     */

    public function actionStepSecond()
    {
        $Uid = Yii::$app->user->identity->getId();
        $point = new Point();
        $point->user_id = $Uid;
        $point->point = 0;
        $point->save(false);

        $getCountry = Track::getLocationInfoByIp();
        $country = !empty($getCountry['country'])?$getCountry['country']:"india";
        $states= !empty($getCountry['state'])?$getCountry['state']:"rajasthan";

        $city = !empty($getCountry['city'])?$getCountry['city']:"Jaipur";

        $lat = !empty($getCountry['lat'])?$getCountry['lat']:"26.2389";
        $long = !empty($getCountry['long'])?$getCountry['long']:"73.0243";


        $saved = User::find()->where(['id'=>$Uid])->one();

        $saved->first_name = Yii::$app->user->identity->username;
        $saved->city = $city;
        $saved->country = $country;
        $saved->state = $states;
        $saved->lat = $lat;
        $saved->lang = $long;

        $saved->save(false);

        $model = User::find()->where(['id'=>$Uid])->one();;
        if ($model->load(Yii::$app->request->post())) {

            $model->first_name = trim(htmlentities(strip_tags($model->first_name), ENT_QUOTES, 'UTF-8'));
            $model->age = trim(htmlentities(strip_tags($model->age), ENT_QUOTES, 'UTF-8'));
            $model->gender = trim(htmlentities(strip_tags($model->gender), ENT_QUOTES, 'UTF-8'));
            $model->about_me = trim(htmlentities(strip_tags($model->about_me), ENT_QUOTES, 'UTF-8'));

          $data =  $model->save(false);
            if($data)
            {
                return $this->redirect(Url::toRoute('start/step-three'));
            }
            else{
                return $this->render('two', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('two', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Displays step 2.
     *
     * @return mixed
     */

    public function actionStepThree()
    {
        $model = User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->about_partner = trim(htmlentities(strip_tags($model->about_partner), ENT_QUOTES, 'UTF-8'));
            $model->save(false);
            return $this->redirect(Url::toRoute('start/step-four'));
        } else {
            return $this->render('three', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Displays step 2.
     *
     * @return mixed
     */

    public function actionStepFour()
    {
        $model = User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->height = trim(htmlentities(strip_tags($model->height), ENT_QUOTES, 'UTF-8'));
            $model->weight_kg = trim(htmlentities(strip_tags($model->weight_kg), ENT_QUOTES, 'UTF-8'));
            $model->save(false);
            return $this->redirect(Url::toRoute('start/step-five'));
        } else {
            return $this->render('four', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Displays step 5.
     *
     * @return mixed
     */
    public function actionStepFive()
    {
        $model = User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
            return $this->redirect(Url::toRoute('people/index'));
        } else {
            return $this->render('five', [
                'model' => $model,
            ]);
        }
    }



}
