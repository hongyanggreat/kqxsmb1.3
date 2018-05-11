<?php

namespace backend\modules\categories\models;

use Yii;

/**
 * This is the model class for table "tbl_categories".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $IMAGE
 * @property string $ALIAS
 * @property integer $CATE_PARENT
 * @property integer $POSITION
 * @property string $DESCRIPTION
 * @property integer $STATUS
 * @property integer $CREATED_AT
 * @property integer $CREATED_BY
 * @property integer $UPDATED_AT
 * @property integer $UPDATED_BY
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image_current;
    public $TEXT_LIMIT;
    public static function tableName()
    {
        return 'tbl_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'ALIAS', 'CREATED_AT', 'CREATED_BY','STATUS'], 'required'],
            [['CATE_PARENT', 'POSITION', 'STATUS', 'CREATED_AT', 'CREATED_BY', 'UPDATED_AT', 'UPDATED_BY','TEXT_LIMIT'], 'integer'],
            [['NAME', 'IMAGE','image_current', 'ALIAS', 'DESCRIPTION'], 'string', 'max' => 255],
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
            'IMAGE' => 'Image',
            'ALIAS' => 'Alias',
            'CATE_PARENT' => 'Cate  Parent',
            'POSITION' => 'Position',
            'DESCRIPTION' => 'Description',
            'STATUS' => 'Status',
            'CREATED_AT' => 'Created  At',
            'CREATED_BY' => 'Created  By',
            'UPDATED_AT' => 'Updated  At',
            'UPDATED_BY' => 'Updated  By',
        ];
    }
    public function getParent()
    {
        return $this->hasOne(self::className(), ['ID' => 'CATE_PARENT'])
            ->from(self::tableName() . ' CATE_PARENT');
    }
     public $data;
    public function getCategories($parent = 0,$level = '',$options = [])
    {
        $model = Categories::find()
                    ->asArray()
                    ->where(['CATE_PARENT' => $parent,'STATUS' => 1]);
        $result = $model->all();
        $level .= '- ';                    
        if(count($result)>0){
            foreach ($result as $key => $value) {
                if($parent == 0){
                    $level = '';
                }
                $this->data[$value["ID"]] = $level.$value["NAME"];
                self::getCategories($parent = $value['ID'],$level);
            }
        }
       return $this->data;

    }
}
