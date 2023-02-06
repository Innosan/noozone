<?php

use app\models\ManagerList;
use app\models\Products;
use app\models\User;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'tax_number')->textInput() ?>

    <?= $form->field($model, 'photo_url')->textInput() ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'updated_at')->widget(DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'created_by')->dropDownList(User::getList())?>

    <?= $form->field($model, 'manager_list_id')->dropDownList(ManagerList::getList())?>

    <?= $form->field($model, 'products_id')->dropDownList(Products::getList())?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
