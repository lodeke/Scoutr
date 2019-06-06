<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Vip form
 */
class VipForm extends Model
{
    public $type;
    public $plan;
    public $price;
    public $coin;
    public $currency;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['type', 'safe'],
            ['type', 'string', 'min' => 1],

            ['plan', 'safe'],
            ['plan', 'string', 'min' => 1],

            ['price', 'safe'],
            ['price', 'string', 'min' => 1],

            ['coin', 'safe'],
            ['coin', 'string', 'min' => 1],

            ['currency', 'safe'],
            ['currency', 'string', 'min' => 1],
        ];
    }


}
