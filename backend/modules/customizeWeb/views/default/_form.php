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

            <?= $form->field($model, 'NAME', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span4','placeholder'=>'Tên web']) ?>

            <?= $form->field($model, 'TITLE', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span10','placeholder'=>'Tiêu để Web']) ?>
            


          <!-- //Icon -->
            <?php 
                $linlIcon = 'http://cms.hocthipro.vn/assets/hocthipro/images/thumbnail.png';
                if(!empty($model->ICON)){
                    $time = $model->CREATED_AT;
                    $sourcePath =  $baseUrl.'uploads/customize-web/'.$model->ID.'/icon/';
                    $linlIcon =  $sourcePath . $model->ICON;
                }
                $image = '<img id="icon_show" src="'.$linlIcon.'" alt="'.$model->NAME.'" width="20" height="20" style="margin-left: 25px;margin-top: 5px;">';
            ?>
            
            <?= $form->field($model, 'ICON',['template' => '{label} <div class="controls">{input}'.$image.'{error}{hint}</div>','options' => ['class' => 'control-group']])->fileInput(['maxlength' => true,'onchange'=>'showImage(this);','accept'=>'image/*','id'=>'icon']) ?>
            

            <!-- //Hinh anh dai dien -->
            <?php 
                $linlImage = 'http://cms.hocthipro.vn/assets/hocthipro/images/thumbnail.png';
                if(!empty($model->IMAGE)){
                    $time = $model->CREATED_AT;
                    $sourcePath = $baseUrl.'uploads/customize-web/'.$model->ID.'/image/';
                    $linlImage =  $sourcePath . $model->IMAGE;
                }
                $image = '<img id="image_show" src="'.$linlImage.'" alt="'.$model->NAME.'" width="50" style="margin-left: 25px;margin-top: 5px;">';
            ?>

            
            <?= $form->field($model, 'IMAGE',['template' => '{label}<div class="controls">{input} '.$image.'{error}{hint}</div>','options' => ['class' => 'control-group']])->fileInput(['maxlength' => true,'onchange'=>'showImage(this);','accept'=>'image/*','id'=>'image']) ?>
           
            <!-- //Hinh anh IMAGE_BACKGROUND dai dien -->
            <?php 
                $linlLogo = 'http://cms.hocthipro.vn/assets/hocthipro/images/thumbnail.png';
                if(!empty($model->LOGO)){
                    $time = $model->CREATED_AT;
                    $sourcePath = $baseUrl.'uploads/customize-web/'.$model->ID.'/logo/';
                    $linlLogo =  $sourcePath . $model->LOGO;
                }
                $image = '<img id="logo_show" src="'.$linlLogo.'" alt="'.$model->NAME.'" width="50" style="margin-left: 25px;margin-top: 5px;">';
            ?>

            
            <?= $form->field($model, 'LOGO',['template' => '{label} <div class="controls">{input}'.$image.'{error}{hint}</div>','options' => ['class' => 'control-group']])->fileInput(['maxlength' => true,'onchange'=>'showImage(this);','accept'=>'image/*','id'=>'logo']) ?>
           
            <?= $form->field($model, 'DESCRIPTION',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'rows'=>'4','value'=>htmlspecialchars_decode(trim($model->DESCRIPTION)),'placeholder'=>'Nhập miêu tả chi tiết về module']) ?>
            
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
            
            <?= $form->field($model, 'META_KEYWORD',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'rows'=>'4','value'=>htmlspecialchars_decode(trim($model->META_KEYWORD)),'placeholder'=>'Nhập META_KEYWORD']) ?>
            
            <?= $form->field($model, 'ADDRESS',['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textarea(['class' => "span11",'rows'=>'4','value'=>htmlspecialchars_decode(trim($model->ADDRESS)),'placeholder'=>'Nhập địa chỉ']) ?>
            
            <?= $form->field($model, 'HOT_LINE', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Nhập số hotline']) ?>
            
            <?= $form->field($model, 'EMAIL_CONTACT', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Nhập thư điện tử']) ?>

            <?= $form->field($model, 'WEBSITE_RELATION', ['template' => '{label} <div class="controls">{input}<p><span>Cách nhau bằng dấu phẩy</span></p>{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','placeholder'=>'Nhập danh sách các trang web liên quan.']) ?>

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
             if(id == "icon"){
                $('#'+id +'_show').attr('src', '<?= $linlIcon ?>');
            }
            if(id == "image"){
                $('#'+id +'_show').attr('src', '<?= $linlImage ?>');
            }
            if(id == "logo"){
                $('#'+id +'_show').attr('src', '<?= $linlLogo ?>');
            }
        }
    }

</script>