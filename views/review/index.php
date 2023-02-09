<?php

use app\components\ModelHelper;
use app\models\Product;
use app\models\Review;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReviewSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id'],
            ['attribute' => 'pros'],
            ['attribute' => 'cons'],
            ['attribute' => 'description'],
            ['attribute' => 'likes'],
            ['attribute' => 'dislikes'],
            ['attribute' => 'is_approved',
                'value' => function ($model) {
                    return $model->is_approved ? 'Да' : 'Нет';
                },
                'filter' => [1 => "Да", 0 => "Нет"]
            ],
            ['attribute' => 'created_at', 'format' => ['date', 'php:d.m.Y']],
            ['attribute' => 'updated_at', 'format' => ['date', 'php:d.m.Y']],
            ['attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->user->fullName;
                },
                'filter' => ModelHelper::getListOf(User::instance(), 'fullName'),
            ],
            ['attribute' => 'product_id',
                'value' => function ($model) {
                    return Html::a($model->product->title, Url::to(['product/view', 'id' => $model->id]));
                },
                'format' => 'html',
                'filter' => ModelHelper::getListOf(Product::instance(), 'title'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Review $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
