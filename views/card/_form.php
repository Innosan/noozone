<?php

use app\models\User;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Card $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->widget(MaskedInput::class,[
        'name' => 'number',
        'mask' => '9999-9999-9999-9999',
        'clientOptions' => [
            'removeMaskOnSubmit' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'expiry_date')->widget(DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_default')->checkbox() ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::getList())?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
