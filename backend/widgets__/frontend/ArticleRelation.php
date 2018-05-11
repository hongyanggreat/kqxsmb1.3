<?php 
namespace backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class ArticleRelation extends Widget
{
    public $dataRelations;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
         return $this->render('article-relation',['dataRelations'=>$this->dataRelations]);
    }
}