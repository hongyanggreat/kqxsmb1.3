<?php

namespace backend\modules\thanhvien\controllers;
use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\modules\dangky\models\Accounts;
/**
 * Default controller for the `thanhvien` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
     public function behaviors()
    {
        // $actions   = Yii::$app->acl->getRole();
        $actions = [];
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
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex($username)
    {
        $model = Accounts::find()
                    ->where(['USERNAME'=>$username])
                    ->one();
        $model->PASSWORD = "";
        return $this->render('index',[
            'model'=>$model,
        ]);
    }
}
