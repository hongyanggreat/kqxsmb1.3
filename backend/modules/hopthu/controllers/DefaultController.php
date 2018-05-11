<?php

namespace backend\modules\hopthu\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\messenger\models\Messenge;
/**
 * Default controller for the `hopthu` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    const LIMIT = 10;
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex_()
    {

        $model = new Messenge();
        $idUser = Yii::$app->user->identity->ID;
        $dataMessages = Messenge::find()
                    ->where(['=','USER_RECEIVE',$idUser])
                    ->with([    // this is for the related models
                        'userSend' => function($query) {
                            $query->select(['ACC_ID','USERNAME','USER_TYPE']);
                        },
                    ])
                    // ->asArray()
                    // ->limit()
                    ->all();

        // echo '<pre>';
        // print_r($dataMessages);
        // die;
        return $this->render('index',['dataMessages'=>$dataMessages]);
    } 
    public function actionIndex()
    {

        $baseUrl = Yii::$app->params['baseUrl'];
        $module  = Yii::$app->controller->module->id;
        $page  = 1;
        $idUser = Yii::$app->user->identity->ID;    
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
       
        
        $offset = ($page-1)*(self::LIMIT);
        $count = 0;
        $count = Messenge::find()
                    ->where(['=','STATUS',0])
                    ->andWhere(['=','USER_RECEIVE',$idUser])
                    ->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
        ];

        $dataProviders = Messenge::find()
                        ->where(['=','STATUS',0])
                        ->andWhere(['=','USER_RECEIVE',$idUser])
                        ->with([    // this is for the related models
                            'userSend' => function($query) {
                                $query->select(['ACC_ID','USERNAME','USER_TYPE']);
                            },
                        ])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)->all();   
        return $this->render('index',[
            'dataProviders' =>$dataProviders,
            'myPagination'  =>$myPagination,
        ]);
    }
     public function actionNumbermess(){
        // $data   = ['status'=>false,'message'=>''];
        $idUser = Yii::$app->user->identity->ID; 
        $count  = Messenge::find()
                    ->where(['=','STATUS',0])
                    ->andWhere(['=','USER_RECEIVE',$idUser])
                    ->count();
        $data['numberMess'] =   $count;
        echo json_encode($data);
     } 
     public function actionDelete(){
        $data   = ['status'=>false,'message'=>''];
        $id = $_GET['id'];
        $idUser = Yii::$app->user->identity->ID; 
        $model  = Messenge::find()
                    ->where(['=','ID',$id])
                    ->andWhere(['=','USER_RECEIVE',$idUser])
                    ->one();

        if($model && $idUser == $model->USER_RECEIVE){
            $model->STATUS = 1;
            if($model->save()){
                $data['id'] = $model->ID;
                $data['status'] = true;
                $data['message'] = "Xóa tin nhắn thành công";
            }else{
                $data['message'] = "Lỗi xóa tin nhắn";
            }
        }else{
            $data['message'] = "Bạn không được phép thực hiện";
            return;
        }
        echo json_encode($data);
     }
}
