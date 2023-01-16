<?php

use yii\helpers\Html;
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

    <?= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'updated_at')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'created_by')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'first_name')))?>

    <?= $form->field($model, 'manager_list_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\ManagerList::find()->all(), 'id', 'id')))?>

    <?= $form->field($model, 'products_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Products::find()->all(), 'id', 'id')))?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
