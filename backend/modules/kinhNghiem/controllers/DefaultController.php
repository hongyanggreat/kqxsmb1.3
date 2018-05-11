<?php

namespace backend\modules\kinhNghiem\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\articles\models\Articles;
use backend\modules\categories\models\Categories;
/**
 * Default controller for the `kinhNghiem` module
 */
class DefaultController extends Controller
{
    const LIMIT = 30;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        $this->layout = "@app/views/layouts/frontend/layoutMain";
        $baseUrl = Yii::$app->params['baseUrl'];
        // $module  = Yii::$app->controller->module->id;
        $module  = Yii::$app->request->getPathInfo();
        $page  = 1;
        
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
       
        
        $offset = ($page-1)*(self::LIMIT);
        $count = 0;
        $count = Articles::find()->where(['CATE_ID'=>3])->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
        ];
        $categories = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>3])->andWhere(['STATUS'=>1])->one();
        if(!isset($categories) || !$categories){
            Yii::$app->response->redirect($baseUrl);
        }
        $dataProviders = Articles::find()
        				->select(['ID','TITLE','ALIAS','CATE_ID','DESCRIPTION'])
                        ->orderBy(['ID'=>SORT_DESC])
                        // ->with([    // this is for the related models
                        //         'parent' => function($query) {
                        //             $query->select(['ID','NAME','ALIAS']);
                        //         },
                        //     ])

                        ->where(['CATE_ID'=>3])
                        ->limit(self::LIMIT)
                        // ->asArray()
                        ->offset($offset)->all();   
        // echo '<pre>';           
        // print_r($myPagination);
        // print_r($categories);
        // print_r($dataProviders);
        return $this->render('index',[
            'categories'    =>$categories,
            'dataProviders' =>$dataProviders,
            'myPagination'  =>$myPagination,
        ]);
    }
     public function actionRefresh_page(){

        $this->layout = false;
        $page =0; 
        if(isset($_GET['page']) && $_GET['page'] > 0){
            $page =$_GET['page'];
        }
        if($page>0){
            $categories = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>3])->andWhere(['STATUS'=>1])->one();
            if(!isset($categories) || !$categories){
                Yii::$app->response->redirect($baseUrl);
            }
            $offset = ($page-1)*(self::LIMIT);

            $dataProviders = Articles::find()
            			->where(['CATE_ID'=>3])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)->all(); 
            return $this->render('refresh_page',[
                'dataProviders' =>$dataProviders,
                'categories'    =>$categories,
            ]);
        }else{
            echo "Bạn không được cấp quyền lấy dữ liệu";
        }

        //$offset = ($page-1)*(self::LIMIT);
     }
}
