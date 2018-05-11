<?php

namespace backend\modules\dangky\models;

use Yii;

/**
 * This is the model class for table "tbl_accounts".
 *
 * @property integer $ACC_ID
 * @property integer $PARENT_ID
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $PASSWORD_RESET_TOKEN
 * @property string $AUTH_KEY
 * @property string $CP_CODE
 * @property string $FULL_NAME
 * @property string $DESCRIPTION
 * @property string $ADDRESS
 * @property string $PHONE
 * @property string $EMAIL
 * @property integer $CREATE_DATE
 * @property integer $CREATE_BY
 * @property integer $UPDATE_DATE
 * @property string $UPDATE_BY
 * @property integer $USER_TYPE
 * @property integer $STATUS
 * @property string $OPTION_DATA
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $RE_PASSWORD;
    public $AGREE;
    public static function tableName()
    {
        return 'tbl_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'CREATE_DATE', 'CREATE_BY', 'UPDATE_DATE', 'USER_TYPE', 'STATUS'], 'integer'],
            [['USERNAME', 'PASSWORD', 'AUTH_KEY', 'CREATE_DATE', 'CREATE_BY', 'STATUS','PHONE','EMAIL','RE_PASSWORD'], 'required'],
            [['USERNAME', 'PASSWORD', 'PASSWORD_RESET_TOKEN', 'AUTH_KEY', 'CP_CODE', 'FULL_NAME', 'PHONE', 'EMAIL', 'UPDATE_BY','AGREE','RE_PASSWORD'], 'string', 'max' => 127],
            [['PASSWORD'], 'required','on'=>'create'],
            [['DESCRIPTION', 'ADDRESS'], 'string', 'max' => 511],
            [['OPTION_DATA'], 'string', 'max' => 4000],
            [['USERNAME'], 'unique'],
            [['PHONE'], 'checkPhone'],
            // [['PASSWORD'], 'checkPass'],
            [['PASSWORD','RE_PASSWORD'], 'checkRePass'],
            [['AGREE'], 'checkAgree'],
            [['USERNAME'], 'match', 'pattern' => '/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/','message'=>'Tài khoản chưa hợp lệ'],

            [['EMAIL'], 'match', 'pattern' => '/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/','message'=>'Email không hợp lệ'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ACC_ID' => 'Acc  ID',
            'PARENT_ID' => 'Parent  ID',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'PASSWORD_RESET_TOKEN' => 'Password  Reset  Token',
            'AUTH_KEY' => 'Auth  Key',
            'CP_CODE' => 'Cp  Code',
            'FULL_NAME' => 'Full  Name',
            'DESCRIPTION' => 'Description',
            'ADDRESS' => 'Address',
            'PHONE' => 'Phone',
            'EMAIL' => 'Email',
            'CREATE_DATE' => 'Create  Date',
            'CREATE_BY' => 'Create  By',
            'UPDATE_DATE' => 'Update  Date',
            'UPDATE_BY' => 'Update  By',
            'USER_TYPE' => 'User  Type',
            'STATUS' => 'Status',
            'OPTION_DATA' => 'Option  Data',
        ];
    }
    public function checkPass($attribute, $params)
    {
        if(isset($_POST['Accounts']['PASSWORD'])){
            $password = $_POST['Accounts']['PASSWORD'];
            if(trim($password) != ''){
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $special   = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password);

                if(!$uppercase || !$lowercase || !$number || !$special || strlen($password) < 6) {
                    $this->addError($attribute, "Mật khẩu chưa được bảo mật.");
                }
                
            }

        }
    }
     public function checkRePass($attribute, $params)
    {
        $password   = $_POST['Accounts']['PASSWORD'];
        $rePassword = $_POST['Accounts']['RE_PASSWORD'];
        if($password != $rePassword) {
            $this->addError($attribute, "Mật khẩu chưa khớp.");
        }
    }
    public function checkPhone($attribute, $params)
    {   

        $result = Yii::$app->phoneNumber->detect_number($this->PHONE);
        if(!$result){
            $this->addError($attribute, "Không phải là số điện thoại");
        }
    }
     public function checkAgree($attribute, $params)
    {   
        if(!$this->AGREE){
            $this->addError($attribute, "Vui lòng nhấp đồng ý để đăng ký tài khoản");
        }
    }
    public function getParent()
    {
        return $this->hasOne(self::className(), ['ACC_ID' => 'PARENT_ID'])
            ->from(self::tableName() . ' PARENT_ID');
    }
}
