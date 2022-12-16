<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">No Ozone</h1>
    <br>
</p>

Приложение для интернет-магазина "No Ozone"

Основано на Yii2.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

Структура проекта
-------------------

      assets/             ассеты приложения
      commands/           консольные команды (контроллер)
      config/             конфиг приложения
      controllers/        контроллеры
      mail/               просмотровые файли для почты
      migration/          миграции базы данных
      models/             модели
      runtime/            файлы, сгенерированные во время работы
      tests/              тесты
      vendor/             пакеты
      views/              интерфейс
      web/                входной скрипт и веб-ресурсы



Требования
------------

PHP v7.4.


Установка
------------

1. Клонировать проект
2. composer install - установка зависимостей
3. yii migrate - миграция базы данных
4. web/index.php - запуск проекта


Конфигурация
-------------

### База данных

Настроить `config/db.php` подставив свои данные, например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=noozone',
    'username' => 'admin',
    'password' => '12345',
    'charset' => 'utf8',
];
```

**Заметки:**
- Предварительно нужно создать базу данных!
