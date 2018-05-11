<?php

namespace backend\modules\categories\controllers;

use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;

use backend\modules\categories\models\Categories;
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
    public function behaviors()
    {
        $actions   = Yii::$app->acl->getRole();
        $actions[] = 'search';
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
            $count = Categories::find()->count();
            $myPagination = [
                'totalPage' =>ceil($count/self::LIMIT),
                'page'      =>$page,
                'limit'     =>self::LIMIT,
                'action'    =>$baseUrl.$module,
            ];
            $dataProviders = Categories::find()
                            ->select([
                                    'ID',
                                    'NAME',
                                    'ALIAS',
                                    'IMAGE',
                                    'DESCRIPTION',
                                    'CATE_PARENT',
                                    'STATUS',
                                    'CREATED_AT',
                                    'CREATED_BY',
                                ])
                            ->with([    // this is for the related models
                                'parent' => function($query) {
                                    $query->select(['ID','NAME']);
                                },
                            ])
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
    
    public function actionDownload(){
        // echo 'Chưa cần thiết';
        $module   = Yii::$app->controller->module->id;
        $session  = Yii::$app->session;
        $ss_Seach = 'ss_Seach'.$module;
        $data     = $session[$ss_Seach];
       //echo '<pre>';print_r($data);
        //die;

        $fileName = $module;
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream'); 
        header('Content-Disposition: attachment; filename='.$fileName.'.csv');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo "\xEF\xBB\xBF"; // UTF-8 BOM

        $field1 = "ID";
        $field2 = "Tên danh mục";
        $field3 = "Tên định danh";
        $field4 = "Miêu tả";
        //$field5 = "Hình ảnh";
        $field6 = "Parent";
        $field7 = "Trạng thái";
        $field8 = "Người tạo";
        $field9 = "Ngày tạo";
        $str = $field1;
     		$str .=", ".$field2;
     		$str .= ",".$field3;
     		$str .= ", ".$field4;
     		//$str .= ",".$field5;
     		$str .= ",".$field6;
     		$str .= ",".$field7;
     		$str .= ",".$field8;
     		$str .= ",".$field9;
     		$str .= "\n";
        echo $str ;
       //  die;
        if(isset($data) && $data){
            foreach($data as $item){
                //print_r($item);
                //die;
                $status      = $item['STATUS'];   
                switch ($status) {
                  case '0':
                    $status = 'Chưa kích hoạt';
                    break;
                  case '1':
                    $status = 'Kích hoạt';
                   # code...
                   break;
                  case '2':
                    $status = 'Hủy kích hoạt';
                   # code...
                   break;
                  
                  default:
                    $status = '---';
                    # code...
                    break;
                }
                $value1 = '"'.$item["ID"].'"';
                $value2 = '"'.$item["NAME"].'"';
                $value3 = '"'.$item["ALIAS"].'"';
                $value4 = '"'.$item["DESCRIPTION"].'"';
                //$value5 = '"'.$item["IMAGE"].'"';
                $value6 = '"'.$item["parent"]['NAME'].'"';
                $value7 = '"'.$status.'"';
                $value8 = '"'.$item["CREATED_BY"].'"';
                $value9 = '"'.$item["CREATED_AT"].'"';
                $str = $value1;
             		$str .= ",".$value2;
             		$str .= ",".$value3;
             		$str .= ",".$value4;
             		//$str .= ",".$value5;
             		$str .= ",".$value6;
             		$str .= ",".$value7;
             		$str .= ",".$value8;
             		$str .= ",".$value9;
             		$str .= "\n";
             	echo $str;
            }
        }else{
            echo $str = 'Dữ liệu trống';
        }
        $session->remove($ss_Seach);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
      protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionCreate()
    {

        $module    = Yii::$app->controller->module->id;
        $baseUrl   = Yii::$app->params['baseUrl'];
        
		$model    = new Categories();
		$dataCate = [];
		$dataCate = $model->getCategories();

        if(isset($dataCate) && $dataCate){
            array_unshift($dataCate,"Chọn Danh mục");
        }else{
            $dataCate = ["Chọn danh mục"];
        }
        // print_r($dataCate);
        // die;

        if ($model->load(Yii::$app->request->post())) {
            $idUser      = Yii::$app->user->id;
            $time        = time();
            $name        = trim($model->NAME);
            $description = trim($model->DESCRIPTION);
            
            $alias       = trim($model->ALIAS);
            if(isset($alias) && $alias !=""){
                $alias = Yii::$app->helper->changeTitle($alias);
            }else{
                if(!empty($name)){
                    $alias = Yii::$app->helper->changeTitle($name);
                }
            }
           

            $nameImage = '';
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            if(isset($fileImage)){
                $nameImage         = $time.'-'.$alias.'.'.$fileImage->extension;
            }
            
			$model->NAME = htmlspecialchars($name);
			$model->ALIAS        = $alias;
			$model->DESCRIPTION  = htmlspecialchars($description);
			
			$model->IMAGE        = $nameImage;
			$model->CREATED_BY   = $idUser;
			$model->CREATED_AT   = $time ;
           /* echo '<pre>';print_r($model);
            die;*/
            if($model->save()){
                $id = $model->ID;
                $path = 'uploads/categories/';
               
                if(isset($fileImage)){
                    Yii::$app->helper->saveImage($path,$fileImage,'image',$id,$nameImage);
                }
                
                // $urlCallBack = $baseUrl.$module.'/view?id='.$model->ID;
                // return $this->redirect(['view', 'id' => $model->ID]);
                // return $this->redirect($urlCallBack);
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('create', [
                   'model' => $model,
                   'dataCate' => $dataCate,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataCate' => $dataCate,
            ]);
        }
    }
     public function actionUpdate($id)
    {

        $module    = Yii::$app->controller->module->id;
        $baseUrl   = Yii::$app->params['baseUrl'];
        $model = $this->findModel($id);

        //echo '<pre>';
        //print_r($model->PERFORMANCE_IMAGE);
		
        $dataCate = $model->getCategories();
        
        if(isset($dataCate) && $dataCate){
            array_unshift($dataCate,"Chọn Danh mục");
        }else{
            $dataCate = ["Chọn danh mục"];
        }
        
        $image_current = $model->IMAGE;
        
        if ($model->load(Yii::$app->request->post())) {
            
            $idUser      = Yii::$app->user->id;
            $time        = time();
            $name        = trim($model->NAME);
            $description = trim($model->DESCRIPTION);
            
            $alias       = trim($model->ALIAS);
            
            if(isset($alias) && $alias !=""){
                $alias = Yii::$app->helper->changeTitle($alias);
            }else{
                if(!empty($name)){
                    $alias = Yii::$app->helper->changeTitle($name);
                }
            }


            $idUser      = Yii::$app->user->id;
            $time        = time();
            $name        = trim($model->NAME);
            $description = trim($model->DESCRIPTION);
            
            $alias       = trim($model->ALIAS);
            if(isset($alias) && $alias !=""){
                $alias = Yii::$app->helper->changeTitle($alias);
            }else{
                if(!empty($name)){
                    $alias = Yii::$app->helper->changeTitle($name);
                }
            }
            
            //IMAGE
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            if(isset($fileImage)){
				$nameImage = $time.'-'.$alias.'.'.$fileImage->extension;
            }else{
				$nameImage =  $image_current;
            }

			$model->NAME        = htmlspecialchars($name);
			$model->ALIAS       = $alias;
			$model->DESCRIPTION = htmlspecialchars($description);
			$model->IMAGE       = $nameImage;
            if($model->save()){
                $id = $model->ID;
                $path = 'uploads/categories/';
                if(isset($fileImage)){
                    Yii::$app->helper->deleteImage( $path,'image',$id,$image_current );
                    Yii::$app->helper->saveImage( $path,$fileImage,'image',$id,$nameImage );
                    //echo '<pre>';print_r($fileImage);
                }
                // $urlCallBack = $baseUrl.$module.'/view?id='.$model->ID;
                // return $this->redirect($urlCallBack);
                // return $this->redirect(['view', 'id' => $model->ID]);
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('update', [
					'model' => $model,
					'dataCate' => $dataCate,
                ]);
            }
        } else {
            return $this->render('update', [
                'dataCate' => $dataCate,
                'model'    => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {
        $module    = Yii::$app->controller->module->id;
        $baseUrl   = Yii::$app->params['baseUrl'];
        $suffix   = Yii::$app->params['suffix'];
        $urlCallBack = $baseUrl.$module.$suffix;

        $this->findModel($id)->delete();
        $path = 'uploads/categories/'.$id;
        FileHelper::removeDirectory($path);
        // return $this->redirect(['index']);
        return $this->redirect($urlCallBack);
    }
}
