<?php 
	
	use backend\widgets\frontend\ArticleRelation;
 ?>
<div class="noidung chu-nho">
    <div>
        <p class="dam chu-vua"><?= $dataProvider['TITLE'] ?></p>
    </div>
    <p class="chu-nho">
        <?= $dataProvider['CONTENT'] ?>
    </p>
</div>

 <?= ArticleRelation::widget(['dataRelations'=>$dataRelations]); ?>