<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;

$dt = new DateTime();
$tg = $dt->format('Y-m-d H:i:s');
?>
<div class="chu-vua danhmuc">Top cao thủ chơi loto online</div>
<div class="chu-nho noidung">
    <div class="panel-2">
        <ul>
            <li>
                Bảng vinh danh thành viên có thành tích phân tích cầu chuẩn xác nhất!
            </li>
            <li>
                Đây là thống kê xuyên suốt quá trinh người chơi online mà có tỉ lệ phân tích, bắt cầu chuẩn xác, đạt xác xuất cao nhất.
            </li>
            <li>
                Hãy tham gia khu chốt số ngay bây giờ để giành vị trí số 1 cao thủ.
            </li>
        </ul>
    </div><br>
    <table cellspacing="0" cellpadding="7" class="bangchotso">
        <thead>
            <tr>
                <th colspan="4" class="chu-xnho do nghieng cangiua">
        <marquee  align="center" direction="left" scrollamount="5" width="80%">
            Chúc mừng cao thủ HUNGTK đã dành vị trí top 1!
        </marquee>
        </th>
        </tr>
        <tr>
            <th colspan="2">Top vinh danh</th>
            <th>Tỉ lệ thắng thua</th>
            <th>Ví tiền</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($dataProviders) && $dataProviders){
                    $i = 0;
                    // $tilePhantram = 0;
                    // $lotoWin = 0;
                    // $lotoMiss = 0;
                    foreach ($dataProviders as $key => $dataProvider) {
                        $i++;
                        $contentDiv = "";


                        switch ($key) {
                            case '0':
                                $class ="vuongmien-vang";
                                break;
                             case '1':
                                $class ="vuongmien-bac";
                                break;
                             case '2':
                                $class ="sao-2";
                                break;
                             case '3':
                                $class ="sao-1";
                                break;
                            
                            default:
                                $class = 'dam cangiua';
                                $contentDiv = $i;
                                break;
                        }

                        $accId    = $dataProvider['ACC_ID'];
                        $userName = $dataProvider['USERNAME'];
                        if($userName){
                            $linkInfo = $baseUrl . 'thong-tin-ca-nhan/' . $userName . $suffix;
                        }else{
                            $linkInfo = "#";

                        }
                        $money = "0";
                        if (isset($dataProvider['TOTAL']) && $dataProvider['TOTAL']) {

                            $money = number_format($dataProvider['TOTAL'], '0', ',', '.');
                        }
                        
                        $tilePhantram  = 0;
                        $lotoWin  = 0;
                        $lotoMiss = 0;
                        foreach ($lotoOnlines as $k_LtOnl => $v_LtOnl) {
                            if($accId == $v_LtOnl['ACC_ID']){
                                if($v_LtOnl['IS_LOTO'] == 1){
                                    $lotoWin += $v_LtOnl['TOTAL_AMOUNT'];
                                } 
                                if($v_LtOnl['IS_LOTO'] == 0){
                                    $lotoMiss += $v_LtOnl['TOTAL_AMOUNT'];
                                }
                            }
                            // echo $accId;
                            // print_r($v_LtOnl);

                            // echo '----------------';
                        }
                        // echo 'WIN:'.$lotoWin;
                        // echo 'MISS:'.$lotoMiss;
                        if($lotoWin+$lotoMiss > 0){
                            $tilePhantram = substr( $lotoWin/($lotoWin+$lotoMiss)*100, 0,5);
                        }
                        // echo '------------------';
             ?>
                <tr>
                    <td><div class="<?= $class ?>"><?= $contentDiv ?></div></td>
                    <td idAcc="<?= $accId ?>"><?= $userName ?></td>
                    <td><?= $tilePhantram  ?>% [WIN : <?= $lotoWin ?> -MISS : <?= $lotoMiss ?>]</td>
                    <td><?= $money ?> VNĐ</td>
                </tr>

             <?php }} ?>
        </tbody>
    </table>
    <br>
    <span class="list-2"><a href="<?= $baseUrl . 'choi-online' . $suffix ?>">Chơi online</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'quay-thu-dien-toan' . $suffix ?>">Quay thử điện toán</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'bang-chot-so-cao-thu' . $suffix ?>">Bảng chốt số cao thủ</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'top-cao-thu-choi-cau' . $suffix ?>">Top cao thu chơi cầu</a></span>
    <br class="xoahet"><br>
</div>