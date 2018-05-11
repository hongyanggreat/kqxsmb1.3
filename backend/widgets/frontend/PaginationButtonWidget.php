<?php 
namespace  backend\widgets\frontend;

use yii\base\Widget;
use yii\helpers\Html;

class PaginationButtonWidget extends Widget
{
    public $paginator;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        // return $this->render('pagination',['paginator'=>$this->paginator]);
        return $this->render('pagination-button',['paginator'=>$this->paginator]);
    }
}