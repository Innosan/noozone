<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(), [
                'options' => ['class' => 'form-control'],
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>
            <?= $form->field($model, 'phone')->textInput() ?>
            <?= $form->field($model, 'photo_url')->textInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>