<?php

use backend\widgets\frontend\PaginationButtonWidget;
use backend\modules\chat\models\Chat;
$allowGuest = false;
$allowGuest = true;
if (!Yii::$app->user->isGuest || $allowGuest) {

    $baseUrl = Yii::$app->params['baseUrl'];
    // $module  = Yii::$app->request->module->id;
    //$module  = Yii::$app->request->getPathInfo();
    $module  = "chat";
    $mediaUrl = Yii::$app->params['mediaUrl'];
    $suffix = Yii::$app->params['suffix'];
    ?>

    <!-- Phần diễn đàn -->
    <div class="chu-vua danhmuc">Diễn đàn thảo luận</div>
    <div class="noidung-2 chu-nho cangiua">
        <!-- phần gửi bình luận -->
        <?php 
        	if(Yii::$app->user->isGuest){
        		echo 'Vui lòng <a href="'.$baseUrl . 'dang-nhap' . $suffix .'">đăng nhập</a> để thực hiện chức năng này';
        	}

         ?>
        <div>
            <span id="showErrorsChat"></span>
        </div>
        <div class="boxChat" interval="true">
            <textarea name="txtChat" id="txtChat" value="" placeholder="Nhập bình luân tại đây..." class="den chu-xnho w3-input w3-border w3-animate-input" style="width:70%;margin: auto;margin-bottom: 5px;text-align: center;"></textarea>
            <input type="button" name="sendChat" id="sendChat" value="Gửi bình luận" class="binhluan w3-hover-red"><br>
            <!-- Phần hiện thi tv bình luận -->
            <ul class="w3-ul cantrai den chu-nho" id="showContentChat">
            </ul>
        </div><br>
        <?php
        $count = Chat::find()->where(['PARENT_ID'=>0])->count();
        $page  = 1;
        
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page = $_GET['page'];
        }
        $limit = 15;
        $myPagination = [
            'totalPage'   => ceil($count/$limit),
            'page'        => $page,
            'limit'       => $limit,
            'action'      => $baseUrl.$module,
        ];
        // print_r($myPagination);
        // die;
        // $myPagination = [
        //     'totalPage' => 5,
        //     'page' => 1,
        //     'limit' => 1,
        //     'action' => $baseUrl . "chat" . $suffix,
        // ];
        if (isset($myPagination) && $myPagination['totalPage'] > 1) {
            ?>
            <div class="w3-center">
                <div class="phantrang">
                    <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
                </div>
            </div>
        <?php } ?>  
    </div>
    <script>

        $(document).ready(function () {
            // var refresh = false;
            var refresh = true;
            var setTime = 2000;
            

           // $('body').on({
           //      mouseenter: function(){
           //       $('.boxChat').attr('interval', 'false');
           //      },
           //      mouseleave: function(){
           //          console.log('true');
           //          $('.boxChat').attr('interval', 'true');
           //      }
           //  }, '.btnTraloiTinnhan');
            
            $('body').on('click', '.btnTraloiTinnhan', function (event) {
                event.preventDefault();
                var id = $(this).attr('id');
                if(id == "traloiTinnhan1"){
                    $(this).siblings('div.traloiTinnhan').children().children('#sendMessage').attr('event', 'traloi').html("Trả lời");
                }else if(id == "traloiTinnhan2"){
                    $(this).siblings('div.traloiTinnhan').children().children('#sendMessage').attr('event', 'message').html("Gửi tin nhắn");
                }else{
                    return;
                }

                $('.boxChat').attr('interval', 'false');
                $('.btnTraloiTinnhan').attr('event', 'on');
                $(this).hide();
                $(this).siblings('span').hide();
                $(this).siblings('div.traloiTinnhan').show();

            });
            // $('body').on('click', '#traloiTinnhan1', function (event) {
            //     event.preventDefault();
            //     $('.boxChat').attr('interval', 'false');
            //     $('.btnTraloiTinnhan').attr('event', 'on');
            //     $(this).hide();
            //     $(this).siblings('span').hide();
            //     $(this).siblings('div.traloiTinnhan').show();
            //     $(this).siblings('div.traloiTinnhan').children().children('#sendMessage').attr('event', 'traloi').html("Trả lời");
            // });
            // $('body').on('click', '#traloiTinnhan2', function (event) {
            //     event.preventDefault();
            //     $('.boxChat').attr('interval', 'false');
            //     $('.btnTraloiTinnhan').attr('event', 'on');
            //     $(this).hide();
            //     $(this).siblings('span').hide();
            //     $(this).siblings('div.traloiTinnhan').show();
            //     $(this).siblings('div.traloiTinnhan').children().children('#sendMessage').attr('event', 'message').html("Gửi tin nhắn");
            // });
            $('body').on('click', '#cancelChatMore', function (event) {
                event.preventDefault();
                $(this).parent().parent('div.traloiTinnhan').hide();
                $(this).parent().parent('div.traloiTinnhan').siblings('span').show();
                $('.boxChat').attr('interval', 'true');
                $('.btnTraloiTinnhan').removeAttr('event');
            });
            setInterval(function () {
                var checkLoad = $('.boxChat').attr('interval');
                if (checkLoad == "true") {
                    $('#showErrorsChat').fadeOut(1000);
                    var url = "<?php echo $baseUrl . 'chat/show' . $suffix; ?>";
                    if (refresh) {
                        $.ajax({
                            url: url,
                            type: "get",
                            dataType: "html",
                            data: {show: true},
                            beforeSend: function () {

                            },
                            success: function (response) {
                                // console.log(response);
                                $('#showContentChat').html(response);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
                } else {
                    // console.log('Bạn đang thực hiện trả lời người khác');
                }
            }, setTime);


            $('body').on('click', '#sendChat', function (event) {
                event.preventDefault();
                $('.boxChat').attr('interval', 'true');
                var txtChat = $('#txtChat').val();
                if (txtChat) {
                    var url = "<?php echo $baseUrl . 'chat/traloi' . $suffix; ?>";
                    $.ajax({
                        url: url,
                        type: "get",
                        dataType: "json",
                        data: {txtChat: txtChat},
                        beforeSend: function () {
                            $('#txtChat').val('');
                        },
                        success: function (response) {
                            // console.log(response);
                            if (response.status) {
                                $('#txtChat').val('');
                            } else {
                            }
                            $('#showErrorsChat').fadeIn(500);
                            $('#showErrorsChat').html(response.message);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                } else {
                    alert("Vui lòng nhập bình luận");
                }
            });
        });
        $('body').on('click', '#sendMessage', function (event) {
            event.preventDefault();
            /* Act on the event */
            var event = $(this).attr('event');
            if(event == "traloi"){
                var idParent = $(this).siblings('#idParent').val().trim();
                var   url = "<?php echo $baseUrl . 'chat/traloi' . $suffix; ?>";
            }else if(event == "message"){
                var idParent = $(this).siblings('#idParent').attr('acc').trim();
                var   url = "<?php echo $baseUrl . 'chat/message' . $suffix; ?>";
            }else{
                alert("Có lỗi xảy ra.Liên hệ với admin để thông báo.")
                 return;

            }
            var contentChat = $(this).siblings('#contentChat').val().trim();
            if ($.isNumeric(idParent) && idParent > 0 && contentChat) {
               
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    data: {txtChat: contentChat, idParent: idParent},
                    beforeSend: function () {
                        $('#txtChat').val('');
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            $('#txtChat').val('');
                            $('.boxChat').attr('interval', 'true');
                            $('.traloiTinnhan').hide();
                            setTimeout(function(){ alert(response.message); }, 500);
                        } else {
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            } else {
                alert("Vui lòng nhập tin nhắn");
            }
        });
    </script>


<?php } ?>