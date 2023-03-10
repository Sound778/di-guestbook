<?php

use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Message $model */
/** @var array $images */

$this->title = $model->m_id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'm_id' => $model->m_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить запись', ['delete', 'm_id' => $model->m_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это сообщение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'm_id',
            'm_uname',
            'm_uemail:email',
            'm_uid',
            'm_uhomepage',
            'm_uagent',
            'm_uip',
            [
                'attribute' => 'm_created_at',
                'value' => function ($model) {
                    return date_format(date_create($model->m_created_at), 'd.m.Y H:i:s');
                },
            ],
            'm_text:ntext',
            'm_status',
        ],
    ]) ?>

    <?php
    echo '<b>Прикрепленные файлы</b><br>';
    if(!empty($images)) {
        foreach ($images as $image) {
            //выводим ссылки для просмотра картинок
            echo '<div class="image-link" data-link="' . $image['link'] . '">' . $image['name'] . '</div>';
        }
    }
    ?>

</div>
<div class="upl" id="viewImageLayer">
    <div class="upl__shell" id="viewImageLayerShell">
        <span class="uplshell__title">Просмотр изображения</span>
        <span class="uplshell__close-sign">[X]</span>
        <hr class="clear">
        <div class="pic-container"></div>
        <div class="del-container"></div>
        <div class="response-container"></div>
    </div>
</div>
