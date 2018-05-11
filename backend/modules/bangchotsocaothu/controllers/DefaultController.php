<?php

namespace backend\modules\bangchotsocaothu\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\choiOnline\models\LotoOnline;


/**
 * Default controller for the `bangchotsocaothu` module
 */
class DefaultController extends Controller
{
    const LIMIT                = 2;
    // const LIMIT                = 20;
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
        $idUser = 0;
        if (!Yii::$app->user->isGuest) {
            $idUser = Yii::$app->user->identity->ID;
        }
        $module  = Yii::$app->request->getPathInfo();

        $baseUrl = Yii::$app->params['baseUrl'];
        $suffix = Yii::$app->params['suffix'];
        $date = date('Y-m-d');

        $page = 1;

        if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0){
            $page = $_GET['page'];
        }

        if(isset($_GET['date']) && Yii::$app->helper->validateDate($_GET['date'])){
            $date = $_GET['date'];
        }
        $offset = ($page-1)*(self::LIMIT);
        $modelLoto = LotoOnline::find()

                        // ->where(['ACC_ID'=>$idUser])
                        // ->andWhere(['>=','CREATED_AT', $date." 00:00:00"])
                        // ->andWhere(['<=','CREATED_AT', $date." 17:30:00"])
                        
                        ;
        $count        = $modelLoto->select(['ACC_ID'])->groupBy(['ACC_ID'])->count();
        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
            // 'action'      => $baseUrl.$module.'/lich-su',
        ];   
        if(isset($_GET['date']) && Yii::$app->helper->validateDate($_GET['date'])){
            $myPagination['queryString'] = "&date=".$date;
        }
        $accArrDatas = $modelLoto->select(['ACC_ID'])
                        ->asArray()
                        ->with([    // this is for the related models
                            'parent' => function($query) {
                                $query->select(['ACC_ID','USERNAME','USER_TYPE']);
                            },
                        ])
                        ->limit(self::LIMIT)
                        ->offset($offset)
                        ->all();
        $accArr = [];   
       
        if(isset($accArrDatas) && $accArrDatas){
            foreach ($accArrDatas as $key => $accArrData) {
                $accArr[$accArrData['ACC_ID']] = $accArrData['ACC_ID'];
            }
        }
          
        $historyLotos = $modelLoto
                                ->select('*')
                                ->andWhere(['in','ACC_ID',$accArr])
                                ->limit("")
                                ->orderBy(['ACC_ID'=>SORT_DESC])
                                ->asArray()
                                ->groupBy(['ID'])
                                ->all();    
        //  echo '<pre>';
        // print_r($historyLotos);
        // die;
        
        $dataProviders     = [];

        foreach ($accArr as $key => $value) {
           $lotoNumber = "";
           foreach ($historyLotos as $key => $historyLoto) {
                if($historyLoto['ACC_ID'] == $value){
                    $lotoNumber .= $historyLoto['LOTO_NUMBER'].',';
                }
           }
           $dataProviders[$value] = substr($lotoNumber, 0,-1);

        }
        
        return $this->render('index',[
                    'date'          =>$date,
                    'accArrDatas'   =>$accArrDatas,
                    'dataProviders' =>$dataProviders,
                    'myPagination'  =>$myPagination,
                ]);
    }
}
