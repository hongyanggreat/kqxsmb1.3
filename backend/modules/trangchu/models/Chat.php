<?php

namespace backend\modules\trangchu\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $ID
 * @property integer $ACC_ID
 * @property string $MESSAGE
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACC_ID', 'MESSAGE'], 'required'],
            [['ACC_ID'], 'integer'],
            [['MESSAGE'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ACC_ID' => 'Acc  ID',
            'MESSAGE' => 'Message',
        ];
    }
}
