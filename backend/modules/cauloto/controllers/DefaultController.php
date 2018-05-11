<?php

namespace backend\modules\cauloto\controllers;

use yii\web\Controller;

/**
 * Default controller for the `cauloto` module
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
    	$this->layout =false;

    	die;
        return $this->render('index');
    }
}
