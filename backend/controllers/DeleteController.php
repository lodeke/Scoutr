<?php
namespace backend\controllers;

use common\models\Ads;
use common\models\Adsense;
use common\models\Category;
use common\models\Cities;
use common\models\Countries;
use common\models\Currencies;
use common\models\CustomFields;
use common\models\FooterColumn;
use common\models\FooterContent;
use common\models\Languages;
use common\models\Pages;
use common\models\Payment;
use common\models\States;
use common\models\SubCategory;
use common\models\Type;
use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotAcceptableHttpException;
define('IMG_BANNER_DIR2', \yii::getAlias('@frontend').'/web/images/site/');

/**
 * Delete Controller
 */
class DeleteController extends Controller
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
        if($control)
        {
            Yii::$app->session->setFlash('error', 'Its Demo You Cannot Modify anything');
            throw new NotAcceptableHttpException('Its Demo You Cannot Modify anything');
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

    public function actionCategory($id)
    {
        $cat = Category::find()->where(['id'=>$id])->one();
        $cat->delete();

        return true;
    }

    public function actionSubCategory($id)
    {
        $cat = SubCategory::find()->where(['id'=>$id])->one();
        $cat->delete();

        return true;
    }

    public function actionType($id)
    {
        $cat = Type::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }

    public function actionCountry($id)
    {

        $cat = Countries::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');
       return true;
    }

    public function actionState($id)
    {
        $cat = States::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }

    public function actionCity($id)
    {
        $cat = Cities::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }

    public function actionUser($id)
    {
        $cat = User::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionPage($id)
    {
        $cat = Pages::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionItem($id)
    {
        $cat = Ads::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');
        return true;
    }
    public function actionAdsense($id)
    {
        $cat = Adsense::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionPaypal($id)
    {
        $cat = Payment::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionCurrency($id)
    {
        $cat = Currencies::find()->where(['id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionCustom($id)
    {
        $cat = CustomFields::find()->where(['custom_id'=>$id])->one();
        $cat->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionLanguages($id)
    {
        $Languages = Languages::find()->where(['id'=>$id])->one();
        $Languages->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionFooterContent($id)
    {
        $Languages = FooterContent::find()->where(['id'=>$id])->one();
        $Languages->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
    public function actionFooterColumn($id)
    {
        $Languages = FooterColumn::find()->where(['id'=>$id])->one();
        $Languages->delete();
        Yii::$app->session->setFlash('success', 'Entry Deleted');

        return true;
    }
}
