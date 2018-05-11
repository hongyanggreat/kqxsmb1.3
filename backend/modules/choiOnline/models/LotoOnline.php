<?php

namespace backend\modules\choiOnline\models;

use Yii;
use backend\modules\dangky\models\Accounts;

/**
 * This is the model class for table "loto_online".
 *
 * @property integer $ID
 * @property integer $ACC_ID
 * @property string $LOTO_NUMBER
 * @property integer $LOTO_PRICE
 * @property integer $IS_LOTO
 * @property string $CREATED_AT
 */
class LotoOnline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $totalMoney;
    public static function tableName()
    {
        return 'loto_online';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACC_ID'], 'checkLogin'],
            [['LOTO_NUMBER', 'LOTO_PRICE'], 'required','message'=>'{attribute} không được để trống'],
            [['ACC_ID', 'LOTO_PRICE', 'IS_LOTO'], 'integer','message'=>'{attribute} phải là số nguyên'],
            [['CREATED_AT'], 'safe'],
            [['LOTO_NUMBER'], 'checkLotoNumber'],
            [['LOTO_PRICE'], 'checkLotoPrice'],
            [['totalMoney'], 'checkMoney'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'          => 'ID',
            'ACC_ID'      => 'Acc  ID',
            'LOTO_NUMBER' => 'Bộ số',
            'LOTO_PRICE'  => 'Số điểm',
            'IS_LOTO'     => 'Is  Loto',
            'CREATED_AT'  => 'Created  At',
            'totalMoney'  => 'Ví tiền',
        ];
    }
     public function checkMoney($attribute, $params){
        $totalMoney = $this->totalMoney;
        $lotoPrice = $this->LOTO_PRICE;
        $lotoPrice = trim($lotoPrice);
        if(is_numeric($lotoPrice) && $lotoPrice <= 2000 && $lotoPrice >0){
            $lotoNumber = $this->LOTO_NUMBER;
            $arrLotoNumber = explode(',', $lotoNumber);
            if(isset($arrLotoNumber) && $arrLotoNumber){
                $sotien = 0;
                foreach ($arrLotoNumber as $key => $value) {
                    $value = trim($value);
                    if(strlen($value) ==2 && is_numeric($value)){
                        $sotien +=$lotoPrice;
                    }
                }
                $sotien = $sotien*23*1000;
                if(($totalMoney - $sotien) < 0){
                    return $this->addError($attribute, "Ví tiền của bạn không đủ để thực hiện giao dịch ".number_format($sotien,'0',',','.')."vnđ" );
                }
            }
        }
        // if(!is_numeric($lotoPrice) || $lotoPrice > 2000 || $lotoPrice <= 0){
        // }
    }
    public function checkLotoPrice($attribute, $params){
        $lotoPrice = $this->LOTO_PRICE;
        $lotoPrice = trim($lotoPrice);
        if(!is_numeric($lotoPrice) || $lotoPrice > 2000 || $lotoPrice <= 0){
            return $this->addError($attribute, "Số điểm ".$lotoPrice." không hợp lệ");
        }
    }
    public function checkLotoNumber($attribute, $params){
        $lotoNumber = $this->LOTO_NUMBER;
        $arrLotoNumber = explode(',', $lotoNumber);
        if(isset($arrLotoNumber) && $arrLotoNumber){
            foreach ($arrLotoNumber as $key => $value) {
                $value = trim($value);
                if(strlen($value)>2 || strlen($value)<2 || !is_numeric($value)){
                    return $this->addError($attribute, "Bộ số ".$value." không hợp lệ");
                }
                
            }
        }
    }
     public function checkLogin($attribute, $params){
        if (Yii::$app->user->isGuest) {
            $this->addError($attribute, "Bạn cần phải đăng nhập để sử dụng chức năng này");
        }
    }
    public function getParent()
    {
        return $this->hasOne(Accounts::className(), ['ACC_ID' => 'ACC_ID']);
    }
}
