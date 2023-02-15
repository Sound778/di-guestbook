<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\TestAppAsset;
//use app\widgets\Alert;
use yii\helpers\Url;
//use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
//use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;

TestAppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="left-side dark">
    <div class="left-side__home">
        <a href="<?= Yii::$app->homeUrl ?>">GUESTBOOK</a>
    </div>
    <div class="color-medium" id="left-side__logged">
        <?php
        // ссылки для проверки алиасов, ещё не настроены, покажут 404 ошибку
        echo (Yii::$app->user->isGuest)
        ? '<a href="' . Url::to(['@login']) . '">Вход</a> / <a href="' . Url::to(['@register']) . '">Регистрация</a>'
        : Yii::$app->user->identity->username;
        ?>
    </div>
    <ul id="sidebar">
        <li><a href="<?= Url::to(['@messages']) ?>">Сообщения</a></li>
        <!-- Задан несуществующий путь - это покажет ошибку -->
        <li><a href="<?= Url::to(['/site/extra']) ?>">Что-то еще</a></li>

    </ul>
    <div class="color-medium" id="left-side__logout">
        <a href="<?= Url::to(['@logout']) ?>"><img src="/images/standby-20.png" width="20" height="20" title="выход" alt="выход"></a>
    </div>
</div>
<div class="main">
    <div class="main__upper-line light" id="pageMenuLine">
    </div>
    <div class="main__upper-line title-line" id="pageTitleLine">
        <span>Гостевая книга</span>
        <div class="top-buttons-block">
        </div>
    </div>
    <div class="main__upper-stripe"></div>
    <div class="main__page-content" id="pageContent">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
