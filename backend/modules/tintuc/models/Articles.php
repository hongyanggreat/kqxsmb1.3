<?php

namespace backend\modules\tintuc\models;

use Yii;

/**
 * This is the model class for table "tbl_articles".
 *
 * @property integer $model->ID= 1111;
 * @property string $model->TITLE= 1111;
 * @property string $model->ALIAS= 1111;
 * @property string $model->IMAGE= 1111;
 * @property integer $model->CATE_ID= 1111;
 * @property integer $model->POSITION= 1111;
 * @property string $model->DESCRIPTION= 1111;
 * @property string $model->CONTENT= 1111;
 * @property integer $model->STATUS= 1111;
 * @property string $model->TAG= 1111;
 * @property string $model->META_KEYWORD= 1111;
 * @property integer $model->VIEW= 1111;
 * @property integer $model->CREATED_BY= 1111;
 * @property integer $model->CREATED_AT= 1111;
 * @property integer $model->UPDATED_AT= 1111;
 * @property integer $model->UPDATED_BY= 1111;
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['ALIAS'], 'unique'],
            [['CATE_ID', 'POSITION', 'STATUS', 'VIEW', 'CREATED_BY', 'CREATED_AT', 'UPDATED_AT', 'UPDATED_BY'], 'integer'],
            [['DESCRIPTION', 'CONTENT'], 'string'],
            [['TITLE', 'ALIAS', 'IMAGE', 'TAG', 'META_KEYWORD'], 'string', 'max' => 255],
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
}
