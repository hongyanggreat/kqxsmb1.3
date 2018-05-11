<?php

namespace backend\modules\choiOnline\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\choiOnline\models\LotoOnline;
use backend\modules\money\models\Money;
use backend\modules\trangchu\models\KqxsMb;
/**
 * Default controller for the `choi-online` module
 */
class DefaultController extends Controller
{
    const LIMIT                = 20;
    const KEY_CACHE_CHECK_LOTO = "_kqxs_Autocheckloto";
    const KEY_CACHE_CONG_TIEN  = "_kqxs_Autocongtien";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {   


         // $module  = Yii::$app->controller->module->id;
        $module  = Yii::$app->request->getPathInfo();

        $baseUrl = Yii::$app->params['baseUrl'];
        $suffix = Yii::$app->params['suffix'];
        $idUser = 0;
        if (!Yii::$app->user->isGuest) {
            $idUser = Yii::$app->user->identity->ID;
        }

        $page = 1;

        if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0){
            $page = $_GET['page'];
        }
        $offset = ($page-1)*(self::LIMIT);
        $model = new LotoOnline;
        $date = date('Y-m-d');
        $dataLoto = LotoOnline::find()
                        ->where(['ACC_ID'=>$idUser])
                        ->andWhere(['>=','CREATED_AT', $date." 00:00:00"])
                        ->andWhere(['<=','CREATED_AT', $date." 18:00:00"])
                        ->all();
        $modelLoto = LotoOnline::find()
                        ->where(['ACC_ID'=>$idUser])
                        ->andWhere(['<','CREATED_AT', $date." 00:00:00"]);
        $count = $modelLoto->count();
        $historyLotos = $modelLoto
                                ->limit(self::LIMIT)
                                ->offset($offset)
                                ->orderBy(['ID'=>SORT_DESC])
                                ->all();    
        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
            // 'action'      => $baseUrl.$module.'/lich-su',
        ];            
        // echo '<pre>';
        // print_r($myPagination);
        // die;
        // SO TIEN CON CUA NGUOI CHOI
        $dataMoney = Money::find()->where(['ACC_ID'=>$idUser])->one();
        $totalMoney = 0;
        if(isset($dataMoney) && $dataMoney){
            $totalMoney = $dataMoney->TOTAL;
        }
        $model->totalMoney = $totalMoney;
        // print_r($dataMoney);
        // die;              
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->user->isGuest) {
                //NEU CHUA DANG NHAP THI YEU CAU HO DANG NA
                Yii::$app->getSession()->setFlash('notificationLotoOnline', ['class'=>'green','mes'=>'Vui Lòng <a href="'.BASE_URL.'dang-nhap'.SUFFIX.'" style="color:red">Đăng nhập</a> để sử dụng tính năng này']);
                return $this->render('index',[
                    'model'     =>$model,
                    'dataLoto'  =>$dataLoto,
                    'dataMoney' =>$dataMoney,
                ]);
            }

            $timeNow   = time();
            $timeStart = strtotime (date("Y-m-d 17:30:00"));
            $timeEnd   = strtotime (date("Y-m-d 23:59:59"));

            // $timeStart = strtotime (date("Y-m-d 22:03:00"));
            // $timeEnd   = strtotime (date("Y-m-d 22:28:00"));

            $checkTime = true; 
            
            if($timeNow >= $timeStart && $timeNow <= $timeEnd ){
                $checkTime = false;
            }
            if(!$checkTime){
                Yii::$app->getSession()->setFlash('notificationLotoOnline', ['class'=>'red','mes'=>'Thời gian không cho phép ghi số']);
                return $this->redirect($baseUrl.'choi-online'.$suffix);
            }
            $lotoPrice = $model->LOTO_PRICE;
            if($model->validate()){
                $lotoNumber = $model->LOTO_NUMBER;
                $arrLotoNumber = explode(',', $lotoNumber);
                if(isset($arrLotoNumber) && $arrLotoNumber){
                    foreach ($arrLotoNumber as $key => $value) {
                        $model = new LotoOnline;
                        $model->LOTO_PRICE     = $lotoPrice;
                        $model->ACC_ID     = $idUser;
                        $model->CREATED_AT = date('y-m-d H:i:s');
                        $model->LOTO_NUMBER = $value;
                        // echo '<pre>';print_r($model);
                        // die;
                        if($model->save()){
                            $totalMoney -= $lotoPrice*LOTO*1000; 
                            
                            Yii::$app->getSession()->setFlash('notificationLotoOnline', ['class'=>'green','mes'=>'Bạn đã ghi số thành công']);
                           
                        }else{
                           
                            Yii::$app->getSession()->setFlash('notificationLotoOnline', ['class'=>'red','mes'=>'Ghi số thất bại']);
                            return $this->render('index',[
                                'model'     =>$model,
                                'dataLoto'  =>$dataLoto,
                                'dataMoney' =>$dataMoney,
                                'myPagination' =>$myPagination,
                                'historyLotos' =>$historyLotos,
                            ]);
                        }
                    }
                    //SAU KHI CAP NHAT BO SO LOTO XONG => CAP NHAT TRU TIEN
                    $modelMoney = Money::find()->where(['ACC_ID'=>$idUser])->one();
                    $modelMoney->TOTAL = $totalMoney;
                    // echo '<pre>';print_r($modelMoney);
                    // die;
                    $modelMoney->save();
                }
               return $this->redirect($baseUrl.'choi-online'.$suffix);
            }else{
                // echo '<pre>';print_r($model->getErrors());
                // die;
                Yii::$app->getSession()->setFlash('notificationLotoOnline', ['class'=>'red','mes'=>'Lỗi rồi bạn ơi']);
                return $this->render('index',[
                    'model'=>$model,
                    'dataLoto'=>$dataLoto,
                    'dataMoney'=>$dataMoney,
                    'myPagination'=>$myPagination,
                    'historyLotos'=>$historyLotos,
                ]);
            }
           
        }else{
            return $this->render('index',[
                'model'=>$model,
                'dataLoto'=>$dataLoto,
                'dataMoney'=>$dataMoney,
                'myPagination'=>$myPagination,
                'historyLotos'=>$historyLotos,
            ]);

        }
    }

    
    public function actionHistory(){
        $this->layout = false;
        $idUser = 0;
        if (Yii::$app->user->isGuest) {
             return '<tr><td colspan="5" class="nen-do dam trang"><a href="'.BASE_URL.'dang-nhap'.SUFFIX.'">Vui lòng đăng nhập để thực hiện chức năng này</a></td></tr>';
        }
        if(!isset($_GET['task']) || $_GET['task'] != "history"){
             return $this->redirect(BASE_URL);
        }
        $idUser = Yii::$app->user->identity->ID;
        $date = date('Y-m-d');
        $dataLoto = LotoOnline::find()
            ->where(['ACC_ID'=>$idUser])
            ->andWhere(['<=','CREATED_AT', $date." 00:00:00"])
            ->orderBy(['CREATED_AT'=>SORT_DESC])
            ->limit(self::LIMIT)
            ->all();
        if(isset($dataLoto) && $dataLoto){
            return $this->render('history',[
                'dataLoto'=>$dataLoto,
            ]);
        }else{
            return '<tr><td colspan="5" class="nen-do dam trang">Dữ liệu của bạn chưa có.</td></tr>';
        }

    }

    public function actionAutocheckloto(){

        $timeNow   = time();
        $timeStart = strtotime (date("Y-m-d 18:35:00"));
        // $timeStart = strtotime (date("Y-m-d 21:03:00"));
        $timeEnd   = strtotime (date("Y-m-d 23:59:59"));
        // $timeEnd   = strtotime (date("Y-m-d 21:07:00"));
        $checkTime = true;      
        // if($timeNow <= $timeStart || $timeNow >= $timeEnd ){
        //     $checkTime = false;
        //     return "Thời gian không trong khoản cho phép : Yêu cầu chỉ được thực hiện trong khung thời gian từ 18h35:00 đến 23h59:59";
        // } 
        $keyCheckLoto   = self::KEY_CACHE_CHECK_LOTO;
        $cache =   \Yii::$app->cache->get($keyCheckLoto);
        if($cache){
            return "Yêu cầu đã được xử lý";
        }
        $model = new LotoOnline;
        $date = date('Y-m-d');
        $dataLotos = LotoOnline::find()
                        ->andWhere(['>=','CREATED_AT', $date." 00:00:00"])
                        ->andWhere(['<=','CREATED_AT', $date." 18:00:00"])
                        // ->asArray()
                        ->all();
        // echo '<pre>';print_r($dataLotos);
        // die;

       
        if(isset($dataLotos) && $dataLotos){

            //LAY KET QUA SO SO TRONG NGAY,
            $dataKqxsToday = KqxsMb::find()
                            ->select(['rs_0_0','rs_1_0','rs_2_0','rs_2_1','rs_3_0','rs_3_1','rs_3_2','rs_3_3','rs_3_4','rs_3_5','rs_4_0','rs_4_1','rs_4_2','rs_4_3','rs_5_0','rs_5_1','rs_5_2','rs_5_3','rs_5_4','rs_5_5','rs_6_0','rs_6_1','rs_6_2','rs_7_0','rs_7_1','rs_7_2','rs_7_3'])
                            ->where(['rs_date'=>$date])
                            ->asArray()
                            ->one();

            $arrayLotox = [];
            if(!isset($dataKqxsToday) || !$dataKqxsToday){

                return "Yêu cầu không được xử lý.Nguyên nhân: Chưa cập nhật kết quả sổ số trong ngày";
            }
            foreach ($dataKqxsToday as $key => $value) {
                $value;
                $arrayLotox[] = substr($value, -2);
            }
            // echo '<pre>';print_r($arrayLotox);
            $arrayLotox = array_count_values($arrayLotox);
            foreach ($dataLotos as $key => $value) {
                $loto         = $value->LOTO_NUMBER;
                $idLotoOnline = $value->ID;
                $modelUpdate =  LotoOnline::findOne($idLotoOnline);
                if (array_key_exists($loto,$arrayLotox))
                {
                    $modelUpdate->IS_LOTO = 1;
                    $modelUpdate->LO_XIEN = $arrayLotox[$loto];
                }
                else
                {
                    $modelUpdate->IS_LOTO = 0;
                    $modelUpdate->LO_XIEN = 0;
                }
                $modelUpdate->save();
                // echo '<pre>';print_r($modelUpdate);
            }
            $key   = self::KEY_CACHE_CHECK_LOTO;
            Yii::$app->cache->set($key, true);
            return 'Bạn đã thực hiện tự động quét dữ liệu cho module chơi loto online của người dùng';
            // echo '<pre>';print_r($arrayLotox);
            // die;
        }else{
            return 'Không có gì để cập nhật';
        }
    }
    
    public function actionEnable(){
        $keyContien       = self::KEY_CACHE_CONG_TIEN;
        $keyAutoCheckLoto = self::KEY_CACHE_CHECK_LOTO;
        \Yii::$app->cache->delete($keyContien);
        \Yii::$app->cache->delete($keyAutoCheckLoto);
        return "Kích hoạt tự động cộng tiền + autoCheckLoto";
    }
    public function actionDisable(){
        $keyContien       = self::KEY_CACHE_CONG_TIEN;
        $keyAutoCheckLoto = self::KEY_CACHE_CHECK_LOTO;
        \Yii::$app->cache->set($keyContien, true);
        \Yii::$app->cache->set($keyAutoCheckLoto, true);
        return "Hủy tự động cộng tiền + autoCheckLoto";
    }

    public function actionAutocongtien(){
        
        $timeNow   = time();
        $timeStart = strtotime (date("Y-m-d 18:35:00"));
        // $timeStart = strtotime (date("Y-m-d 21:03:00"));
        $timeEnd   = strtotime (date("Y-m-d 23:59:59"));
        // $timeEnd   = strtotime (date("Y-m-d 21:07:00"));
        $checkTime = true;      
        // if($timeNow <= $timeStart || $timeNow >= $timeEnd ){
        //     $checkTime = false;
        //     return "Thời gian không trong khoản cho phép : Yêu cầu chỉ được thực hiện trong khung thời gian từ 18h35:00 đến 23h59:59";
        // }
        $keyContien   = self::KEY_CACHE_CONG_TIEN;
        $cache =   \Yii::$app->cache->get($keyContien);
        // die;
        if($cache){
            return "Yêu cầu đã được xử lý";
        }
        $model = new LotoOnline;
        $date = date('Y-m-d');
        $dataLotos = LotoOnline::find()
                        // ->select(['ACC_ID','SUM(LOTO_PRICE) as TOTAL_PRICE','SUM(LO_XIEN) as TOTAL_XIEN'])
                        // ->select(['ACC_ID','(SUM(LOTO_PRICE) * SUM(LO_XIEN)) as TOTAL_PRICE'])
                        // ->select(['ACC_ID','(SUM(LOTO_PRICE) + SUM(LO_XIEN)) as TOTAL_PRICE'])
                        ->select(['ACC_ID','(LOTO_PRICE * LO_XIEN) as TOTAL_PRICE'])
                        ->andWhere(['>=','CREATED_AT', $date." 00:00:00"])
                        ->andWhere(['<=','CREATED_AT', $date." 18:00:00"])
                        ->andWhere(['IS_LOTO'=>1])
                        ->asArray()
                        ->groupBy(['ACC_ID','LOTO_NUMBER'])
                        ->all();
        // echo '<pre>';print_r($dataLotos);
        $arrData = [];
        if(isset($dataLotos) && $dataLotos){
            $id = 0;
            foreach ($dataLotos as $key => $value) {
                // print_r($value);

                if($id != $value['ACC_ID']){
                    $id = $value['ACC_ID'];
                    $total = $value['TOTAL_PRICE'];
                }else{
                    $total += $value['TOTAL_PRICE'];
                }
                $arrData[$value['ACC_ID']] = $total;
            }
        }
        // echo '<pre>';print_r($arrData);
        // die;
        //TACH RA MANG MOI XU LY CHO TUONG MINH
        if(isset($arrData) && $arrData){
            foreach ($arrData as $key => $value) {
                $accId =  $key;
                $total = $value;
                $modelMoney =  Money::find()
                                ->where(['ACC_ID'=>$accId])
                                // ->asArray()
                                ->andWhere(['STATUS'=>1])
                                ->one();
                                // echo '<pre>';
                                // print_r($modelMoney);
                    // echo '<pre>';print_r($modelMoney);
                    if(!isset($modelMoney) || !$modelMoney){
                      
                    }else{
                        $currentMoney      = $modelMoney->TOTAL;
                        $profits           =  $total * TILE_LOTO * 1000;
                        $modelMoney->TOTAL = $currentMoney+$profits;
                        
                        $modelMoney->save();
                    }
                // echo '<pre>';print_r($modelMoney);
                // echo '<hr>';
            }
            
        }else{
            return "Bạn đã cộng tiền thành công cho các tài khoản chơi trúng loto ngày hôm nay";
        }
        $key   = self::KEY_CACHE_CONG_TIEN;
        \Yii::$app->cache->set($key, true);
        //SUA NAY PHAI GHI LOG LAI ra file
        return "Bạn đã cộng tiền thành công cho các tài khoản chơi trúng loto ngày hôm nay";
    }
}
