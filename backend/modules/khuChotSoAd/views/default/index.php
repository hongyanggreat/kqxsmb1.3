<?php 
     use yii\helpers\Html;
     use yii\widgets\ActiveForm;
     
     use backend\widgets\ButtonWidget;
     use backend\widgets\ButtonControlWidget;
     use backend\widgets\PaginationWidget;
     $suffix     = Yii::$app->params['suffix'];
     $baseUrl     = Yii::$app->params['baseUrl'];
     $module      = Yii::$app->controller->module->id;
     $this->title = 'Danh sách Bài viết ';
     $this->params['breadcrumbs'][] = $this->title;

 ?>
  <style>
     .help-block, .help-inline{
        color: #d81b1b;
        display: inline-block;
     }
     .myPagination{
        text-align: center;
     }
 </style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box collapsible">
        
            <div class="widget-title">
                <?php echo ButtonWidget::widget(['data'=>[
                    'ID'                  =>null,
                    'TITLE'               =>'Danh sách bài viết',
                    'DISSABLE_BTN_CREATE' =>true,
                  ]]) ?>
               
            </div>
            <div class="collapse" id="collapseOne">
              <!-- //FORM SEARCH -->
               <?= $this->render('_search', [
                    'model'=>$model,
                ]) ?>
              <!-- //FORM SEARCH -->
            </div>
            
            <div class="collapse in" id="collapseTwo">
                <div class="widget-content" style="padding: 0px" >
                     <div class="widget-box" style="border:0px;margin:0px">
                        <div class="widget-title">
                          <!-- //Hien thi cac nut chuc nang -->
                          
                        </div>
                        <div class="widget-content nopadding" style="overflow: scroll;">
                             <?php $form = ActiveForm::begin([
                                'id' => 'formRecord',
                                'action' => '',
                                'options' => [
                                    'class' => 'form-horizontal'
                                 ]
                            ]); ?>
                              <table class="table table-bordered data-table">
                                <thead>
                                  <tr>
                                    <th style="width:50px;text-align: center;">STT</th>
                                    <th>ID</th>
                                    <th>Nội dung chốt số</th>
                                    <th>Người đăng</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                    <th>Chức năng</th>
                                  </tr>
                                </thead>
                                         <tbody>

                                        <?php 
                                          if(isset($dataProviders) && count($dataProviders)>0){
                                            foreach ($dataProviders as $key => $dataProvider) {

                                                $id        = $dataProvider['ID'];
                                                $content   = $dataProvider['CONTENT'];
                                                $create_by = $dataProvider['ACC_ID'];
                                                $create_at = $dataProvider['CREATED_AT'];

                                                $status      = $dataProvider['STATUS'];
                                                switch ($status) {
                                                  case '0':
                                                    $status = '<i class="icon icon-lock"></i>';
                                                    break;
                                                  case '1':
                                                    $status = '<i class="icon icon-ok-sign"></i>';
                                                   # code...
                                                   break;
                                                  case '2':
                                                    $status = '<i class="icon icon-minus-sign"></i>';
                                                   # code...
                                                   break;
                                                  
                                                  default:
                                                    $status = '<i class="icon icon-eye-open"></i>';
                                                    # code...
                                                    break;
                                                }
                                               
                                         ?>
                                        <tr>
                                            <td style="text-align: center;width: 40px;"><?= $key +1  ?></td>
                                            <td style="text-align: center;width: 40px;"><?= $id  ?></td>
                                            
                                           
                                            <td style="text-align: left;width: 150px;"><?= $content  ?></td>
                                           
                                            <td style="text-align: center;width: 100px;"><?= $create_by  ?></td>
                                            <td style="text-align: center;width: 100px;"><?= $status  ?></td>
                                            <td style="text-align: center;width: 100px;"><?= $create_at  ?></td>
                                            <td style="text-align: center;width: 100px;"><?php 
                                                echo  ButtonControlWidget::widget(['dataProvider'=>[
                                                          'task'       =>'ButtonControl2',
                                                          'ID'         =>$id,
                                                          'URL_UPDATE' =>$baseUrl.$module.'/update'.$suffix.'?id='.$id,
                                                          'URL_VIEW'   =>FALSE,
                                                          'URL_DELETE' =>FALSE,
                                                        ]]); 
                                             ?></td>
                                        </tr>
                                          <?php } ?>
                                          <?php } ?>
                                        </tbody>
                              </table>
                              <?php ActiveForm::end(); ?>

                              <?php 
                                if(isset($myPagination) && $myPagination['totalPage'] > 1){
                               ?>
                                  <div class="pagination alternate myPagination">
                                      <ul>
                                         <?= PaginationWidget::widget(['paginator'=>$myPagination]); ?>
                                      </ul>
                                  </div>
                             
                              <?php } ?>
                        </div>
                      </div>
                </div>
            </div>
         
    </div>
      
      </div>
    </div>
  </div>