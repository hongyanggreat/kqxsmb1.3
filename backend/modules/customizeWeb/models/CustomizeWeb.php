<?php

namespace backend\modules\customizeWeb\models;

use Yii;

/**
 * This is the model class for table "tbl_customize_web".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $TITLE
 * @property string $LOGO
 * @property string $ICON
 * @property string $IMAGE
 * @property string $DESCRIPTION
 * @property string $META_KEYWORD
 * @property integer $STATUS
 * @property string $ADDRESS
 * @property string $HOT_LINE
 * @property string $EMAIL_CONTACT
 * @property string $WEBSITE_RELATION
 * @property integer $CREATED_AT
 * @property integer $CREATED_BY
 * @property integer $UPDATED_AT
 * @property integer $UPDATED_BY
 * @property string $LAYOUT
 */
class CustomizeWeb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $TEXT_LIMIT;
    public $image_current;
    public $logo_current;
    public $icon_current;
    public static function tableName()
    {
        return 'tbl_customize_web';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'TITLE', 'LOGO', 'ICON', 'DESCRIPTION', 'META_KEYWORD', 'STATUS', 'ADDRESS', 'HOT_LINE', 'EMAIL_CONTACT', 'CREATED_AT', 'CREATED_BY'], 'required'],
            [['STATUS', 'CREATED_AT', 'CREATED_BY', 'UPDATED_AT', 'UPDATED_BY'], 'integer'],
            [['ADDRESS', 'WEBSITE_RELATION','image_current','logo_current','icon_current'], 'string'],
            [['NAME', 'TITLE', 'LOGO', 'ICON', 'IMAGE', 'DESCRIPTION', 'META_KEYWORD', 'HOT_LINE', 'EMAIL_CONTACT', 'LAYOUT'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'               => 'ID',
            'NAME'             => 'Tên website',
            'TITLE'            => 'Tiêu để website',
            'LOGO'             => 'Logo',
            'ICON'             => 'Icon',
            'IMAGE'            => 'Hình ảnh',
            'DESCRIPTION'      => 'Miêu tả',
            'META_KEYWORD'     => 'Meta  Keyword',
            'STATUS'           => 'Trạng thái',
            'ADDRESS'          => 'Địa chỉ',
            'HOT_LINE'         => 'HotLine',
            'EMAIL_CONTACT'    => 'Email',
            'WEBSITE_RELATION' => 'Trạng web liên kết',
            'CREATED_AT'       => 'Tạo lúc',
            'CREATED_BY'       => 'Tạo bởi',
            'UPDATED_AT'       => 'Cập nhật lúc',
            'UPDATED_BY'       => 'Cập nhật bởi',
            'LAYOUT'           => 'Layout',
        ];
    }
}
