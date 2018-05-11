<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\frontend\PaginationButtonWidget;
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;

$dt = new DateTime();
$tg = $dt->format('Y-m-d H:i:s');
?>

<style>
    
   /* #contentMes{
        height: 30px;overflow: hidden;
    }
    #contentMes:hover{
        height:auto;
        overflow: none;
    }*/
</style>
<div class="chu-vua danhmuc">Hộp thư</div>
<div class="chu-nho noidung">
    <?php 
       if(isset($dataProviders) && count($dataProviders)>0){

     ?>
    <table cellspacing="0" cellpadding="7" class="bangchotso">
        <thead>
            <tr>
                <th colspan="2">Người gửi</th>
                <th width="80%" colspan="2">Nội dung</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dataProviders as $key => $value) {
                    $id = $value->ID;
                    $message = $value->MESSAGE;
                    // $date = Yii::$app->helper->builDate($value->CREATE_DATE,'H:i:s d-m-Y');
                    $createdAt = $value->CREATE_DATE;

                    $sendAt = Yii::$app->helper->strTime(strtotime($createdAt));
                    $userSend = $value->userSend['USERNAME'];
             ?>
            <tr id="data-mes<?= $id ?>">
                <td width="10px" class="nut dam"><a class="deleteMessage" msg="mes<?= $id ?>" data-href="<?= $module.'/delete?id='.$id.$suffix?>">x</a></td>
                <td><?= $userSend ?></td>
                <td colspan="2"><div id="contentMes" ><?= $message ?></div></td>
                <td><?= $sendAt?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4" class="cangiua">

                    <?php
                    if (isset($myPagination) && $myPagination['totalPage'] > 1) {
                        ?> 
                        
                    <div class="phantrang">
                        <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
                    </div>
                    <?php } ?> 
                </td>
            </tr>
        </tbody>
    </table>
    <?php }else{
        echo 'Hộp thư rỗng';
    } ?>
    <br>
    <span class="list-2"><a href="<?= $baseUrl . 'thong-tin-ca-nhan' . $suffix ?>">Thông tin cá nhân</a></span>
    <br class="xoahet"><br>
</div>

<script>
    
    $('body').on('click', '.deleteMessage', function(event) {
        event.preventDefault();
        var event = $(this).attr('event');
        if(event != "on"){
            var msgId = $(this).attr('msg');
            console.log(msgId);
            var btnClk = $('a[msg="mes7"]');
            var dataHref = $(this).attr('data-href');
            var url = "<?php echo $baseUrl; ?>"+dataHref;
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                beforeSend: function () {
                    btnClk.attr("event",'on')
                },
                success: function (response) {
                    if(response.status){
                        console.log('tr#data-mes'+response.id);
                        $('tr#data-mes'+response.id).remove();
                        // alert(response.message);
                    }else{
                        alert(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });
</script>