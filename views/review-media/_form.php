<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewMedia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'media_type_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\MediaType::find()->all(), 'id', 'title')))?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Review::find()->all(), 'id', 'description')))?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
