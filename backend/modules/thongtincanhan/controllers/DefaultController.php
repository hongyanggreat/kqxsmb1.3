<?php

namespace backend\modules\thongtincanhan\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\users\models\Accounts;
use yii\web\UploadedFile;
use \yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * Default controller for the `thongtincanhan` module
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

    public function actionIndex()
    {
        
        $baseUrl = Yii::$app->params['baseUrl'];
        $suffix = Yii::$app->params['suffix'];
        if ( Yii::$app->user->isGuest ){
            return $this->redirect($baseUrl.'dang-nhap'.$suffix);
        }
       $username = Yii::$app->user->identity->USERNAME;
       $model = Accounts::find()
                        ->select(['ACC_ID','PARENT_ID','USERNAME','FULL_NAME','ADDRESS','PHONE','IMAGE','EMAIL','CREATE_DATE','STATUS','USER_TYPE'])
                        ->where(['=','STATUS','1'])
                        ->andwhere(['=','USERNAME', $username])
                        // ->asArray()
                        ->with([    // this is for the related models
                            'money' => function($query) {
                                $query->select(['ACC_ID','TOTAL']);
                            },
                        ])
                        ->one();
   
        if($model){
            return $this->render('view',['model'=>$model]);
        }else{

            return $this->render('fail');
        }
    } 
    public function actionView($username)
    {

        // $baseUrl = Yii::$app->params['baseUrl'];
        // $suffix = Yii::$app->params['suffix'];
        // if ( Yii::$app->user->isGuest ){
        //     return $this->redirect($baseUrl.'/dang-nhap'.$suffix);
        // }

       $model = Accounts::find()
                        ->select(['ACC_ID','PARENT_ID','USERNAME','FULL_NAME','ADDRESS','PHONE','IMAGE','EMAIL','CREATE_DATE','STATUS','USER_TYPE'])
                        ->where(['=','STATUS','1'])
                        ->andwhere(['=','USERNAME', $username])
                        // ->asArray()
                        ->with([    // this is for the related models
                            'money' => function($query) {
                                $query->select(['ACC_ID','TOTAL']);
                            },
                        ])
                        ->one();
   
        if($model){
            return $this->render('view',['model'=>$model]);
        }else{

            return $this->render('fail');
        }
    }
    public function actionUploadimage()
    {
        $data = [
            'status'=>false,
            'message'=>"Bạn không có quyền thực thi",
        ];
        if ( Yii::$app->user->isGuest ){
            echo json_encode($data);
            return;
        }

        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = $data['Accounts']['ACC_ID'];
            $model     = $this->findModel($id);
            $image_current = $model->IMAGE;
            $userName = $model->USERNAME;
            $fileImage = UploadedFile::getInstance($model,'IMAGE');
            $nameImage = '';
            if(isset($fileImage)){
                $nameImage         = $userName.time().'.'.$fileImage->extension;
                $model->IMAGE = $nameImage;
 				$path = 'uploads/accounts/';
 				if($image_current){
                	Yii::$app->helper->deleteImage($path,'avata',$id,$image_current);
 				}
                Yii::$app->helper->saveImage($path,$fileImage,'avata',$id,$nameImage);
                if($model->save()){
                	$data['status'] = true;
                	$data['message'] = "Thay đổi thành công";
                }else{
                	$data['message'] = "Thay đổi thất bại";
                }
            }else{
               $data['message'] = "Vui lòng chọn file upload";
            }

        }
        echo json_encode($data);

    } 
    public function actionChangepassword()
    {
    	$data = [
            'status'=>false,
            'message'=>"Bạn không có quyền thực thi",
        ];
        if ( Yii::$app->user->isGuest ){
            echo json_encode($data);
            return;
        }
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = $data['Accounts']['ACC_ID'];
            $pw = $data['Accounts']['PASSWORD'];
            $re_pw = $data['Accounts']['RE_PASSWORD'];
            if($pw && $re_pw && $pw==$re_pw ){
				$pass            = Yii::$app->security->generatePasswordHash($pw);
				$auth_key        = Yii::$app->security->generateRandomString();
				$model           = $this->findModel($id);
				$model->PASSWORD = $pass;
				$model->AUTH_KEY = $auth_key;
	            if($model->save()){
	            	$data['status'] = true;
	            	$data['message'] = "Thay đổi mật khẩu thành công";
	            }else{
	            	$data['message'] = "Thay đổi mật khẩu thất bại";
	            }
            }else{
	            $data['message'] = "Mật khẩu Rỗng hoặc không trùng khớp";
            }

        }
        echo json_encode($data);

    } 
      protected function findModel($id)
    {
        if (($model = Accounts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
