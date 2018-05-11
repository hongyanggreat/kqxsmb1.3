<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;

$id       = $model->ACC_ID;
$userName = $model->USERNAME;
$userNameCheck = "none";
if (!Yii::$app->user->isGuest ){
	$userNameCheck =  Yii::$app->user->identity->USERNAME;
}

$userType = $model->USER_TYPE;
switch ($userType) {
    case 0:
        $userType = "Tài khoản thường";
        break;
     case 1:
        $userType = "Tài khoản quản trị";
        break;
     case 2:
        $userType = "Tài khoản ??";
        break;
    
    default:
       $userType = "Mặc định Tài khoản";
        break;
}
$fullName = $model->FULL_NAME;
$phone    = $model->PHONE;
$email    = $model->EMAIL;

if($userName != $userNameCheck){
	$phone = substr($phone, 0,3).".xxx.xxx";
	if($email){
		$arrEmail = explode('@', $email);
		if($arrEmail[1]){
			$email = substr($email, 0,3).'***@'.$arrEmail[1];
		}
	}
}


$path = 'uploads/accounts/';
$linkImage = $baseUrl.'uploads/default/image/guest.png';
                
if(!empty($model->IMAGE)){
    $sourcePath = $baseUrl.$path.$id.'/avata/';
    $linkImage =  $sourcePath . $model->IMAGE;
}
$money = "0";
if (isset($model['money']->TOTAL) && $model['money']->TOTAL) {

    $money = number_format($model['money']->TOTAL, '0', ',', '.');
}
?>
<!-- <div class="panel-2">
    <img src="../../../../web/uploads/img/cauchuan.gif" alt="" width="100%" height="100px"/>
</div> -->

<div class="chu-vua danhmuc">Trang thông tin cá nhân</div>
<div class="chu-nho noidung">
    <br>
    <img id="showImage" style="border: 2px solid #ccc; border-radius: 100px; height: 50px; width: 50px;" src="<?= $linkImage ?>" alt="Ảnh cá nhân của <?= $userName ?>"><br>
    <label>Tên đăng nhập: <?= $userName ?></label><br>
    <label>Chức vụ: <?= $userType ?></label><br>
    <label>Túi tiền: <?= $money ?> VNĐ</label><br>
    <label>Họ và tên: <?= $fullName ?></label><br>
    <label>Số điện thoại: <?= $phone ?></label><br>
    <label>Email: <?= $email ?></label><br><br>
    <?php 
          
           if($userName == $userNameCheck){
     ?>
    <!-- <form class="w3-input w3-border" id="uploadimage" action="" method="POST" enctype="multipart/form-data"> -->
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'id'=>'uploadimage']) ?>
        <label class="dam">Thay đổi ảnh đại diện</label><br>
        <!-- <input type="file" class="w3-small w3-ripple w3-red" id="changeImage" name="image"> -->
        <?= $form->field($model, 'ACC_ID')->hiddenInput(['class'=>'w3-small w3-ripple'])->label(false) ?>
        <?= $form->field($model, 'IMAGE',['template' => '{input}<button class="w3-small w3-ripple w3-red">Xác nhận thay đổi hình ảnh</button>','options' => ['class' => 'form-group']])->fileInput(['maxlength' => true,'accept'=>'image/*','id'=>'changeImage','class'=>'w3-small w3-ripple'])->label(false) ?>
        
        <br><br>
        
    <?php ActiveForm::end() ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'changePassword']]) ?>
        <label class="dam">Thay đổi mật khẩu</label><br>
        <label>Mật khẩu mới</label><br>
        <?= $form->field($model, 'ACC_ID')->hiddenInput(['class'=>'w3-small w3-ripple'])->label(false) ?>
        <?= $form->field($model, 'PASSWORD')->textInput(['class'=>'','placeholder'=>'Mật khẩu mới'])->label(false) ?>
        <label>Nhập lại mật khẩu</label>
        <?= $form->field($model, 'RE_PASSWORD')->textInput(['class'=>'','placeholder'=>'Nhập lại mật khẩu'])->label(false) ?>
        <br>
        <button class="w3-btn w3-small w3-ripple w3-red">Thay đổi mật khẩu</button><br>
    <?php ActiveForm::end() ?>
    <br>
    <script>
        $(function(){
            $("#changeImage").change(showPreviewImage_click);
        })

        function showPreviewImage_click(e) {
            var $input = $(this);
            var inputFiles = this.files;
            if(inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var type = inputFile.type;
            var size = inputFile.size;
            // console.log(inputFile);
            // console.log(type);
            // console.log(size);
            var match= ["image/jpeg","image/png","image/jpg"];
            if((type == match[0] ||type == match[1] || type == match[2]) && size <= 100000000){

                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#showImage').attr("src", event.target.result);
                };
                reader.onerror = function(event) {
                    alert("I AM ERROR: " + event.target.error.code);
                };
                reader.readAsDataURL(inputFile);
            }
        }

        $(document).ready(function() {
            $("#changePassword").on('submit', (function (e) {
                e.preventDefault();
                 var url = "<?php echo $baseUrl . $module.'/changepassword' . $suffix; ?>";
                $.ajax({
                    url: url, // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        // console.log(data);
                        alert(data.message);
                    }
                });
            }));
            $("#uploadimage").on('submit', (function (e) {
                e.preventDefault();
                 var url = "<?php echo $baseUrl . $module.'/uploadimage' . $suffix; ?>";
                $.ajax({
                    url: url, // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        if(data.status){
                        }
                        alert(data.message);
                    }
                });
            }));
        });
    </script>
    <?php } ?>
</div>