<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\SignupForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация пользователя';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->textInput(['style'=>'width:300px', 'maxlength' => true]) ?>
<?= $form->field($model, 'password')->passwordInput(['style'=>'width:300px', 'maxlength' => true]) ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>