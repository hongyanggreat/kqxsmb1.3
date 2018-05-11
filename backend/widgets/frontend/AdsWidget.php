<?php 
namespace backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class AdsWidget extends Widget
{
    public $dataAds;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
         return $this->render('ads',['dataAds'=>$this->dataAds]);
    }
}