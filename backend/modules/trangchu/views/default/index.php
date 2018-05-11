<?php 
    use backend\widgets\frontend\AdsWidget;
    use backend\widgets\frontend\DienDanWidget;

    $flag = true;
	$baseUrl = Yii::$app->params['baseUrl'];
	$suffix  = Yii::$app->params['suffix'];
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
    include 'tbl_kqxs.php';
    include 'kinhnghiem.php';
    include 'tintuc.php';
 ?>