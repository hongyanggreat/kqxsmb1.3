<?php 
namespace backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class ThanhVienWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
         return $this->render('thanh-vien');
    }
}