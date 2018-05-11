<?php

namespace backend\modules\dangnhap\controllers;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;
/**
 * Default controller for the `dang-nhap` module
 */
class DefaultController extends Controller
{
    public function actions()
    {
       $this->layout = "@app/views/layouts/frontend/layoutMain";
    }
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
