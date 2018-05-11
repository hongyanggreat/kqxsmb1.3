<?php

namespace backend\modules\money_vip\models;

use Yii;

/**
 * This is the model class for table "money_vip".
 *
 * @property integer $ID
 * @property integer $ACC_ID
 * @property integer $TOTAL
 * @property integer $STATUS
 * @property integer $DATE_EXP
 */
class MoneyVip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money_vip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACC_ID', 'TOTAL', 'STATUS'], 'required'],
            [['ACC_ID', 'TOTAL', 'STATUS'], 'integer'],
            [['DATE_EXP'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'       => 'ID',
            'ACC_ID'   => 'Acc  ID',
            'TOTAL'    => 'Total',
            'STATUS'   => 'Status',
            'DATE_EXP' => 'DATE_EXP',
        ];
    }
}
