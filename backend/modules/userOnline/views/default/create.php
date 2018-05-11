<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\userOnline\models\Useronline */

$this->title = 'Create Useronline';
$this->params['breadcrumbs'][] = ['label' => 'Useronlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useronline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
