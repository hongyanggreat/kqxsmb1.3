
<?php 
	use backend\modules\users\models\Accounts;
	use backend\modules\users\models\Useronline;

	$baseUrl        = Yii::$app->params['baseUrl'];
	$suffix         = Yii::$app->params['suffix'];
	$tg             =time();
	$tgout          =900;
	$tgOld          =$tg - $tgout;
	
	$model          = new Useronline;
	$model->TIME_SS = $tg;

	
	// $sql="insert into useronline(tgtmp,ip,local) values('$tg','$REMOTE_ADDR','$PHP_SELF')";
	// $query=mysql_query($sql);
	// $sql="delete from useronline where tgtmp < $tgnew";
	// $query=mysql_query($sql);
	// $sql="SELECT DISTINCT ip FROM useronline WHERE local='$PHP_SELF'";
	// $query=mysql_query($sql);
	// $user = mysql_num_rows($query);
	// echo "user online :$user";


	// $model->IP =Yii::$app->helper->getRealIpAddr();
	$model->IP =Yii::$app->helper->getUserIP();
	$user = "";
	if (!Yii::$app->user->isGuest) {
		$user =  Yii::$app->user->identity->USERNAME;
	}
	$model->USER   = $user;
	$model->STATUS = 1;
	$model->LOCAL  = $_SERVER['REQUEST_URI'];

	$model->save();
	// tim so thanh vien online trong khoan thoi gian 
	$soNguoiOnline = Useronline::find()->select(['USER','IP'])->where(['>=','TIME_SS',$tgOld])->asArray()->orderBy(['USER'=>SORT_ASC])->distinct()->all();

	// print_r($soNguoiOnline);
	$thanhvienOnline = 0;
	$khachOnline     = 0;
	$arrThanhVien = [];
	foreach ($soNguoiOnline as $key => $value) {
		if(!in_array($value['USER'], $arrThanhVien) && $value['USER'] !=""){
			$arrThanhVien[] = $value['USER'];
		}
	}
	$thanhvienOnline =  count($arrThanhVien);
	$numberOnline = count($soNguoiOnline);
	// Useronline::deleteAll('TIME_SS = :status AND age > :age', [':age' => 20, ':status' => 'active']);


	$userNew = Accounts::find()->where(['STATUS'=>1])->orderBy(['ACC_ID'=>SORT_DESC])->one();
 ?>
<table class="chu-vua bong-2 nen-xanh dam trang cangiua cannd canbanggiua">
	<tr>
		<td class="cantrai">&reg; SoiCauXS.Com</td>
		<td class="chu-nho">Tổng số người online: <?= $numberOnline ?></td>
		<!-- Xổ danh sách các thành viên dang online -->
		<td id="nyc-tv-open" class="w3-btn re-do chu-nho w3-right">Thành viên online: <?= $thanhvienOnline ?></td>
	</tr>
</table>
<?php 
	if(isset($userNew) && $userNew){

 ?>
<div class="w3-red w3-padding-small chu-xxnho nghieng cantrai trang">
	<p>Chào mừng thành viên mới: <b class="w3-text-white"><?= $userNew->USERNAME ?></b></p>
</div>
<?php } ?>
<!-- ThanhVienWidget -->
		<?php 
			if(isset($arrThanhVien) && $thanhvienOnline > 0){
		 ?>
		<div style="display: none;" id="nyc-danhsachtv" class="chu-xnho nghieng w3-margin w3-center w3-padding-small w3-animate-bottom">
			<?php 
				foreach ($arrThanhVien as $key => $nameUser) {
					# code...
			 ?>
				<a class="re-do cannd w3-animate-right" href="<?= $baseUrl.'thanh-vien/'.$nameUser.$suffix ?>"><?= $nameUser ?></a>
			<?php } ?>
			<hr style="clear: both; width: 99%;margin: auto;border-color: gray;clear: both;" class="w3-opacity">
		</div><br>
		<?php } ?>