<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;
$user = "";
$user = Yii::$app->user->identity->USERNAME;
$cv = "";
$cv = Yii::$app->user->identity->USER_TYPE;
$ht = "";
$ht = Yii::$app->user->identity->FULL_NAME;
$sdt = "";
$sdt = Yii::$app->user->identity->PHONE;
$email = "";
$email = Yii::$app->user->identity->EMAIL;
$avata = "";
$avata = Yii::$app->user->identity->IMAGE;
?>
<div class="panel-2">
    <img src="../../../../web/uploads/img/cauchuan.gif" alt="" width="100%" height="100px"/>
</div>
<div class="chu-vua danhmuc">Trang thông tin cá nhân</div>
<div class="chu-nho noidung">
    <br>
    <img width="200px" height="200px" src="" alt="Ảnh cá nhân"><br>
    <label>Tên đăng nhập: <?= $user ?></label><br>
    <label>Chức vụ: <?= $cv ?></label><br>
    <label>Túi tiền: 2.000.000</label><br>
    <label>Họ và tên: <?= $ht ?></label><br>
    <label>Số điện thoại: <?= $sdt ?></label><br>
    <label>Email: <?= $email ?></label><br><br>
    <form class="w3-input w3-border">
        <label class="dam">Thay đổi ảnh đại diện</label><br>
        <input onchange="" size="60" type="file" class="w3-small w3-ripple w3-red"><br><br>
        <label class="dam">Thay đổi mật khẩu</label><br>
        <label>Mật khẩu mới</label><br>
        <input type="" name=""><br>
        <label>Nhập lại mật khẩu</label><br>
        <input type="" name=""><br>
        <button class="w3-btn w3-small w3-ripple w3-red">Thay đổi mật khẩu</button><br>
    </form><br>
</div>