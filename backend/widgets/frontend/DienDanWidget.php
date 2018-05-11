<?php 
namespace backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class DienDanWidget extends Widget
{
    public $dataDienDan;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
         return $this->render('dien-dan',['dataDienDan'=>$this->dataDienDan]);
    }
}