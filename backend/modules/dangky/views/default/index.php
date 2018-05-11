<?php 

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
    $action       =  Yii::$app->controller->action->id;
 ?>
<div class="noidung chu-nho">
  <div class="danhmuc chu-vua">
    <b>Đăng ký tài khoản</b>
</div>
<!-- <form class="chu-nho cannd-10 den" action="" method="post"> -->
 <?php $form = ActiveForm::begin([
                //'action' => '/login',
                'options' => [
                    'class' => 'den'
                 ]
            ]); ?>

    <p>      
        <label><b>Tên đăng nhập</b></label>
         <?= Html::activeTextInput($model, 'USERNAME', ['placeholder' => 'Nhập Tài khoản', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_tk']); ?>
         <?= Html::error($model, 'USERNAME'); ?>
    </p>
    <p>      
        <label><b>Số điện thoại</b></label>
         <?= Html::activeTextInput($model, 'PHONE', ['placeholder' => 'Nhập Số điện thoại', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_sdt']); ?>
          <?= Html::error($model, 'PHONE'); ?>
    </p>
    <p>      
        <label><b>Email</b></label>
         <?= Html::activeTextInput($model, 'EMAIL', ['placeholder' => 'Nhập email', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_email']); ?>
         <?= Html::error($model, 'EMAIL'); ?>
    </p>
    <p>      
        <label><b>Mật khẩu</b></label>
        <?= Html::activePasswordInput($model, 'PASSWORD', ['placeholder' => 'Nhập mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_mk']); ?>
        <?= Html::error($model, 'PASSWORD'); ?>
    </p>
    <p>      
        <label><b>Xác nhận mật khẩu</b></label>
        <?= Html::activePasswordInput($model, 'RE_PASSWORD', ['placeholder' => 'Xác nhận mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_rmk']); ?>
        <?= Html::error($model, 'RE_PASSWORD'); ?>
    </p>
    <p>
        <?= Html::activeCheckbox($model, 'AGREE', ['class' => ''])?>
        <?= Html::error($model, 'AGREE'); ?>
    </p>
    <p>
        <input class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium" type="submit" value="Đăng ký" onsubmit="kiemtradulieu();">
    </p>
    <?php ActiveForm::end(); ?>
<!-- </form> -->
</div>  
<script type="text/javascript">
    // Bắt lỗi form
    function kiemtradulieu(){
      var taikhoan = document.getElementById('txt_tk').value;
      var sodt = document.getElementById('txt_sdt').value;
      var email = document.getElementById('txt_email').value;
      var matkhau = document.getElementById('txt_mk').value;
      var rmatkhau = document.getElementById('txt_rmk').value;

      if (taikhoan == '') {
        alert("Bạn cần nhập họ tên tài khoản");
        document.getElementById('txt_tk').focus();
        return false;
    };

    if (sodt == '') {
        alert("Bạn cần nhập số điện thoại");
        document.getElementById('txt_sdt').focus();
        return false;
    };
    var sdtRegex = /^\d{10,12}$/;
    if (sdtRegex.test(sdt) == false) {
        alert("Số điện thoại phải từ 10->12 ký tự");
        document.getElementById('txt_sdt').focus();
        return false;
    };

    if (email == '') {
        $thongbao= "Bạn cần nhập email";
        document.getElementById('txt_email').focus();
        return false;
    };
    var emailRegex = /^\w+@\D{2,10}(\.\D{2,8}){1,2}$/;
    if (emailRegex.test(email) == false) {
        alert("Email bạn nhập không đúng");
        document.getElementById('txt_email').focus();
        return false;
    };

    if (matkhau == '') {
        alert("Bạn cần nhập mật khẩu");
        document.getElementById('txt_mk').focus();
        return false;
    };
    if (rmatkhau == '') {
        alert("Bạn cần nhập lại mật khẩu");
        document.getElementById('txt_rmk').focus();
        return false;
        alert('Đăng ký thành công');
    }
</script>