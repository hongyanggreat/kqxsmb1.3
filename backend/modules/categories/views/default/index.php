<?php 
     use yii\helpers\Html;
     use yii\widgets\ActiveForm;
     
     use backend\widgets\ButtonWidget;
     use backend\widgets\ButtonControlWidget;
     use backend\widgets\PaginationWidget;
     $baseUrl     = Yii::$app->params['baseUrl'];
     $module      = Yii::$app->controller->module->id;
     $this->title = 'Danh sách Danh mục ';
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
                    'TITLE'               =>'Danh sách danh mục',
                    'DISSABLE_BTN_CREATE' =>true,
                  ]]) ?>
                <a href="#collapseTwo" data-toggle="collapse" title="Danh sách">
                    <span class="icon"><i class="icon-th-list"></i></span> 
                </a>
              <!--   <a href="#collapseOne" data-toggle="collapse" title="Tìm kiếm nâng cao">
                  <span class="icon"><i class="icon-zoom-out"></i></span>
              </a> -->
            </div>
            <!-- <div class="collapse" id="collapseOne">
              //FORM SEARCH
              
              //FORM SEARCH
            </div> -->
            
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
                                    <th>Tên Danh mục</th>
                                    <th>Tên định danh</th>
                                    <th>Parent</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Tạo ngày</th>
                                    <th>Chức năng</th>
                                  </tr>
                                </thead>
                                         <tbody>

                                        <?php 
                                          if(isset($dataProviders) && count($dataProviders)>0){
                                              foreach ($dataProviders as $key => $dataProvider) {
                                                 
                                                  
                                                  $id          = $dataProvider['ID'];
                                                  $name        = $dataProvider['NAME'];
                                                  $alias       = $dataProvider['ALIAS'];
                                                  $image       = $dataProvider['IMAGE'];
                                                  $linkImage   = 'categories/'.$id.'/image/'.$image;

                                                  $parent      = $dataProvider['parent']['NAME'];
                                                  //$image     =$dataProvider['IMAGE'];
                                                  $linkCate    = '/chuyen-muc/'.$alias;
                                                  
                                                  $create_date = $dataProvider['CREATED_AT'];
                                                  $create_date = date('d-m-Y',$create_date);
                                                  
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
                                                      <td style="text-align: center;width: 50px;"><?= $key +1  ?></td>
                                                      <td style="text-align: center;width: 50px;"><?= $id  ?></td>
                                                      <td style="text-align: left;max-width:200px;">
                                                        <div style="overflow:hidden;max-height: 20px;" title="<?= $name  ?>">
                                                            <a href="<?= $linkCate ?>" target="_blank"><?= $name  ?></a>
                                                        </div>
                                                      </td>
                                                      <td style="text-align: left;width: 200px;"><?= $alias  ?></td>
                                                      <td style="text-align: center;width: 100px;"><?= $parent  ?></td>
                                                      <td style="text-align: center;width: 100px;">
                                                          <?php 
                                                              if(isset($image) && !empty($image)){
                                                           ?>
                                                          <a href="<?= $linkImage  ?>">[ <i class="icon-picture"></i> ] Xem ảnh</a>
                                                          <?php }else{ ?>
                                                           [ <i class="icon-camera"></i> ] No Image
                                                          <?php } ?>
                                                      </td>
                                                      <!-- <td style="text-align: left;width: 200px;"><?php //$image  ?></td> -->
                                                      <td style="text-align: center;width: 100px;"><?= $status  ?></td>
                                                      <td style="text-align: center;width: 100px;"><?= $create_date  ?></td>
                                                      <td style="text-align: center;width: 100px;"><?php
                                                          $baseUrl = Yii::$app->params['baseUrl']; 
                                                          echo  ButtonControlWidget::widget(['dataProvider'=>[
                                                                    'task'       =>'ButtonControl2',
                                                                    'ID'         =>$id,
                                                                    'URL_UPDATE' =>$baseUrl.$module.'/update'.yii::$app->params['suffix'].'?id='.$id,
                                                                    'URL_VIEW'   =>$baseUrl.$module.'/view'.yii::$app->params['suffix'].'?id='.$id,
                                                                    'URL_DELETE' =>$baseUrl.$module.'/delete'.yii::$app->params['suffix'].'?id='.$id,
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