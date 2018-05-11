<?php

namespace backend\modules\napvip\models;

use Yii;

/**
 * This is the model class for table "napthe".
 *
 * @property integer $id
 * @property string $pin
 * @property string $seri
 * @property integer $card_type
 * @property string $mac
 * @property string $note
 * @property integer $result
 * @property string $otherInfo
 * @property string $create_at
 * @property integer $create_by
 */
class Napthe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'napthe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pin', 'seri', 'card_type', 'mac', 'result', 'otherInfo', 'create_at', 'create_by'], 'required'],
            [['card_type', 'result', 'create_by'], 'integer'],
            [['create_at'], 'safe'],
            [['pin', 'seri', 'note'], 'string', 'max' => 255],
            [['mac', 'otherInfo'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pin' => 'Pin',
            'seri' => 'Seri',
            'card_type' => 'Card Type',
            'mac' => 'Mac',
            'note' => 'Note',
            'result' => 'Result',
            'otherInfo' => 'Other Info',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
        ];
    }
}
