<?php

use backend\modules\users\models\Accounts;
use backend\modules\users\models\Useronline;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$tg = time();
$tgout = 900;
$tgOld = $tg - $tgout;

$model = new Useronline;
$model->TIME_SS = $tg;


// $sql="insert into useronline(tgtmp,ip,local) values('$tg','$REMOTE_ADDR','$PHP_SELF')";
// $query=mysql_query($sql);
// $sql="delete from useronline where tgtmp < $tgnew";
// $query=mysql_query($sql);
// $sql="SELECT DISTINCT ip FROM useronline WHERE local='$PHP_SELF'";
// $query=mysql_query($sql);
// $user = mysql_num_rows($query);
// echo "user online :$user";
// $model->IP =Yii::$app->helper->getRealIpAddr();
$model->IP = Yii::$app->helper->getUserIP();
$user = "";
if (!Yii::$app->user->isGuest) {
    $user = Yii::$app->user->identity->USERNAME;
}
$model->USER = $user;
$model->STATUS = 1;
$model->LOCAL = $_SERVER['REQUEST_URI'];

$model->save();

// print_r($soNguoiOnline);
$thanhvienOnline =  rand(10,50);
$numberOnline    =  rand(10,50);
$khachOnline     = rand(10,50);
$arrThanhVien    = [];

// Useronline::deleteAll('TIME_SS = :status AND age > :age', [':age' => 20, ':status' => 'active']);


$userNew = Accounts::find()->where(['STATUS' => 1])->orderBy(['ACC_ID' => SORT_DESC])->one();

// if(!Yii::$app->user->isGuest && Yii::$app->user->identity->USER_TYPE == 1){
    // tim so thanh vien online trong khoan thoi gian 
    $soNguoiOnline = Useronline::find()->select(['USER', 'IP'])->where(['>=', 'TIME_SS', $tgOld])->asArray()->orderBy(['USER' => SORT_ASC])->distinct()->all();
    // echo 'duoc phep xem thong ke chuan';
    foreach ($soNguoiOnline as $key => $value) {
        if (!in_array($value['USER'], $arrThanhVien) && $value['USER'] != "") {
            $arrThanhVien[] = $value['USER'];
        }
    }
    $thanhvienOnline = count($arrThanhVien);
    $numberOnline = count($soNguoiOnline);
?>
<table class="chu-nho danhmuc">
    <tr>
        <td class="cantrai">&reg; SoiCauXS.Com</td>
         <?php 
            if(!Yii::$app->user->isGuest && Yii::$app->user->identity->USER_TYPE == 1){
         ?>
        <td class="canphai">Tổng online: <?= $numberOnline ?></td>
        <?php } ?>
        <?php 
            if(!Yii::$app->user->isGuest){
         ?>
        <!-- Xổ danh sách các thành viên dang online -->
        <td id="nyc-tv-open" class="tvonline"><a>Thành viên online: <?= $thanhvienOnline ?>&nbsp;&nbsp;<i class="fa fa-bars"></i></a></td>
        <?php } ?>
    </tr>
</table>
<?php
if (isset($userNew) && $userNew) {
    ?>
    <div class="chu-xnho chaotv">
        <p>Chào mừng thành viên mới: <b class="w3-text-white"><a href="<?= $baseUrl . 'thong-tin-ca-nhan/' . $userNew->USERNAME . $suffix ?>"><?= $userNew->USERNAME ?></a></b></p>
    </div>
<?php } ?>
<!-- ThanhVienWidget -->
<?php
if (isset($arrThanhVien) && $thanhvienOnline > 0) {
    ?>
    <div style="display: none;" id="nyc-danhsachtv" class="chu-xnho nghieng w3-margin w3-center w3-padding-small w3-animate-bottom">
    <?php
    foreach ($arrThanhVien as $key => $nameUser) {
        # code...
        ?>
            <a class="re-do cannd w3-animate-right" href="<?= $baseUrl . 'thong-tin-ca-nhan/' . $nameUser . $suffix ?>"><?= $nameUser ?></a>
        <?php } ?>
        <hr style="clear: both; width: 99%;margin: auto;border-color: red;clear: both;">
    </div>
<?php } ?>