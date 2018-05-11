<?php

namespace backend\modules\bangtopcaothu\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\money\models\Money;
use backend\modules\choiOnline\models\LotoOnline;
/**
 * Default controller for the `bangtopcaothu` module
 */
class DefaultController extends Controller
{
    const LIMIT = 9;
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
        $module  = Yii::$app->controller->module->id;
              $dataProviders =  Money::find()->select([
                                    'money.ID',
                                    'money.ACC_ID',
                                    'money.TOTAL',
                                    'money.STATUS',

                                    'acc.USERNAME',
                                ])
                        ->leftJoin('tbl_accounts acc', 'acc.ACC_ID=money.ACC_ID')
                        ->andWhere(['=','acc.STATUS',1])
                        ->limit(self::LIMIT)
                        ->orderBy(['money.TOTAL'=>SORT_DESC])
                        ->asArray()
                        ->all();
            $arrAccId = [];
            foreach ($dataProviders as $key => $dataProvider) {
               $arrAccId[$dataProvider['ACC_ID']] = $dataProvider['ACC_ID'];
            }
            $lotoOnlines = LotoOnline::find()->select([
                        'ACC_ID',
                        'IS_LOTO',
                        // 'SUM(IS_LOTO) as TOTAL_AMOUNT',
                        'COUNT(ID) as TOTAL_AMOUNT',
                    ])
            ->where(['ACC_ID'=>$arrAccId])
            ->groupBy(['ACC_ID','IS_LOTO'])

            ->asArray()->all();
            // foreach ($lotoOnlines as $key => $value) {
            // }
            // echo '<pre>';
            // print_r($dataProviders);
            // print_r($lotoOnlines);
            // die;
            return $this->render('index', [
                'lotoOnlines'   => $lotoOnlines,
                'dataProviders' => $dataProviders,
            ]);
    }
}
