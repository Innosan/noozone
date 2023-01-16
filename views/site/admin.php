<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <div class="">
            <a href="?r=sex/index">Пол</a>
            <a href="?r=city/index">Город</a>
            <a href="?r=category/index">Категории товара</a>
            <a href="?r=currency/index">Валюты</a>
            <a href="?r=delivery-type/index">Типы доставки</a>
            <a href="?r=media-type/index">Тип медиа</a>
        </div>
    </p>

    <code><?= __FILE__ ?></code>
</div>
