<?php

namespace backend\modules\napvip\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\napvip\models\Napthe;
use backend\modules\money_vip\models\MoneyVip;
/**
 * Default controller for the `khuchotso` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    const URL = "https://api.8pay.vn/api/cardcharging2?";
    const UID = "13779";
    const KEY_PRIVATE = "9a0e5814e9ef95700186d41ae443b505";
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {
         // echo date('Y-m-d H:i:s', strtotime("+2 days"));

        // die;
        if (Yii::$app->user->isGuest) {
            $message = "Tài khoản của bạn không đủ để truy cập vào khu chốt số.Vui lòng nạp tiền để truy cập";
            \Yii::$app->getSession()->setFlash('message', $message);
           return $this->redirect(['/dang-nhap']);
        }
        $arrCardTypes = [
            '1' =>'viettel',    
            '2' =>'mobi',    
            '3' =>'vina',    
            '4' =>'gate',    
            '6' =>'vietnammobile',    
            '8' =>'megacard',    
            '9' =>'oncash',    
        ];
        $idUser = 0;
        if (!Yii::$app->user->isGuest) {
            $idUser = Yii::$app->user->identity->ID;
        }
        $model     = new Napthe();
        $modelMoney = MoneyVip::find()->where(['ACC_ID'=>$idUser])->one();
        if ($model->load(Yii::$app->request->post())) {
            // echo '<pre>';
            // print_r($model);
            $model->mac = hash('sha256', self::UID . $model->pin . $model->seri . $model->card_type .self::KEY_PRIVATE);
            $model->result = 0;
            $model->otherInfo = "--";
            $model->create_at = date('Y-m-d H:i:s',time());
            $model->create_by = $idUser;
            if($model->save()){
                // $dataget = @file_get_contents(self::URL."uid=" . self::UID . "&pin=".$pin."&seri=".$seri."&card_type=".$card_type."&mac=" . $mac . "&note=" . $note);
                $dataget = '{"code":1,"msg":"Tich hop the sai, lien he admin!"}';
                // $dataget = '{"code":0,"msg":"Nạp thẻ thành công!","info_card":"100000"}';
                $dataJson = json_decode($dataget);
                // print_r($dataJson);
                // die;
                if($dataJson->code === 0) {
                    $model->result    = 1;
                    switch ($dataJson->info_card) {
                        case '10000':
                            $dateExp = 1;
                            break;
                        case '20000':
                            $dateExp = 3;
                            break;
                        case '50000':
                            $dateExp = 10;
                            break;
                        case '100000':
                            $dateExp = 30;
                            break;
                        case '200000':
                            $dateExp = 90;
                            break;
                        case '500000':
                            $dateExp = 180;
                            break;
                        
                        default:
                            $dateExp = 1;
                            # code...
                            break;
                    }
                    if($modelMoney){
                        // echo 'co thong tin.cap nhat';
                        $moneyOld             = $modelMoney->TOTAL;
                        $moneyNew             = $moneyOld + $dataJson->info_card;
                        $modelMoney->TOTAL    = $moneyNew;
                        $date                 = date_create($modelMoney->DATE_EXP);
                        if($modelMoney->DATE_EXP){
                            date_add($date,date_interval_create_from_date_string($dateExp." days"));
                            $modelMoney->DATE_EXP =  date_format($date,"Y-m-d H:i:s");
                        }else{
                            $modelMoney->DATE_EXP = date('Y-m-d H:i:s', strtotime("+".$dateExp." days"));
                        }
                    }else{
                        // echo 'khong co thong tin .them moi';
                        $modelMoney           = new MoneyVip;
                        $modelMoney->TOTAL    = $dataJson->info_card;
                        $modelMoney->DATE_EXP = date('Y-m-d H:i:s', strtotime("+".$dateExp." days"));
                        
                        
                    }

                    $modelMoney->ACC_ID = $idUser;
                    $modelMoney->STATUS = 1;
                    $modelMoney->save();


                   $message = "<p style='color:green'>Ket qua la : " . $dataJson->msg . " menh gia " . number_format($dataJson->info_card) ."</p>";
                }else {
                    $message =  "<p style='color:red'>Ket qua la : " . $dataJson->msg . "</p>";
                }
                \Yii::$app->getSession()->setFlash('message', $message);
                $model->otherInfo = $dataget;
                //CAP NHAT THONG TIN NAP THE
                $model->save();
                return $this->render('index',[
                    'model'        => $model,
                    'arrCardTypes' => $arrCardTypes,
                    'modelMoney'   => $modelMoney,
                ]);
            }else{
                // echo '<pre>';
                // print_r($model->getErrors());
                // die;
                $message =  "<p style='color:red'>Vui lòng nhập đầy đủ thông tin!</p>";
                \Yii::$app->getSession()->setFlash('message', $message);
                return $this->render('index',[
                        'model'        =>$model,
                        'arrCardTypes' =>$arrCardTypes,
                        'modelMoney'   =>$modelMoney,
                ]);
            }
        }else{
            return $this->render('index',[
                    'model'        =>$model,
                    'arrCardTypes' =>$arrCardTypes,
                    'modelMoney'   =>$modelMoney,
            ]);
        }
    }
}
