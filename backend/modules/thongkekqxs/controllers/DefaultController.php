<?php

namespace backend\modules\thongkekqxs\controllers;

use yii\web\Controller;

/**
 * Default controller for the `thongkekqxs` module
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
        return $this->render('index');
    }
}
