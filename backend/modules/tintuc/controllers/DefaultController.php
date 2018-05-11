<?php

namespace backend\modules\tintuc\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\tintuc\models\Articles;
use backend\modules\categories\models\Categories;
/**
 * Default controller for the `tintuc` module
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
        $count = Articles::find()->where(['CATE_ID'=>2])->andWhere(['STATUS'=>1])->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
        ];
        $categories = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>2])->andWhere(['STATUS'=>1])->one();
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

                        ->where(['CATE_ID'=>2])
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
            $categories = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>2])->andWhere(['STATUS'=>1])->one();
            if(!isset($categories) || !$categories){
                Yii::$app->response->redirect($baseUrl);
            }
            $offset = ($page-1)*(self::LIMIT);

            $dataProviders = Articles::find()
                        ->where(['CATE_ID'=>2])
                        ->andWhere(['STATUS'=>1])
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
    public function actionAutokinhnghiem($id){
        //da keo xong
        die;
        $url ="http://soicau366.com/news?page=".$id;
        //http://hongyang.com/kqxsmb/tintuc.html?id=96


            $subject =  @file_get_contents($url);
            $pattern = '#(<div class="jumbotron">).*(</div>)#imsU';
            
            preg_match_all($pattern, $subject,$matches);
            
            $data = [];

            $subjects = $matches[0];
            // print_r($subjects);
            // die;
            foreach ($subjects as $key => $subject) {
                
                $patternLink = '#(?<=href=").*(?=">)#';
                preg_match($patternLink, $subject,$matchesLinks);
                
                $patternTittle = '#(?<=<h4><a title=").*(?=" href=)#';
                preg_match($patternTittle, $subject,$matchesTittle);
                
                $patternDes = '#(?<=news-content">).*(?=</div>)#';
                preg_match($patternDes, $subject,$matchesDes);
               
                $data[$key]['LINK'] = "";
                $data[$key]['TITLE'] = "";
                $data[$key]['DESCRIPTION'] = "";

                if(isset($matchesLinks[0])){
                    $data[$key]['LINK']        =  "http://soicau366.com".$matchesLinks[0];
                }
                if(isset($matchesTittle[0])){
                    $data[$key]['TITLE']       =  $matchesTittle[0];
                }
                if(isset($matchesDes[0])){
                    $data[$key]['DESCRIPTION'] =  $matchesDes[0];
                }

                // //LAY NOI DUNG BAI VIET
                //CHECK TRANG 

                $subjectContent =  @file_get_contents($data[$key]['LINK']);
                $patternContent = '#(<div id="div_detail">).*(                    <br />)#imsU';
                preg_match_all($patternContent, $subjectContent,$matchesContent);
                if(isset($matchesContent[0][0])){
                    $subjectContent = $matchesContent[0][0];
                    $subjectContent = str_replace("http://soicau366.com/",Yii::$app->params['baseUrl'], $subjectContent);
                    $subjectContent = str_replace('<img src="','<img src="http://soicau366.com/', $subjectContent);
                    $subjectContent = substr($subjectContent, 42,-26);
                    $data[$key]['CONTENT'] = $subjectContent ;
                    
                }
            }
            // echo '<pre>';
            // print_r($data);
            // die;
            foreach ($data as $key => $value) {
                if(isset($value['CONTENT']) && $value['CONTENT'] != ""){
                    $model = new Articles;
                    $model->TITLE= $value['TITLE'];
                    $alias = Yii::$app->helper->changeTitle($value['TITLE']);
                    $model->ALIAS= $alias;

                    $model->CATE_ID= 3;
                    $model->POSITION= 0;
                    $model->DESCRIPTION= htmlspecialchars($value['DESCRIPTION']);
                    $model->CONTENT= $value['CONTENT'];
                    $model->STATUS= 1;
                    $model->TAG= "Bí kíp kqxs";
                    // $model->META_KEYWORD= htmlspecialchars($value['DESCRIPTION']);
                    $model->VIEW= 0;
                    $model->CREATED_BY= 1;
                    $model->CREATED_AT= time();
                    if($model->save()){
                        $id = $model->ID;
                        
                        $contentNews           = $this->getImageContent($model);
                        if($contentNews){
                            $modelContent          = $this->findModel($id);
                            $modelContent->CONTENT = $contentNews;
                            $modelContent->save();
                            echo $key.'- <span style="color:#29F929">Y/C CAP NHAT CONTENT</span>';
                        }else{

                            echo $key.'- <span style="color:#CB0A21">KHONG CAN CAP NHAT CONTENT</span>';
                        }
                            echo $key.'- <span style="color:green">THANH CONG</span>';
                    }else{
                        print_r($model->getErrors());
                        echo $key.'- <span style="color:red">THAT BAI</span>';
                    }

                }else{
                    echo $key.'- <span style="color:orange">KHONG LAY DUOC NOI DUNG BAI VIET</span>';
                }
                echo '<hr>';
            }
    }

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
    
    public function actionAutotintuc($id)
    {   
       
            //http://hongyang.com/kqxsmb/tintuc/autotintuc.html?id=1

            $url ="http://ketqua.net/tin-tuc-xo-so/".$id;
            
            $subject =  @file_get_contents($url);
            $pattern = '#(<div class="news-item">).*(</p></div></div>)#imsU';
            
            preg_match_all($pattern, $subject,$matches);
            
            $data = [];

            $subjects = $matches[0];
            
            foreach ($subjects as $key => $subject) {
            	
    			$patternLink = '#(?<=href=").*(?="><img)#';
    			preg_match($patternLink, $subject,$matchesLinks);
    			
    			$patternImage = '#(?<=data-cfsrc=").*(?=" style=)#';
    			preg_match($patternImage, $subject,$matchesImage);
    	        
    	        $patternTittle = '#(?<=title=").*(?=" data-cfsrc=")#';
    			preg_match($patternTittle, $subject,$matchesTittle);
    	        
    	        $patternDes = '#(?<=<p class="newscontent des-list"> \(Ketqua.net\) - ).*(?=</p>)#';
    			preg_match($patternDes, $subject,$matchesDes);
    	        
    			$data[$key]['LINK']        =  "http://ketqua.net".$matchesLinks[0];
    			$data[$key]['IMAGE']       =  $matchesImage[0];
    			$data[$key]['TITLE']       =  $matchesTittle[0];
    			$data[$key]['DESCRIPTION'] =  $matchesDes[0];

                //LAY NOI DUNG BAI VIET
                $subjectContent =  @file_get_contents($data[$key]['LINK']);
                $patternContent = '#(<h5 class="newscontent">).*(</h5>)#imsU';
                preg_match_all($patternContent, $subjectContent,$matchesContent);
                if(isset($matchesContent[0][0])){
                    $subjectContent = $matchesContent[0][0];
                    
                    $patternContent = '#(?<=>).*(?="</h5>)#';
                    preg_match($patternContent, $subjectContent,$matchesContent);
                    $subjectContent = str_replace("http://ketqua.net",Yii::$app->params['baseUrl'], $subjectContent);
                    $data[$key]['CONTENT'] = $subjectContent ;
                }
            }

            foreach ($data as $key => $value) {
                if(isset($value['CONTENT']) && $value['CONTENT'] != ""){
                    $model = new Articles;
                    $model->TITLE= $value['TITLE'];
                    $alias = Yii::$app->helper->changeTitle($value['TITLE']);
                    $model->ALIAS= $alias;

                    $model->IMAGE= $value['IMAGE'];
                    $model->CATE_ID= 2;
                    $model->POSITION= 0;
                    $model->DESCRIPTION= htmlspecialchars($value['DESCRIPTION']);
                    $model->CONTENT= $value['CONTENT'];
                    $model->STATUS= 1;
                    $model->TAG= "kqxs";
                    $model->META_KEYWORD= htmlspecialchars($value['DESCRIPTION']);
                    $model->VIEW= 0;
                    $model->CREATED_BY= 1;
                    $model->CREATED_AT= time();
                    
                    if($model->save()){
                        $id = $model->ID;
                        
                        $contentNews           = $this->getImageContent($model);
                        if($contentNews){
                            $modelContent          = $this->findModel($id);
                            $contentNews = str_replace("display:none;visibility:hidden;", "display:block;visibility:initial;", $contentNews);
                            $contentNews = str_replace("data-cfsrc", "src", $contentNews);
                            $modelContent->CONTENT = $contentNews;
                            $modelContent->save();
                            echo $key.'- <span style="color:#29F929">Y/C CAP NHAT CONTENT</span>';
                        }else{

                            echo $key.'- <span style="color:#CB0A21">KHONG CAN CAP NHAT CONTENT</span>';
                        }
                            echo $key.'- <span style="color:green">THANH CONG</span>';
                    }else{
                        echo $key.'- <span style="color:red">THAT BAI</span>';
                    }

                }else{
                    echo $key.'- <span style="color:orange">KHONG LAY DUOC NOI DUNG BAI VIET</span>';
                }
                echo '<hr>';
            }
           
        
    }


    
    function getImage($nameImage,$linkImages,$id,$time){
        $path       = 'uploads';
        $pathImage  = '/articles/'.date('Y',$time).'/'.date('m',$time).'/'.date('d',$time).'/'.$id.'/image/';

        $inputFile = @file_get_contents($linkImages);
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
    }
    function getImageContent($model = ''){
        
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
                // print_r($alt);
                // die;
                if(isset($alt[1])&& $alt[1]){
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
            echo '-- <span style="color:#006755">NOI DUNG BAI VIET DA DUOC THAY DOI LINK ANH </span>';
            return $content;
            //echo 'x';
        }else{
            echo '-- <span style="color:#FFAF15">BAI VIET KHONG CO HINH ANH.</span>';
            return false;
        }
    }
     protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
