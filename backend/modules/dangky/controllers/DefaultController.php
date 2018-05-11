<?php

namespace backend\modules\dangky\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\dangky\models\Accounts;
use backend\modules\money\models\Money;
/**
 * Default controller for the `dang-ky` module
 */
class DefaultController extends Controller
{
     public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {
        $baseUrl = yii::$app->params['baseUrl'];
        $suffix = yii::$app->params['suffix'];
    	$model = new Accounts();

    	if ($model->load(Yii::$app->request->post())) {
           
            $pass = '';
            $auth_key = '';
            if(isset($model->PASSWORD) && trim($model->PASSWORD) !=""){
                $pass               = Yii::$app->security->generatePasswordHash($model->PASSWORD);
                $auth_key           = Yii::$app->security->generateRandomString();
            }
            $model->PASSWORD    = $pass;
            $model->AUTH_KEY    = $auth_key;

            $model->CP_CODE     = strtoupper(Yii::$app->helper->RandomString(5));
            
            if(isset(Yii::$app->user->id)){
            	$idUser             = (int) Yii::$app->user->id;
            }else{
            	$idUser = 1;
            }
			$model->PARENT_ID   = $idUser;
			$model->CREATE_BY   = $idUser;
			$time               = time();
			$model->CREATE_DATE = $time ;
			$model->USER_TYPE   = 0;
			$model->STATUS      = 1;

            if($model->save()){
               
               //DANG KY THANH CONG CONG TIEN CHO TAI KHOAN LA 1 trieu dong .
               $modelMoney = new Money;
               
               $modelMoney->ACC_ID = $model->ACC_ID;
               $modelMoney->TOTAL = 1000000;
               $modelMoney->STATUS = 1;
               if($modelMoney->save()){
                  return $this->redirect($baseUrl.'dang-nhap'.$suffix);
               }else{
                  return $this->redirect($baseUrl.'xu-ly-loi-khi-chua-cong-tien-cho-tk-moi'.$suffix);
               }

            }else{
            	// echo '<pre>';
            	// print_r($model->getErrors());
                 $model->PASSWORD = "";
                 $model->RE_PASSWORD = "";
                return $this->render('index', [
                   'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
        
    }
}
