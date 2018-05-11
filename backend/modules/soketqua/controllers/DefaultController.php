<?php

namespace backend\modules\soketqua\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\ketQuaMienBac\models\KqxsMb;
/**
 * Default controller for the `so-ket-qua` module
 */
class DefaultController extends Controller
{
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {
    	
        $module  = Yii::$app->controller->module->id;
        $baseUrl = Yii::$app->params['baseUrl'];
        
        $date = date('Y-m-d');
        if(isset($_GET['date']) && $this->validateDate($_GET['date'])){
            $date = $_GET['date'];
        }
		$currentDate = date('Y-m-d');
		$time = date("H:i:s");
        if($date < $currentDate ||  ($date == $currentDate && $time >= "18:30:00" )){
        	//khong thay doi ngay
        }else{
        	 $time = strtotime($date) - (1*24*60*60);
        	 $date = date('Y-m-d',$time); 
        }
        $time = strtotime($date);
        $day =  date('l',$time);
         '<hr>';
         $fullDay =  Yii::$app->helper->nameDay($day).' '.date('d-m-Y',$time);

        // if()
        $model = new KqxsMb();

        $ketqua = KqxsMb::find()->where(['=','rs_date',$date." 00:00:00"])->one();
        return $this->render('index',[
			'fullDay' =>$fullDay,
			'model'   =>$model,
			'ketqua'  =>$ketqua,
        ]);
    }
     function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        
        return $d && $d->format($format) == $date;
    }
}
