<?php

namespace backend\modules\customizeWeb\controllers;


use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use backend\modules\customizeWeb\models\CustomizeWeb;
/**
 * Default controller for the `customizeWeb` module
 */
class DefaultController extends Controller
{
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

    public function actionSearch(){
        $model = new CustomizeWeb;
        if ($model->load(Yii::$app->request->post())) {


            $name        =  trim($model->NAME);

            if($model->CREATED_AT){
                $startTime = strtotime(trim($model->CREATED_AT));
            }
            if($model->CREATED_BY){
                 $endTime   = (int)strtotime(trim($model->CREATED_BY)) + 86400;
            }
            $arrayStatus = $model->STATUS;
           /* print_r($arrayStatus);
            die;*/
            //get limit : muon UPDATED_AT lam limit
            if($model->UPDATED_AT && $model->UPDATED_AT== 'all' ){
                $limit = "";
            }else{
                $limit = $model->UPDATED_AT;
            }
            if($model->TEXT_LIMIT && trim($model->TEXT_LIMIT) !="" ){
                $limit = $model->TEXT_LIMIT;
            }
            //Xap xep theo truong : muon DESCRIPTION
            if($model->DESCRIPTION && $model->DESCRIPTION){
                $order = $model->DESCRIPTION;
            }
            //Xap xep theo chieuf tang dan giam dan : muon  POSITION
            if($model->POSITION && $model->POSITION){
                $by = $model->POSITION;
            }
           
            $modelSearch = CustomizeWeb::find()
                         ->select([
                                'ID',
                                'NAME',
                                'TITLE',
                                'IMAGE',
                                'DESCRIPTION',
                                'STATUS',
                                'CREATED_AT',
                                'CREATED_BY',
                            ])
                          
                        ->asArray();
            //theo thoi gian
            if(isset($startTime) && $startTime ){
                $modelSearch->andWhere(['>=','CREATED_AT',$startTime]);
            }
            if(isset($endTime) && $endTime ){
                $modelSearch->andWhere(['<=','CREATED_AT',$endTime]);
            }

            if(isset($name) && !empty($name)){
               $modelSearch->andWhere(['like','NAME',$name]); 
            }
            if(isset($arrayStatus) && !empty($arrayStatus)){
               $modelSearch->andWhere(['in','STATUS',$arrayStatus]); 
            }else{
               $modelSearch->andWhere(['=','STATUS',100]); 
            }
            if(isset($limit) && $limit ){
                $modelSearch->limit($limit);
            }
            if($by == "DESC"){
                $modelSearch->orderBy([$order=>SORT_DESC]);
            }else{
                $modelSearch->orderBy([$order=>SORT_ASC]);
            }
            $dataProviders = $modelSearch->all();
           
            $this->createSsAccount($dataProviders);
            return $this->render('index', [
                'dataProviders' => $dataProviders,
                'model' => $model,
            ]);
        }else{
            return $this->redirect(['index']);
        }
    }
    public function actionIndex()
    {
        $model = new CustomizeWeb;
        if(isset($_GET['search'])){
            if ($model->load(Yii::$app->request->post())) {
              /*	print_r($_POST);
              	die;*/
                $name        =  trim($model->NAME);
                $startTime   = $endTime  = time();
                if($model->CREATED_AT){
                    $startTime = strtotime(trim($model->CREATED_AT));
                }
                if($model->CREATED_BY){
                     $endTime   = (int)strtotime(trim($model->CREATED_BY)) + 86400;
                }
                $arrayStatus = $model->STATUS;
                
                //get limit : muon UPDATED_AT lam limit
                if($model->UPDATED_AT && $model->UPDATED_AT== 'all' ){
                    $limit = "";
                }else{
                    $limit = $model->UPDATED_AT;
                }
                if($model->TEXT_LIMIT && trim($model->TEXT_LIMIT) !="" ){
                    $limit = $model->TEXT_LIMIT;
                }
               /* print_r($model->TEXT_LIMIT);
                die;*/
                //Xap xep theo truong : muon DESCRIPTION
                if($model->DESCRIPTION && $model->DESCRIPTION){
                    $order = $model->DESCRIPTION;
                }
                //Xap xep theo chieuf tang dan giam dan : muon  POSITION
                if($model->POSITION && $model->POSITION){
                    $by = $model->POSITION;
                }
               
                $modelSearch = CustomizeWeb::find()
                             ->select([
									'ID',
									'NAME',
									'TITLE',
									'IMAGE',
									'DESCRIPTION',
									'STATUS',
									'CREATED_AT',
									'CREATED_BY',
                                ])
                             
                            ->asArray();
                //theo thoi gian

                $modelSearch->andWhere(['>=','CREATED_AT',$startTime]);
                $modelSearch->andWhere(['<=','CREATED_AT',$endTime]);

                if(isset($name) && !empty($name)){
                   $modelSearch->andWhere(['like','NAME',$name]); 
                }
                if(isset($arrayStatus) && !empty($arrayStatus)){
                   $modelSearch->andWhere(['in','STATUS',$arrayStatus]); 
                }else{
                   $modelSearch->andWhere(['=','STATUS',100]); 
                }
                if(isset($limit) && $limit ){
                    $modelSearch->limit($limit);
                }
                if($by == "DESC"){
                    $modelSearch->orderBy([$order=>SORT_DESC]);
                }else{
                    $modelSearch->orderBy([$order=>SORT_ASC]);
                }
                $dataProviders = $modelSearch->all();


                //echo '<pre>';print_r($dataProviders);
                //die;
                $this->createSsAccount($dataProviders);
                return $this->render('index', [
                    'dataProviders' => $dataProviders,
                    'model' => $model,
                ]);
            }else{

                return $this->render('search', [
                    'model' => $model,
                ]);    
            }

        }else{
            $limit = 100;
            $page  = 1;
            if(isset($_GET['page']) && is_numeric($_GET['page'])){
                $page = $_GET['page'];
            }
            $offset = ($page-1)*$limit;
            $dataProviders = CustomizeWeb::find()
                            ->select([
                                    'ID',
                                    'NAME',
                                    'TITLE',
                                    //'IMAGE',
                                    'DESCRIPTION',
                                    'STATUS',
                                    'CREATED_AT',
                                    'CREATED_BY',
                                ])
                            
                            ->limit($limit)
                            ->offset($offset)
                            ->orderBy(['ID'=>SORT_DESC])
                            ->asArray()
                            ->all();
			/*echo '<pre>';print_r($dataProviders);                         
            die*/;
            $this->createSsAccount($dataProviders);
            return $this->render('index', [
                'dataProviders' => $dataProviders,
                'model' => $model,
            ]);
        }
    }
    function createSsAccount($data = []){
        $module             = Yii::$app->controller->module->id;
        $session            = Yii::$app->session;
        $ss_Seach           = 'ss_Seach'.$module;
        $session[$ss_Seach] = $data;
       
    }
    public function actionDownload(){

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
        if (($model = CustomizeWeb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionCreate()
    {
    	{
        $model = new CustomizeWeb();
        if ($model->load(Yii::$app->request->post())) {
            $idUser      = Yii::$app->user->id;
            $time        = time();
            $name        = trim($model->NAME);
            $title        = trim($model->TITLE);
            $description = trim($model->DESCRIPTION);
            

            $nameIcon = '';
            $fileIcon = UploadedFile::getInstance($model,'ICON');
            if(isset($fileIcon)){
                $nameIcon         = $time.'-icon.'.$fileIcon->extension;
            }

            $nameImage = '';
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            if(isset($fileImage)){
                $nameImage         = $time.'-image.'.$fileImage->extension;
            }

            $nameImageLogo = '';
            $fileImageLogo = UploadedFile::getInstance($model,'LOGO');
            if(isset($fileImageLogo)){
                $nameImageLogo         = $time.'-logo.'.$fileImage->extension;
            }
            
            $model->NAME             = htmlspecialchars($name);
            $model->TITLE            = htmlspecialchars($title);
            $model->DESCRIPTION      = htmlspecialchars($description);
            $model->WEBSITE_RELATION = htmlspecialchars(trim($model->WEBSITE_RELATION));
			
			$model->IMAGE      = $nameImage;
			$model->ICON       = $nameIcon;
			$model->LOGO       = $nameImageLogo;
			$model->CREATED_BY = $idUser;
			$model->CREATED_AT = $time ;
           /* echo '<pre>';print_r($model);
            die;*/
            if($model->save()){
                $id = $model->ID;
                $path = 'uploads/customize-web/';
                if(isset($fileIcon)){
                    Yii::$app->helper->saveImage($path,$fileIcon,'icon',$id,$nameIcon);
                }
                if(isset($fileImage)){
                    Yii::$app->helper->saveImage($path,$fileImage,'image',$id,$nameImage);
                }
                if(isset($fileImageLogo)){
                    Yii::$app->helper->saveImage($path,$fileImageLogo,'logo',$id,$nameImageLogo);
                }

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
    }
     public function actionUpdate($id)
    {


        $model = $this->findModel($id);
        //echo '<pre>';
        //print_r($model->PERFORMANCE_IMAGE);
        
        $image_current = $model->IMAGE;
        $icon_current  = $model->ICON;
        $logo_current  = $model->LOGO;

        if ($model->load(Yii::$app->request->post())) {
            $time              = time();
            $model->UPDATED_AT = $time;
            $model->UPDATED_BY = Yii::$app->user->id;

            $name        = trim($model->NAME);
            $title       = trim($model->TITLE);
            $description = trim($model->DESCRIPTION);

            $fileLogo  = UploadedFile::getInstance($model,'LOGO');
            $fileIcon  = UploadedFile::getInstance($model,'ICON');
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            //LOGO
            if(isset($fileLogo)){
                $nameImageLogo = $time.'-logo.'.$fileLogo->extension;
                $model->LOGO   =  $nameImageLogo;
            }else{
                $model->LOGO =  $logo_current;
            }
            
            //ICON
            if(isset($fileIcon)){
                $nameImageIcon = $time.'-icon.'.$fileIcon->extension;
                $model->ICON   =  $nameImageIcon;
            }else{
                $model->ICON =  $icon_current;
            }
            //IMAGE
            if(isset($fileImage)){
                $nameImage    = $time.'-image.'.$fileImage->extension;
                $model->IMAGE =  $nameImage;
                //$nameImage         = 'background.'.$fileImage->extension;
            }else{
                $model->IMAGE =  $image_current;
            }

            $model->NAME             = htmlspecialchars($name);
            $model->TITLE            = htmlspecialchars($title);
            $model->DESCRIPTION      = htmlspecialchars($description);
            $model->WEBSITE_RELATION = htmlspecialchars(trim($model->WEBSITE_RELATION));
            if($model->save()){
                $path = 'uploads/customize-web/';
                if(isset($fileLogo)){
                    Yii::$app->helper->deleteImage( $path,'logo',$id,$logo_current );
                    Yii::$app->helper->saveImage($path,$fileLogo,'logo',$id,$nameImageLogo);
                }
                if(isset($fileIcon)){
                    Yii::$app->helper->deleteImage( $path,'icon',$id,$icon_current );
                    Yii::$app->helper->saveImage($path,$fileIcon,'icon',$id,$nameImageIcon);
                }
                if(isset($fileImage)){
                    Yii::$app->helper->deleteImage( $path,'image',$id,$image_current );
                    Yii::$app->helper->saveImage($path,$fileImage,'image',$id,$nameImage);
                }
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
				'model' => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {
		/*$this->findModel($id)->delete();
		$path = 'uploads/categories/'.$id;
		FileHelper::removeDirectory($path);*/
        return $this->redirect(['index']);
    }
}
