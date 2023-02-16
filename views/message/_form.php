<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

//use yii\captcha\CaptchaAction;

/** @var yii\web\View $this */
/** @var app\models\Message $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="message-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

    if (!Yii::$app->user->isGuest) {
        echo 'Пользователь: ' . Html::encode(Yii::$app->user->identity->username) . '<br>';
    } else {
        echo $form->field($model, 'm_uname')->textInput(['style' => 'width:300px', 'maxlength' => true]);
    }
    ?>
    <?= $form->field($model, 'm_uemail')->textInput(['style' => 'width:300px', 'maxlength' => true]); ?>

    <?= $form->field($model, 'm_uhomepage')->textInput(['style' => 'width:300px', 'maxlength' => true]); ?>

    <?= $form->field($model, 'm_text')->textarea(['rows' => 6, 'style' => 'max-width:600px']) ?>

    <?= $form->field($model, 'attachedFile')->fileInput(); ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::class); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
