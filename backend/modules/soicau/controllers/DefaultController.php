<?php

namespace backend\modules\soicau\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\modules\ketQuaMienBac\models\KqxsMb;

/**
 * Default controller for the `soicau` module
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

        //TU CODE
        // http://hongyang.com/kqxsmb/soicau?date=2017-11-15&lon=1

        //KIEM TRA CAU CHAY 1 NGAY DA

        $timeNow   = time();
        $dateCheck = date('Y-m-d '."18:35:00");
        $timeCheck = strtotime($dateCheck);
        if(isset($_GET['date']) && $_GET['date']){
           
           $dateCompare  = $_GET['date'];
           $timeChoise = strtotime($dateCompare." " .date('H:i:s'));
           if($dateCompare == date('Y-m-d')){
                if($timeCheck > $timeChoise){
                    $timePrev = strtotime(date('Y-m-d')) - (1*24*60*60);
                    $dateCompare = date('Y-m-d',$timePrev);
                }

            }else{
               if($timeCheck < $timeChoise){
                    $timePrev = strtotime(date('Y-m-d')) - (1*24*60*60);
                    $dateCompare = date('Y-m-d',$timePrev);
                }
            }
        }else{
            //kiem tra thoi gian hien tai co lon hon thoi gian so sanh khong [thoi gian so sanh la trong ngay luc 18h35]
            $dateCompare = date('Y-m-d');
            if($timeNow < $timeCheck){
                $timePrev = strtotime($dateCompare) - (1*24*60*60);
                $dateCompare = date('Y-m-d',$timePrev);
            }

        }
        
        $checkLon = false;
        if(isset($_GET['lon']) && $_GET['lon'] == 1){
            $checkLon = true;
        }

        $dateCompare;
        $kqxsLast        = KqxsMb::find()
                            ->where(['rs_date'=>$dateCompare])
                            ->orderBy(['ID'=>SORT_DESC])
                            // ->asArray()
                            ->one();
        // echo '<pre>';print_r($kqxsLast);
        // echo '<br>';
        $idLast = $kqxsLast->id;
        // echo '<br>';
        $arrLotoTrucTiep = [];
        $i = 0;
        foreach ($kqxsLast as $key => $value) {
            $i ++;
            // echo $i;
            // echo '<hr>';
            if($i >1 && $i<29){
                $arrLotoTrucTiep[] = substr($value,-2);
            }
        }

        // MAP nhung gia tri trung nhau trong mang
        $arrLotoTrucTiep = array_count_values($arrLotoTrucTiep);
        // echo '<pre>';print_r($arrLotoTrucTiep);
        // $dateCompare = date('Y-m-d',strtotime("-1 days"));
        // echo $dateCompare;
        $kqxsFirst        = KqxsMb::find()
                            ->where(['id'=>$idLast-1])
                            ->orderBy(['ID'=>SORT_DESC])
                            // ->asArray()
                            ->one();
        // $kqxs        = KqxsMb::find()->where(['rs_date'=>'2017-10-29'])->orderBy(['ID'=>SORT_DESC])->one();
        // echo '<pre>';print_r($kqxsFirst);
        // echo '<br>';
         $id   =  $kqxsFirst->id;
        // echo '<br>';
         $date   =  $kqxsFirst->rs_date;

        $totalRs =  $kqxsFirst->total_rs;
    
        $array = $array1 = $array2= preg_split('//u', $totalRs,-1, PREG_SPLIT_NO_EMPTY);
        

        $count = count($array);
        $arrVitriCau = [];
        
        if($checkLon){
        //=============================TRUONG HOP LON
            foreach($array as $k=>$v)
            {
                $vitri = $k;
                $value = $v;
                for($i=0; $i<$count;$i++)
                {
                    if($vitri != $i){
                        $key = $vitri.'x'.$i;
                        // $vitri.'x'.$i . ' value la '. $value.$array[$i];
                        $arrVitriCau[$key] = $value.$array[$i];
                    }
                }
            }
           
        }else{
            //===============================TRUONG HOP KHONG LON
            foreach($array as $k=>$v)
            {
                $vitri = $k;
                $value = $v;
                for($i=0; $i<$count;$i++)
                {
                    if($vitri != $i){
                        $key = $vitri.'x'.$i;
                        $keyLon = $i.'x'.$vitri;
                        if(!array_key_exists($keyLon, $arrVitriCau)){
                            $arrVitriCau[$key] = $value.$array[$i];
                        }
                    }
                
                }
            }
        }
        // echo '<br>';
        // echo count($arrVitriCau);
        // echo '<br>';
        // echo '<pre>';
        // print_r($arrVitriCau);
        //KIEM TRA XEM CAC CAU DAY HOM SAU CO VE NHAY NAO KHONG;
        // echo '<pre>';
        // print_r($arrLotoTrucTiep);

            // echo '<br>';

        $arrayCauTrue = [];
        foreach ($arrVitriCau as $key => $value) {
            # code...
            // echo $key;
            // echo '<br>';
            // echo $value;
            // echo '<hr>';
            if(array_key_exists($value, $arrLotoTrucTiep)){
                // echo $key."-Yes-".$value;
                $arrayCauTrue[$key] = $value;
            }

        }
            print_r($arrayCauTrue);
die;
       return $this->render('index', [
            'arrayCauTrue'    => $arrayCauTrue,
        ]);

    }
    public function actionCurl()
    {

        //LAY TU TRANG KHAC
    	$queryString = Yii::$app->request->getQueryString();
        $this->layout = false;
        echo '<meta charset="UTF-8">';
        $url ="https://rongbachkim.com/soicau.html?".$queryString;
        $subject =  @file_get_contents($url);

        $pattern = '#(<table).*</table>#imsU';
        preg_match_all($pattern, $subject,$matches);

        $pattern = '#(<a title).*</a>#imsU';
        preg_match_all($pattern, $subject,$vitriCaus);

        $pattern = '#(<table class=ketquacau).*</div>#imsU';
        preg_match_all($pattern, $subject,$showcauareas);

        // print_r($showcauarea);

        // die;
		$subject        = $matches[0];
		$tableCauRun    = $subject[3];
		$tableMatranCau = $subject[4];
		$vitriCaus      = $vitriCaus[0];
		$showcauareas      = $showcauareas[0];

        $dataProviders = [];
        return $this->render('index-curl', [
			'tableCauRun'    => $tableCauRun,
			'tableMatranCau' => $tableMatranCau,
			'vitriCaus'      => $vitriCaus,
			'showcauareas'    => $showcauareas,
        ]);
       
    }
}
