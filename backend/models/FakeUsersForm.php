<?php
namespace backend\models;

use common\models\Ads;
use common\models\Category;
use common\models\User;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;


class FakeUsersForm extends Model
{
    public $with_image;
    public $image_directory;
    public $image;
    public $gender;
    public $total;
    public $country;
    public $state;
    public $city;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['with_image','total','country','state','city','gender'], 'required'],
            ['with_image', 'required'],
            ['total', 'required'],
            ['country', 'required'],
            ['state', 'required'],
            ['city', 'required'],
            ['gender', 'required'],
            [['image'], 'file', 'skipOnEmpty' => true,  'maxFiles' => 155],


            [['image_directory','image'],'safe']



        ];
    }
    public function attributeLabels()
    {
        return [
            'total' => Yii::t('app', 'Total Number of Fake User'),
            'with_image' => Yii::t('app', 'Create Fake Users With Image?'),
            'gender'=> Yii::t('app', 'User gender (Male or female)'),
        ];
    }

}
