
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\frontend\PaginationButtonWidget;
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;
?>

<style>
    .imgloadig {
        background: url(<?php echo $baseUrl ?>kqxs/icons/loading-green.gif) no-repeat;
        width: 16px;
        height: 18px;
        margin: auto;
        display: block;
        zoom: 1;
        padding: 2px 0;
        float: left;
    }
</style>
<div class="chu-vua danhmuc">Chơi Loto online</div>
<div class="chu-nho noidung">
    <?php
//check thoi gian co duoc ghi so hay khong
    $timeNow = time();
    $timeStart = strtotime(date("Y-m-d 17:30:00"));
    $timeEnd = strtotime(date("Y-m-d 23:59:59"));
    
    // $timeStart = strtotime(date("Y-m-d 22:03:00"));
    // $timeEnd = strtotime(date("Y-m-d 22:28:00"));

    $checkTime = true;

    if ($timeNow >= $timeStart && $timeNow <= $timeEnd) {
        $checkTime = false;
    }
    ?>
    <div class="panel-2">
        <p> 
            Chơi loto online hoàn toàn miễn phí mỗi thành viên khi đăng ký sẽ được tặng 1.000.000 tiền ảo, số tiền này dùng để chơi loto online tại soicauxs.com, khi bạn chơi thua hết số tiền bạn không thể ghi số được, nhưng bạn có thể kiếm bằng cách like, share, viết bài hửu ích thậm chí comment... tại soicauxs.com. Ví iền chỉ mang tính giải trí ko thể quy đổi tiền thật, người chơi có quỷ tiền lớn nhất sẽ được đăng bảng top cao thủ chơi loto. 
        </p>
        <p>Bạn có thể ghi loto nhiều số ngăn cách bởi dấu phẩy (,) vd: 10,20</p>
    </div><br>
    <?php
    $notificationLotoOnline = Yii::$app->getSession()->getFlash("notificationLotoOnline");
    if ($notificationLotoOnline) {
        $class = $notificationLotoOnline['class'];
        $mes = $notificationLotoOnline['mes'];
        ?>
        <div class="panel-3">
            <?= $mes ?>
            <?php echo Html::error($model, 'LOTO_NUMBER'); ?>
            <?php echo Html::error($model, 'LOTO_PRICE'); ?>
            <?php echo Html::error($model, 'ACC_ID'); ?>
            <?php echo Html::error($model, 'totalMoney'); ?>    
        </div><br>
    <?php } ?>
    <?php
    if (Yii::$app->user->isGuest) {
        ?>
        <div class="panel-1">Hãy <a style="color: teal" href="?login&amp;referer=lotto_online.html">đăng nhập</a> để sử dụng chức năng ghi và quản lý loto. 
            <a style="color: teal" href="<?= $baseUrl . 'dang-ky' . $suffix ?>">Đăng ký</a> tại đây nếu bạn chưa có tài khoản.
        </div><br>
    <?php } ?>
    <?php
//check thoi gian co duoc ghi so hay khong
    if ($checkTime) {
        ?>
        <?php
        $form = ActiveForm::begin([
                    //'action' => '/login',
                    'options' => [
                        'class' => 'chu-nho ghiso'
                    ]
        ]);
        ?>
        
            Cặp số: <?= Html::activeTextInput($model, 'LOTO_NUMBER', ['placeholder' => 'Cặp số', 'class="input-1"' => '', 'id' => 'lotoNumber', 'title' => 'Có thể nhập nhiều cặp số, cách nhau bằng dấu phẩy']); ?>
            Số điểm: <?= Html::activeTextInput($model, 'LOTO_PRICE', ['placeholder' => 'Điểm', 'class="input-2"' => '', 'id' => 'lotoPrice', 'title' => 'Nhập tối đa 2000 điểm']); ?>
        <input type="submit" name="betsubmit" value="Ghi số" class="btn-1" /><br><br>
        <?php //echo  Html::textInput('LotoOnline[CREATED_AT]',date('d-m-Y'),['id'=>'ngay','type'=>'date']);  ?> 

        <!-- //LOTO_NUMBER -->

        <?php ActiveForm::end(); ?>

        <?php
    }//END check thoi gian co duoc ghi so hay khong
    else{
    ?>
    <div class="panel-1" style="text-align: center;">Thời gian chơi từ 0h00 đến 17h30 hằng ngày.Xin vui lòng quay lại vào ngày mai.</div><br>
    <?php } ?>
    <?php
// echo '<pre>';print_r($dataLoto);
    if (!Yii::$app->user->isGuest) {
        if (isset($dataLoto) && $dataLoto) {
            ?>

            <table cellpadding="0" cellspacing="0" class="w3-table-all">
                <tr>
                    <td colspan="5" class="muc-1">Lô ghi ngày hôm nay</td>
                </tr>
                <tr>
                    <td>Lô ghi</td>
                    <td>Điểm ghi</td>
                    <td>Nháy</td>
                    <td>Thắng/Thua</td>
                    <td>Lãi-lỗ</td>
                </tr>

                <?php
                $count = count($dataLoto);
                $totalDiem = 0;
                foreach ($dataLoto as $key => $value) {
                    $lotoNumber = $value['LOTO_NUMBER'];
                    $lotoPrice = $value['LOTO_PRICE'];
                    $isLoto = $value['IS_LOTO'];
                    $xienLoto = $value['LO_XIEN'];
                    $total = "0";
                    $totalDiem += $lotoPrice;
                    if (is_null($isLoto)) {
                        $isLoto = '<strong class="imgloadig"></strong>';
                    } else {
                        if (isset($isLoto) && $isLoto) {
                            $isLoto = "thắng";
                            $total = number_format($lotoPrice * $xienLoto * TILE_LOTO * 1000, '0', ',', '.') . " vnđ";
                        } else {
                            $isLoto = "thua";
                        }
                    }
                    if (is_null($xienLoto)) {
                        $total = '<strong class="imgloadig"></strong>';
                    }
                    ?>
                    <tr>
                        <td><b class="nut">&times;</b>&nbsp;&nbsp;<?= $lotoNumber ?></td>
                        <td><?= $lotoPrice ?></td>
                        <td><?= $xienLoto ?></td>
                        <td><?= $isLoto ?></td>
                        <td><?= $total ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3">Số điểm chơi: <?= number_format($totalDiem, '0', ',', '.') ?> điểm</td>
                    <td colspan="2">Số tiền chơi: - <?= number_format($totalDiem * LOTO * 1000, '0', ',', '.') ?> vnđ</td>
                </tr>
            </table>
        <?php } ?>
        <br>
        <table cellpadding="0" cellspacing="0" class="w3-table-all">
            <thead>
                <?php
                $totalMoney = 0;
                if (isset($dataMoney) && $dataMoney) {
                    $totalMoney = $dataMoney->TOTAL;
                }
                ?>
                <tr>
                    <td colspan="4" class="muc-1">Lịch sử chơi</td>
                    <td class="muc-1">Tài khoản: <?= number_format($totalMoney, '0', ',', '.') ?> vnđ</td>
                </tr>
            </thead>
            <tbody class="showHistory">
                <tr>
                    <td>Ngày</td>
                    <td>Lô ghi</td>
                    <td>Điểm ghi</td>
                    <td>Nháy</td>
                    <td>Thắng/Thua</td>
                </tr>
                <?php 
                    if(isset($historyLotos) && $historyLotos){
                        foreach ($historyLotos as $key => $value) {
                            $date = date('d-m-Y',strtotime($value['CREATED_AT']));

                            $lotoNumber = $value['LOTO_NUMBER'];
                            $lotoPrice  = $value['LOTO_PRICE'];
                            $isLoto     = $value['IS_LOTO'];
                            $xienLoto   = $value['LO_XIEN'];
                            if(is_null($xienLoto)){
                                $xienLoto = '<strong class="imgloadig"></strong>';
                            }
                            if(is_null($isLoto)){
                                $isLoto = '<strong class="imgloadig"></strong>';
                            }else{
                                if(isset($isLoto) && $isLoto){
                                    $isLoto = "thắng";
                                    $total = number_format($lotoPrice*$xienLoto*80*1000,'0',',','.');
                                }else{
                                    $isLoto = "thua";
                                }
                            }
                ?>
                    <tr>
                        <td><?= $date ?></td>
                        <td><?= $lotoNumber ?></td>
                        <td><?= $lotoPrice ?></td>
                        <td><?= $xienLoto ?></td>
                        <td><?= $isLoto ?></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>  
        </table>

    <?php } ?>
    <br>
    <!-- //SU DUNG PHAN TRANG -->
<?php
if (isset($myPagination) && $myPagination['totalPage'] > 1) {
    ?>
    <div class="phantrang" style="text-align: center;">
    <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
    </div>
<?php } ?> 
    <br>
    <span class="list-2"><a href="<?= $baseUrl . 'choi-online' . $suffix ?>">Chơi online</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'quay-thu-dien-toan' . $suffix ?>">Quay thử điện toán</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'bang-chot-so-cao-thu' . $suffix ?>">Bảng chốt số cao thủ</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'top-cao-thu-choi-cau' . $suffix ?>">Top cao thu chơi cầu</a></span>
    <br class="xoahet"><br>
</div>