<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_notification".
 *
 * @property int $id
 * @property string $type
 * @property string $icon
 * @property string $message
 * @property string $url
 * @property string $status
 */
class AdminNotification extends \yii\db\ActiveRecord
{
    public $count = "";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'message', 'url', 'status'], 'string'],
            [['message', 'url'], 'required'],
            [['icon'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'icon' => Yii::t('app', 'Icon'),
            'message' => Yii::t('app', 'Message'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    //=========================================================//
    //              NOTIFICATION TYPE =>
    //=========================================================//
    // 'new user registration','new free ad submitted','new premium ad submitted','ad report found','New Notification';
    // =================== finish ===============================//

    public static function getIcon($type)
    {
        switch($type)
        {
            case "new user registration":
               return $icon =  "flaticon-add-user";
            break;
            case "new free ad submitted":
                return $icon = "flaticon-present";
                break;
            case "new premium ad submitted":
                return  $icon =  "flaticon-price-tag";
                break;
            case "ad report found":
                return  $icon =  "flaticon-interface-6";
                break;
            default:
                return $icon =  "flaticon-alarm-1";
        }
    }
    public static function add($type,$msg,$url)
    {
        switch($type)
        {
            case "new user registration":
                 $icon =  "flaticon-add-user";
                break;
            case "new free ad submitted":
                 $icon = "flaticon-present";
                break;
            case "new premium ad submitted":
                  $icon =  "flaticon-price-tag";
                break;
            case "ad report found":
                  $icon =  "flaticon-interface-6";
                break;
            default:
                 $icon =  "flaticon-alarm-1";
        }
        $modal = new AdminNotification();
        $modal->type = $type;
        $modal->icon = $icon;
        $modal->message = $msg;
        $modal->url = htmlspecialchars($url);;
        $modal->save(false);
    }
    public static function latest()
    {
       $modal = AdminNotification::find()->where(['status'=>'unread'])->orderBy(['id'=>SORT_DESC])->all();
        $noty = ['modal'=>$modal,'count'=>count($modal)];
        return $noty;
    }
}
