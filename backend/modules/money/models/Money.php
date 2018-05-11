<?php

namespace backend\modules\money\models;
use backend\modules\users\models\Accounts;

use Yii;

/**
 * This is the model class for table "money".
 *
 * @property integer $ID
 * @property integer $ACC_ID
 * @property integer $TOTAL
 * @property integer $STATUS
 */
class Money extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACC_ID'], 'required'],
            [['ACC_ID', 'TOTAL','STATUS'], 'integer'],
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
            'TOTAL' => 'Total',
            'STATUS' => 'STATUS',
        ];
    }
     public function getParent()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'ACC_ID']);
    }
}
