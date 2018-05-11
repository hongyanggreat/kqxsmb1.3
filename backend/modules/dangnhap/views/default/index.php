<?php 

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\widgets\ButtonWidget;
    $baseUrl = Yii::$app->params['baseUrl'];
    $action       =  Yii::$app->controller->action->id;
 ?>
<div class="noidung chu-nho">
  <div class="danhmuc chu-vua">
    <b>Đăng nhập tài khoản</b>
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
         <?= Html::activeTextInput($model, 'username', ['placeholder' => 'Nhập Tài khoản', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_tk']); ?>
         <?= Html::error($model, 'username'); ?>
    </p>
   
    <p>      
        <label><b>Mật khẩu</b></label>
        <?= Html::activePasswordInput($model, 'password', ['placeholder' => 'Nhập mật khẩu', 'class' => 'w3-input w3-border w3-sand','id'=>'txt_mk']); ?>
        <?= Html::error($model, 'password'); ?>
    </p>
     <p>
        <?= Html::activeCheckbox($model, 'rememberMe', ['class' => ''])?>
        <?= Html::error($model, 'rememberMe'); ?>
    </p>
    <p>
        <?= Html::submitButton('Đăng nhập', ['class' => 'nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium', 'name' => 'login-button']) ?>
    </p>
    <?php ActiveForm::end(); ?>
<!-- </form> -->
</div>  