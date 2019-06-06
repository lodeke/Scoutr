<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "encounter_settings".
 *
 * @property int $id
 * @property int $max_match
 * @property string $accept_button
 * @property string $denied_button
 * @property string $tag_line
 * @property string $encounter_theme
 */
class EncounterSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encounter_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max_match', 'accept_button', 'denied_button'], 'required'],
            [['max_match'], 'integer'],
            [['accept_button', 'denied_button', 'tag_line', 'encounter_theme'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'max_match' => 'Max Match',
            'accept_button' => 'Accept Button',
            'denied_button' => 'Denied Button',
            'tag_line' => 'Tag Line',
            'encounter_theme' => 'Encounter Theme',
        ];
    }
}
