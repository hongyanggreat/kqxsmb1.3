<?php

namespace backend\modules\chuky\controllers;

use yii\web\Controller;

/**
 * Default controller for the `chuky` module
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
    	$dataCache =   \Yii::$app->cache->get(KEY_CACHE_CHU_KY);
        if($dataCache){
			echo '<pre>';
			print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				echo 'tao cache mới';
			}else{
				echo 'doc file cache';
				$sourcePath = 'uploads/chuky/';
				echo '<br>';
				$nameFile = "chuky-".$dataCache['dateTime'].".txt";
				echo $fileName = $sourcePath.$nameFile;
				echo file_get_contents($fileName);
			}
        }else{
        	echo 'chua co cache nhe';
        }
    }
    public function actionRemovecache(){
    	//http://hongyang.com/kqxsmb/chuky/removecache
        \Yii::$app->cache->delete(KEY_CACHE_CHU_KY);
        return "Bạn đã xóa cache KEY_CACHE_CHU_KY thành công";
    }
    
    public function actionIndex()
    {
    	//http://hongyang.com/kqxsmb/chuky
    	// $this->layout = false;
        // echo '<meta charset="UTF-8">';

		$dataCache    =   \Yii::$app->cache->get(KEY_CACHE_CHU_KY);
		$dataProvider = "";
        if($dataCache){
			// echo '<pre>';
			// print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				// echo 'tao cache mới';
				$dataProvider = $this->autoGetChuKy();
			}else{
				// echo 'doc file cache';
				$sourcePath = 'uploads/chuky/';
				// echo '<br>';
				$nameFile = "chuky-".$dataCache['dateTime'].".txt";
				if (file_exists($sourcePath.$nameFile)) {
				    // echo "The file $nameFile exists";
					$fileName = $sourcePath.$nameFile;
					$dataProvider=  @file_get_contents($fileName);
				} else {
				    // echo "The file $nameFile does not exist";
				    $dataProvider = $this->autoGetChuKy();
				}
				// die;
			}
        }else{
        	// echo 'chua co cache nhe';
        	$dataProvider = $this->autoGetChuKy();
        }
		
        return $this->render('index',[
        		'dataProvider'=>$dataProvider,
        	]);
    }

    function autoGetChuKy(){
    	$url ="http://ketqua.net/chu-ky";
        $subject =  @file_get_contents($url);
        $pattern = '#(<table class="table-kq).*</table>#imsU';
        preg_match_all($pattern, $subject,$matches);
        // echo '<pre>';
        $dataProvider = "";
        if(isset($matches[0][0]) && $matches[0][0]){
        	$dataProvider = $matches[0][0];
        }
        // print_r($dataProvider);
        $sourcePath = 'uploads/chuky/';
	    if (!is_dir($sourcePath)){
	         mkdir($sourcePath, 0777, true);
	    }
	    if($dataProvider){
		    $date = date('Y-m-d');
		    $nameFile = "chuky-".$date.".txt";
	        $fileName = $sourcePath.$nameFile;
		    $file = fopen($fileName,"w");
		    fwrite($file,$dataProvider);
			fclose($file);
			// $date = date('Y-m-d',strtotime("-1 days"));//test thoi
		    \Yii::$app->cache->set(KEY_CACHE_CHU_KY, ['fileName'=>$nameFile,'dateTime'=>$date]);
	    }
	    return $dataProvider;
    }

}
