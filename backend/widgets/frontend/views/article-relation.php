<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php 
	$baseUrl = Yii::$app->params['baseUrl'];
	$suffix  = Yii::$app->params['suffix'];
	$action  =  Yii::$app->controller->action->id;
	$module  = Yii::$app->controller->module->id;
	if(isset($dataRelations) & $dataRelations){
 ?>
<div class="nghieng danhmuc chu-vua">Bài viết cùng chủ đề</div>

<div class="noidung chu-nho">
	<?php 
		foreach ($dataRelations as $key => $data) {
			$title = $data['TITLE'];
			$link  = $data['ALIAS'].$suffix;
	 ?>
		<p class="w3-hover-opacity">
			<a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
		</p>
	<?php } ?>
</div>
<?php } ?>