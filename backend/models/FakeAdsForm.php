<?php
namespace backend\models;

use common\models\Ads;
use common\models\Category;
use common\models\User;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;


class FakeAdsForm extends Model
{
    public $total;
    public $with_image;
    public $image_directory;
    public $image;
    public $category;
    public $sub_category;
    public $views;
    public $country;
    public $state;
    public $city;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['with_image','total','country','state','city'], 'required'],
            ['with_image', 'required'],
            ['total', 'required'],

            ['category', 'required'],
            ['sub_category', 'required'],
            ['views', 'required'],

            ['country', 'required'],
            ['state', 'required'],
            ['city', 'required'],
            [['image'], 'file', 'skipOnEmpty' => true,  'maxFiles' => 155],


            [['image_directory','image'],'safe']



        ];
    }
    public function attributeLabels()
    {
        return [
            'total' => Yii::t('app', 'Total Number of Fake Ads'),
            'with_image' => Yii::t('app', 'Create Fake Ads With Image?'),
            'views'=> Yii::t('app', 'Fake Number of Views'),
        ];
    }

}
