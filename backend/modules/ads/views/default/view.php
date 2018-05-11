<?php 
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use backend\widgets\ButtonWidget;
    $module       = Yii::$app->controller->module->id;
    $linkModule ='/'.$module;
   
    $this->title = 'Chi tiết danh mục : '.ucfirst( $model->NAME);

    $this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
 ?>
 <style>
     .help-block, .help-inline{
        color: #d81b1b;
     }
 </style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span7 offset2">
        <div class="widget-box">
          <div class="widget-title"> 
            
            <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?= $this->title ?></h5>
            <?php echo ButtonWidget::widget(['data'=>['ID'=>$model->ID,'TITLE'=>'Danh sách danh mục']]) ?>
          </div>
          <div class="widget-content nopadding">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'ID',
                    'NAME',
                    'LINK',
                    'DESCRIPTION',
                    'STATUS',
                    'CREATE_AT',
                    'CREATE_BY',
                ],
            ]) ?>
          </div>
        </div>
      </div>
     
    </div>
   
  </div>