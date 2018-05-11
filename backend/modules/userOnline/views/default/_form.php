<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\userOnline\models\Useronline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="useronline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TIME_SS')->textInput() ?>

    <?= $form->field($model, 'IP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
