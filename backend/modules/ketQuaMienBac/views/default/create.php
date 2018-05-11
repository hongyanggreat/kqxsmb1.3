<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\moduleManager\models\Modules */

$this->title = 'Nhập kết quả ngày hôm nay';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách Kết qủa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modules-create">
    <?= $this->render('_form', [
        'model' => $model,
        'subject' => "XỔ SỐ TRUYỀN THỐNG [ Ngày ".date("d-m-Y")." ]",
    ]) ?>

</div>
