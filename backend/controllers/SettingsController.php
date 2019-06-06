<?php
namespace backend\controllers;

use common\models\Admin;
use common\models\Ads;
use common\models\Adsense;
use common\models\AdsSettings;
use common\models\ApiKeys;
use common\models\Cities;
use common\models\Contact;
use common\models\DefaultSetting;
use common\models\EncounterSettings;
use common\models\Faq;
use common\models\FooterColumn;
use common\models\FooterContent;
use common\models\SiteBanner;
use common\models\SiteSettings;
use common\models\MainMenu;
use common\models\Product;
use common\models\States;
use common\models\Track;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\User;
use yii\data\ActiveDataProvider;
use yii\web\NotAcceptableHttpException;

/**
 * Settings controller
 */


define('LOGO_W', 223);
define('LOGO_H',50);
define('FAV_ICON_SIZE', 10);
define('IMG_BANNER_DIR2', \yii::getAlias('@frontend').'/web/images/site/');

class SettingsController extends Controller
{

    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };

        $control = Yii::$app->params['demo'];
        if (isset($_POST['hasEditable']) and $control == true)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            $out = Json::encode(['output'=>'', 'message'=>'Its Demo Version You Cannot Change Any Value']);
            return $out;
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

    public function actionSite()
    {
        $count = SiteSettings::find()->count();

        if($count == "0")
        {
            $model = new SiteSettings();

            if ($model->load(Yii::$app->request->post()))
            {
                $model->logo = UploadedFile::getInstance($model,'logo');
                $logo = $model->uploadLogo();
                $model->logo = $logo;
                $model->save(false);

                Yii::$app->getSession()->setFlash('success', 'Update successfully');
            }
            return $this->render('site', ['model'=>$model]);
        }
        else
        {
            $model = SiteSettings::find()->one();
            $save = SiteSettings::find()->one();
            if ($model->load(Yii::$app->request->post()))
            {

                if(UploadedFile::getInstance($model,'logo') != null)
                {
                    $model->logo = UploadedFile::getInstance($model,'logo');
                    $logo = $model->uploadLogo();
                    $model->logo = $logo;
                }
                else
                {
                    $model->logo = $save->logo;
                }

                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Update successfully');
            }
            return $this->render('site', ['model'=>$model]);
        }


    }

       //dashboard Action

    //adsense Action

    public function actionAdsense()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['hasEditable']))
        {
            $AdSenseId = Yii::$app->request->post('editableKey');
            $AdSense = Adsense::findOne($AdSenseId);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['Adsense']);
            $post = ['Adsense' => $posted];
            if ($AdSense->load($post)) {
                // can save model or do something before saving model
                $AdSense->save(false);
            }
            return $out;
        }

        $searchModel = new Adsense();
        $query_s = Adsense::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query_s,
        ]);
        return $this->render('adsense', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    //adsense expand Action
    public function actionAdsenseDetail()
    {
        if(isset($_POST['expandRowKey'])) {
            $model = Adsense::findOne($_POST['expandRowKey']);
            return $this->renderPartial('_adsense-detail.php',['model'=>$model]);
        }
        else
        {
            return '<div class="alert alert-danger">No data found</div>';

        }
    }
    public function actionAdsenseDelete($id)
    {
        $model = Adsense::findOne($id);
        $model->delete();
        $this->redirect(Url::toRoute('settings/adsense'));
    }
    //dashboard Action

    public function actionDefault()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $modelData = DefaultSetting::find()->where(['id'=>'1'])->one();
        if ($modelData->load(Yii::$app->request->post())) {
            $modelData->save();
        }
        return $this->render('default', [
            'modelData'=>$modelData
        ]);
    }

    public function actionCountry()
    {
        if($_GET['id'])
        {
            $country = \common\models\Countries::find()->where(['name'=>$_GET['id']])->orderBy(['id'=>SORT_DESC])->one();
            $state = States::find()->where(['country_id'=>$country['id']])->all();
            foreach ($state as $name) {
                echo "<option value='" . $name['name'] . "'>" . $name['name'] . "</option>";
            }
            return;

        }
        $country = \common\models\Countries::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('country',[
            'model'=>$country
        ]);
    }
    public function actionState()
    {
        if($_GET['id'])
        {
            $state = \common\models\States::find()->where(['name'=>$_GET['id']])->orderBy(['id'=>SORT_DESC])->one();
            $city = Cities::find()->where(['state_id'=>$state['id']])->all();
            foreach ($city as $name) {
                echo "<option value='" . $name['name'] . "'>" . $name['name'] . "</option>";
            }
            return;

        }
       echo "PAGE NOT FOUND: ERROR 404.";
    }
    public function actionFaqDelete($id)
    {
        $delete = Faq::find()->where(['id'=>$id])->one();
        $delete->delete();
        return $this->redirect(Url::toRoute('settings/faq'));

    }
    public function actionFaqedit($id)
    {
        $model = Faq::find()->where(['id'=>$id])->one();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Update successfully');
            return $this->redirect(Url::toRoute('settings/faq'));
        }
        $list = Faq::find()->all();
        return $this->render('faq-edit', ['model'=>$model,'list'=>$list]);
    }
    public function actionFaq()
    {
        $count = Faq::find()->count();

        if($count == "0")
        {
            $model = new Faq();

            if ($model->load(Yii::$app->request->post()))
            {
                $model->save(false);

                Yii::$app->getSession()->setFlash('success', 'Update successfully');
            }
            return $this->render('faq', ['model'=>$model,'list'=>false]);
        }
        else
        {

            $model = new Faq();
            if ($model->load(Yii::$app->request->post()))
            {
                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Update successfully');
            }
            $list = Faq::find()->all();
            return $this->render('faq', ['model'=>$model,'list'=>$list]);
        }


    }
    public function actionAdmin()
    {
        $this->layout = "main";
        $model = Admin::find()->one();
        if ($model->load(Yii::$app->request->post()))
        {
           $model->change();
            Yii::$app->getSession()->setFlash('success', 'Update successfully');
        }
        return $this->render('admin', ['model'=>$model]);



    }


    //Api key Action
    public function actionApi()
    {
        $api = ApiKeys::find()->all();

        return $this->render('api',[
            'modal'=>$api
        ]);
    }
    public function actionApiStatus()
    {
        if(isset($_GET["status"]))
        {
            $status = $_GET["status"];
            $id = $_GET["id"];
            $modal = ApiKeys::find()->where(['id'=>$id])->one();
            $modal->status = $status;
            if($modal->save(false))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    //encounter settings Action
    public function actionEncounter()
    {
        $encounter = EncounterSettings::find()->one();
        if ($encounter->load(Yii::$app->request->post()))
        {
            $encounter->save();
            Yii::$app->getSession()->setFlash('success', 'Update successfully');
        }
        return $this->render('encounter',[
            'modal'=>$encounter
        ]);
    }


}
