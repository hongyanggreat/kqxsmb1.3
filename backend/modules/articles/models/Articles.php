<?php

namespace backend\modules\articles\models;
use Yii;
use backend\modules\categories\models\Categories;

/**
 * This is the model class for table "tbl_articles".
 *
 * @property integer $ID
 * @property string $TITLE
 * @property string $ALIAS
 * @property string $IMAGE
 * @property integer $CATE_ID
 * @property integer $POSITION
 * @property string $DESCRIPTION
 * @property string $CONTENT
 * @property integer $STATUS
 * @property string $TAG
 * @property string $META_KEYWORD
 * @property integer $VIEW
 * @property integer $CREATED_BY
 * @property integer $CREATED_AT
 * @property integer $UPDATED_AT
 * @property integer $UPDATED_BY
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $TIME_START;
    public $TIME_END;
    public $ARRANGE_BY;
    public $ARRANGE_FIELD;
    public $TEXT_LIMIT;
    public $LIMIT_SELECT;
    public static function tableName()
    {
        return 'tbl_articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TITLE', 'ALIAS', 'CATE_ID', 'CREATED_BY', 'CREATED_AT'], 'required'],
            [['CATE_ID', 'POSITION', 'STATUS', 'VIEW', 'CREATED_BY', 'CREATED_AT', 'UPDATED_AT', 'UPDATED_BY'], 'integer'],
            [['DESCRIPTION', 'CONTENT'], 'string'],
            [['TITLE', 'ALIAS', 'IMAGE', 'TAG', 'META_KEYWORD'], 'string', 'max' => 255],
            [['REQUEST_TIME','TIME_START','TIME_END','ARRANGE_BY','ARRANGE_FIELD','TEXT_LIMIT','LIMIT_SELECT'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TITLE' => 'Title',
            'ALIAS' => 'Alias',
            'IMAGE' => 'Image',
            'CATE_ID' => 'Cate  ID',
            'POSITION' => 'Position',
            'DESCRIPTION' => 'Description',
            'CONTENT' => 'Content',
            'STATUS' => 'Status',
            'TAG' => 'Tag',
            'META_KEYWORD' => 'Meta  Keyword',
            'VIEW' => 'View',
            'CREATED_BY' => 'Created  By',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
            'UPDATED_BY' => 'Updated  By',
        ];
    }
     public function getParent()
    {
        return $this->hasOne(Categories::className(), ['ID' => 'CATE_ID']);
    }
}
