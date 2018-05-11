<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
     $baseUrl = Yii::$app->params['baseUrl'];
    $module       = Yii::$app->controller->module->id;
 ?>

 <style>
     .help-block, .help-inline{
        color: #d81b1b;
        display: inline-block;
     }
 </style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12 offset0">
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
            <?=  $form->field($model, 'CATE_ID',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->dropDownList($dataCate,['options'=>[$model->CATE_ID =>['Selected'=>true]],'class'=>'span3']); ?>

            <?= $form->field($model, 'TITLE', ['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span8','placeholder'=>'Tên dịch vụ']) ?>
            
            
            <?= $form->field($model, 'ALIAS', ['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span8','placeholder'=>'Tên định danh','value'=>Yii::$app->helper->clean(trim($model->ALIAS))]) ?>

          
            


            <!-- //Hinh anh dai dien -->
            <?php 
                $linkImage = $baseUrl.'uploads/default/image/thumbnail.png';
                
                $model->IMAGE;
                if(!empty($model->IMAGE)){
                    $time  = $model->CREATED_AT;
                    $year  = date('Y',$time);
                    $month = date('m',$time);
                    $day   = date('d',$time);
                    $sourcePath = $baseUrl.'uploads/articles/'.$year.'/'.$month.'/'.$day.'/'.$model->ID.'/image/';
                    $linkImage =  $sourcePath . $model->IMAGE;
                }
                $image = '<img id="image_show" src="'.$linkImage.'" alt="'.$model->TITLE.'" width="50" style="margin-left: 25px;margin-top: 5px;">';
            ?>
            
            <?= $form->field($model, 'IMAGE',['template' => '{label}<div class="controls">{input} '.$image.'<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->fileInput(['maxlength' => true,'onchange'=>'showImage(this);','accept'=>'image/*','id'=>'image']) ?>
           
            <?= $form->field($model, 'DESCRIPTION',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'value'=>htmlspecialchars_decode(trim($model->DESCRIPTION)),'placeholder'=>'Nhập miêu tả chi tiết về module']) ?>
            <?= $form->field($model, 'CONTENT',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'value'=>htmlspecialchars_decode(trim($model->CONTENT)),'placeholder'=>'Nhập nội dung bài viết']);?>
            <?= $form->field($model, 'POSITION',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class' => "span2",'value'=>htmlspecialchars_decode(trim($model->POSITION)),'placeholder'=>'Vị trí'])->label('Vị trí');?>
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
            <?= $form->field($model, 'STATUS',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->radioList($status)?>
            <?= $form->field($model, 'META_KEYWORD',['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'value'=>htmlspecialchars_decode(trim($model->META_KEYWORD)),'placeholder'=>'Nhập META_KEYWORD']) ?>
             <?php 

              $datatags = '';
              
            ?>
            <?= $form->field($model, 'TAG', ['template' => '{label} <div class="controls">{input}<div>{error}</div>{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Nhập thẻ tag','id'=>'select2Tags','value'=>$model->TAG]) ?>
            
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
        //console.log(id);
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

   // TAG
    var tags = '<?php echo $datatags;?>';
    var arrtags = tags.split(',');
    $('#select2Tags').select2({
      //tags: true,
    //  tags: [],
      tags: arrtags,
      tokenSeparators: [',']
    })

</script>