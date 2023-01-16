<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex flex-row gap-5">
        <div class="d-flex flex-column">
            <h2>Списки</h2>
            <a href="?r=sex/index">Пол</a>
            <a href="?r=city/index">Город</a>
            <a href="?r=category/index">Категории товара</a>
            <a href="?r=currency/index">Валюты</a>
            <a href="?r=delivery-type/index">Типы доставки</a>
            <a href="?r=media-type/index">Тип медиа</a>
            <a href="?r=role/index">Роль</a>
        </div>
        <div class="d-flex flex-column">
            <h2>Составные сущности</h2>
            <a href="?r=product/index">Продукт</a>
            <a href="?r=order-place/index">Место доставки</a>
            <a href="?r=company/index">Компания</a>
            <a href="?r=manager-list/index">Список менеджеров</a>
        </div>
    </div>
</div>
