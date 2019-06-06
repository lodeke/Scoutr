<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\IdentityInterface;

/**
 * EloRecords model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $user_likes
 * @property string $user_like_by
 * @property string $user_like_back
 * @property integer $user_ignore
 * @property integer $user_ignored_by
 * @property integer $profile_impression
 * @property string $user_activity
 * @property string $dislike_score
 * @property string $like_score
 * @property integer $elo_score
 *
 */
class EloRecords extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%elo_records}}';
    }

    /**
     * @inheritdoc
     */
    public static function UserDisLikes($id)
    {
        $uId = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$uId])->one();
        if($model)
        {
            self::setIgnore($id);
            $ignore = !empty($model->user_ignore)?$model->user_ignore.','.$id :  $id;

            $model->user_ignore = $ignore;
            $model->profile_impression = $model->profile_impression + 1;
            $model->save(false);
            UserFeeds::setRequestReject($id);

        }
        else
        {
            self::setIgnore($id);
            $model = new EloRecords();
            $model->user_id = $uId;
            $model->user_ignore = $id;
            $model->profile_impression = 1;
            $model->save(false);
            UserFeeds::setRequestReject($id);
        }
        return true;
    } // when user dislike a person, this function record activity of user when he click not/dislike button

    public static function UserLikes($id)
    {
        $uId = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$uId]);

        if($model->count() > 0)
        {
            $model = $model->andWhere(['like','user_likes',$id])->one();
            if($model)
            {
                $check = $model['user_likes'];
                if(self::checkBackArray($id,$check))
                {
                    $likeBack = self::checkLikeBack($id);
                    if($likeBack)
                    {
                        UserFeeds::newMatch($id);

                        $model->user_like_back = (!empty($model['user_like_back']))?$model['user_like_back'].','.$id:$id;
                    }
                    else
                    {
                        UserFeeds::setNewRequest($id);
                    }
                    $model->save(false);

                }
                else
                {

                    $likeBack = self::checkLikeBack($id);
                    $model->user_likes = (!empty($model['user_likes']))?$model['user_likes'].','.$id:$id;
                    if($likeBack)
                    {
                        UserFeeds::newMatch($id);
                        $model->user_like_back = (!empty($model['user_like_back']))?$model['user_like_back'].','.$id:$id;
                    }
                    else
                    {
                        UserFeeds::setNewRequest($id);
                    }
                    $model->save(false);
                    UserFeeds::setNewRequest($id);
                }

            }
            else
            {
                $model = self::find()->where(['user_id'=>$uId])->one();
                $likeBack = self::checkLikeBack($id);
                $model->user_likes = (!empty($model['user_likes']))?$model['user_likes'].','.$id:$id;
                if($likeBack)
                {
                    UserFeeds::newMatch($id);
                    $model->user_like_back = (!empty($model['user_like_back']))?$model['user_like_back'].','.$id:$id;
                }else
                {
                    UserFeeds::setNewRequest($id);
                }

                $model->save(false);
            }


        }
        else
        {
            $likeBack = self::checkLikeBack($id);
            $model = new EloRecords();
            $model->user_id = $uId;

            if($likeBack)
            {
                UserFeeds::newMatch($id);
                $model->user_like_back = $id;
            }else
            {
                UserFeeds::setNewRequest($id);
            }
            $model->user_likes = $id;
            $model->save(false);
        }
        EloRecords::setLikeScore($id);

    } // when user like a person, this function record activity of user when he click hot/like button

    public static function checkLikeBack($id)
    {
        $uId = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$id])->andWhere(['like','user_likes',$uId])->one();
        if($model)
        {
            if(!self::checkBackArray($uId,$model['user_like_back']))
            {
                $model->user_like_back = (!empty($model['user_like_back']))?$model['user_like_back'].','.$uId:$uId;
            }
            $imp = (!empty($model['profile_impression']))?$model['profile_impression']:'0';
            $model->profile_impression = $imp + 1;
            $user_like_by = array($model['user_like_by']);
            if(!in_array($uId,$user_like_by))
            {
                $model->user_like_by = (!empty($model['user_like_by']))?$model['user_like_by'].','.$uId:$uId;
            }
            $model->save(false);
            return true;
        }
        else
        {
            $model = self::find()->where(['user_id'=>$id])->one();
            if($model)
            {
                $model->profile_impression = $model->profile_impression + 1;
                $user_like_by = array($model['user_like_by']);
                if(!in_array($uId,$user_like_by))
                {
                    $model->user_like_by = $model->user_like_by.','.$uId;
                }
                $model->save(false);
                return false;
            }
            else{
                $model = new EloRecords();
                $model->user_id = $id;
                $model->profile_impression =  1;
                $model->user_like_by = $uId;
                $model->save(false);
                return false;
            }

        }

    } // when other user like you back, this function record activity when other users like you back;


    public static function checkLikeBack3($id)
    {
        $uId = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$id])->andWhere(['like','user_likes',$uId]);

      //  die;
        if($model->count() > 0)
        {

            die;
            $checks = $model->andWhere(['like','user_like_back',$uId])->one();

            if($checks)
            {
                $models = $model->one();

                $imp = (!empty($models['profile_impression']))?$models['profile_impression']:'0';;

                $models->profile_impression = $imp + 1;

                $user_like_back = array($model['user_like_back']);
                if(!in_array($uId,$user_like_back))
                {
                    $models->user_like_back = (!empty($models['user_like_back']))?$models['user_like_back'].','.$uId:$uId;
                }
                $user_like_by = array($model['user_like_by']);
                if(!in_array($uId,$user_like_by))
                {
                    $models->user_like_by = (!empty($models['user_like_by']))?$models['user_like_by'].','.$uId:$uId;
                }
                $models->save(false);
                return true;
            }
            else
            {
                return true;
            }
        }
        else
        {
            $model = self::find()->where(['user_id'=>$id])->one();
            if($model)
            {
                $model->profile_impression = $model->profile_impression + 1;
                $user_like_by = array($model['user_like_by']);
                if(!in_array($uId,$user_like_by))
                {
                    $model->user_like_by = $model->user_like_by.','.$uId;
                }
                $model->save(false);
                return false;
            }
            else{
                $model = new EloRecords();
                $model->user_id = $id;
                $model->profile_impression =  1;
                $model->user_like_by = $uId;
                $model->save(false);
                return false;
            }

        }
    } // when other user like you back, this function record activity when other users like you back;

    public static function setIgnore($id)
    {
        $model = self::find()->where(['user_id'=>$id])->one();
        $uId = Yii::$app->user->identity->getId();
        if($model)
        {
            $ignore = !empty($model->user_ignored_by)?$model->user_ignored_by.','.$uId :  $uId;
            $model->profile_impression = $model->profile_impression + 1;
            $model->user_ignored_by = $ignore;
            $model->dislike_score = $model->dislike_score + 1;

            $model->save(false);
            return true;
        }
        else
        {
            $model = new EloRecords();
            $model->user_id = $id;
            $model->profile_impression = 1;
            $model->user_ignored_by = $uId;
            $model->dislike_score = 1;

            $model->save(false);
            return true;

        }
    } // when other user like you back, this function record activity when other users like you back;

    public static function checkBackArray($id,$array)
    {
        $data = !empty($array)?true:false;
        if($data)
        {
            $user_like_back = array($data);
           return in_array($id,$user_like_back);
        }
        else
        {
            return false;
        }
    }

    public static function myMatch()
    {
        $uid = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$uid])->one();
        $match = (!empty($model['user_like_back']))?$model['user_like_back']:'0';
        return User::find()->where('id in ('.$match.')')->all();
    } // giving a array for user_like_back for login user

    public static function UserMatch($matchString)
    {
        return User::find()->where('id in ('.$matchString.')')->all();
    }

    public static function Likes()
    {
        $uid = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$uid])->one();
        $match = (!empty($model['user_likes']))?$model['user_likes']:'0';
        return User::find()->where('id in ('.$match.')')->all();
    } // giving a array for user_likes for login user

    public static function LikedBy()
    {
        $uid = Yii::$app->user->identity->getId();
        $model = self::find()->where(['user_id'=>$uid])->one();
        $match = (!empty($model['user_like_by']))?$model['user_like_by']:'0';
        return User::find()->where('id in ('.$match.')')->all();
    } // giving a array for user_like_by for login user

    public static function setLikeScore($id)
    {
        $model = self::find()->where(['user_id'=>$id])->one();
        if($model)
        {
            $model->like_score = (!empty($model->like_score))?($model->like_score + 1) : 1;
            $model->save(false);
        }
        else
        {
            $model = new EloRecords();
            $model->user_id = $id;
            $model->like_score = 1;
            $model->save(false);
        }

    }
    public static function likeScore()
    {
        $uid = Yii::$app->user->identity->getId();

        $model = self::find()->where(['user_id'=>$uid])->one();
       return $model['like_score'];

    }

    public static function unMatched($id)
    {
        $uid = Yii::$app->user->identity->getId();
        $likeBack = self::find()->where(['user_id'=>$uid])->one();
        $str = $likeBack['user_like_back'];
        $strArray =  explode(',',$str) ;
        foreach($strArray as $key=> $del)
        {
            if($del == $id)
            {
                unset($strArray[$key]);
            }
        }
        $new = implode($strArray,',');
        $likeBack->user_like_back = $new;
        $likeBack->save(false);

       $model = Match::unMatch($id);
        if($model)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}
