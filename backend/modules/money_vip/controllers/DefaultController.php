<?php

namespace backend\modules\money_vip\controllers;

use yii\web\Controller;

/**
 * Default controller for the `money_vip` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
