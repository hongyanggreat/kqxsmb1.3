<?php

use backend\widgets\frontend\PaginationWidget;

if (!Yii::$app->user->isGuest) {

    $baseUrl = Yii::$app->params['baseUrl'];
    $mediaUrl = Yii::$app->params['mediaUrl'];
    $suffix = Yii::$app->params['suffix'];
    ?>
    <!-- Phần diễn đàn -->
    <div class="chu-vua danhmuc">Diễn đàn thảo luận</div>
    <div class="noidung-2 chu-nho cangiua">
        <!-- phần gửi bình luận -->
        <!-- <iframe src="https://www7.cbox.ws/box/?boxid=846138&boxtag=WaAL13" width="100%" height="350" allowtransparency="yes" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>	 -->
        <div>
            <span id="showErrorsChat">

            </span>
        </div>

        <div>
            <input name="txtChat" id="txtChat" value="" placeholder="Nhập bình luân tại đây..." class="den chu-xnho w3-input w3-border w3-animate-input" style="width:70%;height: 70px;margin: auto;margin-bottom: 5px;text-align: center;">
            <input type="button" name="sendChat" id="sendChat" value="Gửi bình luận" class="binhluan">
            <!-- Phần hiện thi tv bình luận -->
            <ul class="w3-ul cantrai den chu-nho" id="showContentChat">

            </ul>

        </div>
        <?php
        $myPagination = [
            'totalPage' => 5,
            'page' => 1,
            'limit' => 1,
            'action' => $baseUrl . "chat" . $suffix,
        ];
        if (isset($myPagination) && $myPagination['totalPage'] > 1) {
            ?>
            <div class="w3-center">
                <div class="w3-bar w3-border">
        <?= PaginationWidget::widget(['paginator' => $myPagination]); ?>
                </div>
            </div>
    <?php } ?>  
        <br>
        <script>
            $(document).ready(function () {
                // var refresh = false;
                var refresh = true;
                setInterval(function () {
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
                }, 1000);

                $('body').on('change keyup', '#txtChat', function (event) {
                    var string = $(this).val();
                    console.log('string:' + string);
                    //dem so ky tu neu vuot qua 255 ky tu thi bat canh bao
                });
                $('body').on('click', '#sendChat', function (event) {
                    event.preventDefault();

                    var txtChat = $('#txtChat').val();
                    if (txtChat) {
                        var url = "<?php echo $baseUrl . 'chat/process' . $suffix; ?>";
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
        </script>
<?php } ?>