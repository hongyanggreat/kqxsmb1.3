<?php

namespace backend\modules\chukydacbiet\controllers;

use yii\web\Controller;

/**
 * Default controller for the `chukydacbiet` module
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
  
    public function actionIndex(){
    	
		$dataCache    =   \Yii::$app->cache->get(KEY_CACHE_CHU_KY_DAC_BIET);
		$dataProvider = "";
        if($dataCache){
			// echo '<pre>';
			// print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				// echo 'tao cache mới';
				$dataProvider = $this->autoGetChuKyDacBiet();
			}else{
				// echo 'doc file cache';
				$sourcePath = 'uploads/chukydacbiet/';
				// echo '<br>';
				$nameFile = "chukydacbiet-".$dataCache['dateTime'].".txt";
				if (file_exists($sourcePath.$nameFile)) {
				    // echo "The file $nameFile exists";
					$fileName = $sourcePath.$nameFile;
					$dataProvider=  @file_get_contents($fileName);
				} else {
				    // echo "The file $nameFile does not exist";
				    $dataProvider = $this->autoGetChuKyDacBiet();
				}
				// die;
			}
        }else{
        	// echo 'chua co cache nhe';
        	$dataProvider = $this->autoGetChuKyDacBiet();
        }
		
        return $this->render('index',[
        		'dataProvider'=>$dataProvider,
        	]);
    }
    public function actionCache(){
    	$dataCache =   \Yii::$app->cache->get(KEY_CACHE_CHU_KY_DAC_BIET);
        if($dataCache){
			echo '<pre>';
			print_r($dataCache);
			if($dataCache['dateTime'] != date('Y-m-d')){
				echo 'tao cache mới';
			}else{
				echo 'doc file cache';
				$sourcePath = 'uploads/chukydacbiet/';
				echo '<br>';
				$nameFile = "chukydacbiet-".$dataCache['dateTime'].".txt";
				echo $fileName = $sourcePath.$nameFile;
				echo file_get_contents($fileName);
			}
        }else{
        	echo 'chua co cache nhe';
        }
    }
    public function actionRemovecache(){
    	//http://hongyang.com/kqxsmb/chuky/removecache
        \Yii::$app->cache->delete(KEY_CACHE_CHU_KY_DAC_BIET);
        return "Bạn đã xóa cache KEY_CACHE_CHU_KY_DAC_BIET thành công";
    }
    function autoGetChuKyDacBiet(){
    	$url ="http://ketqua.net/chu-ky-dac-biet";
        $subject =  @file_get_contents($url);
        $pattern = '#(<table class="table table-condensed).*</table>#imsU';
        preg_match_all($pattern, $subject,$matches);
        $dataProvider = "";
        if(isset($matches[0][0]) && $matches[0][0]){
        	$dataProvider .= $matches[0][0];
        }
        if(isset($matches[0][1]) && $matches[0][1]){
        	$dataProvider .= $matches[0][1];
        }
        if(isset($matches[0][2]) && $matches[0][2]){
        	$dataProvider .= $matches[0][2];
        }
        $sourcePath = 'uploads/chukydacbiet/';
	    if (!is_dir($sourcePath)){
	         mkdir($sourcePath, 0777, true);
	    }
	    if($dataProvider){
		    $date = date('Y-m-d');
		    $nameFile = "chukydacbiet-".$date.".txt";
	        $fileName = $sourcePath.$nameFile;
		    $file = fopen($fileName,"w");
		    fwrite($file,$dataProvider);
			fclose($file);
			// $date = date('Y-m-d',strtotime("-1 days"));//test thoi
		    \Yii::$app->cache->set(KEY_CACHE_CHU_KY_DAC_BIET, ['fileName'=>$nameFile,'dateTime'=>$date]);
	    }
	    return $dataProvider;
    }
}
