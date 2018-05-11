<?php

namespace backend\modules\ads\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $IMAGE
 * @property string $LINK
 * @property integer $STATUS
 * @property string $CREATE_AT
 * @property integer $CREATE_BY
 * @property string $UPDATE_AT
 * @property integer $UPDATE_BY
 * @property integer $POSITION
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
            [['NAME', 'DESCRIPTION', 'STATUS', 'CREATE_BY', 'CREATE_AT'], 'required'],
            [['STATUS', 'CREATE_BY', 'UPDATE_BY','POSITION'], 'integer'],
            [['CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['NAME', 'DESCRIPTION', 'IMAGE', 'LINK'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'          => 'ID',
            'NAME'        => 'Name',
            'DESCRIPTION' => 'Description',
            'IMAGE'       => 'Image',
            'LINK'        => 'Link',
            'STATUS'      => 'Status',
            'POSITION'    => 'Vị trí',
            'CREATE_AT'   => 'Create  At',
            'CREATE_BY'   => 'Create  By',
            'UPDATE_AT'   => 'Update  At',
            'UPDATE_BY'   => 'Update  By',
        ];
    }
}
