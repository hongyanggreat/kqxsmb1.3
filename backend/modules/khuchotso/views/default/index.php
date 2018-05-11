<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\frontend\PaginationButtonWidget;
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;


?>
<div class="chu-vua danhmuc">Khu chốt số</div>
<div class="chu-nho noidung">
    <div class="panel-2">
        <ul>
            <li>
                Khu chốt số từ các chuyên gia soi cầu và thành viên đạt top cao thủ loto online!
            </li>
            <li>
                Khu vực này chỉ dành cho thành viên vip, các thành viên khi đăng ký vip thành công sẽ có 3 ngày nhận số chốt từ các chuyên gia cao thủ soi cầu.
            </li>
            <li>
                Thành viên chưa đăng ký hoặc hết hạn vip không thể vào khu này.
            </li>
        </ul>
    </div><br>
    <table cellspacing="0" cellpadding="7" class="khuchotso">
        <thead>
            <tr>
                <th colspan="4" class="chu-xnho do nghieng cangiua">
        <marquee  align="center" direction="left" scrollamount="5" width="80%">
            Chuyên gia cầu: HungTK đã chốt số!
        </marquee>
        </th>
        </tr>
        <tr>
            <th colspan="2">Chuyên gia, cao thủ loto</th>
            <th>Ngày chốt</th>
            <th colspan="2">Cặp số từ chuyên gia, cao thủ</th>
        </tr>
        </thead>
        <?php 
            if(isset($dataProviders) && $dataProviders){

         ?>
        <tbody>
            <?php 
                foreach ($dataProviders as $key => $dataProvider) {
                    $accId    = $dataProvider['parent']['ACC_ID'];
                    $userName = $dataProvider['parent']['USERNAME'];
                    if($userName){
                        $linkInfo = $baseUrl . 'thong-tin-ca-nhan/' . $userName . $suffix;
                    }else{
                        $linkInfo = "#";

                    }
             ?>
            <tr>
                <td><div class="chuyengia"></div></td>
                <td>
                    <!-- //NAME -->
                    <?= $userName ?>
                    <br>
                    <i class="chu-xnho">chuyên gia</i>
                </td>
                <td><?php echo $dataProvider->CREATED_AT ?></td>
                <td><?php echo $dataProvider->CONTENT ?></td>
            </tr>
            <?php } ?>
             <tr>
                <td colspan="4" class="cangiua">
                    <?php
                    if (isset($myPagination) && $myPagination['totalPage'] > 1) {
                        ?>
                    <div class="phantrang">
                                                  <!-- //SU DUNG PHAN TRANG -->
                            <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
                    </div>
                    <?php } ?> 
                </td>
            </tr>

        </tbody>
        <?php } ?>
         <!-- <tbody>
            <tr>
                <td><div class="chuyengia"></div></td>
                <td>
                    HUNGTK<br>
                    <i class="chu-xnho">chuyên gia</i>
                </td>
                <td>01/11/2017</td>
                <td>Lô bach thủ: 24 song thủ 65 69 Dàn đề 5: 33 36 37 65 69</td>
            </tr>
            <tr>
                <td><div class="vuongmien-vang"></div></td>
                <td>
                    huong99<br>
                    <i class="chu-xnho">admin</i>
                </td>
                <td>01/11/2017</td>
                <td>Lô bach thủ: 24 song thủ 65 69 Dàn đề 5: 33 36 37 65 69</td>
            </tr>
            <tr>
                <td><div class="vuongmien-bac"></div></td>
                <td>
                    Khanh77<br>
                    <i class="chu-xnho">admin</i>
                </td>
                <td>01/11/2017</td>
                <td>Lô bach thủ: 24 song thủ 65 69 Dàn đề 5: 33 36 37 65 69</td>
            </tr>
            <tr>
                <td><div class="sao-2"></div></td>
                <td>
                    Nampro<br>
                    <i class="chu-xnho">thành viên</i>
                </td>
                <td>01/11/2017</td>
                <td>Lô bach thủ: 24 song thủ 65 69 Dàn đề 5: 33 36 37 65 69</td>
            </tr>
            <tr>
                <td><div class="sao-1"></div></td>
                <td>
                    Long56<br>
                    <i class="chu-xnho">quản lý</i>
                </td>
                <td>01/11/2017</td>
                <td>Lô bach thủ: 24 song thủ 65 69 Dàn đề 5: 33 36 37 65 69</td>
            </tr>

        </tbody> -->
    </table>
 
<br>
    <br>
    <span class="list-2"><a href="<?= $baseUrl . 'choi-online' . $suffix ?>">Chơi online</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'quay-thu-dien-toan' . $suffix ?>">Quay thử điện toán</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'bang-chot-so-cao-thu' . $suffix ?>">Bảng chốt số cao thủ</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'top-cao-thu-choi-cau' . $suffix ?>">Top cao thu chơi cầu</a></span>
    <br class="xoahet"><br>
</div>