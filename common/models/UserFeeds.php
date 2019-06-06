<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_feeds".
 *
 * @property int $id
 * @property string $type
 * @property int $user_id
 * @property string $post_title
 * @property string $post_content
 * @property int $update_user_id
 * @property string $update_image
 * @property string $update_bio_detail
 * @property int $new_mach_id
 * @property int $request_id
 * @property string $system_notification
 * @property int $system_ads_id
 * @property string $status
 * @property int $created_at
 */
class UserFeeds extends \yii\db\ActiveRecord
{
    public $total;
    public $new_request;
    public $new_request_count;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'user_id', 'post_title', 'post_content', 'update_user_id', 'update_image', 'update_bio_detail', 'new_mach_id','request_id', 'system_notification', 'system_ads_id', 'status', 'created_at'], 'required'],
            [['type', 'post_content', 'update_bio_detail', 'system_notification', 'status'], 'string'],
            [['user_id', 'update_user_id', 'new_mach_id', 'system_ads_id', 'created_at'], 'integer'],
            [['post_title', 'update_image'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'post_title' => 'Post Title',
            'post_content' => 'Post Content',
            'update_user_id' => 'Update User ID',
            'update_image' => 'Update Image',
            'update_bio_detail' => 'Update Bio Detail',
            'new_mach_id' => 'New Mach ID',
            'system_notification' => 'System Notification',
            'system_ads_id' => 'System Ads ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public static function newMatch($id)
    {
        $uId = Yii::$app->user->identity->getId();
        $notificationType = 'new_match';

        $model = new UserFeeds();
        $model->type = $notificationType;
        $model->user_id = $uId;
        $model->new_mach_id = $id;
        $model->created_at = time();
        $model->save(false); // new match for end user

        $userFeeds = new UserFeeds();
        $userFeeds->type = $notificationType;
        $userFeeds->user_id = $id;
        $userFeeds->new_mach_id = $uId;
        $userFeeds->created_at = time();
        $userFeeds->save(false); // new match for end user

        $matchId = $uId.$id;
        $match = new Match();
        $match->user = $uId;
        $match->user_match = $id;
        $match->match_id = $matchId;
        $match->created_at = time();
        $match->save(false);

        $matchWith = new Match();
        $matchWith->user = $id;
        $matchWith->user_match = $uId;
        $matchWith->match_id = $matchId;
        $matchWith->created_at = time();
        $matchWith->save(false);

        UserFeeds::unsetRequest($id);
    }

    public static function newRequest()
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  UserFeeds::find()->where(['user_id'=>$uid])->andWhere(['status'=>"0"])->count();
        if($model > '0')
        {
            echo "<sup>".$model."</sup>";

        }
    }
    public static function notification()
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  UserFeeds::find()->where(['user_id'=>$uid])->all();
        return $model;
    }
    public static function makeRead()
    {
        $uid = Yii::$app->user->identity->getId();
        UserFeeds::updateAll(['status'=>'1'],['user_id'=>$uid]);
        return true;
    }
    public static function setNewRequest($req)
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  new UserFeeds();
        $model->user_id = $req;
        $model->request_id = $uid;
        $model->type = "new_request";
        $model->save(false);
        return true;;
    }//set a notification for the user
    public static function unsetRequest($req)
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  UserFeeds::find()->where(['user_id'=>$uid])->andWhere(['request_id'=>$req])->one();
        if($model)
        {
            $model->delete();
            return true;
        }else
        {
            return false;
        }
    } // remove request after user  accept / reject the match request
    public static function VerifyRequest($req)
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  UserFeeds::find()->where(['user_id'=>$uid])->andWhere(['request_id'=>$req])->one();
        if($model)
        {
            return true;
        }
        else
        {
            return false;
        }
    } // verify the request, prevent direct user hit the random or unauthorised Url

    public static function setRequestReject($req)
    {
        $uid = Yii::$app->user->identity->getId();
        $model =  new UserFeeds();
        $model->user_id = $req;
        $model->request_id = $uid;
        $model->type = "reject_request";
        $model->save(false);

        UserFeeds::unsetRequest($req);

        return true;;
    }//set a notification if match request is reject
}
