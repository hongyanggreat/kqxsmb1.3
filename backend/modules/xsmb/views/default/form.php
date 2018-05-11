<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
		$baseUrl = Yii::$app->params['baseUrl'];
		$suffix  = Yii::$app->params['suffix'];
		$action  =  Yii::$app->controller->action->id;
		$module  = Yii::$app->controller->module->id;
/* @var $this yii\web\View */
/* @var $model backend\modules\moduleManager\models\Modules */

$this->title = 'Nhập kết quả ngày hôm nay';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách Kết qủa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

<div class="modules-create">
    
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span7 offset2">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Nhập ngày muốn láy kết quả</h5>
          </div>

          <div class="widget-content nopadding">
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'action' => $baseUrl.$module.$suffix,
                'options' => [
                    'class' => 'form-horizontal'
                 ]
            ]); ?>

             <table class="table table-bordered table-striped">

                <tbody>
                  <tr style="width: 100%;height: 100%;">
                    <!-- <td style="text-align: center;"><code>54551</code></td> -->
                    <td style="text-align: center;">
      					<div class="control-group">
		                <label class="control-label">Chọn ngày</label>
		                <div class="controls">
		                	
		                  <input type="text" data-date="01-02-2013" name="date" data-date-format="yyyy-mm-dd" value="<?php 
		                  	if(isset($dateGet)){ 
		                  		echo $dateGet ;
		                  	} ?>" class="datepicker span10">
		                  <div class="help-block span11">
		                  		<?php 
		                  			if(isset($message)){
		                  				echo $message;
		                  			}
		                  			echo '<br>';
		                  			if(isset($errors) && $errors){
			                			foreach ($errors as $key => $value) {
			                				echo $value[0];
			                			}
			                		}
		                  		 ?>
		                  </div>
		              </div>
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

</div>
