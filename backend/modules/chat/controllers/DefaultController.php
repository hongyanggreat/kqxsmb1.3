<?php

namespace backend\modules\chat\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\modules\chat\models\Chat;
use backend\modules\messenger\models\Messenge;
/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    const LIMIT = 15;
     const KEY_CACHE_CHAT = "_kqxs_AutoChat";
    // public function behaviors()
    // {
    //     // $actions   = Yii::$app->acl->getRole();
    //     $actions = [];
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             [
    //                 'actions' => ['login'],
    //                 'allow' => true,
    //             ],
    //             'rules' => [
    //                 [
    //                     'actions' => $actions,
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }
    public function actionIndex()
    {
        echo date('H:i:s d-m-Y',1512750075);
        die;
        $this->layout = "@app/views/layouts/frontend/layoutMain";
        $baseUrl = Yii::$app->params['baseUrl'];
        $module  = Yii::$app->controller->module->id;
        $page  = 1;
        
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
       
        
        $offset = ($page-1)*(self::LIMIT);
        $count = 0;
        $count = Chat::find()->where(['PARENT_ID'=>0])->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
        ];
        
        $dataProviders = Chat::find()
                        ->orderBy(['ID'=>SORT_DESC])
                        ->where(['PARENT_ID'=>0])
                        ->with([    // this is for the related models
                            'parent' => function($query) {
                                $query->select(['ACC_ID','USERNAME','USER_TYPE']);
                            },
                        ])
                        ->limit(self::LIMIT)
                        // ->asArray()
                        ->offset($offset)->all();   
        // echo '<pre>';           
        // print_r($myPagination);
        // print_r($dataProviders);
        return $this->render('index',[
            'dataProviders' =>$dataProviders,
            'myPagination'  =>$myPagination,
        ]);
    }
     public function actionShow(){
        $this->layout = false;
        if(isset($_GET['show']) && $_GET['show']){
           $dataProviders = Chat::find()
                                ->where(['PARENT_ID'=>0])
                                ->with([    // this is for the related models
                                    'parent' => function($query) {
                                        $query->select(['ACC_ID','USERNAME','USER_TYPE','IMAGE']);
                                    },
                                ])
                                ->with([    // this is for the related models
                                    'money' => function($query) {
                                        $query->select(['ACC_ID','TOTAL']);
                                    },
                                ])
                                ->with([    // this is for the related models
                                    'contentChild' => function($query) {
                                        $query->select(['ID','ACC_ID','PARENT_ID','MESSAGE','CREATED_AT'])
                                                    
                                                    ->limit(5)
                                                ;
                                    },
                                ])
                                ->orderBy(['ID'=>SORT_DESC])
                                // ->asArray()
                                ->limit(self::LIMIT)
                                ->all();
                               // echo '<pre>'; print_r($dataProviders);
                                // die;
            return $this->render('show', [
                'dataProviders' => $dataProviders,
            ]);
        }
     }
     public function actionTraloi(){
        $data = [
            'status'=>false,
            'message'=>"",
        ];
        if (!Yii::$app->user->isGuest) {
            if(isset($_GET['txtChat'])){
                $idParent = 0;
                if(isset($_GET['idParent']) && is_numeric($_GET['idParent']) && $_GET['idParent'] >0){
                    $idParent = $_GET['idParent'];
                }
                $txtChat = $_GET['txtChat'];
                $model             = new Chat;
                $model->ACC_ID     = Yii::$app->user->identity->ID;
                $model->MESSAGE    = htmlspecialchars($txtChat);
                $model->PARENT_ID  = $idParent;
                $model->CREATED_AT = time();
                if($model->save()){
                    $data['status'] = true;
                    $data['message'] = "Thành công";
                }else{
                    // print_r($model->getErrors());
                    $data['message'] = "Lỗi xảy ra";
                }
            }else{
                $data['message'] = "Không có dữ liệu";
            }
        }else{
             $data['message'] = "Bạn chưa đăng nhập";
        }
        echo json_encode($data);
     } 
     public function actionMessage(){
        $data = [
            'status'=>false,
            'message'=>"",
        ];

     	if (!Yii::$app->user->isGuest) {
            if(isset($_GET['txtChat'])){
                $idParent = 0;
                if(isset($_GET['idParent']) && is_numeric($_GET['idParent']) && $_GET['idParent'] >0){
                    $idParent = $_GET['idParent'];
                }
                $idUser              = Yii::$app->user->id;
                $txtChat             = $_GET['txtChat'];
                $data['idParent']    = $idParent;
                $data['idUser']      = $idUser;
                $data['txtChat']     = $txtChat;
                $model               = new Messenge;
                $model->USER_SENT    = Yii::$app->user->identity->ID;
                $model->MESSAGE      = htmlspecialchars($txtChat);
                $model->USER_RECEIVE = $idParent;
                $model->STATUS = 0;
                $model->CREATE_DATE = date('Y-m-d H:i:s');
                if($model->save()){
                    $data['status'] = true;
                    $data['message'] = "Gửi tin nhắn thành công";
                }else{
                    // print_r($model->getErrors());
                    $data['message'] = "Lỗi xảy ra";
                }
            }else{
                $data['message'] = "Không có dữ liệu";
            }
        }else{
             $data['message'] = "Bạn chưa đăng nhập";
        }
        echo json_encode($data);
     }
    public function actionEnable(){
        
         $k   = self::KEY_CACHE_CHAT;
        \Yii::$app->cache->delete($k);
        return;
    }
    public function actionDisable(){
         $k   = self::KEY_CACHE_CHAT;
        \Yii::$app->cache->set($k, true);
        return;
    }
    public function actionPermission(){
        $permission = "on";
        $k   = self::KEY_CACHE_CHAT;
        $cache =   \Yii::$app->cache->get($k);
        if($cache){
            $permission = "off";
        }
        $data = ['status','message','permission'=>$permission];
        echo json_encode($data);
    }
}
