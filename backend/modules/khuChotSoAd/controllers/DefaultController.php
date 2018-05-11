<?php

namespace backend\modules\khuChotSoAd\controllers;
use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use backend\modules\khuChotSoAd\models\Chotso;

/**
 * Default controller for the `khuChotSoAd` module
 */
class DefaultController extends Controller
{
     const LIMIT = 100;
    /**
     * Renders the index view for the module
     * @return string
     */
     public function actions()
    {
        $this->layout = "@app/views/layouts/layoutTable";
    }
     public function behaviors()
    {
        $actions = Yii::$app->acl->getRole();
        // $actions = [];
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => $actions,
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $module  = Yii::$app->controller->module->id;
        $baseUrl = Yii::$app->params['baseUrl'];
        $model = new Chotso;
        if ($model->load(Yii::$app->request->post())) {

            // $dataProviders = [];
            
            // $modelSearch = Chotso::find()
            //             ->asArray();
            // $title        =  trim($model->TITLE);
            // if(isset($title) && !empty($title)){
            //    $modelSearch->andWhere(['like','tbl_articles.TITLE',$title]); 
            // }
            

            // if($model->TIME_START){
            //     $startTime = strtotime(trim($model->TIME_START));
            //     $modelSearch->andWhere(['>=','tbl_articles.CREATED_AT',$startTime]);
            // }
            // if($model->TIME_END){
            //     $endTime = (int)strtotime(trim($model->TIME_END)) + 86400;
            //     $modelSearch->andWhere(['<=','tbl_articles.CREATED_AT',$endTime]);
            // }
            // if($model->LIMIT_SELECT && $model->LIMIT_SELECT== 'all' ){
            //     $limit = "";
            // }else{
            //     $limit = $model->LIMIT_SELECT;
            // }
            // if($model->TEXT_LIMIT && trim($model->TEXT_LIMIT) !="" ){
            //     $limit = $model->TEXT_LIMIT;
            // }
            // if(isset($limit) && $limit ){
            //     $modelSearch->limit($limit);
            // }

            // //Xap xep theo truong : muon ARRANGE_FIELD
            // if($model->ARRANGE_FIELD && $model->ARRANGE_FIELD){
            //     $order = $model->ARRANGE_FIELD;
            // }
            // //Xap xep theo chieu tang dan giam dan : muon  ARRANGE_BY
            // if($model->ARRANGE_BY && $model->ARRANGE_BY){
            //     $by = $model->ARRANGE_BY;
            // }
            // if($by == "DESC"){
            //     $modelSearch->orderBy([$order=>SORT_DESC]);
            // }else{
            //     $modelSearch->orderBy([$order=>SORT_ASC]);
            // }
            // $dataProviders = $modelSearch->all();
            // $myPagination = [
            //     'totalPage' =>0,
            // ];
        }else{
            

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
                            ->orderBy(['ID'=>SORT_DESC])
                            ->limit(self::LIMIT)
                            ->offset($offset)
                            ->all();
        }
        return $this->render('index', [
            'dataProviders' => $dataProviders,
            'model'         => $model,
            'myPagination'  => $myPagination,
        ]);
    }
    public function actionCreate()
    {
        $model     = new Chotso();
        
        if ($model->load(Yii::$app->request->post())) {
            $idUser      = Yii::$app->user->id;
            $content        = trim($model->CONTENT);

            $status = $model->STATUS;
            if($status == ""){
                $status = 0;
            }
           

            $model->CONTENT      = htmlspecialchars($content);
            $model->STATUS       = $status;
            $model->ACC_ID       = $idUser;
            $model->CREATED_AT   = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect(['index']);
            }else{
                return $this->render('create', [
                    'model'          => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpdate($id)
    {
        $module    = Yii::$app->controller->module->id;
        $baseUrl   = Yii::$app->params['baseUrl'];
        $model = $this->findModel($id);
      
        if ($model->load(Yii::$app->request->post())) {
            $idUser      = Yii::$app->user->id;
            $content        = trim($model->CONTENT);
            $status = $model->STATUS;
            if($status == ""){
                $status = 0;
            }
            $model->CONTENT   = htmlspecialchars($content);
            $model->STATUS    = $status;
            $model->UPDATE_BY = $idUser;
            $model->UPDATE_AT = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect(['index']);
            }else{
                return $this->render('update', [
                    'model'          => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model'    => $model,
            ]);
        }
    }
      protected function findModel($id)
    {
        if (($model = Chotso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
