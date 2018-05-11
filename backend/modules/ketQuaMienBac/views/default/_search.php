	
<?php 
     use yii\helpers\Html;
     use yii\widgets\ActiveForm;
     use backend\widgets\ButtonWidget;
     use backend\widgets\PaginationWidget;
     $action       =  Yii::$app->controller->action->id;
     $baseUrl     = Yii::$app->params['baseUrl'];
     $suffix     = Yii::$app->params['suffix'];
     $module      = Yii::$app->controller->module->id;
 ?>
	<?php 
	      $form = ActiveForm::begin([
	          'method' => 'get',
	          'action' => $baseUrl.$module.$suffix,
	          'options' => [
	              'class' => 'form-horizontal'
	           ]
	      ]); ?>

	   <table class="table table-bordered table-striped">
	      <tbody>
	        
	            
	            <tr>
	              <td style="text-align: center;">
	                Tìm kiếm
					Từ ngày <input type="text" name="formDate" data-date-format="yyyy-mm-dd" value="" class="datepicker span4" placeholder="Nhập ngày bắt đầu">
					Đến ngày <input type="text" name="toDate" data-date-format="yyyy-mm-dd" value="" class="datepicker span4" placeholder="Nhập ngày kết thúc">
	              </td>
	            </tr>
	            
	          </tbody>
	        </table>
	      <div class="control-group">
	          <label class="control-label"></label>
	          <div class="controls">
	            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
	          </div>
	      </div>

	<?php ActiveForm::end(); ?>