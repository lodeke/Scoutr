<?php
namespace backend\controllers;

use backend\models\NewUserForm;
use common\models\Adsense;
use common\models\ApiKeys;
use common\models\Currencies;
use common\models\Faq;
use common\models\Payment;
use common\models\User;
use kartik\grid\EditableColumnAction;
use common\models\Cities;
use yii\base\Model;
use yii\base\Response;
use yii\helpers\ArrayHelper;
use common\models\Countries;
use common\models\States;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Edit Controller
 */
class EditController extends Controller
{

    public $layout = "main";
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        $control = Yii::$app->params['demo'];
        if(Yii::$app->request->isAjax and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo settings');
            $this->beforeAction($action);
            return false;
        }else{
            return parent::beforeAction($action);
        }

    }
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
        Yii::$app->session->setFlash('error', 'You are wrong way. Please go back');

        return $this->redirect(Url::toRoute('site/error'));

    }


    public function actionAddCity()
    {
        $model = new Cities();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionAddState()
    {
        $model = new States();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionAddCountry()
    {
        $model = new Countries();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionAddAdsense()
    {
        $model = new Adsense();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }


    public function actionAddPaypalAccount()
    {
        $model = new Payment();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionAddCurrency()
    {
        $model = new Currencies();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }







    public function actionEditFaq()
    {
        $model = Faq::findOne($_GET['id']);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'onlyform'=>true,
                    'code' => 0,
                ];

            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionEditApi()
    {
        $model = ApiKeys::findOne($_GET['id']);
        if($model['type'] == "translator")
        {
            Languages::setTranslator($model['name'],$model['api_key']);

        }
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                    ],
                    'onlyform'=>true,
                    'code' => 0,
                ];

            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occurred.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }


    public function actionBanner()
    {
        $image = $_GET['image'];
        $title = $_GET['title'];
        $tag = $_GET['tag'];
        $title_color = $_GET['title_color'];
        $tag_color = $_GET['tag_color'];
        $height = $_GET['height'];
        $position = $_GET['position'];


        $optionArray = ['title'=>$title,'tag line'=>$tag,'title_color'=>$title_color,'tag_color'=>$tag_color,'height'=>$height,'position'=>$position];

        $option = json_encode($optionArray);
        $model = Widgets::find()->where(['id'=>'6'])->one();
        $model->template = $image;
        $model->options = $option;
        $model->save(false);

    }


    //garbage code below

    public function actionCountry($id)
    {
        //Countries
        $cat = Countries::find()->where(['id'=>$id])->one();
        if ($cat->load(Yii::$app->request->post())) {
            $cat->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        $country = \common\models\Countries::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('country',[
            'model'=>$country,
            'cat'=>$cat
        ]);
    }

    public function actionState($id)
    {
        //Countries
        $cat = States::find()->where(['id'=>$id])->one();
        if ($cat->load(Yii::$app->request->post())) {
            $cat->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        $State = \common\models\State::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('state',[
            'model'=>$State,
            'cat'=>$cat
        ]);
    }

    public function actionCity($id)
    {
        //Countries
        $cat = Cities::find()->where(['id'=>$id])->one();
        if ($cat->load(Yii::$app->request->post())) {
            $cat->save(false);
            Yii::$app->session->setFlash('success', 'save settings');
        }
        $city = \common\models\City::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('city',[
            'model'=>$city,
            'cat'=>$cat
        ]);
    }



    public function actionAddUser()
    {
        $model = new NewUserForm();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post())) {
               $result =  $model->signup();
                //$model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
                if($result)
                {
                    return [
                        'data' => [
                            'success' => true,
                            'model' => $model,
                            'message' => 'Model has been saved.',
                        ],
                        'code' => 0,
                    ];
                }
                else
                {
                    return [
                        'data' => [
                            'success' => false,
                            'model' => null,
                            'message' => $model->getErrors(),
                        ],
                        'code' => 1, // Some semantic codes that you know them for yourself
                    ];
                }

            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => $model->getErrors(),
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }
    }

    public function actionDisplayStatus()
    {

        if(isset($_GET["status"]))
        {
            $status = $_GET["status"];
            $id = $_GET["id"];
            $modal = Widgets::find()->where(['id'=>$id])->one();
            $modal->status = $status;
            if($modal->save(false))
            {
                echo "save";
            }
            else
            {
                echo "fail";
            }
        }
    }


}
