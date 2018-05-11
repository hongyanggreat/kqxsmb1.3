<?php 
   use yii\widgets\ActiveForm;
   use yii\helpers\Html;
   $baseUrl = Yii::$app->params['baseUrl'];
   $module  = Yii::$app->controller->module->id;
 ?>
<div class="collapse" id="collapseOne">
                    <div class="widget-content">
                      <?php $form = ActiveForm::begin([
                          'method' => 'POST',
                          'action'=>$baseUrl.$module.'/search',
                          'options' => [
                              'class' => 'form-horizontal'
                           ]
                      ]); ?>
                        

                      <style>
                          .lable{
                               width: 25%;
                               float: left;
                               margin-right: 5px;
                               line-height:30px;
                               text-align:center;
                               overflow: hidden;
                          }
                          .input{
                                width: 70%;
                                float: left;
                                margin-right: 5px;
                                text-align: center;
                          }
                          .input input{
                            width: 100%;
                          }
                      </style>
                      <div class="row-fluid">
                        <div class="span4">
                          
                          <div class="" style="margin-bottom: 5px">
                              <div class="lable">
                                <?= Html::activeLabel($model, 'NAME',['style'=>'display: initial;','label' => '<b>Tên dịch vụ :</b>']); ?>
                              </div>
                              <div class="input">
                                <?= Html::activeTextInput($model, 'NAME',['placeholder'=>'Nhập tên dịch vụ']); ?>
                              </div>
                          </div>
                          
                        </div>
                         <div class="span4">
                            <?php 
                              $startTime = date('d-m-Y');
                              $startTime = '01-06-2017';
                              $endTime   = date('d-m-Y');
                            ?>
                          <div class="" style="margin-bottom: 5px">
                              <div class="lable">
                                <?= Html::activeLabel($model, 'CREATED_AT',['style'=>'display: initial;','label' => '<b>Từ ngày</b>']); ?>
                              </div>
                              <div  data-date="12-02-2012" class="input-append date datepicker">
                                   <?= Html::activeTextInput($model, 'CREATED_AT',['placeholder'=>'Nhập ngày bắt đầu','class'=>'','data-date-format'=>'dd-mm-yyyy']); ?>
                                  <span class="add-on"><i class="icon-th"></i></span> 
                              </div>
                          </div>
                          <div class="" style="margin-bottom: 5px">
                            <div class="lable">
                              
                                <?= Html::activeLabel($model, 'CREATED_BY',['style'=>'display: initial;','label' => '<b>Đến ngày</b>']); ?>
                            </div>
                              <div  data-date="12-02-2012" class="input-append date datepicker">
                                   <?= Html::activeTextInput($model, 'CREATED_BY',['placeholder'=>'Nhập ngày Kết thúc','class'=>'','data-date-format'=>'dd-mm-yyyy']); ?>
                                  <span class="add-on"><i class="icon-th"></i></span> 
                              </div>
                          </div>
                          
                        </div>
                         <div class="span3 offset1" >
                          
                          <div class="" style="margin-bottom: 5px">
                           <?php 
                              $status   = [ 0 =>'Không kích hoạt',1 => 'Kích hoạt',2=>'Hủy kích hoạt'];
                              $checkedList = ['0','1','2'];
                              $model->STATUS = $checkedList;
                           ?>
                              <?= Html::activeLabel($model, 'CREATED_BY',['style'=>'display: initial;','label' => '<b>Trạng thái</b>']); ?>
                              <?= $form->field($model, 'STATUS')->checkboxList($status)->label(false) ?>
                          </div>
                        </div>
                        

                        <div class="span4" >
                          
                          <div class="" style="margin-bottom: 5px">

                              <?php 
                               $numberRecord= [
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
                                  ];
                               ?>
                               <!--// Mượn UPDATED_AT làm ten gioi hạn bản ghi -->
                              <div class="lable">
                                  <?= Html::activeLabel($model, 'UPDATED_AT',['style'=>'display: initial;','label' => '<b>Giới hạn</b>']); ?>
                              </div>
                              <div class="input">
                                  <?= Html::activeDropDownList($model, 'UPDATED_AT', $numberRecord, [
                                         'class' => 'span6',
                                   ]) ?>
                                   <?= Html::activeTextInput($model, 'TEXT_LIMIT',['placeholder'=>'Number','class'=>'span5','title'=>'Nhập giới hạn bản ghi','style'=>'']); ?>
                              </div>
                          </div>
                        </div>


                        <div class="span4" >
                          
                          <div class="" style="margin-bottom: 5px">

                              <?php 
                                $dataField= [
                                    'ID'         =>'Theo ID Danh mục',
                                    'NAME'       =>'Theo tên Danh mục',
                                    'STATUS'     =>'Theo trạng thái',
                                    'CREATED_AT' =>'Theo ngày tạo',
                                    
                                ];
                                $orderBy= [
                                  'DESC' =>'Giảm dần',
                                  'ASC'  =>'Tăng dần',
                                ]; 
                               ?>
                              <!-- // Mượn DESCRIPTION để sắp xếp theo trường  -->

                              <div class="lable">
                                  <?= Html::activeLabel($model, 'POSITION',['style'=>'display: initial;','label' => '<b>Sắp xếp</b>']); ?>
                              </div>
                              <div class="input">
                                  <?= Html::activeDropDownList($model, 'DESCRIPTION', $dataField, [
                                         'class' => 'span7',
                                   ]) ?>
                                  <?= Html::activeDropDownList($model, 'POSITION', $orderBy, [
                                         'class' => 'span5',
                                   ]) ?>
                              </div>
                          </div>
                        </div>

                      </div>

                      <div class="row-fluid" style="margin-top: 15px;margin-left: 20px;">
                        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-info']) ?>
                      </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                  </div>