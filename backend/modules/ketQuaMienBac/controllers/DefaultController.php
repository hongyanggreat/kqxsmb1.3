<?php

    namespace backend\modules\ketQuaMienBac\controllers;

    use Yii;
    use yii\web\Controller;

    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use yii\web\NotFoundHttpException;
    use backend\modules\ketQuaMienBac\models\KqxsMb;

/**
 * Default controller for the `ketQuaMienBac` module
 */
class DefaultController extends Controller
{

	const LIMIT = 100;
	// public function behaviors()
    // {
    //     $actions = Yii::$app->acl->getRole();
        
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => $actions,
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

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
        
        $formDate = date('Y-m')."-01 00:00:00";
        $toDate = date('Y-m-d')." 00:00:00";
        
        if(isset($_GET['formDate']) && Yii::$app->helper->validateDate($_GET['formDate'])){
            $formDate = $_GET['formDate']." 00:00:00";
        }
        if(isset($_GET['toDate']) && Yii::$app->helper->validateDate($_GET['formDate'])){
            $toDate = $_GET['toDate']." 00:00:00";
        }
        
        $offset = ($page-1)*(self::LIMIT);
        $count = 0;
        $count = KqxsMb::find();
                $count->where(['>=','rs_date',$formDate]);
                $count->Andwhere(['<=','rs_date',$toDate]);
        $count = $count->count();

        $myPagination = [
            'totalPage'   => ceil($count/self::LIMIT),
            'page'        => $page,
            'limit'       => self::LIMIT,
            'action'      => $baseUrl.$module,
            'queryString' => Yii::$app->request->getQueryString(),
        ];
        $model = new KqxsMb();

        $dataProviders = KqxsMb::find()
                        // ->asArray()
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(self::LIMIT)
                        ->offset($offset);
        
        $dataProviders->where(['>=','rs_date',$formDate]);
        $dataProviders->Andwhere(['<=','rs_date',$toDate]);
        $dataProviders =    $dataProviders->all();              
        return $this->render('index',[
            'model'         =>$model,
            'dataProviders' =>$dataProviders,
            'myPagination'  =>$myPagination,
        ]);
    }
    public function actionCreate() {
        $model = new KqxsMb;
         if ($model->load(Yii::$app->request->post())) {
         	$model->rs_date = date('Y-m-d')." 00:00:00";
         	
         	$total_rs = trim($model->rs_0_0)
	         					.trim($model->rs_1_0)
	         					.trim($model->rs_2_0)
	         					.trim($model->rs_2_1)
	         					.trim($model->rs_3_0)
	         					.trim($model->rs_3_1)
	         					.trim($model->rs_3_2)
	         					.trim($model->rs_3_3)
	         					.trim($model->rs_3_4)
	         					.trim($model->rs_3_5)
	         					.trim($model->rs_4_0)
	         					.trim($model->rs_4_1)
	         					.trim($model->rs_4_2)
	         					.trim($model->rs_4_3)
	         					.trim($model->rs_5_0)
	         					.trim($model->rs_5_1)
	         					.trim($model->rs_5_2)
	         					.trim($model->rs_5_3)
	         					.trim($model->rs_5_4)
	         					.trim($model->rs_5_5)
	         					.trim($model->rs_6_0)
	         					.trim($model->rs_6_1)
	         					.trim($model->rs_6_2)
	         					.trim($model->rs_7_0)
	         					.trim($model->rs_7_1)
	         					.trim($model->rs_7_2)
	         					.trim($model->rs_7_3);
		
			$model->total_rs = $total_rs;
         	if($model->save()){
         		return $this->redirect(['update', 'id' => $model->id]);
         	}else{
         		if($model->getErrors('rs_date')){
         			$ketquaHomNay = KqxsMb::find()
     									->where(['=','rs_date',$model->rs_date])
					         			->orderBy(['ID'=>SORT_DESC])
     									->one();
         			$id = $ketquaHomNay->id;
         			return $this->redirect(['update', 'id' => $id]);
         		}else{
		         	return $this->render('create', [
			            'model'          => $model,
			        ]);
         		}
         	}
         }else{
	        return $this->render('create', [
	            'model'          => $model,

	        ]);
         }
    }
     public function actionUpdate($id) {
    	 $model = $this->findModel($id);
    	 // echo '<pre>';
    	 // print_r($model);
    	 // die;
         if ($model->load(Yii::$app->request->post())) {

         	$total_rs = trim($model->rs_0_0)
	         					.trim($model->rs_1_0)
	         					.trim($model->rs_2_0)
	         					.trim($model->rs_2_1)
	         					.trim($model->rs_3_0)
	         					.trim($model->rs_3_1)
	         					.trim($model->rs_3_2)
	         					.trim($model->rs_3_3)
	         					.trim($model->rs_3_4)
	         					.trim($model->rs_3_5)
	         					.trim($model->rs_4_0)
	         					.trim($model->rs_4_1)
	         					.trim($model->rs_4_2)
	         					.trim($model->rs_4_3)
	         					.trim($model->rs_5_0)
	         					.trim($model->rs_5_1)
	         					.trim($model->rs_5_2)
	         					.trim($model->rs_5_3)
	         					.trim($model->rs_5_4)
	         					.trim($model->rs_5_5)
	         					.trim($model->rs_6_0)
	         					.trim($model->rs_6_1)
	         					.trim($model->rs_6_2)
	         					.trim($model->rs_7_0)
	         					.trim($model->rs_7_1)
	         					.trim($model->rs_7_2)
	         					.trim($model->rs_7_3);
			$model->total_rs = $total_rs;
         	if($model->save()){
         		// return $this->redirect(['update', 'id' => $id]);
         		return $this->render('create', [
			            'model'          => $model,
			        ]);
         	}else{

         		// print_r($errors= $model->getErrors());
         		// die;
         		$errors= $model->getErrors();
	         	return $this->render('create', [
					'model'  => $model,
		        ]);
         	}
         }else{
	        return $this->render('create', [
	            'model'          => $model,
	        ]);
         }
    }
    public function actionView($id) {

        $model = $this->findModel($id);
        return $this->render('view', [
            'model'          => $model,
        ]);
    }
   	 protected function findModel($id)
    {
        if (($model = KqxsMb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Yêu cầu không tồn tại.');
        }
    }

}
