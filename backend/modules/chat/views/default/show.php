<?php
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$mediaUrl = Yii::$app->params['mediaUrl'];
if (isset($dataProviders) && $dataProviders) {
    foreach ($dataProviders as $key => $dataProvider) {
        $id = $dataProvider->ID;
        $createdAt = $dataProvider->CREATED_AT;

        $sendAt = Yii::$app->helper->strTime($createdAt);
       
        $accId = $dataProvider['parent']['ACC_ID'];
        $userName = $dataProvider['parent']['USERNAME'];
        if($userName){
            $linkInfo = $baseUrl . 'thong-tin-ca-nhan/' . $userName . $suffix;
        }else{
            $linkInfo = "#";

        }
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
        
        $image = $dataProvider['parent']['IMAGE'];                  
        $path = 'uploads/accounts/';
        $linkImage = $baseUrl.'uploads/default/image/guest.png';
        if(!empty($image)){
             $sourcePath = $baseUrl.$path.$accId.'/avata/';
             $linkImage =  $sourcePath . $image;
        }
        if($userName){
        ?>
        <br>
        <li class="w3-bar">
            <!-- phần chát bình luận của thành viên -->
            <img src="<?= $linkImage ?>" class="w3-bar-item w3-circle anh-item" style="width:90px; height: 70px" >
            <div class="w3-bar-item">
                <span class="dam" ><a href="<?=$linkInfo ?>" target="_blank">Nick name: <?= $userName ?></a></span><br>
                <span class="chu-xnho">Chức vụ: <?= $userType ?></span><br>
                <span class="chu-xnho">Túi online: <?= $money ?> vnđ</span>
            </div>
            <div style="clear: both;" class="chu-nho chat">(<?php echo $sendAt ?>) <?= $dataProvider->MESSAGE ?></div>
            <span class="nghieng chu-xnho w3-round-xxlarge nen-xanh trang cannd-lr5 w3-hover-red nut-nho btnTraloiTinnhan" id="traloiTinnhan1">Trả lời</span>
            <span class="nghieng chu-xnho w3-round-xxlarge nen-xanh trang cannd-lr5 w3-hover-red nut-nho btnTraloiTinnhan" id="traloiTinnhan2">Nhắn tin</span>
            <div style="width: 100%; display:none" class="traloiTinnhan">
                <?php
                if (!Yii::$app->user->isGuest) {
                    ?>
                    <form class="cantrai traloi">
                        <input type="hidden" id="idParent" value="<?= $id ?>" acc="<?= $accId ?>">
                        <textarea class="w3-input w3-border w3-animate-input" id="contentChat"></textarea>
                        <button type="button" id="sendMessage" class="nghieng chu-xnho w3-round-xxlarge nen-xanh trang cannd-lr5 w3-hover-red nut-nho">Gửi</button>
                        <button type="button" id="cancelChatMore" class="nghieng chu-xnho w3-round-xxlarge nen-do trang cannd-lr5 w3-hover-red nut-nho">Hủy</button>
                    </form>
                <?php } else { ?>
                    Để xử dụng chức năng này vui lòng : 
                    <a href="/kqxsmb/dang-nhap" style="width: 95px;" class="">Đăng nhập</a>
                <?php } ?>
            </div>
            <?php
            if (isset($contentChild) && $contentChild) {
                foreach ($contentChild as $key => $value) {
                    $messChild = $value['MESSAGE'];

                    $createdAt = $value['CREATED_AT'];
                    $accIdChild = $value['parent']['ACC_ID'];
                    $sendAt = Yii::$app->helper->strTime($createdAt);
                    $userNameChild = $value['parent']['USERNAME'];
                    $moneyChild = "0";
                    if (isset($value['money']->TOTAL) && $value['money']->TOTAL) {

                        $moneyChild = number_format($value['money']->TOTAL, '0', ',', '.');
                    }
                    $imageChild = $value['parent']['IMAGE'];                  
                    $path = 'uploads/accounts/';
                    $linkImageChild = $baseUrl.'uploads/default/image/guest.png';
                    if(!empty($imageChild)){
                         $sourcePath = $baseUrl.$path.$accIdChild.'/avata/';
                         $linkImageChild =  $sourcePath . $imageChild;
                    }
                    ?>
                    <div class="w3-bar" style="margin-left: 20px; margin-right: 20px">
                        <img src="<?= $linkImageChild ?>" class="w3-bar-item w3-circle anh-item" style="width:90px; height: 70px" >
                        <div class="w3-bar-item">
                            <span class="dam" ><a href="<?= $baseUrl . 'thong-tin-ca-nhan/' . $userNameChild . $suffix ?>" target="_blank">Nick name: <?= $userNameChild ?></a></span><br>
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
<?php } ?>
