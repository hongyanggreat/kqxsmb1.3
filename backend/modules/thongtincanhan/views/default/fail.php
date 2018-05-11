<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;
?>
<div class="panel-2">
    <img src="../../../../web/uploads/img/cauchuan.gif" alt="" width="100%" height="100px"/>
</div>
<div class="chu-vua danhmuc">Trang thông tin cá nhân</div>
<div class="chu-nho noidung">
    <br>
    <label>Thông tin cá nhân này không tồn tại.</label>
    <br>
</div>