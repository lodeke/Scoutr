<?php
use yii\helpers\Url;
$this->title = $model['first_name']." Profile";
$template = 'encounter_five';
$latout = isset($_GET['l'])?true:false;;
$theme = \common\models\DefaultSetting::find()->select(['profile_style'])->one();
if($latout)
{
    $mainCol = "col-6 pr-lg-5 pl-lg-5";
    $sider = "col-3";
    $riterder = "col-3";
    $gutters = "";
}
else
{
    $mainCol = "col-8 pr-lg-5 pl-lg-5";
    $sider = "d-none";
    $riterder = "col-4";
    $gutters = "no-gutters";

}
?>
<?php
echo Yii::$app->controller->renderPartial('_profile_'.$theme['profile_style'] ,['model'=>$model,'gifts'=>$gifts,'new'=>$new,'match'=>$match]);

echo Yii::$app->controller->renderPartial('_gift', [
    'model' => $model
]);
?>