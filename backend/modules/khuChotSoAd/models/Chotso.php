<?php

namespace backend\modules\khuChotSoAd\models;
use backend\modules\dangky\models\Accounts;
use Yii;

/**
 * This is the model class for table "chotso".
 *
 * @property integer $ID
 * @property string $CONTENT
 * @property string $CREATED_AT
 * @property string $UPDATE_AT
 * @property integer $UPDATE_BY
 * @property integer $STATUS
 * @property integer $ACC_ID
 */
class Chotso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chotso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTENT', 'CREATED_AT', 'ACC_ID'], 'required'],
            [['UPDATE_BY', 'STATUS', 'ACC_ID'], 'integer'],
            [['CREATED_AT', 'UPDATE_AT'], 'safe'],
            [['CONTENT'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'         => 'ID',
            'CONTENT'    => 'Content',
            'CREATED_AT' => 'Created  At',
            'UPDATE_AT'  => 'Update  At',
            'UPDATE_BY'  => 'Update  By',
            'STATUS'     => 'Status',
            'ACC_ID'     => 'Acc  ID',
        ];
    }
    public function getParent()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'ACC_ID']);
    }
}
