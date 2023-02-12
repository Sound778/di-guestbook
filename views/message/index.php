<?php

use app\models\Message;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MessageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать сообщение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'m_id',
            'm_uname',
            'm_uemail:email',
            'm_uhomepage',
            'm_text:ntext',
            'm_uagent',
            'm_uip',
            //'m_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Message $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'm_id' => $model->m_id]);
                 }
            ],
        ],
    ]); ?>


</div>
