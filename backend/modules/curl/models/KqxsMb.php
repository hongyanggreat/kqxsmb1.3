<?php

namespace backend\modules\curl\models;

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
            [['rs_date'], 'required'],
            [['rs_date'], 'unique'],
            [['rs_date'], 'safe'],
            [['rs_0_0', 'rs_2_0', 'rs_2_1', 'rs_3_0', 'rs_3_1', 'rs_3_2', 'rs_3_3', 'rs_3_4', 'rs_3_5'], 'string', 'max' => 5],
            [['rs_1_0'], 'string', 'max' => 255],
            [['rs_4_0', 'rs_4_1', 'rs_4_2', 'rs_4_3', 'rs_5_0', 'rs_5_1', 'rs_5_2', 'rs_5_3', 'rs_5_4', 'rs_5_5'], 'string', 'max' => 4],
            [['rs_6_0', 'rs_6_1', 'rs_6_2'], 'string', 'max' => 3],
            [['rs_7_0', 'rs_7_1', 'rs_7_2', 'rs_7_3'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rs_0_0' => 'Rs 0 0',
            'rs_1_0' => 'Rs 1 0',
            'rs_2_0' => 'Rs 2 0',
            'rs_2_1' => 'Rs 2 1',
            'rs_3_0' => 'Rs 3 0',
            'rs_3_1' => 'Rs 3 1',
            'rs_3_2' => 'Rs 3 2',
            'rs_3_3' => 'Rs 3 3',
            'rs_3_4' => 'Rs 3 4',
            'rs_3_5' => 'Rs 3 5',
            'rs_4_0' => 'Rs 4 0',
            'rs_4_1' => 'Rs 4 1',
            'rs_4_2' => 'Rs 4 2',
            'rs_4_3' => 'Rs 4 3',
            'rs_5_0' => 'Rs 5 0',
            'rs_5_1' => 'Rs 5 1',
            'rs_5_2' => 'Rs 5 2',
            'rs_5_3' => 'Rs 5 3',
            'rs_5_4' => 'Rs 5 4',
            'rs_5_5' => 'Rs 5 5',
            'rs_6_0' => 'Rs 6 0',
            'rs_6_1' => 'Rs 6 1',
            'rs_6_2' => 'Rs 6 2',
            'rs_7_0' => 'Rs 7 0',
            'rs_7_1' => 'Rs 7 1',
            'rs_7_2' => 'Rs 7 2',
            'rs_7_3' => 'Rs 7 3',
            'rs_date' => 'Rs Date',
        ];
    }
}
