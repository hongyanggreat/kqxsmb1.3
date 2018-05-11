<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;
?>
<div class="chu-nho noidung xanhchuoi">
    <div class="panel-2">
        <ul>
            <?php 
                if(isset($modelMoney->TOTAL) && $modelMoney->TOTAL){

             ?>
            <li>
               Số dư hiện tại của bạn là : <?php echo number_format($modelMoney->TOTAL,'0',',','.') ?> đ
            </li>
             <?php 
                }
              ?>
            <li>
                Khi nạp vip thành công bạn có thể vào trang chốt số vip của các chuên gia soi cầu và top cao thủ loto tư vấn chia sẻ! 
            </li>
            <li>
                Danh sách các loại thẻ nạp nhà mạng và nhà phát hành thẻ game được liên kết!
            </li>
        </ul>
        <?php $form = ActiveForm::begin([
                //'action' => '/login',
                'options' => [
                    'class' => 'napthe',
                    'name'  => 'napthe',
                    'id'    => 'fnapthe',
                 ]
            ]); ?>
            <ul>
                <?php 
                    if(isset($arrCardTypes) && $arrCardTypes){
                        foreach ($arrCardTypes as $key => $value) {
                            $checked = false;
                            if( $key == $model->card_type){
                                $checked = true;
                            }
                ?>          
                <li>
                    <div class="card_type_id <?= $value ?>" style="cursor: pointer;">
                         <?= Html::activeTextInput($model, 'card_type', ['placeholder' => $value,'checked'=>$checked, 'class' => 'check-the','id'=>'card_type','value'=>$key,'type'=>'radio','style'=>'cursor: pointer']); ?>
                    </div>
                </li>
                <?php 
                        }  
                    } 
                ?>
            </ul>
            <div class="nhapthe">
                <div>
                     <?= Yii::$app->session->getFlash('message'); ?>
                    <?php echo Html::error($model, 'card_type',['class'=>'error','style'=>'color:red']); ?>
                </div>
                <div>
                    <?= Html::activeTextInput($model, 'pin', ['placeholder' => 'Nhập mã thẻ...', 'class' => 'pin','id'=>'pin']); ?>
                    <?php echo Html::error($model, 'pin',['class'=>'error','style'=>'color:red']); ?>
                </div>
                <div>
                    <?= Html::activeTextInput($model, 'seri', ['placeholder' => 'Nhập mã seri...', 'class' => 'seri','id'=>'seri']); ?>
                    <?php echo Html::error($model, 'seri',['class'=>'error','style'=>'color:red']); ?>
                </div>
                <?= Html::button ('Nạp ngay', ['placeholder' => 'Nạp ngay', 'class' => 'naptheCao nut nut-napthe','id'=>'naptheCao','type'=>'submit']); ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>  
</div>
<script>
    $(document).ready(function() {
        $('body').on('click', '.card_type_id', function(event) {
            // event.preventDefault();
            $(this).children('input#card_type').prop("checked", true);
        });
    });

</script>