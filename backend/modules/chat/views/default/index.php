<?php

use backend\widgets\frontend\PaginationButtonWidget;
?>
<div class="chu-vua danhmuc">Diễn đàn thảo luận</div><br>
<?php
if (isset($dataProviders) && $dataProviders) {
    ?>
    <div>
        <!-- Phần hiện thi tv bình luận -->
        <ul class="w3-ul cantrai den chu-nho" id="showContentChat">
            <?php
            $baseUrl = Yii::$app->params['baseUrl'];
            $suffix = Yii::$app->params['suffix'];
            $mediaUrl = Yii::$app->params['mediaUrl'];
            if (isset($dataProviders) && $dataProviders) {
                foreach ($dataProviders as $key => $dataProvider) {
                    $id = $dataProvider->ID;
                    $createdAt = $dataProvider->CREATED_AT;
                    
                    $sendAt = Yii::$app->helper->strTime($createdAt);
                    $userName = $dataProvider['parent']['USERNAME'];
                    $userType = $dataProvider['parent']['USER_TYPE'];
                    $money = "0";
                    if (isset($dataProvider['money']->TOTAL) && $dataProvider['money']->TOTAL) {

                        $money = number_format($dataProvider['money']->TOTAL, '0', ',', '.');
                    }
                    $contentChild = $dataProvider['contentChild'];
                    switch ($userType) {
                        case 1:
                            $userType = "Admin";
                            break;

                        default:
                            $userType = "thành viên";
                            # code...
                            break;
                    }
                    $image = $mediaUrl . "/default/image/guest.png";
                    ?>
                    <br>
                    <li class="w3-bar">
                        <!-- phần chát bình luận của thành viên -->
                        <img src="<?= $image ?>" class="w3-bar-item w3-circle anh-item" style="width:90px; height: 70px" >
                        <div class="w3-bar-item">
                            <span class="dam" ><a href="<?= $baseUrl . 'thong-tin-ca-nhan/' . $userName . $suffix ?>" target="_blank">Nick name: <?= $userName ?></a></span><br>
                            <span class="nghieng chu-xnho">Chức vụ: <?= $userType ?></span><br>
                            <span class="nghieng chu-xnho">Túi online: <?= $money ?> vnđ</span>
                        </div>
                        <div style="clear: both;" class="chu-nho chat">(<?= $sendAt ?>) <?= $dataProvider->MESSAGE ?></div>
                       
                        <?php
                        if (isset($contentChild) && $contentChild) {
                            foreach ($contentChild as $key => $value) {
                                $messChild = $value['MESSAGE'];
                                $createdAt = $value['CREATED_AT'];
                    
                                $sendAt = Yii::$app->helper->strTime($createdAt);
                                $userNameChild = $value['parent']['USERNAME'];
                                $moneyChild = "0";
                                if (isset($value['money']->TOTAL) && $value['money']->TOTAL) {

                                    $moneyChild = number_format($value['money']->TOTAL, '0', ',', '.');
                                }
                                $image2 = $mediaUrl . "/default/image/guest.png";
                                ?>
                                <div class="w3-bar" style="margin-left: 20px; margin-right: 20px">
                                    <img src="<?= $image2 ?>" class="w3-bar-item w3-circle anh-item" style="width:90px; height: 70px" >
                                    <div class="w3-bar-item">
                                        <span class="dam" ><a href="<?= $baseUrl . 'thong-tin-ca-nhan/' . $userName . $suffix ?>" target="_blank">Nick name: <?= $userNameChild ?></a></span><br>
                                        <span class="chu-xnho">Chức vụ: <?= $userType ?></span><br>
                                        <span class="chu-xnho">Túi online: <?= $moneyChild ?> vnđ</span>
                                    </div>
                                    <!-- phần show nội dung trả lơi ở đây -->
                                    <div class="chu-nho chat-traloi">(<?= $sendAt ?>) <?= $messChild ?></div>		
                                </div>
                            <?php } ?>
                    <?php } ?>
                    </li>
                <?php } ?>
    <?php } ?>

        </ul>
    </div>
<?php } ?>
<hr>

<!-- //SU DUNG PHAN TRANG -->
<?php
if (isset($myPagination) && $myPagination['totalPage'] > 1) {
    ?>
    <div class="phantrang">
    <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
    </div>
<?php } ?> 
<br>




