<?php

namespace backend\modules\ketQuaMienBac\models;

use Yii;

/**
 * This is the model class for table "kqxs_mb".
 *
 * @property integer $id
 * @property string $rs_0_0
 * @property string $rs_1_0
 * @property string $rs_2_0
 * @property string $rs_2_1
 * @property string $rs_3_0
 * @property string $rs_3_1
 * @property string $rs_3_2
 * @property string $rs_3_3
 * @property string $rs_3_4
 * @property string $rs_3_5
 * @property string $rs_4_0
 * @property string $rs_4_1
 * @property string $rs_4_2
 * @property string $rs_4_3
 * @property string $rs_5_0
 * @property string $rs_5_1
 * @property string $rs_5_2
 * @property string $rs_5_3
 * @property string $rs_5_4
 * @property string $rs_5_5
 * @property string $rs_6_0
 * @property string $rs_6_1
 * @property string $rs_6_2
 * @property string $rs_7_0
 * @property string $rs_7_1
 * @property string $rs_7_2
 * @property string $rs_7_3
 * @property string $total_rs
 * @property string $rs_date
 */
class KqxsMb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kqxs_mb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rs_date'], 'unique','message'=>'Ngày hôm nay đã được thêm.Vui lòng cập nhật'],
            [['rs_date'], 'safe'],
            [['rs_0_0', 'rs_1_0', 'rs_2_0', 'rs_2_1', 'rs_3_0', 'rs_3_1', 'rs_3_2', 'rs_3_3', 'rs_3_4', 'rs_3_5'], 'string', 'max' => 5,'message'=>'{attribute} Chứa 5 ký tự'],
            [['rs_4_0', 'rs_4_1', 'rs_4_2', 'rs_4_3', 'rs_5_0', 'rs_5_1', 'rs_5_2', 'rs_5_3', 'rs_5_4', 'rs_5_5'], 'string', 'max' => 4],
            [['rs_6_0', 'rs_6_1', 'rs_6_2'], 'string', 'max' => 3],
            [['rs_7_0', 'rs_7_1', 'rs_7_2', 'rs_7_3'], 'string', 'max' => 2],
            [['total_rs'], 'string', 'max' => 500],


            [['rs_0_0', 'rs_1_0', 'rs_2_0', 'rs_2_1', 'rs_3_0', 'rs_3_1', 'rs_3_2', 'rs_3_3', 'rs_3_4', 'rs_3_5'], 'match', 'pattern' => '"\\d+"','message'=>'{attribute} Phai là ký tự số'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'rs_0_0' => 'Giải Đặc biệt',
            'rs_1_0' => 'Giải nhất',
            'rs_2_0' => 'Giải nhì [1]',
            'rs_2_1' => 'Giải nhì [2]',
            'rs_3_0' => 'Giải ba [1]',
            'rs_3_1' => 'Giải ba [2]',
            'rs_3_2' => 'Giải ba [3]',
            'rs_3_3' => 'Giải ba [4]',
            'rs_3_4' => 'Giải ba [5]',
            'rs_3_5' => 'Giải ba [6]',
            'rs_4_0' => 'Giải tư [1]',
            'rs_4_1' => 'Giải tư [2]',
            'rs_4_2' => 'Giải tư [3]',
            'rs_4_3' => 'Giải tư [4]',
            'rs_5_0' => 'Giải năm [1]',
            'rs_5_1' => 'Giải năm [2]',
            'rs_5_2' => 'Giải năm [3]',
            'rs_5_3' => 'Giải năm [4]',
            'rs_5_4' => 'Giải năm [5]',
            'rs_5_5' => 'Giải năm [6]',
            'rs_6_0' => 'Giải sáu [1]',
            'rs_6_1' => 'Giải sáu [2]',
            'rs_6_2' => 'Giải sáu [3]',
            'rs_7_0' => 'Giải bảy [1]',
            'rs_7_1' => 'Giải bảy [2]',
            'rs_7_2' => 'Giải bảy [3]',
            'rs_7_3' => 'Giải bảy [4]',
            'total_rs' => 'Dãy số',
            'rs_date' => 'Ngày',
        ];
    }
}
