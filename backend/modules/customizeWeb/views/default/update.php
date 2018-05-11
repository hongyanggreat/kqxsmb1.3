<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\Users\models\Accounts */

$this->title = 'Cập nhật customize web : ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="accounts-update">

    <?= $this->render('_form', [
		'model'    => $model,
		'subject'  => $this->title ,
    ]) ?>

</div>
