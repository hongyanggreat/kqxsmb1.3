<?php 
    $baseUrl   = Yii::$app->params['baseUrl'];
    $suffix    = Yii::$app->params['suffix'];
    $action    =  Yii::$app->controller->action->id;
    $module    = Yii::$app->controller->module->id;
    $aliasCate = $categories['ALIAS'];
    if(isset($dataProviders) && $dataProviders){

        foreach ($dataProviders as $key => $dataProvider) {
                $title = $dataProvider['TITLE'];
                $link  = $baseUrl.'bai-viet/'.$aliasCate.'/'.$dataProvider['ALIAS'].$suffix;   
         ?>
            <p class="w3-hover-opacity">
                <a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
            </p>
        <?php } ?>

<?php } ?>