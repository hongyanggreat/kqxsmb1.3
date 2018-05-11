<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\Users\models\Accounts */

$this->title = 'Thêm mới bài viết';
$this->params['breadcrumbs'][] = ['label' => 'Dịch vụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-create">
    <?= $this->render('_form', [
			'model'    => $model,
			'dataCate' => $dataCate,
			'subject'  => 'Thêm mới dịch vụ',
    ]) ?>

</div>
