<?php

use app\models\MediaType;
use app\models\Review;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewMedia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'media_type_id')->dropDownList(MediaType::getList())?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_id')->dropDownList(Review::getList())?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
