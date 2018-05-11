<?php 

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
    $action       =  Yii::$app->controller->action->id;
 ?>
<div class="w3-card-4 cach den cantrai">
  <div class="w3-container trang nen-xanh chu-to cannd-10">
    <b>Đăng ký tài khoản</b>
</div>
<!-- <form class="chu-nho cannd-10 den" action="" method="post"> -->
 <?php $form = ActiveForm::begin([
                //'action' => '/login',
                'options' => [
                    'class' => 'chu-nho cannd-10 den'
                 ]
            ]); ?>

    <p>      
        <label><b>Tên đăng nhập</b></label>
         <?= Html::activeTextInput($model, 'USERNAME', ['placeholder' => 'Nhập Tài khoản', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_tk','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
         <?= Html::error($model, 'USERNAME'); ?>
    </p>
    <p>      
        <label><b>Số điện thoại</b></label>
         <?= Html::activeTextInput($model, 'PHONE', ['placeholder' => 'Nhập Số điện thoại', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_sdt','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
          <?= Html::error($model, 'PHONE'); ?>
    </p>
    <p>      
        <label><b>Email</b></label>
         <?= Html::activeTextInput($model, 'EMAIL', ['placeholder' => 'Nhập email', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_email','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
         <?= Html::error($model, 'EMAIL'); ?>
    </p>
    <div id="changePass" style="display: none">
        
    <p>      
        <label><b>Mật khẩu cũ</b></label>
        <?= Html::activePasswordInput($model, 'PASSWORD', ['placeholder' => 'Nhập mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_mk','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
        <?= Html::error($model, 'PASSWORD'); ?>
    </p>

    <p>      
        <label><b>Mật khẩu mới</b></label>
        <?= Html::activePasswordInput($model, 'PASSWORD', ['placeholder' => 'Nhập mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_mk','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
        <?= Html::error($model, 'PASSWORD'); ?>
    </p>
    <p>      
        <label><b>Mật khẩu mới</b></label>
        <?= Html::activePasswordInput($model, 'RE_PASSWORD', ['placeholder' => 'Xác nhận mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_rmk','style'=>'margin-bottom: 5px;text-align:center','readonly'=>true]); ?>
        <?= Html::error($model, 'RE_PASSWORD'); ?>
    </p>
    </div>
    <p>
        <?= Html::activeCheckbox($model, 'AGREE', ['class' => ''])?>
        <?= Html::error($model, 'AGREE'); ?>
    </p>
    <p>
        <input class="chu-nho nen-xanh trang" type="button" id="changeInfo" value="Thay đổi thông tin">
        <input class="chu-nho nen-xanh trang" type="button" id="changePass" value="Thay đổi mật khẩu">
    </p>
    <?php ActiveForm::end(); ?>
<!-- </form> -->
</div>  
<script>
    
    $(document).ready(function() {
        $('body').on('click', '#changeInfo', function(event) {
            event.preventDefault();
            /* Act on the event */
            $(this).attr({
                type: 'submit',
                value: 'Lưu thay đổi'
                id: 'formSubmit'
            });
            $('form input').removeAttr('readonly');
        });
        $('body').on('click', '#changePass', function(event) {
            event.preventDefault();
            /* Act on the event */
            $('#changePass').show();
             $('form input').removeAttr('readonly');
        });
    });
</script>
