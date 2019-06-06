<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Message model


 *@property integer $id
 *@property integer $sender
 *@property integer $match_id
 *@property integer $reciever
 *@property string $message
 *@property string $name
 *@property string $image
 *@property string $time
 *
 *@property integer $status
 *
 */
class Message extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'message';
    }

    /**
     * @inheritdoc
     */
    public static function messagealert()
    {
        $current = Yii::$app->user->identity->id;
        $model = Message::find()->where('status = 1 and reciever = '.$current)->count();
        return $model;
    }
    public static function read($conn)
    {
        $current = Yii::$app->user->identity->id;
        $model = Message::find()->where('status = 1 and request_id = '.$conn.' and reciever = '.$current)->all();
        foreach($model as $flag)
        {
            $flag->status = 2;
            $flag->save(false);
        }


    }

    public static function emoji($db_str)
    {


        $chars = array(
            ":-)",
            ":-(",
            ":-D",
            "8-)",
            ":-o",
            ";-(",
            ":|",
            ":-|",
            ":-*",
            ":-p",
            ":-$",
            ":^)",
            "|-)",
            "|-(",
            "(inlove)",
            "]:)",
            "(talk)",
            "|-()",
            "(puke)",
            "(doh)",
            "x-(",
            "(wasntme)",
            "(party)",
            ":-s",
            "(mm)",
            "8-|",
            ":-X",
            "(hi)",
            "(call)",
            "(devil)",
            "(angel)",
            "(envy)",
            "(wait)",
            "(bear)",
            "(giggle)",
            "(makeup)",
            "(clap)",
            ":-?",
            "(bow)",
            "(rofl)",
            "(whew)",
            "(happy)",
            "(smirk)",
            "(nod)",
            "(shake)",
            "(punch)",
            "(emo)",
            "(Y)",
            "(n)",
            "(handshake)",
            "(skype)",
            "<3",
            "(U)",
            "(e)",
            "(f)",
            "(st)",
            "(sun)",
            "(0)",
            "(music)",
            "(~)",
            "(mp)",
            "(coffee)",
            "(pi)",
            "($)",
            "(flex)",
            "(cake)",
            "(beer)",
            "(dance)",
            "(ninja)",
            "(*)",
            "(mooning)",
            "(finger)",
            "(bandit)",
            "(drunk)",
            "(smoking)",
            "(toivo)",
            "(rock)",
            "(headbang)",
            "(bug)",
            "(fubar)",
            "(poolparty)",
            "(swear)",
            "(tmi)",
            "(heidy)",
            "(MySpace)",
            "(malthe)",
            "(tauri)",
            "(priidu)"



        );
        $icons = array(
            '<span class="emoticon emoticon-smile" title="smile">:-)</span>',
            '<span class="emoticon emoticon-sad-smile" title="sad-smile">:-(</span>',
            '<span class="emoticon emoticon-big-smile" title="Big Smile">:-D</span>',
            '<span class="emoticon emoticon-cool" title="cool">8-)/span>',
            '<span class="emoticon emoticon-wink" title="wink">:-o</span>',
            '<span class="emoticon emoticon-crying" title="crying">;-(</span>',
            '<span class="emoticon emoticon-sweating" title="sweating">:|</span>',
            '<span class="emoticon emoticon-speechless" title="speechless">:-|</span>',
            '<span class="emoticon emoticon-kiss" title="kiss">:-*</span>',
            '<span class="emoticon emoticon-tongue-out" title="tongue out">:-P</span>',
            '<span class="emoticon emoticon-blush" title="blush">:-$</span>',
            '<span class="emoticon emoticon-wondering" title="wondering">:^)</span>',
            '<span class="emoticon emoticon-sleepy" title="sleepy">|-)</span>',
            '<span class="emoticon emoticon-dull" title="dull">|-(</span>',
            '<span class="emoticon emoticon-in-love" title="in-love">(inlove)</span>',
            '<span class="emoticon emoticon-evil-grin" title="evil-grin">]:)</span>',
            '<span class="emoticon emoticon-talking" title="talking">(talk)</span>',
            '<span class="emoticon emoticon-yawn" title="">|-()</span>',
            '<span class="emoticon emoticon-puke" title="puke">(puke)</span>',
            '<span class="emoticon emoticon-doh" title="doh">(doh)</span>',
            '<span class="emoticon emoticon-angry" title="angry">x-(</span>',
            '<span class="emoticon emoticon-it-wasnt-me" title="it-wasnt-me">(wasntme)</span>',
            '<span class="emoticon emoticon-party" title="party">(party)</span>',

            //new

            '<span class="emoticon emoticon-worried" title=":-s"></span>',
            '<span class="emoticon emoticon-mmm" title="(mm)"></span>',
            '<span class="emoticon emoticon-nerd" title="8-|"></span>',
            '<span class="emoticon emoticon-lips-sealed" title=":-X"></span>',
            '<span class="emoticon emoticon-hi" title="(hi)"></span>',
            '<span class="emoticon emoticon-call" title="(call)"></span>',
            '<span class="emoticon emoticon-devil" title="(devil)"></span>',
            '<span class="emoticon emoticon-angel" title="(angel)"></span>',
            '<span class="emoticon emoticon-envy" title="(envy)"></span>',
            '<span class="emoticon emoticon-wait" title="(wait)"></span>',
            '<span class="emoticon emoticon-bear" title="(bear)"></span>',
            '<span class="emoticon emoticon-covered-laugh" title="(giggle)"></span>',
            '<span class="emoticon emoticon-make-up" title="(makeup)"></span>',
            '<span class="emoticon emoticon-clapping-hands" title="(clap)"></span>',
            '<span class="emoticon emoticon-thinking" title=":-?"></span>',

            '<span class="emoticon emoticon-bow" title="(bow)"></span>',
            '<span class="emoticon emoticon-rofl" title="(rofl)"></span>',
            '<span class="emoticon emoticon-whew" title="(whew)"></span>',
            '<span class="emoticon emoticon-happy" title="(happy)"></span>',
            '<span class="emoticon emoticon-smirking" title="(smirk)"></span>',
            '<span class="emoticon emoticon-nodding" title="(nod)"></span>',
            '<span class="emoticon emoticon-shaking" title="(shake)"></span>',
            '<span class="emoticon emoticon-punch" title="(punch)"></span>',
            '<span class="emoticon emoticon-emo" title="(emo)"></span>',
            '<span class="emoticon emoticon-yes" title="(Y)"></span>',
            '<span class="emoticon emoticon-no" title="(n)"></span>',
            '<span class="emoticon emoticon-handshake" title="(handshake)"></span>',
            '<span class="emoticon emoticon-skype" title="(skype)"></span>',
            '<span class="emoticon emoticon-heart" title="<3"></span>',
            '<span class="emoticon emoticon-broken-heart" title="(U)"></span>',
            '<span class="emoticon emoticon-mail" title="(e)"></span>',

            '<span class="emoticon emoticon-flower" title="(f)"></span>',
            '<span class="emoticon emoticon-rain" title="(st)"></span>',
            '<span class="emoticon emoticon-sun" title="(sun)"></span>',
            '<span class="emoticon emoticon-time" title="(o)"></span>',
            '<span class="emoticon emoticon-music" title="(music)"></span>',
            '<span class="emoticon emoticon-movie" title="(~)"></span>',
            '<span class="emoticon emoticon-phone" title="(mp)"></span>',
            '<span class="emoticon emoticon-coffee" title="(coffee)"></span>',
            '<span class="emoticon emoticon-pizza" title="(pi)"></span>',
            '<span class="emoticon emoticon-cash" title="($)"></span>',
            '<span class="emoticon emoticon-muscle" title="(flex)"></span>',
            '<span class="emoticon emoticon-cake" title="(cake)"></span>',
            '<span class="emoticon emoticon-beer" title="(beer)"></span>',
            '<span class="emoticon emoticon-dance" title="(dance)"></span>',
            '<span class="emoticon emoticon-ninja" title="(ninja)"></span>',
            '<span class="emoticon emoticon-star" title="(*)"></span>',
            '<span class="emoticon emoticon-mooning" title="(mooning)"></span>',
            '<span class="emoticon emoticon-finger" title="(finger)"></span>',
            '<span class="emoticon emoticon-bandit" title="(bandit)"></span>',
            '<span class="emoticon emoticon-drunk" title="(drunk)"></span>',
            '<span class="emoticon emoticon-smoke" title="(smoking)"></span>',
            '<span class="emoticon emoticon-toivo" title="(toivo)"></span>',
            '<span class="emoticon emoticon-rock" title="(rock)"></span>',
            '<span class="emoticon emoticon-headbang" title="(headbang)"></span>',
            '<span class="emoticon emoticon-bug" title="(bug)"></span>',
            '<span class="emoticon emoticon-fubar" title="(fubar)"></span>',
            '<span class="emoticon emoticon-poolparty" title="(poolparty)"></span>',
            '<span class="emoticon emoticon-sweating" title="(swear)"></span>',
            '<span class="emoticon emoticon-tmi" title="(tmi)"></span>',
            '<span class="emoticon emoticon-heidy" title="(heidy)"></span>',
            '<span class="emoticon emoticon-myspace" title="(MySpace)"></span>',
            '<span class="emoticon emoticon-malthe" title="(malthe)"></span>',
            '<span class="emoticon emoticon-tauri" title="(tauri)"></span>',
            '<span class="emoticon emoticon-priidu" title="(priidu)"></span>',

            //end

        );
        $new_str = str_replace($chars,$icons,$db_str);
        echo $new_str;
    }


    public static function sendMsg($reciever,$msg)
    {
        $matchId = Match::findMatch($reciever);
        if($matchId)
        {
            $img = Yii::$app->user->identity->images;
            $sname = Yii::$app->user->identity->first_name;
            $sender = Yii::$app->user->identity->getId();
            $model = new Message();
            $model->sender = $sender;
            $model->reciever = $reciever;
            $model->message = $msg;
            $model->match_id = $matchId;
            $model->time = time();
            $model->name = $sname;
            $model->image = $img;
            $model->save(false);

            $imgUrl = Yii::getAlias('@web').'/images/users/'.$img;
            $name = $sname;
            $time = date('d/m/Y',time());

            $tpl = Message::tpl($model,'two',true);
            return [
                'response' =>true,
                'code'=>'4',
                'msg'=> $tpl
            ];
        }
        else
        {
            return [
                'response' =>false,
                'code'=>'3',
                'msg'=> '<span class="btn btn-sm bg-danger btn-block text-white mt-3 p-3">You Cannot Sent Message yet, Wait for user Accept your request</span>'
            ];
        }

    }

    public static function loadMsg2($reciever)
    {
        $matchId = Match::findMatch($reciever);
        if($matchId)
        {
            $sender = Yii::$app->user->identity->getId();
            $model = Message::find()->where(['match_id'=>$matchId])->limit(10)->all();
            $tpl = Message::tpl($model);
            return $tpl;
        }
        else
        {
            return false;
        }

    }


    public static function loadMsg($reciever)
    {


        $matchId = Match::findMatch($reciever);

        if($matchId)
        {
            $sender = Yii::$app->user->identity->getId();
            $model = Message::find()->where(['match_id'=>$matchId])->limit(10)->all();
            $total = count($model);
            if(!$model)
            {
                return [
                    'response' =>true,
                    'code'=>'1',
                    'msg'=> '<h3 class="p-3 mt-5">There are no  active chat with this user</h3>',
                    'total'=>"0"
                ];
            }
            else
            {
                $tpl = "";
                foreach($model as $data)
                {
                    $imgUrl = Yii::getAlias('@web').'/images/users/'.$data['image'];
                    $name = $data['name'];
                    $msg = $data['message'];
                    $time = date('d/m/Y',$data['time']);
                    $IssSender = ($sender == $data['sender'])?true:false;
                      $tpl .= Message::tpl($data,'two',$IssSender);

                }
                return [
                    'response' =>true,
                    'code'=>'0',
                    'msg'=> $tpl,
                    'total'=>count($model)
                ];
                // return $tpl;
            }

        }
        else
        {
            return [
                'response' =>false,
                'code'=>'3',
                'msg'=> '<h3 class="p-3 mt-5">You Cannot Send Message to this user until user accept your Request</h3>',
                'total'=>"0"
            ];
        }

    }

    public static function tpl($model,$temp,$IssSender)
    {

        $imgUrl = Yii::getAlias('@web').'/images/users/'.$model['image'];
        $name = $model['name'];
        $time = date('d/m/Y',time());
        $msg = $model['message'];
        if($temp == "one")
        {
            $tpl = '<li>
                        <div class="author-thumb">
                            <img src="'.$imgUrl.'" width="40px" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">'.$msg.'</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="'.$time.'">'.$time.'</time></span>
                        </div>
                    </li>';
        }
        else
        {
            $reciever = '<div class="chatTwoTrwapper">
                <div class="chatu">
                    '.$msg.'
                </div>
                <div class="chatuTwoSender">
                    '.$name.'
                    <small class="chatuTwoTime">'.$time.' </small>
                </div>

            </div>';

            $sender = '<div class="chatTwoTrwapper">
                <div class="reciever">
                   '.$msg.'
                </div>
                <div class="name">
                    '.$name.'
                    <small class="time">'.$time.'</small>
                </div>

            </div>';
            $tpl = ($IssSender)?$sender:$reciever;
        }
        return $tpl;
    }

    public static function total($reciever)
    {
        $matchId = Match::findMatch($reciever);
        $chat1 = Message::find()->where(['match_id'=>$matchId])->count();
        return $chat1;
    }
    public static function loadNewMsg($reciever,$check)
    {


        $matchId = Match::findMatch($reciever);

        if($matchId)
        {
            $sender = Yii::$app->user->identity->getId();
            $count = Message::find()->where(['match_id'=>$matchId])->count();

            if($check < $count)
            {
                $limitMin = ($count - $check);
                $model = Message::find()->where(['match_id'=>$matchId])->limit($limitMin)->offset($check)->all();
                $tpl = "";
                foreach($model as $data)
                {
                    $IssSender = ($sender == $data['sender'])?true:false;
                    $tpl .= Message::tpl($data,'two',$IssSender);

                }
                return [
                    'response' =>false,
                    'code'=>'0',
                    'msg'=> $tpl,
                    'total'=>$count
                ];
            }
            else
            {

            }
        }
        else
        {
            return [
                'response' =>false,
                'code'=>'3',
                'msg'=> '<h3 class="p-3 mt-5">You Cannot Send Message to this user until user accept your Request</h3>',
                'total'=>"0"
            ];
        }

    }
}
