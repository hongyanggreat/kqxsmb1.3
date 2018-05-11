<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
    $module       = Yii::$app->controller->module->id;
    $baseUrl = Yii::$app->params['baseUrl'];
 ?>

 <style>
     .help-block, .help-inline{
        color: #d81b1b;
        display: inline-block;
     }
 </style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span10 offset1">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?= $subject ?></h5>
            <?php echo ButtonWidget::widget(['data'=>['ID'=>$model->ID,'TITLE'=>'Danh sách dịch vụ']]) ?>
           
            <?php 
                $action       =  Yii::$app->controller->action->id;
                $disabled = false;
                if(isset($action) && $action =="update"){
                     $disabled = 'disabled';
                } 
            ?>
          </div>
          <div class="widget-content nopadding">

            <?php $form = ActiveForm::begin([
                //'action' => '/login',
                'options' => [
                    'class' => 'form-horizontal'
                 ]
            ]); ?>
            <?=  $form->field($model, 'CATE_PARENT',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->dropDownList($dataCate,['options'=>[$model->CATE_PARENT =>['Selected'=>true]],'class'=>'span5']); ?>

            <?= $form->field($model, 'NAME', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Tên dịch vụ']) ?>
            
            
            <?= $form->field($model, 'ALIAS', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Tên định danh','value'=>Yii::$app->helper->clean(trim($model->ALIAS))]) ?>

          
            


            <!-- //Hinh anh dai dien -->
            <?php 
                $linkImage = $baseUrl.'m-contact/default/image/thumbnail.png';
                if(!empty($model->IMAGE)){
                    $time = $model->CREATED_AT;
                    $sourcePath = $baseUrl.'m-contact/categories/'.$model->ID.'/image/';
                    $linkImage =  $sourcePath . $model->IMAGE;
                }
                $image = '<img id="image_show" src="'.$linkImage.'" alt="'.$model->NAME.'" width="50" style="margin-left: 25px;margin-top: 5px;">';
            ?>

            <?= $form->field($model, 'image_current', ['template' => '{input}'])->hiddenInput(['value'=>$model->IMAGE])->label(false) ?>
            
            <?= $form->field($model, 'IMAGE',['template' => '{label}<div class="controls">{input} '.$image.'{error}{hint}</div>','options' => ['class' => 'control-group']])->fileInput(['maxlength' => true,'onchange'=>'showImage(this);','accept'=>'image/*','id'=>'image']) ?>
           
            <?= $form->field($model, 'DESCRIPTION',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'value'=>htmlspecialchars_decode(trim($model->DESCRIPTION)),'placeholder'=>'Nhập miêu tả chi tiết về module']) ?>
            
            <?= $form->field($model, 'POSITION',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class' => "span2",'value'=>htmlspecialchars_decode(trim($model->POSITION)),'placeholder'=>'Vị trí'])->label('Vị trí');?>
            <?php 
                $status = [1 => 'Kích hoạt', 0 =>'Không kích hoạt'];
                if(isset($action) && $action =="update"){
                    if($model->STATUS == 0){
                        $status   = [ 0 =>'Không kích hoạt',1 => 'Kích hoạt',2=>'Hủy kích hoạt'];
                    }else{
                        $status   = [1 => 'Kích hoạt',2=>'Hủy kích hoạt'];
                    }
                }
                //$model->STATUS = 1;
             ?>
            <?= $form->field($model, 'STATUS',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->radioList($status)?>
            
             
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                  <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
            
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
     
    </div>
   
  </div>

  <script>
  function showImage(input) {
        var id = input.id;
        console.log(id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#'+id +'_show')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }else{
            if(id == "image"){
                $('#'+id +'_show').attr('src', '<?= $linkImage ?>');
            }
        }
    }

</script>