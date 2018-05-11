<?php

namespace backend\modules\lotogan\controllers;

use yii\web\Controller;

/**
 * Default controller for the `lotogan` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionCache(){
    	$dataCache =   \Yii::$app->cache->get(KEY_CACHE_LO_GAN);
        if($dataCache){
			echo '<pre>';
			print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				echo 'tao cache mới';
			}else{
				echo 'doc file cache';
				$sourcePath = 'uploads/lotogan/';
				echo '<br>';
				$nameFile = "lotogan-".$dataCache['dateTime'].".txt";
				echo $fileName = $sourcePath.$nameFile;
				echo file_get_contents($fileName);
			}
        }else{
        	echo 'chua co cache nhe';
        }
    }
    public function actionRemovecache(){
    	//http://hongyang.com/kqxsmb/lotogan/removecache
        \Yii::$app->cache->delete(KEY_CACHE_LO_GAN);
        return "Bạn đã xóa cache KEY_CACHE_LO_GAN thành công";
    }
    
    public function actionIndex()
    {
    	//http://hongyang.com/kqxsmb/lotogan
    	// $this->layout = false;
        // echo '<meta charset="UTF-8">';

		$dataCache    =   \Yii::$app->cache->get(KEY_CACHE_LO_GAN);
		$dataProvider = "";
        if($dataCache){
			// echo '<pre>';
			// print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				// echo 'tao cache mới';
				$dataProvider = $this->autoGetlotogan();
			}else{
				// echo 'doc file cache';
				$sourcePath = 'uploads/lotogan/';
				// echo '<br>';
				$nameFile = "lotogan-".$dataCache['dateTime'].".txt";
				if (file_exists($sourcePath.$nameFile)) {
				    // echo "The file $nameFile exists";
					$fileName = $sourcePath.$nameFile;
					$dataProvider=  @file_get_contents($fileName);
				} else {
				    // echo "The file $nameFile does not exist";
				    $dataProvider = $this->autoGetlotogan();
				}
				// die;
			}
        }else{
        	// echo 'chua co cache nhe';
        	$dataProvider = $this->autoGetlotogan();
        }
		
        return $this->render('index',[
        		'dataProvider'=>$dataProvider,
        	]);
    }

    function autoGetlotogan(){
    	$url ="http://ketqua.net/loto-gan";
        $subject =  @file_get_contents($url);
        $pattern = '#(<div class="kqbackground">).*</div>#imsU';
        preg_match_all($pattern, $subject,$matches);
        // echo '<pre>';
        $pattern2 = '#(<table class="table table-condensed).*</table>#imsU';
        preg_match_all($pattern2, $subject,$matches2);
        $dataProvider = "";
        if(isset($matches[0][0]) && $matches[0][0]){
        	$dataProvider .= $matches[0][0];
        }
        if(isset($matches2[0][0]) && $matches2[0][0]){
        	$dataProvider .= $matches2[0][0];
        }
        // print_r($dataProvider);
        // die;
        $sourcePath = 'uploads/lotogan/';
	    if (!is_dir($sourcePath)){
	         mkdir($sourcePath, 0777, true);
	    }
	    if($dataProvider){
		    $date = date('Y-m-d');
		    $nameFile = "lotogan-".$date.".txt";
	        $fileName = $sourcePath.$nameFile;
		    $file = fopen($fileName,"w");
		    fwrite($file,$dataProvider);
			fclose($file);
			// $date = date('Y-m-d',strtotime("-1 days"));//test thoi
		    \Yii::$app->cache->set(KEY_CACHE_LO_GAN, ['fileName'=>$nameFile,'dateTime'=>$date]);
	    }
	    return $dataProvider;
    }

}