<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\frontend\PaginationButtonWidget;
    $baseUrl = Yii::$app->params['baseUrl'];
    $suffix = Yii::$app->params['suffix'];
    $module = Yii::$app->controller->module->id;
?>

<div class="chu-vua danhmuc">Bảng chốt số cao thủ</div>
<div class="chu-nho noidung">
    <div class="panel-2">
        <p> 
            Bảng thống kê danh sách thành thành viên chốt số loto<br>
            Bạn đã chốt số chưa? hãy nhanh tham gia khu chốt số online ngay bây giờ, thành viên có thành tích cao nhất sẽ được đăng bảng top cao thủ, đại gia loto online.
        </p>
    </div><br>
    <table cellspacing="0" cellpadding="7" class="bangchotso">
        <thead>
            <tr>
                <th>Danh sách thành viên chốt số ngày</th>
                <th>Thời gian chốt lô</th>
                <th>Lô đã chốt</th>
            </tr>
            <tr>
                <th colspan="3" class="chu-xnho denmo nghieng">(<?php echo $date; ?>)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($dataProviders) && $dataProviders){
                    foreach ($dataProviders as $key => $value) {
                        $userName = "";
                        foreach ($accArrDatas as $keyAcc => $valueAcc) {
                            if($valueAcc['ACC_ID'] == $key ){
                                $userName = $valueAcc['parent']['USERNAME'];
                            }
                            
                        }
             ?>
                <tr>
                    <td><?= $userName ?></td>
                    <td>Chốt: <?= $date ?></td>
                    <td>Lô: <?= $value ?></td>
                </tr>
            <?php 
                    }
                }
            ?>            
        </tbody>
    </table>
    <!-- //SU DUNG PHAN TRANG -->
    <?php
    if (isset($myPagination) && $myPagination['totalPage'] > 1) {
        ?>
        <div class="phantrang">
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