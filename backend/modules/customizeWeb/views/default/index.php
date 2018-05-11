<?php 
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use backend\widgets\ButtonWidget;
    use backend\widgets\ButtonControlWidget;
    $module    = Yii::$app->controller->module->id;
    $action    = Yii::$app->controller->action->id;
    $this->title = 'Danh sách dịch vụ 9505 đăng ký cho khách hàng';

 ?>

<div class="container-fluid">
  <div class="row-fluid">
      <div class="span12">

           <div class="widget-box collapsible">
                  
          <!-- //Form Search -->
           
          <!-- //Form Search -->
               <div class="widget-title">
                    <a href="#collapseTwo" data-toggle="collapse">
                        <span class="icon"> <i class="icon-ok-sign"></i> </span>
                        <h5>Danh sách</h5>
                    </a>
                    
                </div>
                <div class="collapse in" id="collapseTwo">
                    <div class="widget-content nopadding">
                        <?php $form = ActiveForm::begin([
                            'id' => 'formRecord',
                            'action' => '',
                            'options' => [
                                'class' => 'form-horizontal'
                             ]
                        ]); ?>
                       
                        <table class="table table-bordered table-striped data-table">
                          <thead>
                            <tr>
                              <th style="width:50px;text-align: center;">STT</th>
                              <th>ID</th>
                              <th>Tên </th>
                              <th>Tiêu đề</th>
                              <!-- <th>Hình Ảnh</th> -->
                              <th>Trạng thái</th>
                              <th>Tạo ngày</th>
                              <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 

                            
                              if(isset($dataProviders) && count($dataProviders)>0){

                                foreach ($dataProviders as $key => $dataProvider) {
                                    $id          =$dataProvider['ID'];
                                    $name        =$dataProvider['NAME'];
                                    $title        =$dataProvider['TITLE'];
                                    //$image       =$dataProvider['IMAGE'];
                                    $create_date =$dataProvider['CREATED_AT'];
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
                                <td style="text-align: left;"><?= $name  ?></td>
                                <td style="text-align: left;"><?= $title  ?></td>
                                <!-- <td style="text-align: left;width: 200px;"><?php //$image  ?></td> -->
                                <td style="text-align: center;width: 100px;"><?= $status  ?></td>
                                <td style="text-align: center;width: 100px;"><?= $create_date  ?></td>
                                <td style="text-align: center;width: 100px;"><?php 
                                    echo  ButtonControlWidget::widget(['dataProvider'=>[
                                              'task'       =>'ButtonControl2',
                                              'ID'         =>$id,
                                              'URL_UPDATE' =>'/'.$module.'/update?id='.$id,
                                              'URL_VIEW'   =>'/'.$module.'/view?id='.$id,
                                              'URL_DELETE'   =>'/'.$module.'/delete?id='.$id,
                                            ]]); 
                                 ?></td>
                            </tr>
                              <?php } ?>
                              <?php } ?>
                            </tbody>
                        </table>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                   
          </div>
      </div>
  </div>
</div>