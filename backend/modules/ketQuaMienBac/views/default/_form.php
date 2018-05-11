<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
    $action       =  Yii::$app->controller->action->id;
 ?>

 <style>
     .help-block, .help-inline{
        color: #d81b1b;
        display: inline-block;
     }
     ::-webkit-input-placeholder {
         text-align: center;
      }

      :-moz-placeholder { /* Firefox 18- */
         text-align: center;  
      }

      ::-moz-placeholder {  /* Firefox 19+ */
         text-align: center;  
      }

      :-ms-input-placeholder {  
         text-align: center; 
      }
 </style>


<div class="container-fluid">
    <div class="row-fluid">
      <div class="span7 offset2">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?= $subject ?></h5>
            <?php echo ButtonWidget::widget(['data'=>['ID'=>$model->id,'TITLE'=>'Danh sách Kết quả']]) ?>
             <?php 
                  if($model->getErrors()){
                      echo '<span class="icon" id="clickHide" ><i class="icon icon-download-alt"  style="color:#fff"></i>Bấm vào đây để xem lỗi</span>';
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

             <table class="table table-bordered table-striped">

                <div class="showError" hidden style="padding: 7px; ">
                  <?= Html::error($model, 'rs_0_0'); ?>
                  <?= Html::error($model, 'rs_1_0'); ?>
                  <?= Html::error($model, 'rs_2_0'); ?>
                  <?= Html::error($model, 'rs_2_1'); ?>
                  <?= Html::error($model, 'rs_3_0'); ?>
                  <?= Html::error($model, 'rs_3_1'); ?>
                  <?= Html::error($model, 'rs_3_2'); ?>
                  <?= Html::error($model, 'rs_3_3'); ?>
                  <?= Html::error($model, 'rs_3_4'); ?>
                  <?= Html::error($model, 'rs_3_5'); ?>
                  <?= Html::error($model, 'rs_4_0'); ?>
                  <?= Html::error($model, 'rs_4_1'); ?>
                  <?= Html::error($model, 'rs_4_2'); ?>
                  <?= Html::error($model, 'rs_4_3'); ?>
                  <?= Html::error($model, 'rs_5_0'); ?>
                  <?= Html::error($model, 'rs_5_1'); ?>
                  <?= Html::error($model, 'rs_5_2'); ?>
                  <?= Html::error($model, 'rs_5_3'); ?>
                  <?= Html::error($model, 'rs_5_4'); ?>
                  <?= Html::error($model, 'rs_5_5'); ?>
                  <?= Html::error($model, 'rs_6_0'); ?>
                  <?= Html::error($model, 'rs_6_1'); ?>
                  <?= Html::error($model, 'rs_6_2'); ?>
                  <?= Html::error($model, 'rs_7_0'); ?>
                  <?= Html::error($model, 'rs_7_1'); ?>
                  <?= Html::error($model, 'rs_7_2'); ?>
                  <?= Html::error($model, 'rs_7_3'); ?>
                  <?= Html::error($model, 'total_rs'); ?>
                  <?= Html::error($model, 'rs_date'); ?>
                </div>

                <tbody>
                  <tr style="width: 100%;height: 100%;">
                    <td style="text-align: center;"><span class="label label-success" style="width: 50px;padding: 5px">Đặc biệt</span></td>
                    <!-- <td style="text-align: center;"><code>54551</code></td> -->
                    <td style="text-align: center;">
      <?= Html::activeTextInput($model, 'rs_0_0', ['placeholder' => 'Nhập giải Đặc Biệt', 'class' => 'span5','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-warning" style="width: 50px;padding: 5px">Giải nhất</span></td>
                    <td style="text-align: center;">
      <?= Html::activeTextInput($model, 'rs_1_0', ['placeholder' => 'Nhập giải Nhất', 'class' => 'span5','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-important" style="width: 50px;padding: 5px">Giải nhì</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_2_0', ['placeholder' => 'Nhập giải Nhì 1', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_2_1', ['placeholder' => 'Nhập giải Nhì 2', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
                      
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-info" style="width: 50px;padding: 5px">Giải ba</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_3_0', ['placeholder' => 'Nhập giải Ba 1', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_3_1', ['placeholder' => 'Nhập giải Ba 2', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_3_2', ['placeholder' => 'Nhập giải Ba 3', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_3_3', ['placeholder' => 'Nhập giải Ba 4', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_3_4', ['placeholder' => 'Nhập giải Ba 5', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_3_5', ['placeholder' => 'Nhập giải Ba 6', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-inverse" style="width: 50px;padding: 5px">Giải tư</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_4_0', ['placeholder' => 'Nhập giải Tư 1', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_4_1', ['placeholder' => 'Nhập giải Tư 2', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_4_2', ['placeholder' => 'Nhập giải Tư 3', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_4_3', ['placeholder' => 'Nhập giải Tư 4', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-inverse" style="width: 50px;padding: 5px">Giải năm</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_5_0', ['placeholder' => 'Nhập giải Năm 1', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_5_1', ['placeholder' => 'Nhập giải Năm 2', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_5_2', ['placeholder' => 'Nhập giải Năm 3', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_5_3', ['placeholder' => 'Nhập giải Năm 4', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_5_4', ['placeholder' => 'Nhập giải Năm 5', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_5_5', ['placeholder' => 'Nhập giải Năm 6', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><span class="label label-inverse" style="width: 50px;padding: 5px">Giải sáu</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_6_0', ['placeholder' => 'Nhập giải Sáu 1', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_6_1', ['placeholder' => 'Nhập giải Sáu 2', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_6_2', ['placeholder' => 'Nhập giải Sáu 3', 'class' => 'span4','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                   <tr>
                    <td style="text-align: center;"><span class="label label-inverse" style="width: 50px;padding: 5px">Giải bảy</span></td>
                    <td style="text-align: center;">
                      
      <?= Html::activeTextInput($model, 'rs_7_0', ['placeholder' => 'Nhập giải Bảy 1', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_7_1', ['placeholder' => 'Nhập giải Bảy 2', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_7_2', ['placeholder' => 'Nhập giải Bảy 3', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
      <?= Html::activeTextInput($model, 'rs_7_3', ['placeholder' => 'Nhập giải Bảy 4', 'class' => 'span3','style'=>'margin-bottom: 5px;text-align:center']); ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                  <?= Html::submitButton('Cập nhật kết quả', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
     
    </div>
   
  </div>




  <script>
    $(document).ready(function() {
        $('body').on('dblclick', '.showError', function(event) {
          event.preventDefault();
          $(this).hide();
        });
        $('body').on('click', '#clickHide', function(event) {
          event.preventDefault();
          $(".showError").toggle();
        });
      });
  </script>