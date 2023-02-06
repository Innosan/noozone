<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните поля, чтобы зарегистрироваться:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="d-flex flex-row gap-lg-5">
                <div class="d-flex flex-column">
                    <h3>Личная информация</h3>
                    <?= $form->field($model, 'first_name')->textInput() ?>
                    <?= $form->field($model, 'last_name')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'sex_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Sex::find()->all(), 'id', 'title')))?>
                    <?= $form->field($model, 'city_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name')))?>
                    <?= $form->field($model, 'currency_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Currency::find()->all(), 'id', 'title')))?>
                    <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(), [
                        'options' => ['class' => 'form-control'],
                        'dateFormat' => 'yyyy-MM-dd',
                    ]) ?>
                    <?= $form->field($model, 'photo_url')->textInput() ?>
                </div>
                <div class="d-flex flex-column">
                    <h3>Данные для входа</h3>
                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'mail')->textInput() ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>