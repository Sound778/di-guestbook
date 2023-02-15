<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>
<h1>Регистрация пользователя</h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->textInput(['style'=>'width:300px', 'maxlength' => true]) ?>
<?= $form->field($model, 'password')->passwordInput(['style'=>'width:300px', 'maxlength' => true]) ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>