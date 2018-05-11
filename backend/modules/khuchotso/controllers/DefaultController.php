<?php

namespace backend\modules\khuchotso\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\khuChotSoAd\models\Chotso;
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
    const LIMIT = 4;
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {
       
        $idUser = 0;
        if (Yii::$app->user->isGuest) {
            $message = "Tài khoản của bạn không đủ để truy cập vào khu chốt số.Vui lòng nạp tiền để truy cập";
            \Yii::$app->getSession()->setFlash('message', $message);
           return $this->redirect(['/nap-vip']);
        }

        $idUser     = Yii::$app->user->identity->ID;
        $modelMoney = MoneyVip::find()->where(['ACC_ID'=>$idUser])->one();
        $money      = $modelMoney->TOTAL;
        $dateExp = strtotime($modelMoney->DATE_EXP);
        if($dateExp <  time() ){
            $message = "Tài khoản của bạn không đủ để truy cập vào khu chốt số.Vui lòng nạp tiền để truy cập";
            \Yii::$app->getSession()->setFlash('message', $message);
           return $this->redirect(['/nap-vip']);
        }
        $baseUrl = Yii::$app->params['baseUrl'];
        // $module  = Yii::$app->controller->module->id;
        $module  = Yii::$app->request->getPathInfo();
        $model = new Chotso;
        $page  = 1;
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
        $offset = ($page-1)*(self::LIMIT);
        $count = Chotso::find()->count();
        $myPagination = [
            'totalPage' =>ceil($count/self::LIMIT),
            'page'      =>$page,
            'limit'     =>self::LIMIT,
            'action'    =>$baseUrl.$module,
        ];
   
         $dataProviders = Chotso::find()
                        ->with([    // this is for the related models
                            'parent' => function($query) {
                                $query->select(['ACC_ID','USERNAME','USER_TYPE']);
                            },
                        ])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)
                        ->all();
        return $this->render('index', [
            'dataProviders' => $dataProviders,
            'model'         => $model,
            'myPagination'  => $myPagination,
        ]);
    }
}
