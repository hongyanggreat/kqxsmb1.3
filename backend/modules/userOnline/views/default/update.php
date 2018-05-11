<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\userOnline\models\Useronline */

$this->title = 'Update Useronline: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Useronlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="useronline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
