<?php 
     use backend\widgets\frontend\PaginationWidget;


            $baseUrl = Yii::$app->params['baseUrl'];
            $mediaUrl = Yii::$app->params['mediaUrl'];
            $suffix  = Yii::$app->params['suffix'];
 ?>
<!-- Phần diễn đàn -->
<div class="chu-vua bong-2 nen-xanh dam trang cantrai cannd">Diễn đàn thảo luận</div><br>
<!-- phần gửi bình luận -->
<!-- <iframe src="https://www7.cbox.ws/box/?boxid=846138&boxtag=WaAL13" width="100%" height="350" allowtransparency="yes" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>    -->
<div>
    <span id="showErrorsChat">
        
    </span>
</div>

<div class="cach boxChat" interval="true">
     <?php 
	   if (!Yii::$app->user->isGuest) {
     ?>
    <textarea name="txtChat" id="txtChat" value="" placeholder="Nhập bình luân tại đây..." class="den chu-xnho w3-input w3-border w3-animate-input" style="width:70%;margin: auto;margin-bottom: 5px;text-align: center;"></textarea>
    <input type="button" name="sendChat" id="sendChat" value="Gửi bình luận" class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-xxlarge">
    <?php }else{

    ?>
    Để xử dụng chức năng này vui lòng : 
    <a href="/kqxsmb/dang-nhap" style="width: 95px;" class="">Đăng nhập</a>
    <?php } ?>
    <!-- Phần hiện thi tv bình luận -->
    <ul class="w3-ul  den chu-nho" id="showContentChat">
    </ul>

</div>
<?php 
        $myPagination = [
            'totalPage'   => 5,
            'page'        => 1,
            'limit'       => 1,
            'action'      => $baseUrl."chat".$suffix,
        ];
  if(isset($myPagination) && $myPagination['totalPage'] > 1){
?>
    <div class="w3-bar w3-center">
           <?= PaginationWidget::widget(['paginator'=>$myPagination]); ?>
    </div>
<?php } ?>  
<br>
<script>

    $(document).ready(function () {
    	// var refresh = false;
    	var refresh = true;
        var setTime = 2000;
        $('body').on('click', '#traloiTinnhan', function(event) {
            event.preventDefault();
            $('.boxChat').attr('interval', 'false');
            $(this).hide();
            $(this).siblings('div.traloiTinnhan').show();
        });
    	setInterval(function(){
            var checkLoad = $('.boxChat').attr('interval');
            if(checkLoad == "true"){
        		$('#showErrorsChat').fadeOut(1000);
        		var url = "<?php echo $baseUrl.'chat/show'.$suffix ;?>";
                if(refresh){
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
                            console.log('LÔI ROI');
    	                    console.log(textStatus, errorThrown);
    	                }
    	            });
                }
            }else{
                // console.log('Bạn đang thực hiện trả lời người khác');
            }
    	}, setTime);


        $('body').on('click', '#sendChat', function (event) {
            event.preventDefault();
            $('.boxChat').attr('interval', 'true');
            var txtChat = $('#txtChat').val();
            if (txtChat) {
                var url = "<?php echo $baseUrl.'chat/process'.$suffix ;?>";
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
                    	if(response.status){
	                        $('#txtChat').val('');
                    	}else{
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
    $('body').on('click', '#sendChatMore', function(event) {
        event.preventDefault();
        /* Act on the event */
        var idParent = $(this).siblings('#idParent').val().trim();
        var contentChat = $(this).siblings('#contentChat').val().trim();
        if ($.isNumeric(idParent) && idParent > 0 &&  contentChat) {
            var url = "<?php echo $baseUrl.'chat/process'.$suffix ;?>";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {txtChat: contentChat,idParent:idParent},
                beforeSend: function () {
                    $('#txtChat').val('');
                },
                success: function (response) {
                    // console.log(response);
                    if(response.status){
                        $('#txtChat').val('');
                        $('.boxChat').attr('interval', 'true');
                        $('.traloiTinnhan').hide();
                    }else{
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } else {
            alert("Vui lòng nhập bình luận");
        }
    });
</script>


