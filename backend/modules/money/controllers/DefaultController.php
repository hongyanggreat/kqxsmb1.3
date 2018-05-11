<?php

namespace backend\modules\money\controllers;
use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use backend\modules\money\models\Money;
/**
 * Default controller for the `money` module
 */
class DefaultController extends Controller
{
    const LIMIT = 100;
    /**
     * Renders the index view for the module
     * @return string
     */
     // public function behaviors()
    // {
    //     $actions   = Yii::$app->acl->getRole();
    //     $actions[] = 'search';
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
            $offset = ($page-1)*(self::LIMIT);
            $count = Money::find()->count();
            $myPagination = [
                'totalPage' =>ceil($count/self::LIMIT),
                'page'      =>$page,
                'limit'     =>self::LIMIT,
                'action'    =>$baseUrl.$module,
            ];
            $dataProviders = Money::find()
            				  ->with([    // this is for the related models
                                'parent' => function($query) {
                                    $query->select(['ACC_ID','USERNAME']);
                                },
                            ])
                            ->limit(self::LIMIT)
                            ->offset($offset)
                            ->orderBy(['ID'=>SORT_DESC])
                            ->asArray()
                            ->all();
            return $this->render('index', [
                'dataProviders' => $dataProviders,
                'myPagination'  => $myPagination,
            ]);
    }
}
