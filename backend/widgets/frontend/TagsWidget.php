<?php 
namespace backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class TagsWidget extends Widget
{
    public $dataTags;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
         return $this->render('tags',['dataTags'=>$this->dataTags]);
    }
}