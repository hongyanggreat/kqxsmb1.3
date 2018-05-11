<?php

namespace backend\modules\messenger\models;
use backend\modules\dangky\models\Accounts;
use Yii;

/**
 * This is the model class for table "tbl_messenge".
 *
 * @property integer $ID
 * @property string $MESSAGE
 * @property integer $STATUS
 * @property string $CREATE_DATE
 * @property integer $USER_SENT
 * @property string $UPDATE_DATE
 * @property integer $USER_RECEIVE
 */
class Messenge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_messenge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS', 'USER_SENT', 'USER_RECEIVE'], 'integer'],
            [['CREATE_DATE', 'USER_SENT'], 'required'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['MESSAGE'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MESSAGE' => 'Message',
            'STATUS' => 'Status',
            'CREATE_DATE' => 'Create  Date',
            'USER_SENT' => 'User  Sent',
            'UPDATE_DATE' => 'Update  Date',
            'USER_RECEIVE' => 'User  Receive',
        ];
    }
    public function getUserSend()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'USER_SENT']);
    } 
    public function getUserReceive()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'USER_RECEIVE']);
    }
}
