<?php
namespace backend\controllers;

use backend\models\FakeAdsForm;
use backend\models\FakeUsersForm;
use common\models\Ads;
use common\models\Category;
use common\models\CustomFields;
use common\models\SubCategory;
use common\models\Transactions;
use common\models\Type;
use common\models\User;
use Faker\Factory;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * Faker Controller
 */
class FakerController extends Controller
{

    public function beforeAction($action)
    {
        $control = Yii::$app->params['demo'];
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        if($control == true and (Yii::$app->request->post() or Yii::$app->request->get()))
        {
            throw new BadRequestHttpException('Its Demo You Cannot Modify anything');
        }else{
            return parent::beforeAction($action);
        }

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
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');

    }

    public function actionUsers()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('site/login'));
        }
        $searchModel = new User();

        if (isset($_POST['hasEditable']))
        {
            $userId = Yii::$app->request->post('editableKey');
            $UserModel = User::findOne($userId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['User']);
            $post = ['User' => $posted];
            if ($UserModel->load($post)) {
                // can save model or do something before saving model
                $UserModel->save(false);
            }
            return $out;
        }

        $query_s = User::find()->where(['fake'=>'1'])->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);


        return $this->render('users', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }
    public function actionUsersCreate()
    {
        $modal = new FakeUsersForm();
        if ($modal->load(Yii::$app->request->post()))
        {
            $totalRecord = $modal['total'];
            $imgArray = explode(',',$modal->image_directory);

            for($i=0;$i<$totalRecord;$i++)
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

                $model->sexual_orientation = $faker->randomElement(array('straight', 'lesbian', 'gay', 'bisexual'));
                $model->marital_status = $faker->randomElement(array('Not Given','Single','In a relationship','Married','Divorced','Widowed','Rather not say','Separated'));
                $model->children = $faker->randomElement(array('Not Given','No children','Only one','More than two'));
                $model->languages = $faker->languageCode;
                $model->looking_for = $faker->randomElement(array('friends','adventure','soulmate','job'));
                $model->ethnicity = $faker->randomElement(array('1','2','3','4','5','6','7','8'));
                $model->religion = $faker->randomElement(array('Christian','Muslim','Buddhist','Hindu','Sikh','Jewish','Other','Atheist','Agnostic','Catholic'));
                $model->smoker = $faker->randomElement(array('no','yes','some_time'));
                $model->drinking = $faker->randomElement(array('no','yes','some time'));
                $model->education = $faker->randomElement(array('no','school','college','university','advance_degree'));
                $model->height = rand('50','250');
                $model->weight_kg = rand(35,120);
                $model->build = $faker->randomElement(array('no answer','athletic','slim','fatty'));
                $model->about_me = $faker->realText(50);
                $model->about_partner = $faker->realText(50);
                $model->hair_color = $faker->randomElement(array('Not Given','Black','Red','Blond','White','Other','Shaven','Brown','Rather not say'));
                $model->eye_color = $faker->randomElement(array('Not Given','Blue','Brown','Green','Hazel','Grey','Other','Rather not say','Dark brown'));
                if($modal->with_image == true)
                {
                    $imgRand = $faker->randomElement($imgArray);
                    $model->images = Self::getImage($imgRand,'users');
                }
                else{
                    $model->images = "default.jpg";
                }                $model->gender = 'female';
                $model->city = $faker->city;;
                $model->state = $faker->streetName;;
                $model->country = $faker->country;;
                $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash('123456');
                $model->generateAuthKey();
                $model->created_at = time();
                $model->updated_at = time();
                $model->save(false);
            }
            Yii::$app->getSession()->setFlash('success', 'successfully Create '.$totalRecord.' fakes record');
        }
        return $this->render('users-create',['modal'=>$modal]);

    }


    public function getImage($img,$type)
    {
        $NewImgName = 'FakeImg_'.time().'.jpg';
        $data = file_get_contents($img);//Get content of file
        //New file
        $new = Yii::getAlias('@frontend/web/images/'.$type.'/'.$NewImgName);
        // Write the contents back to a new file
        file_put_contents($new, $data);
        return $NewImgName;
    }

}
