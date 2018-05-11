<?php

namespace backend\modules\quaythu\controllers;

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
        // die;
        $ketqua = [];
        return $this->render('index',[
            'ketqua'  =>$ketqua,
        ]);
    }
    public function actionProcess()
    {
        $this->layout = false;
        
            $rs_0_0   = Yii::$app->helper->RandomNumber(5);
            $rs_1_0   = Yii::$app->helper->RandomNumber(5);
            $rs_2_0   = Yii::$app->helper->RandomNumber(5);
            $rs_2_1   = Yii::$app->helper->RandomNumber(5);
            $rs_3_0   = Yii::$app->helper->RandomNumber(5);
            $rs_3_1   = Yii::$app->helper->RandomNumber(5);
            $rs_3_2   = Yii::$app->helper->RandomNumber(5);
            $rs_3_3   = Yii::$app->helper->RandomNumber(5);
            $rs_3_4   = Yii::$app->helper->RandomNumber(5);
            $rs_3_5   = Yii::$app->helper->RandomNumber(5);
            $rs_4_0   = Yii::$app->helper->RandomNumber(4);
            $rs_4_1   = Yii::$app->helper->RandomNumber(4);
            $rs_4_2   = Yii::$app->helper->RandomNumber(4);
            $rs_4_3   = Yii::$app->helper->RandomNumber(4);
            $rs_5_0   = Yii::$app->helper->RandomNumber(4);
            $rs_5_1   = Yii::$app->helper->RandomNumber(4);
            $rs_5_2   = Yii::$app->helper->RandomNumber(4);
            $rs_5_3   = Yii::$app->helper->RandomNumber(4);
            $rs_5_4   = Yii::$app->helper->RandomNumber(4);
            $rs_5_5   = Yii::$app->helper->RandomNumber(4);
            $rs_6_0   = Yii::$app->helper->RandomNumber(3);
            $rs_6_1   = Yii::$app->helper->RandomNumber(3);
            $rs_6_2   = Yii::$app->helper->RandomNumber(3);
            $rs_7_0   = Yii::$app->helper->RandomNumber(2);
            $rs_7_1   = Yii::$app->helper->RandomNumber(2);
            $rs_7_2   = Yii::$app->helper->RandomNumber(2);
            $rs_7_3   = Yii::$app->helper->RandomNumber(2);
            $total_rs = $rs_0_0.$rs_1_0.$rs_2_0.$rs_2_1.$rs_3_0.$rs_3_1.$rs_3_2.$rs_3_3.$rs_3_4.$rs_3_5.$rs_4_0.$rs_4_1.$rs_4_2.$rs_4_3.$rs_5_0.$rs_5_1.$rs_5_2.$rs_5_3.$rs_5_4.$rs_5_5.$rs_6_0.$rs_6_1.$rs_6_2.$rs_7_0.$rs_7_1.$rs_7_2.$rs_7_3;
       
        $ketqua = [
                'rs_0_0'    => $rs_0_0,
                'rs_1_0'    => $rs_1_0,
                'rs_2_0'    => $rs_2_0,
                'rs_2_1'    => $rs_2_1,
                'rs_3_0'    => $rs_3_0,
                'rs_3_1'    => $rs_3_1,
                'rs_3_2'    => $rs_3_2,
                'rs_3_3'    => $rs_3_3,
                'rs_3_4'    => $rs_3_4,
                'rs_3_5'    => $rs_3_5,
                'rs_4_0'    => $rs_4_0,
                'rs_4_1'    => $rs_4_1,
                'rs_4_2'    => $rs_4_2,
                'rs_4_3'    => $rs_4_3,
                'rs_5_0'    => $rs_5_0,
                'rs_5_1'    => $rs_5_1,
                'rs_5_2'    => $rs_5_2,
                'rs_5_3'    => $rs_5_3,
                'rs_5_4'    => $rs_5_4,
                'rs_5_5'    => $rs_5_5,
                'rs_6_0'    => $rs_6_0,
                'rs_6_1'    => $rs_6_1,
                'rs_6_2'    => $rs_6_2,
                'rs_7_0'    => $rs_7_0,
                'rs_7_1'    => $rs_7_1,
                'rs_7_2'    => $rs_7_2,
                'rs_7_3'    => $rs_7_3,
                'total_rs'  => $total_rs,
            ];
        // echo '<pre>';print_r($ketqua);
        // die;
        return $this->render('show',[
            'ketqua'  =>$ketqua,
        ]);
    }
     function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        
        return $d && $d->format($format) == $date;
    }
}
