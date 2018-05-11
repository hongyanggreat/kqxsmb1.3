<?php

namespace backend\modules\soMo\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\soMo\models\SoMo;
/**
 * Default controller for the `soMo` module
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
        $count = SoMo::find()->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
        ];

        $dataProviders = SoMo::find()
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)->all();   
        return $this->render('index',[
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
            $offset = ($page-1)*(self::LIMIT);
            $dataProviders = SoMo::find()
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset)->all(); 
            
            return $this->render('refresh_page',[
                'dataProviders' =>$dataProviders,
            ]);
        }else{
            echo "Bạn khong lay duoc du lieu";
        }

        //$offset = ($page-1)*(self::LIMIT);
     }
    
    public function actionAuto()
    {
        $this->layout = false;

        echo '<meta charset="UTF-8">';

        for ($i=1; $i <=14 ; $i++) { 
            # code...
            echo "TRANG ".$i;
            echo '<br>';
            $url ="http://ketqua.net/".rawurlencode("sổ-mơ")."/".$i.".html";
          
            $subject =  file_get_contents($url);
            $pattern = '#(<tbody>).*</tbody>#imsU';
            preg_match_all($pattern, $subject,$matches);
            $subject = $matches[0][0];
            $pattern = '#(<tr>).*</tr>#imsU';
            preg_match_all($pattern, $subject,$matches);

            $subject = $matches[0];
            
            $data = [];    
            foreach ($subject as $key => $value) {
                $pattern = '#(<td>).*</td>#imsU';
                preg_match_all($pattern, $value,$matches);
                
                //LAY RA GIAC MO
                $giacMo = $matches[0][1];
                $patternGiacMo = '#(?<=<td>).*(?=</td>)#';
                preg_match($patternGiacMo, $giacMo,$matchesGiacMo);
                $data[$key]['GIAC_MO'] = mb_strtolower (trim($matchesGiacMo[0]));

                //LAY RA BO SO
                $boSo = $matches[0][2];
                $patternBoSo = '#(?<=<td>).*(?=</td>)#';
                preg_match($patternBoSo, $boSo,$matchesBoSo);
                $data[$key]['BO_SO'] = mb_strtolower (trim($matchesBoSo[0]));
                
            }
            // echo '<pre>';
            // print_r($data);
            // die;
            foreach ($data as $key => $value) {

                $model = new SoMo;
                echo $model->giac_mo = $value['GIAC_MO'];
                echo '-';
                echo $model->boi_so = $value['BO_SO'];
                echo ' ';

                if($model->save()){
                    echo '<span style="color:green">Thành công</span>';
                }else{
                    echo '<span style="color:red">Thất bại</span>';
                    print_r($model->errors);
                }
                echo '<br>';
               
            }

            echo '<hr>';
        }
        
    }
}
