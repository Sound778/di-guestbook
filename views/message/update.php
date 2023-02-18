<?php

use yii\helpers\Html;
use yii\helpers\FileHelper;

/** @var yii\web\View $this */
/** @var app\models\Message $model */
/** @var array $images */

$this->title = 'Редактор сообщения: #' . $model->m_id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->m_id, 'url' => ['view', 'm_id' => $model->m_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
echo '<b>Прикрепленные файлы</b><br>';
if(!empty($images)) {
    foreach ($images as $image) {
        //выводим ссылки для просмотра картинок
        echo '<div class="image-link" data-link="' . $image['link'] . '">' . $image['name'] . '</div>';
    }
}
?>

<div class="upl" id="viewImageLayer">
    <div class="upl__shell" id="viewImageLayerShell">
        <span class="uplshell__title">Просмотр изображения</span>
        <span class="uplshell__close-sign">[X]</span>
        <hr class="clear">
        <div class="pic-container"></div>
        <div class="del-container"><span class="del-link">Удалить изображение</span></div>
        <div class="response-container"></div>
    </div>
</div>
