<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
 $baseUrl = Yii::$app->params['baseUrl'];
    $module  = Yii::$app->controller->module->id;
 ?>
  <div class="widget-content nopadding">
    <?php $form = ActiveForm::begin([
                    'method'  => 'POST',
                    'id'      => 'formSearch',
                    'action'  => $baseUrl.$module,
                    'options' => [
                            'class' => 'form-horizontal'
                        ]
            ]); ?>
           

            

            
            <?= $form->field($model, 'TITLE', ['template' => '{label} <div class="controls">{input}{error}{hint}</div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span5','placeholder'=>'Nhập Tiêu đề bài viết','value'=>$model->TITLE])->label('Tiêu đề bài viết') ?>
            


             <?php 
                $startTime = date('d-m-Y');
                $startTime = '01-06-2017';
                $endTime   = date('d-m-Y');
              ?>
            <?php 
              // Mượn TIME_START lam ngày bắt đầu
              echo  $form->field($model, 'TIME_START', ['template' => '{label} <div class="controls"><div  data-date="'.$startTime.'" class="input-append date datepicker">{input}<span class="add-on"><i class="icon-th"></i></span>{error}{hint}</div></div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','data-date-format'=>'yyyy-mm-dd','placeholder'=>'Chọn ngày bắt đầu','value'=>$model->TIME_START])->label('Từ ngày') ?>
            
            <?php 
              // Mượn TIME_END lam ngày kết thuc
              echo  $form->field($model, 'TIME_END', ['template' => '{label} <div class="controls"><div  data-date="'.$endTime.'" class="input-append date datepicker">{input}<span class="add-on"><i class="icon-th"></i></span>{error}{hint}</div></div>','options' => ['class' => 'control-group']])->textInput(['class'=>'span11','data-date-format'=>'yyyy-mm-dd','placeholder'=>'Chọn ngày kết thúc','value'=>$model->TIME_END])->label('Đến ngày') ?>
          
            
            <?php

              // Mượn ARRANGE_BY làm sắp xếp theo chieu 
               $orderBy= [
                'DESC' =>'Giảm dần',
                'ASC'  =>'Tăng dần',
              ]; 
              $orderByRecord =  $form->field($model, 'ARRANGE_BY',['template' => '{input}{error}','options' => ['class' => '']])->dropDownList($orderBy,['options'=>[$model->ARRANGE_BY =>['Selected'=>true]],'class'=>'span2'])->label('Sắp xếp theo chiều'); ?>
             

            <?php 
              // Mượn ARRANGE_FIELD để sắp xếp theo trường 

              $dataField= [
                  'ID'         =>'Theo ID dịch vụ',
                  'TITLE'      =>'Theo tên bài viết',
                  'STATUS'     =>'Theo trạng thái',
                  'CREATED_AT' =>'Theo ngày tạo',
                  
              ];
              echo $orderRecode  = $form->field($model, 'ARRANGE_FIELD',['template' => '{label} <div class="controls">{input}'.$orderByRecord.'{error}{hint}</div>','options' => ['class' => 'control-group']])->dropDownList($dataField,['options'=>[$model->ARRANGE_FIELD =>['Selected'=>true]],'class'=>'span2'])->label('Sắp xếp theo trường'); ?>
            
            <?php $dataModule= [
                  '5'    =>'5 bản ghi',
                  '10'   =>'10 bản ghi',
                  '20'   =>'20 bản ghi',
                  '50'   =>'50 bản ghi',
                  '100'  =>'100 bản ghi',
                  '200'  =>'200 bản ghi',
                  '300'  =>'300 bản ghi',
                  '500'  =>'500 bản ghi',
                  '1000' =>'1000 bản ghi',
                  'all'  =>'Tất cả bản ghi',
              ]; ?>
            

            <?php $textLimit =  $form->field($model, 'TEXT_LIMIT', ['template' => '<div class="">{input}</div>'])->textInput(['class'=>'span4','placeholder'=>'Nhập số bản ghi','style'=>'margin-left:5px;width:160px;padding: 3px 5px;']) ?>
            <?php  
              // Mượn LIMIT_SELECT làm ten gioi hạn bản ghi 
              $limitRecode  = $form->field($model, 'LIMIT_SELECT',['template' => '{label} <div class="controls">{input}'.$textLimit.'{error}{hint}</div>','options' => ['class' => 'control-group']])->dropDownList($dataModule,['options'=>[$model->LIMIT_SELECT =>['Selected'=>true]],'class'=>'span2','value'=>'all'])->label('Giới hạn bản ghi'); ?>

            <?php 
                echo $limitRecode ;
             ?>
            <div class="control-group">

                <label class="control-label"></label>
                <div class="controls">
                  <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-info']) ?>
                  <?= Html::resetButton('Reset', ['class' => 'reset btn btn-danger']) ?>
                </div>
            </div>
    <?php ActiveForm::end(); ?>
  </div>
 <!--  <script>
   $(document).ready(function() {
     $('body').on('click', '.reset', function(event) {
       event.preventDefault();
       //$('#formSearch')[0].reset();
       $(':input','#formSearch')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');
     });
   });
 </script> -->
