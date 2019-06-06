<?php
namespace frontend\controllers;

use common\models\DefaultSetting;

use common\models\Pages;
use Yii;
use yii\web\Controller;
$default = DefaultSetting::find()->select(['layout'])->one();
define('LAYOUT',$default['layout']);
/**
 * Pages controller
 */
class PagesController extends Controller
{

    public $layout = "main";

    public function actionIndex($id,$title)
    {
        $model = Pages::find()->where(['id'=>base64_decode($id)])->one();
        return $this->render('index', [
            'model' => $model,
        ]);
    }


}
