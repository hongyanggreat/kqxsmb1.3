

<?php 
	use backend\modules\trangchu\models\Ads;

	const LIMIT  = 5;
	$dataAds = Ads::find()->limit(LIMIT)->all();
 ?>
<div class="chu-nho">
	<blink>
		<p><b class="do chu-to">
			<script type="text/javascript">
				text= "Liên hệ gmail để được quảng cáo top 1!"; 
				string2array(text);
				divserzeugen();
			</script>
		</b></p>
	</blink>
	<?php 
		if(isset($dataAds) && $dataAds){
	 ?>
	<ul style="margin: 5px" class="w3-ul w3-card-2">
		<?php 
			foreach ($dataAds as $key => $dataAd) {
		 ?>
		<li>
			<b class="chu-to chu-bong-2"><?= $dataAd->NAME ?></b>
			<p class="chu-vua nghieng den re-do">
				<a href="<?= $dataAd->LINK ?>" target="_blank"><?= $dataAd->DESCRIPTION ?></a>
			</p>
			
		</li>
		<?php } ?>
	</ul>
		<?php } ?>
</div><br><br>