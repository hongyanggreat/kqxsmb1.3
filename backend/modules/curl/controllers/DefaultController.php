<?php

namespace backend\modules\curl\controllers;

use yii\web\Controller;
use backend\modules\curl\models\KqxsMb;

/**
 * Default controller for the `curl` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
     public function actionIndex()
    {

        $this->layout = false;
        echo '<meta charset="UTF-8">';
        $year       =  date('Y'); 
        $month      =  date('m'); 
        $date       =  (int)date('d') + 1; 
        $nhay       =  1; 
        $lon        =  1; 
        $exactlimit =  0; 
        $limit      =  5; 
        if(isset($_GET['date'])){
            $date  =  $_GET['date']; 
        }
        if(isset($_GET['month'])){
            $month  =  $_GET['month']; 
        }
        if(isset($_GET['nhay'])){
            $nhay  =  $_GET['nhay']; 
        }
        if(isset($_GET['lon'])){
            $lon  =  $_GET['lon']; 
        }
        if(isset($_GET['exactlimit'])){
            $exactlimit  =  $_GET['exactlimit']; 
        }
        if(isset($_GET['limit'])){
            $limit  =  $_GET['limit']; 
        }
        /*echo $limit;
        die;
*/
        echo $title = 'Lay ket qua Ngày '.$date.' tháng '.$month.' năm '.$year;
        echo '<title>'.$title.'</title>';
        echo '<hr>';


        echo $url ="http://ketqua.net/xo-so-mien-bac.php?ngay=".$date."-".$month."-".$year;
        echo '<hr>';

       // $url ="http://hocthipro.vn/";
        $subject =  @file_get_contents($url);

        $pattern = '#(id="result_tab_mb">).*</table>#imsU';
        preg_match_all($pattern, $subject,$matches);
	    $data = [];
        if(isset($matches[0][0])){

        	$subject = $matches[0][0];
			$pattern = '#(<td id=").*</td>#imsU';
			preg_match_all($pattern, $subject,$matches);     	   
	        $subject = $matches[0];
	        if(count($subject)>0){
	            foreach ($subject as $key => $value) {
	                // $pattern = '#(?<=<td id=").*(?=" colspan=")#';//Cai nay la de lay ten field
	                // $pattern = $this->partternCheck($key);
	                $pattern = '#(?<=">).*(?=</td>)#';
	                preg_match($pattern, $value,$matches);
	                //echo $matches[0].'<br>';
	                $data[] = $matches[0];
	            }
	            $date = $year."-".$month."-".$date. " 00:00:00";//2017-10-25 08:31:32
	            $this->addKqxsmb($data,$date);
	        }else{
	        	echo 'Chưa có kết quả';
	        }

        }
        echo '<pre>';
        print_r($data);
       
    }

    public function actionMonth()
    {

        $this->layout = false;
        echo '<meta charset="UTF-8">';
        $year       =  date('Y'); 
       	$songay = 0;
        if(isset($_GET['songay'])){
            $songay  =  $_GET['songay']; 
        }
        if(isset($_GET['month'])){
            $month  =  $_GET['month']; 
        }
       
        for ($i=1; $i <= $songay ; $i++) { 
	        echo $url ="http://ketqua.net/xo-so-mien-bac.php?ngay=".$i."-".$month."-".$year;
        	echo '<br>';
			echo $date = $year."-".$month."-".$i. " 00:00:00";//2017-10-25 08:31:32
        	echo '<br>';
	        $subject =  @file_get_contents($url);

	        $pattern = '#(id="result_tab_mb">).*</table>#imsU';
	        preg_match_all($pattern, $subject,$matches);
		    $data = [];
	        if(isset($matches[0][0])){

	        	$subject = $matches[0][0];
				$pattern = '#(<td id=").*</td>#imsU';
				preg_match_all($pattern, $subject,$matches);     	   
		        $subject = $matches[0];
		        if(count($subject)>0){
		            foreach ($subject as $key => $value) {
		                // $pattern = '#(?<=<td id=").*(?=" colspan=")#';//Cai nay la de lay ten field
		                // $pattern = $this->partternCheck($key);
		                $pattern = '#(?<=">).*(?=</td>)#';
		                preg_match($pattern, $value,$matches);
		                //echo $matches[0].'<br>';
		                $data[] = $matches[0];
		            }
		            $this->addKqxsmb($data,$date);
		            
		        }else{
		        	echo '<span style="color:orange">Chưa có kết quả</span>';
		        }

	        }else{
	        	echo '<span style="color:#00FFF6">Chưa có kết quả</span>';
	        }
	       echo '<hr>';
        }//end for
        // echo '<pre>';
        // print_r($data);
       
    }
    function addKqxsmb($data,$date){
    	$model = new KqxsMb;
    	 // echo '<pre>';
      //   print_r($model);
		$rs_0_0 = "";
		$rs_1_0 = "";
		$rs_2_0 = "";
		$rs_2_1 = "";
		$rs_3_0 = "";
		$rs_3_1 = "";
		$rs_3_2 = "";
		$rs_3_3 = "";
		$rs_3_4 = "";
		$rs_3_5 = "";
		$rs_4_0 = "";
		$rs_4_1 = "";
		$rs_4_2 = "";
		$rs_4_3 = "";
		$rs_5_0 = "";
		$rs_5_1 = "";
		$rs_5_2 = "";
		$rs_5_3 = "";
		$rs_5_4 = "";
		$rs_5_5 = "";
		$rs_6_0 = "";
		$rs_6_1 = "";
		$rs_6_2 = "";
		$rs_7_0 = "";
		$rs_7_1 = "";
		$rs_7_2 = "";
		$rs_7_3 = "";
		$rs_date = $date;

		
		if (isset($data[0])) {
            $rs_0_0 = $data[0];

        }
        if (isset($data[1])) {
            $rs_1_0 = $data[1];

        }
        if (isset($data[2])) {
            $rs_2_0 = $data[2];

        }
        if (isset($data[3])) {
            $rs_2_1 = $data[3];

        }
        if (isset($data[4])) {
            $rs_3_0 = $data[4];

        }
        if (isset($data[5])) {
            $rs_3_1 = $data[5];

        }
        if (isset($data[6])) {
            $rs_3_2 = $data[6];

        }
        if (isset($data[7])) {
            $rs_3_3 = $data[7];

        }
        if (isset($data[8])) {
            $rs_3_4 = $data[8];

        }
        if (isset($data[9])) {
            $rs_3_5 = $data[9];

        }
        if (isset($data[10])) {
            $rs_4_0 = $data[10];

        }
        if (isset($data[11])) {
            $rs_4_1 = $data[11];

        }
        if (isset($data[12])) {
            $rs_4_2 = $data[12];

        }
        if (isset($data[13])) {
            $rs_4_3 = $data[13];

        }
        if (isset($data[14])) {
            $rs_5_0 = $data[14];

        }
        if (isset($data[15])) {
            $rs_5_1 = $data[15];

        }
        if (isset($data[16])) {
            $rs_5_2 = $data[16];

        }
        if (isset($data[17])) {
            $rs_5_3 = $data[17];

        }
        if (isset($data[18])) {
            $rs_5_4 = $data[18];

        }
        if (isset($data[19])) {
            $rs_5_5 = $data[19];

        }
        if (isset($data[20])) {
            $rs_6_0 = $data[20];

        }
        if (isset($data[21])) {
            $rs_6_1 = $data[21];

        }
        if (isset($data[22])) {
            $rs_6_2 = $data[22];

        }
        if (isset($data[23])) {
            $rs_7_0 = $data[23];

        }
        if (isset($data[24])) {
            $rs_7_1 = $data[24];

        }
        if (isset($data[25])) {
            $rs_7_2 = $data[25];

        }
        if (isset($data[26])) {
            $rs_7_3 = $data[26];

        }


		$model->rs_0_0 = $rs_0_0;
		$model->rs_1_0 = $rs_1_0;
		$model->rs_2_0 = $rs_2_0;
		$model->rs_2_1 = $rs_2_1;
		$model->rs_3_0 = $rs_3_0;
		$model->rs_3_1 = $rs_3_1;
		$model->rs_3_2 = $rs_3_2;
		$model->rs_3_3 = $rs_3_3;
		$model->rs_3_4 = $rs_3_4;
		$model->rs_3_5 = $rs_3_5;
		$model->rs_4_0 = $rs_4_0;
		$model->rs_4_1 = $rs_4_1;
		$model->rs_4_2 = $rs_4_2;
		$model->rs_4_3 = $rs_4_3;
		$model->rs_5_0 = $rs_5_0;
		$model->rs_5_1 = $rs_5_1;
		$model->rs_5_2 = $rs_5_2;
		$model->rs_5_3 = $rs_5_3;
		$model->rs_5_4 = $rs_5_4;
		$model->rs_5_5 = $rs_5_5;
		$model->rs_6_0 = $rs_6_0;
		$model->rs_6_1 = $rs_6_1;
		$model->rs_6_2 = $rs_6_2;
		$model->rs_7_0 = $rs_7_0;
		$model->rs_7_1 = $rs_7_1;
		$model->rs_7_2 = $rs_7_2;
		$model->rs_7_3 = $rs_7_3;
		$model->rs_date = $rs_date;
		// echo '<pre>';
		// print_r($model);

		if($model->save()){
			echo '<span style="color:green">thanh cong</span>';
		}else{
			echo '<span style="color:red">That bai</span>';
			print_r($model->errors);
		}

    }
    
}
