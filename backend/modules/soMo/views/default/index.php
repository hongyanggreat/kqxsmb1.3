<?php 
    use backend\widgets\frontend\AdsWidget;
    use backend\widgets\frontend\DienDanWidget;

    $flag = false;
	$baseUrl = Yii::$app->params['baseUrl'];
	$suffix  = Yii::$app->params['suffix'];
	$action  =  Yii::$app->controller->action->id;
	$module  = Yii::$app->controller->module->id;
 ?>
<!-- //================ PHAN QUANG CAO -->
<?php 
    if($flag){
 ?>
<?php 
    $dataAds = [];
 ?>
 <?= AdsWidget::widget(['dataAds'=>$dataAds]); ?>
<!-- //================ END PHAN QUANG CAO -->

<!-- //================ PHAN DIEN DAN-->
<?php 
    $dataDienDan = [];
 ?>
 <?= DienDanWidget::widget(['dataDienDan'=>$dataDienDan]); ?>
<!-- //================ END PHAN DIEN DAN -->

<?php } ?>
<?php 
    include 'so-mo.php';
 ?>