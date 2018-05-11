<?php

namespace backend\modules\articles\controllers;
use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use backend\modules\articles\models\Articles;
use backend\modules\categories\models\Categories;


/**
 * Default controller for the `articles` module
 */
class DefaultController extends Controller
{
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
        $model = new Articles;
        if ($model->load(Yii::$app->request->post())) {

            $dataProviders = [];
            
            $modelSearch = Articles::find()
                         ->select([
                                'tbl_articles.ID',
                                'tbl_articles.TITLE',
                                'tbl_articles.ALIAS',
                                'tbl_articles.IMAGE',
                                'tbl_articles.DESCRIPTION',
                                'tbl_articles.CATE_ID',
                                'tbl_articles.STATUS',
                                'tbl_articles.CREATED_AT',
                                'tbl_articles.CREATED_BY',
                                'c.NAME as CATE_NAME',
                                'c.ALIAS as ALIAS_CATE',
                            ])
                         ->leftJoin('tbl_categories c', 'c.ID=tbl_articles.CATE_ID')

                         /* ->with([    // this is for the related models
                                'parent' => function($query) {
                                    $query->select(['ID','NAME']);
                                },
                            ])*/
                        ->asArray();
            $title        =  trim($model->TITLE);
            if(isset($title) && !empty($title)){
               $modelSearch->andWhere(['like','tbl_articles.TITLE',$title]); 
            }
            

            if($model->TIME_START){
                $startTime = strtotime(trim($model->TIME_START));
                $modelSearch->andWhere(['>=','tbl_articles.CREATED_AT',$startTime]);
            }
            if($model->TIME_END){
                $endTime = (int)strtotime(trim($model->TIME_END)) + 86400;
                $modelSearch->andWhere(['<=','tbl_articles.CREATED_AT',$endTime]);
            }
            if($model->LIMIT_SELECT && $model->LIMIT_SELECT== 'all' ){
                $limit = "";
            }else{
                $limit = $model->LIMIT_SELECT;
            }
            if($model->TEXT_LIMIT && trim($model->TEXT_LIMIT) !="" ){
                $limit = $model->TEXT_LIMIT;
            }
            if(isset($limit) && $limit ){
                $modelSearch->limit($limit);
            }

            //Xap xep theo truong : muon ARRANGE_FIELD
            if($model->ARRANGE_FIELD && $model->ARRANGE_FIELD){
                $order = $model->ARRANGE_FIELD;
            }
            //Xap xep theo chieu tang dan giam dan : muon  ARRANGE_BY
            if($model->ARRANGE_BY && $model->ARRANGE_BY){
                $by = $model->ARRANGE_BY;
            }
            if($by == "DESC"){
                $modelSearch->orderBy([$order=>SORT_DESC]);
            }else{
                $modelSearch->orderBy([$order=>SORT_ASC]);
            }
            $dataProviders = $modelSearch->all();
            $myPagination = [
                'totalPage' =>0,
            ];
        }else{
            

            $page  = 1;
            if(isset($_GET['page']) && is_numeric($_GET['page'])){
                $page = $_GET['page'];
            }
            $offset = ($page-1)*(self::LIMIT);
            $count = Articles::find()->count();
            $myPagination = [
                'totalPage' =>ceil($count/self::LIMIT),
                'page'      =>$page,
                'limit'     =>self::LIMIT,
                'action'    =>$baseUrl.$module,
            ];
       
             $dataProviders = Articles::find()
                             ->select([
                                'tbl_articles.ID',
                                'tbl_articles.TITLE',
                                'tbl_articles.ALIAS',
                                'tbl_articles.IMAGE',
                                'tbl_articles.DESCRIPTION',
                                'tbl_articles.CATE_ID',
                                'tbl_articles.STATUS',
                                'tbl_articles.CREATED_AT',
                                'tbl_articles.CREATED_BY',
                                'c.NAME as CATE_NAME',
                                'c.ALIAS as ALIAS_CATE',
                            ])
                            ->leftJoin('tbl_categories c', 'c.ID=tbl_articles.CATE_ID')
                            ->asArray()
                            // ->leftJoin('tbl_user_service us', 'us.CODE_GAME=tbl_9505_request.GAME_CODE')
                            ->orderBy(['ID'=>SORT_DESC])
                            ->limit(self::LIMIT)
                            ->offset($offset)
                            ->all();
        }
        Yii::$app->helper->createSsAccount($dataProviders);
        return $this->render('index', [
            'dataProviders' => $dataProviders,
            'model'         => $model,
            'myPagination'  => $myPagination,
        ]);
    }
   
   
    public function actionDownload(){

        $module   = Yii::$app->controller->module->id;
        $session  = Yii::$app->session;
        $ss_Seach = 'ss_Seach'.$module;
        $data     = $session[$ss_Seach];
       /*echo '<pre>';print_r($data);
        die;
*/
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
        $field2 = "Tên bài viết";
        $field3 = "Tên định danh";
        $field4 = "Miêu tả";
        //$field5 = "Hình ảnh";
        //$field6 = "Parent";
        $field7 = "Trạng thái";
        $field8 = "Người tạo";
        $field9 = "Ngày tạo";
        $str = $field1;
     		$str .=", ".$field2;
     		$str .= ",".$field3;
     		$str .= ", ".$field4;
     		//$str .= ",".$field5;
     		//$str .= ",".$field6;
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
                $value2 = '"'.$item["TITLE"].'"';
                $value3 = '"'.$item["ALIAS"].'"';
                $value4 = '"'.$item["DESCRIPTION"].'"';
                //$value5 = '"'.$item["IMAGE"].'"';
                //$value6 = '"'.$item["parent"]['NAME'].'"';
                $value7 = '"'.$status.'"';
                $value8 = '"'.$item["CREATED_BY"].'"';
                $value9 = '"'.$item["CREATED_AT"].'"';
                $str = $value1;
             		$str .= ",".$value2;
             		$str .= ",".$value3;
             		$str .= ",".$value4;
             		//$str .= ",".$value5;
             		//$str .= ",".$value6;
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
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionCreate()
    {
		$model     = new Articles();
		$modelCate = new Categories();
		
		$dataCate = $modelCate->getCategories();
        if ($model->load(Yii::$app->request->post())) {
           $time        = time();
            $idUser      = Yii::$app->user->id;
            
            $alias       = trim($model->ALIAS);
            $name        = trim($model->TITLE);
            $description = trim($model->DESCRIPTION);
            $metaKeyword = trim($model->META_KEYWORD);


            if(isset($alias) && $alias !=""){
                $alias = Yii::$app->helper->changeTitle($alias);
            }else{
                if(!empty($name)){
                    $alias = Yii::$app->helper->changeTitle($name);
                }
            }
            $status = $model->STATUS;
            if($status == ""){
                $status = 0;
            }
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            $nameImage = '';
            if(isset($fileImage)){
                $nameImage         = $time.'-'.$alias.'.'.$fileImage->extension;
            }

			$model->TITLE        = htmlspecialchars($name);
			$model->ALIAS        = $alias;
			$model->IMAGE        = $nameImage;
			$model->DESCRIPTION  = htmlspecialchars($description);
			$model->META_KEYWORD = htmlspecialchars($metaKeyword);
			$model->STATUS       = $status;
			$model->CREATED_AT   = $time;
			$model->CREATED_BY   = $idUser;
            if($model->save()){
                $id = $model->ID;
                if(isset($fileImage)){
                    $path = 'uploads/articles/'.date('Y',$time).'/'.date('m',$time).'/'.date('d',$time).'/';
                    //$path = 'm-contact/articles/';
                    Yii::$app->helper->saveImage($path,$fileImage,'image',$id,$nameImage);
                }
                $contentNews           = $this->getImage($model);
				$modelContent          = $this->findModel($id);
				$modelContent->CONTENT = $contentNews;
				$modelContent->save();
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('create', [
                    'model'          => $model,
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
        $modelCate = new Categories();
		$dataCate = $modelCate->getCategories();
        
        $image_current = $model->IMAGE;
        if ($model->load(Yii::$app->request->post())) {
			$time        = time();
			$idUser      = Yii::$app->user->id;
            
            $alias       = trim($model->ALIAS);
            $name        = trim($model->TITLE);
            $description = trim($model->DESCRIPTION);
            $metaKeyword = trim($model->META_KEYWORD);

            if(isset($alias) && $alias !=""){
                $alias = Yii::$app->helper->changeTitle($alias);
            }else{
                if(!empty($name)){
                    $alias = Yii::$app->helper->changeTitle($name);
                }
            }
            $status = $model->STATUS;
            if($status == ""){
                $status = 0;
            }
            //IMAGE
             $fileImage = UploadedFile::getInstance($model,'IMAGE');
            if(isset($fileImage)){
                $nameImage         = $time.'-'.$alias.'.'.$fileImage->extension;
            }else{
                $nameImage =  $image_current;
            }

			$model->TITLE        = htmlspecialchars($name);
			$model->ALIAS        = $alias;
			$model->IMAGE        = $nameImage;
			$model->DESCRIPTION  = htmlspecialchars($description);
			$model->META_KEYWORD = htmlspecialchars($metaKeyword);
			$model->UPDATED_BY   = $idUser;
			$model->UPDATED_AT   = $time ;
            if($model->save()){
                $id = $model->ID;
                $time = $model->CREATED_AT;
                if(isset($fileImage)){
                    $path = 'uploads/articles/'.date('Y',$time).'/'.date('m',$time).'/'.date('d',$time).'/';
                    Yii::$app->helper->deleteImage($path,'image',$id,$image_current);
                    Yii::$app->helper->saveImage($path,$fileImage,'image',$id,$nameImage);
                }

				$contentNews           = $this->getImage($model);
				$modelContent          = $this->findModel($id);
				$modelContent->CONTENT = $contentNews;
				$modelContent->save();
                return $this->redirect(['view', 'id' => $model->ID]);
            }else{
                return $this->render('create', [
					'model'          => $model,
					'dataCategories' => $dataCategories,
                ]);
            }
        } else {
            return $this->render('update', [
				'dataCate' => $dataCate,
				'model'    => $model,
            ]);
        }
    }

    function getImage($model = ''){
        //print_r($content);
        //die;
        $content = $model->CONTENT;
        $name    = $model->TITLE;
        $pattern = '#(<img).*/>#imsU';
        preg_match_all($pattern, $content,$matches);
        $subject = $matches[0];
        //print_r($subject);
        $data = [];
        if(count($subject)>0){
            foreach ($subject as $key => $value) {
                $pattern = '/< *img[^>]*src *= *["\']?([^"\']*)/i';
                preg_match($pattern, $value,$src);
                $pattern = '/< *img[^>]*alt *= *["\']?([^"\']*)/i';
                preg_match($pattern, $value,$alt);
                if($alt[1]){
                    $data[$alt[1].' '.($key + 1)] = trim($src[1]);
                }else{
                    $data[$name.' '.($key + 1)] = trim($src[1]);
                }
            }
        }
         
        if($data){
            $i          = 1;
            $id         = $model->ID;
            $time       = $model->CREATED_AT;
            $path       = 'uploads';
            $pathImage  = '/articles/'.date('Y',$time).'/'.date('m',$time).'/'.date('d',$time).'/'.$id.'/albums/';
            $sourcePath = $path.$pathImage;
            if (!is_dir($sourcePath)) mkdir($sourcePath, 0777, true);
            $dataImageSrc = [];
            $dataImageDst = [];
            $imgages = [];
            foreach ($data as $key => $value) {
                $nameImage = Yii::$app->helper->changeTitle($key).'_'.time().'.jpg';

                $imgages[] = $nameImage;
                //$file_headers = @get_headers($inputFile);
                $inputFile = @file_get_contents($value);
                if($inputFile){
                    $outPutFile = $sourcePath.$nameImage;
                    $file_handler=fopen($outPutFile,'w');
                    if(fwrite($file_handler,$inputFile)==false){
                    //  echo 'error';
                    }else{
                    //  echo 'success';
                        $dataImageSrc[] = $value;
                        $dataImageDst[] = Yii::$app->params['mediaUrl'].$pathImage.$nameImage;
                    }
                }else{
                    //echo 'y';
                }
                //echo $nameImage.'<br>';
            }
          /*  echo '<pre>';
            print_r($data);
            print_r($dataImageSrc);
            print_r($dataImageDst);
            die;*/
            $fileImages = scandir($sourcePath);
           //echo '<pre>';print_r($imgages);
           // echo '<pre>';print_r($fileImages);

            foreach ($fileImages as $key => $value) {
                if($key >1 && !in_array($value, $imgages)){
                    $files = $sourcePath.$value;
                    if(is_file($files)){
                         unlink($files); // delete file
                    }
                }
            }
            if($dataImageDst){
                $content = str_replace($dataImageSrc, $dataImageDst, $content);
            }
            return $content;
            //echo 'x';
        }else{
            return $content;
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
