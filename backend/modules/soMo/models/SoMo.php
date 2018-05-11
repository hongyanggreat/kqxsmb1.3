<?php

namespace backend\modules\soMo\models;

use Yii;

/**
 * This is the model class for table "so_mo".
 *
 * @property integer $id
 * @property string $giac_mo
 * @property string $boi_so
 */
class SoMo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'so_mo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['giac_mo'], 'unique'],
            [['giac_mo', 'boi_so'], 'required'],
            [['giac_mo', 'boi_so'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'giac_mo' => 'Giac Mo',
            'boi_so' => 'Boi So',
        ];
    }
}
