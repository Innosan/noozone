<?php

use app\components\ModelHelper;
use app\models\Category;
use app\models\Company;
use app\models\Product;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id'],
            ['attribute' => 'title'],
            ['attribute' => 'description'],
            ['attribute' => 'specifications'],
            ['attribute' => 'way_to_use'],
            ['attribute' => 'is_discounted',
                'value' => function ($model) {
                    return $model->is_discounted ? 'Да' : 'Нет';
                },
                'filter' => [1 => "Да", 0 => "Нет"]
            ],
            ['attribute' => 'company_id',
                'value' => function ($model) {
                    return Html::a($model->company->title, Url::to(['company/view', 'id' => $model->id]));
                },
                'format' => 'html',
                'filter' => ModelHelper::getListOf(Company::instance(), 'title'),
            ],
            ['attribute' => 'rating'],
            ['attribute' => 'created_at', 'format' => ['date', 'php:d.m.Y']],
            ['attribute' => 'updated_at', 'format' => ['date', 'php:d.m.Y']],
            ['attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->user->fullName;
                },
                'filter' => ModelHelper::getListOf(User::instance(), 'fullName'),
            ],
            ['attribute' => 'price'],
            ['attribute' => 'category_id',
                'value' => function ($model) {
                    return Html::a($model->category->title, Url::to(['category/view', 'id' => $model->id]));
                },
                'format' => 'html',
                'filter' => ModelHelper::getListOf(Category::instance(), 'title'),
            ],
            ['attribute' => 'discount'],
            ['attribute' => 'new_price'],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
