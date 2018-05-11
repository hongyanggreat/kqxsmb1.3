<?php

namespace backend\modules\detailAirticle\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\categories\models\Categories;
use backend\modules\articles\models\Articles;
/**
 * Default controller for the `detailAirticle` module
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
    public function actionIndex($category,$alias)
    {	
        $baseUrl = Yii::$app->params['baseUrl'];
        $suffix = Yii::$app->params['suffix'];
    	$categories = Categories::find()->select(['ID','NAME','ALIAS'])
                        ->where(['ALIAS'=>$category])
                        ->andWhere(['STATUS'=>1])
                        ->one();
        if(!isset($categories) || !$categories){
            Yii::$app->response->redirect($baseUrl);
        }
        $dataProvider = Articles::find()
                        ->select(['ID','TITLE','ALIAS','CATE_ID','CONTENT'])
                        ->where(['STATUS'=>1])
                        ->andWhere(['CATE_ID'=>$categories->ID])
                        ->andWhere(['ALIAS'=>$alias])
                        ->one();  
       $dataRelations = Articles::find()
                        ->select(['ID','TITLE','ALIAS','CATE_ID','DESCRIPTION'])
                        ->where(['STATUS'=>1])
                        ->andFilterWhere(
                                ['or',
                                    ['>=','ID',$dataProvider->ID],
                                    ['<=','ID',$dataProvider->ID]
                                ])
                        ->where(['CATE_ID'=>$categories->ID])
                        ->orderBy(['ID'=>SORT_DESC])
                        ->limit(5)
                        ->all();   
                      
        if(!isset($dataProvider) || !$dataProvider){
            Yii::$app->response->redirect($baseUrl.'kinhNghiem'.$suffix);
        }
        return $this->render('index',[
                'categories'    =>$categories,
                'dataProvider'  =>$dataProvider,
                'dataRelations' =>$dataRelations,
            ]);
    }
}
