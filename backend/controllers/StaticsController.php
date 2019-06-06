<?php
namespace backend\controllers;

use common\models\Ads;
use common\models\Category;
use common\models\SubCategory;
use common\models\Track;
use common\models\Type;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * StaticsController
 */
class StaticsController extends Controller
{


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

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        $query = Track::find()->orderBy(['id'=>SORT_ASC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'all' => $models,
            'pages' => $pages,

        ]);

    }
    public function actionClear()
    {

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        };
        Track::deleteAll();
        echo "done";


    }






}
