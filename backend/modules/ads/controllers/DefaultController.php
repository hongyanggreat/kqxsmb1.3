<?php

namespace backend\modules\ads\controllers;

use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;

use backend\modules\categories\models\Categories;
use backend\modules\ads\models\Ads;
/**
 * Default controller for the `categories` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    const LIMIT = 100;
    // public function behaviors()
    // {
    //     $actions   = Yii::$app->acl->getRole();
    //     $actions[] = 'search';
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
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
     public function actions()
    {
        $this->layout = "@app/views/layouts/layoutTable";
    }

    
    public function actionIndex()
    {
            $module  = Yii::$app->controller->module->id;
            $baseUrl = Yii::$app->params['baseUrl'];
            $page  = 1;
            if(isset($_GET['page']) && is_numeric($_GET['page'])){
                $page = $_GET['page'];
            }
            $offset = ($page-1)*(self::LIMIT);
            $count = Ads::find()->count();
            $myPagination = [
                'totalPage' =>ceil($count/self::LIMIT),
                'page'      =>$page,
                'limit'     =>self::LIMIT,
                'action'    =>$baseUrl.$module,
            ];
            $dataProviders = Ads::find()
                            ->limit(self::LIMIT)
                            ->offset($offset)
                            ->orderBy(['ID'=>SORT_DESC])
                            ->asArray()
                            ->all();
            return $this->render('index', [
                'dataProviders' => $dataProviders,
                'myPagination'  => $myPagination,
            ]);
    }
    
   
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
      protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionCreate()
    {

        $module    = Yii::$app->controller->module->id;
        $baseUrl   = Yii::$app->params['baseUrl'];
        
		$model    = new Ads();
		
        if ($model->load(Yii::$app->request->post())) {
            $idUser      = Yii::$app->user->id;
            $name        = trim($model->NAME);
            $description = trim($model->DESCRIPTION);

            
            $link = trim($model->LINK);
            $model->NAME        = htmlspecialchars($name);
            $model->LINK        = htmlspecialchars($link);
            $model->DESCRIPTION = htmlspecialchars($description);
			
			$model->CREATE_BY   = $idUser;
			$model->CREATE_AT   = date("Y-m-d H:i:s") ;
            // echo '<pre>';print_r($model);
            // die;
            if($model->save()){
                $id = $model->ID;
                
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('create', [
                   'model' => $model,
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
            $time        = time();
            $name        = trim($model->NAME);
            $link        = trim($model->LINK);
            $description = trim($model->DESCRIPTION);
           

            $idUser      = Yii::$app->user->id;
            $time        = time();
            $name        = trim($model->NAME);
            $description = trim($model->DESCRIPTION);
            
            $model->NAME        = htmlspecialchars($name);
			$model->LINK        = htmlspecialchars($link);
			$model->DESCRIPTION = htmlspecialchars($description);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('update', [
					'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model'    => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {
        $module      = Yii::$app->controller->module->id;
        $baseUrl     = Yii::$app->params['baseUrl'];
        $suffix      = Yii::$app->params['suffix'];
        $urlCallBack = $baseUrl.$module.$suffix;

        return $this->redirect($urlCallBack);
    }
   
}
