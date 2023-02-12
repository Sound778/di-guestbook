<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MessageSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'm_uname') ?>

    <?= $form->field($model, 'm_uemail') ?>

    <?= $form->field($model, 'm_uhomepage') ?>

    <?= $form->field($model, 'm_uagent') ?>

    <?php // echo $form->field($model, 'm_uip') ?>

    <?php // echo $form->field($model, 'm_text') ?>

    <?php // echo $form->field($model, 'm_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
