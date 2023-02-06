<?php

use app\models\Category;
use app\models\Company;
use app\models\User;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_discounted')->checkbox() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'specifications')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'way_to_use')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_id')->dropDownList(Company::getList())?>

    <?= $form->field($model, 'rating')->input('number', ['min' => 1, 'max' => 5, 'step' => 1]) ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'updated_at')->widget(DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'created_by')->dropDownList(User::getList())?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getList())?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
