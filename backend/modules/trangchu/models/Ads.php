<?php

namespace backend\modules\trangchu\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $IMAGE
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'DESCRIPTION', 'IMAGE'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Name',
            'DESCRIPTION' => 'Description',
            'IMAGE' => 'Image',
        ];
    }
}
