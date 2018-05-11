<?php

namespace backend\modules\trangchu\controllers;
use Yii;
use yii\web\Controller;

use backend\modules\trangchu\models\KqxsMb;
use backend\modules\categories\models\Categories;

use backend\modules\trangchu\models\Articles;

/**
 * Default controller for the `trangchu` module
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
        $ketqua      = KqxsMb::find()->orderBy(['ID'=>SORT_DESC])->one();

        $cateKinhNghiem = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>3])->andWhere(['STATUS'=>1])->one();
        $kinhNghiems = Articles::find()->where(['STATUS'=>1])->andWhere(['CATE_ID'=>3])->orderBy(['ID'=>SORT_DESC])->limit(10)->all();
        
        $cateTinTuc = Categories::find()->select(['ID','NAME','ALIAS'])->where(['ID'=>2])->andWhere(['STATUS'=>1])->one();
        $tinTucs = Articles::find()->where(['STATUS'=>1])->andWhere(['CATE_ID'=>2])->orderBy(['ID'=>SORT_DESC])->limit(10)->all();
       
        return $this->render('index',[
                    'ketqua'         => $ketqua,
                    'cateKinhNghiem' => $cateKinhNghiem,
                    'kinhNghiems'    => $kinhNghiems,
                    'cateTinTuc'     => $cateTinTuc,
                    'tinTucs'        => $tinTucs,
            ]);
    }
}
