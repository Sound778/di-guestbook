<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Message $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'm_uname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_uemail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_uhomepage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_uagent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_uip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'm_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
