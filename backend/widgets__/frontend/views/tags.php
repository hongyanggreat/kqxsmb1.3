<?php 
	use backend\modules\tintuc\models\Articles;
	$baseUrl = Yii::$app->params['baseUrl'];
	$suffix = Yii::$app->params['suffix'];
 ?>
<p class="den nghieng chu-xnho w3-padding-small">
		<span style="width: 50px" class="w3-white cannd cach"><b>Tag:</b></span>
<?php 
	if(isset($dataTags) && $dataTags){

 ?>
		<a href="" class="cach w3-hover-opacity"><i>ket qua sx</i></a>
		
<?php }else{
	$dataTags = Articles::find()->select(['TAG'])
					//->asArray()
					->distinct()
					->all();
	// echo '<pre>';print_r($dataTags);
	if(isset($dataTags) && $dataTags){
		$arrTags = [];
		foreach ($dataTags as $keyTag => $dataTag) {
			$tag = $dataTag->TAG;
			$arrs = explode(',', $tag);
			foreach ($arrs as $kArr => $vArr) {
				# code...
				$arrTags[] = $vArr;
			}
		}	
		$arrTags = array_unique($arrTags);
		foreach ($arrTags as $kTag => $valueTag) {
			$valueTag = Yii::$app->helper->changeTitle($valueTag);
			echo  '<a href="'.$baseUrl.'tags/'.$valueTag.'" class="cach w3-hover-opacity"><i>'.$valueTag.'</i></a>';
		}
	}
 	
 }
?>
	</p><br>