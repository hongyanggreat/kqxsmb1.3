<?php 
	use yii\helpers\Html;
	use yii\widgets\ActiveForm; 
		$baseUrl     = Yii::$app->params['baseUrl'];
		$suffix     = Yii::$app->params['suffix'];
		$module      = Yii::$app->controller->module->id;
 ?>
<!-- Phần danh mục nav -->
			<nav class="chu-vua bong-2 nen-xanh cangiua">
				<table>
					<tr>
						<td>
							<a href="<?= $baseUrl ?>" class="re-do dam trang w3-btn">Trang chủ</a>
						</td>
						<td>
							<a id="nyc-soicau-open" class="re-do dam trang cachmenu w3-btn w3-opacity-max">Soi cầu</a>
						</td>
						<td>
							<a id="nyc-thongke-open" class="re-do dam trang cachmenu w3-btn w3-opacity-max">Thống kê</a>
						</td>
						<td>
							<a id="nyc-choiso-open" class="re-do dam trang cachmenu w3-btn">Chơi online</a>
						</td>
						<td>
							<a id="nyc-tienich-open" class="re-do dam trang cachmenu w3-btn">Tiện ích</a>
						</td>
					</tr>
				</table>
			</nav>
			<!-- Phần soi cầu -->
			<div style="display: none;" id="nyc-soicau" class="w3-green w3-opacity-min chu-nho w3-text-black w3-center w3-padding-16 w3-animate-right">
				<p class="chu-nho do dam">Các tính năng soi cầu vip</p>
				<hr style="clear: both; width: 95%;margin: auto;border-color: white;clear: both;" class="w3-opacity">
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Dò kết quả xổ số</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Phân tích điện toán</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu toàn diện</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu đặc biệt</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu đặc biệt theo thứ</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu loto</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu loại loto</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu loto hai nháy</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu theo thứ</a>
				<a class="re-do cach-menu w3-opacity-max w3-opacity-max" href="">Soi cầu loại bạch thủ</a>
			</div>
			<!-- Phần thống kê -->
			<div style="display: none;" id="nyc-thongke" class="w3-green w3-opacity-min chu-nho w3-text-black w3-center w3-padding-16 w3-animate-right">
				<p class="chu-nho do dam">Các thống kê vip</p>
				<hr style="clear: both; width: 95%;margin: auto;border-color: white;clear: both;" class="w3-opacity">
				<a class="re-do cach-menu" href="<?= $baseUrl .'chu-ky'.$suffix?>">Thống kê chu kỳ</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê tần số nhịp loto</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê tần xuất loto</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê tần xuất cặp loto</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê loto gan</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê đầu đuôi loto</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê chu kỳ đặc biệt</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê chu kỳ dàn đặc biệt</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê chu kỳ dàn loto</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê chu kỳ max dàn cùng về</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Bảng đặc biệt tuần</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Bảng đặc biệt tháng</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Bảng đặc biệt năm</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Thống kê dãi đặc biệt ngày mai</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Tạo phôi xổ số</a>
			</div>
			<!-- Phần chơi online -->
			<div style="display: none;" id="nyc-choiso" class="w3-green w3-opacity-min chu-nho w3-text-black w3-center w3-padding-16 w3-animate-right">
				<p class="chu-nho do dam">Các tính năng chơi cầu vip</p>
				<hr style="clear: both; width: 95%;margin: auto;border-color: white;clear: both;" class="w3-opacity">
				<a class="re-do cach-menu" href="<?= $baseUrl .'ket-qua-db'.$suffix?>">Kết quả xổ số</a>
				<a class="re-do cach-menu" href="<?= $baseUrl .'quay-thu'.$suffix?>">Quay thử điện toán</a>
				<a class="re-do cach-menu" href="<?= $baseUrl .'choi-online'.$suffix?>">Chơi online</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Bảng chốt số cao thủ</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Top cao thủ chơi cầu</a>
			</div>
			<!-- Phần tiện ích -->
			<div style="display: none;" id="nyc-tienich" class="w3-green w3-opacity-min chu-nho w3-text-black w3-center w3-padding-16 w3-animate-right">
				<p class="chu-nho do dam">Các tiện ích hổ trợ khác</p>
				<hr style="clear: both; width: 95%;margin: auto;border-color: white;clear: both;" class="w3-opacity">
				<a class="re-do cach-menu" href="<?= $baseUrl .'soMo'.$suffix?>">Số mơ</a>
				<a class="re-do cach-menu" href="<?= $baseUrl .'tintuc'.$suffix?>">Tin tức xổ số</a>
				<a class="re-do cach-menu" href="<?= $baseUrl .'kinhNghiem'.$suffix?>">Kinh nghiệm</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Dò xổ số</a>
				<a class="re-do cach-menu w3-opacity-max" href="">Quảng cáo</a>
			</div>

		<?php 
			if (Yii::$app->user->isGuest) {
	       	
		 ?>
			<!-- Phần đăng nhập đăng ký -->
			<div class="w3-padding">
				<a href="<?= $baseUrl .'dang-ky'.$suffix?>" style="margin-left: 5px ;width: 95px;" class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-right">Đăng Ký</a>
				<a href="<?= $baseUrl .'dang-nhap'.$suffix?>" style="width: 95px;" class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-right">Đăng nhập</a>
			</div><br>
			<marquee align="center" direction="left" height="100" scrollamount="5" width="50%">
					<p style="clear: both;"><b class="do chu-vua">Vui lòng đăng nhập để tham gia khu chốt số admin!</b></p>
				</marquee>
		<?php 
			}else{
				$user = "";
				$user =  Yii::$app->user->identity->USERNAME;
				
		 ?>

		<div class="w3-padding den">	
			<marquee align="center" direction="left" height="100" scrollamount="5" width="50%">
					<p><b class="do chu-vua">Chào mừng thành viên [ <?= $user ?> ] .Để tham gia khu chốt số admin xin mời bạn vào đây!</b></p>
				</marquee>
			<?= Html::a('Logout', null, [
		                              'data' => [
		                                'confirm' => 'Bạn có chắc muốn thoát?',
		                                'method' => 'post',
		                              ],
		                              'href'=>"javascript:void(0);",
		                              'class'=>"nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-right",
		                              'onclick'=>'logout()',
		                           ]) 
		    ?>
		</div><br>
		<?php
		     ActiveForm::begin(['id' => 'formLogout','action'=>$baseUrl.'site/logout'.Yii::$app->params['suffix']]); 
		     ActiveForm::end();
		?>
		 <?php } ?>
		 <script>

			    function logout() {
			      var result = confirm("Bạn có chắc muốn thoát?");
			      if (result) {
			          document.getElementById('formLogout').submit();
			      }
			    }
		    $(document).ready(function() {
		    	var url = "https://drive.google.com/file/d/1H5-0osmW13bAdH2ULW68jaHLUi7S7QE5/view";
		    	console.log(url);
				// $.ajax({
				//         url: url,
				//         type: "get",
				//         dataType: "json",
				//         data: {txtChat: contentChat,idParent:idParent},
				//         beforeSend: function () {
				//             $('#txtChat').val('');
				//         },
				//         success: function (response) {
				//             // console.log(response);
				//             if(response.status){
				//                 $('#txtChat').val('');
				//                 $('.boxChat').attr('interval', 'true');
				//                 $('.traloiTinnhan').hide();
				//             }else{
				//             }
				//         },
				//         error: function (jqXHR, textStatus, errorThrown) {
				//             console.log(textStatus, errorThrown);
				//         }
				//     });
		    });
		  </script>
	

