<?php

namespace backend\modules\messenger\controllers;
use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Default controller for the `messenger` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    //  public function behaviors()
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
        return $this->render('index');
    }
}
