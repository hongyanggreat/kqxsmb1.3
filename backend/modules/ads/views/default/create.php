<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\Users\models\Accounts */

$this->title = 'Thêm mới dịch vụ';
$this->params['breadcrumbs'][] = ['label' => 'Dịch vụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-create">
    <?= $this->render('_form', [
			'model'    => $model,
			'subject'  => 'Thêm mới dịch vụ',
    ]) ?>

</div>
