<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_discounted')->checkbox() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'specifications')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'way_to_use')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'title')))?>

    <?= $form->field($model, 'rating')->input('number', ['min' => 1, 'max' => 5, 'step' => 1]) ?>

    <?= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'updated_at')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'created_by')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'first_name')))?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'title')))?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
