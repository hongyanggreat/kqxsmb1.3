<?php

namespace backend\modules\chat\models;

use Yii;
use backend\modules\dangky\models\Accounts;
use backend\modules\money\models\Money;
/**
 * This is the model class for table "chat".
 *
 * @property integer $ID
 * @property integer $ACC_ID
 * @property string $MESSAGE
 * @property string $PARENT_ID
 * @property string $CREATED_AT
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
            [['ACC_ID','PARENT_ID','CREATED_AT'], 'integer'],
            [['MESSAGE'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'         => 'ID',
            'ACC_ID'     => 'Acc  ID',
            'PARENT_ID'  => 'PARENT_ID',
            'MESSAGE'    => 'Message',
            'CREATED_AT' => 'Tao luc',
        ];
    }
    public function getParent()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'ACC_ID']);
    }
    public function getMoney()
    {
        return $this->hasOne(Money::className(), ['ACC_ID' => 'ACC_ID']);
    }
    public function getContentChild()
    {
        // return $this->hasMany(self::className(), ['ID' => 'PARENT_ID'])
        //     ->from(self::tableName() . ' PARENT_ID');
             return $this->hasMany(self::className(), ['PARENT_ID' => 'ID'])
                            ->orderBy(['ID'=>SORT_DESC])
                            ->with([    // this is for the related models
                                    'parent' => function($query) {
                                        $query->select(['ACC_ID','USERNAME','USER_TYPE','IMAGE']);
                                    },
                                ])
                            ->with([    // this is for the related models
                                    'money' => function($query) {
                                        $query->select(['ACC_ID','TOTAL']);
                                    },
                                ])
                            ;
    }
}
