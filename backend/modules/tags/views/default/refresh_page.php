<?php 
    $baseUrl   = Yii::$app->params['baseUrl'];
    $suffix    = Yii::$app->params['suffix'];
    $action    =  Yii::$app->controller->action->id;
    $module    = Yii::$app->controller->module->id;
    if(isset($dataProviders) && $dataProviders){

        foreach ($dataProviders as $key => $dataProvider) {
                $aliasCate = $dataProvider['parent']->ALIAS;
                $title = $dataProvider['TITLE'];
                $link  = $baseUrl.'bai-viet/'.$aliasCate.'/'.$dataProvider['ALIAS'].$suffix;   
         ?>
            <p class="w3-hover-opacity">
                <a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
            </p>
        <?php } ?>

<?php } ?>