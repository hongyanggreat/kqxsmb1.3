<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\Users\models\Accounts */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Chốt số', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-create">
    <?= $this->render('_form', [
			'model'    => $model,
			'subject'  => 'Chốt số',
    ]) ?>

</div>
