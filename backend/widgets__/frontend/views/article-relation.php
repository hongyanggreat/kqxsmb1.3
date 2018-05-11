<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php 
	$baseUrl = Yii::$app->params['baseUrl'];
	$suffix  = Yii::$app->params['suffix'];
	$action  =  Yii::$app->controller->action->id;
	$module  = Yii::$app->controller->module->id;
	if(isset($dataRelations) & $dataRelations){
 ?>
<div class="chu-vua bong-2 nen-xanh dam trang cantrai cannd">Bài viết cùng chủ đề</div>
<div class="w3-padding chu-nho den cantrai">
	<?php 
		foreach ($dataRelations as $key => $data) {
			$title = $data['TITLE'];
			$link  = $data['ALIAS'].$suffix;
	 ?>
		<p class="w3-hover-opacity">
			<a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
		</p>
	<?php } ?>
</div><br>
<?php } ?>