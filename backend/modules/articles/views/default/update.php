<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\Users\models\Accounts */

$this->title = 'Cập nhật bài viết ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="accounts-update">

    <?= $this->render('_form', [
		'model'    => $model,
		'subject'  => $this->title ,
		'dataCate'  => $dataCate ,
    ]) ?>

</div>
