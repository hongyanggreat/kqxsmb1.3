<?php

namespace backend\modules\tags\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\articles\models\Articles;
use backend\modules\categories\models\Categories;
/**
 * Default controller for the `tags` module
 */
class DefaultController extends Controller
{
    const LIMIT = 20;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex($alias){
        $aliasName = str_replace("-", " ", $alias);    

        $baseUrl = Yii::$app->params['baseUrl'];
        $module  = Yii::$app->controller->module->id;
        $page  = 1;
        
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
       
        
        $offset = ($page-1)*(self::LIMIT);
        $count = 0;
        $count = Articles::find()->where(['like','TAG',$aliasName])->count();
        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module.'/'.$alias,
        ];
      
        $dataProviders = Articles::find()
                        ->select(['ID','TITLE','ALIAS','CATE_ID','DESCRIPTION'])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->with([    // this is for the related models
                                'parent' => function($query) {
                                    $query->select(['ID','NAME','ALIAS']);
                                },
                            ])

                        ->where(['like','TAG',$aliasName])
                        ->limit(self::LIMIT)
                        // ->asArray()
                        ->offset($offset)->all();   

        return $this->render('index',[
            'alias' =>$alias,
            'aliasName' =>$aliasName,
            'dataProviders' =>$dataProviders,
            'myPagination'  =>$myPagination,
        ]);
    }
     public function actionRefresh_page(){


        $this->layout = false;
        $page =0; 
        $aliasName =""; 
        if(isset($_GET['page']) && $_GET['page'] > 0){
            $page =$_GET['page'];
        }
        if(isset($_GET['aliasName']) && $_GET['aliasName']){
            $aliasName =$_GET['aliasName'];
        }
        if($page>0 && $aliasName){
            
            $offset = ($page-1)*(self::LIMIT);

            $dataProviders = Articles::find()
                        ->with([    // this is for the related models
                                'parent' => function($query) {
                                    $query->select(['ID','NAME','ALIAS']);
                                },
                            ])

                        ->where(['like','TAG',$aliasName])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)->all(); 
            return $this->render('refresh_page',[
                'dataProviders' =>$dataProviders,
            ]);
        }else{
            echo "Bạn không được cấp quyền lấy dữ liệu";
        }

        //$offset = ($page-1)*(self::LIMIT);
     }
}
